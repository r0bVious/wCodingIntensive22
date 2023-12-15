<?php
if (count($_POST) > 0) {
    // $gender = strip_tags($_POST["gender"]);
    // $lname = strip_tags($_POST["lastname"]);
    // $fname = strip_tags($_POST["firstname"]);
    // $age = strip_tags($_POST["age"]);
    // $login = strip_tags($_POST["login"]);
    // $pw = strip_tags($_POST["password"]);
    // $country = strip_tags($_POST["country"]);
    // $newsletter = strip_tags($_POST["newsletter"]);

    //Prettier way of stripping data of tags
    $userData = [];
    foreach ($_POST as $value) {
        $userData[] = htmlspecialchars($value);
    }

    $countries = array ("rok" => "Korea, Republic of", "jp" => "Isla Nublar", "atl" => "Atlantis", "who" => "Gallifrey");

    $gender = $userData[0];
    $lname = $userData[1];
    $fname = $userData[2];
    $age = $userData[3];
    $login = $userData[4];
    $pw = $userData[5];
    $confpw = $userData[6];
    foreach ($countries as $key => $value) {
        if ($key === $userData[7]) {
            $country = $value;
        }
    }

    if (isset($newsletter)) {
        $newsletter = "You will receive the newsletter";
    } else {
        $newsletter = "You will not receive the newsletter";
    }

    $curatedData = [];
    $curatedData[] = $gender;
    $curatedData[] = ucfirst($lname);
    $curatedData[] = ucfirst($fname);
    if (is_numeric($age)) {
        $curatedData[] = $age;
    } else {
        $curatedData[] = "Invalid";
    }
    $curatedData[] = $login;
    if ($pw === $confpw) {
        $curatedData[] = $pw;
    } else {
        $pw = "<span style='color: red;'>Your Passwords Do Not Match!</span>";
        $curatedData[] = "Your Passwords Do Not Match!";
    }
    $curatedData[] = $country;
    $curatedData[] = $newsletter;
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise 1 - POST</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            font-family: sans-serif;
        }

        body {
            margin-top: 5em;
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 0 5em;

            background: #BABABA;
        }

        form {
            height: 75vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: flex-start;

            background: #FAFAFA;
            border: 3px solid black;
            padding: 2em;
        }

        hr {
            height: 1px;
            width: 90%;
            background: black;
        }

        #genderdiv {
            display: flex;
            align-items: flex-start;
            width: 100%;
        }

        .genderbutton input {
            margin: 1em .5em 0;
        }

        .button {
            background-color: #405cf5;
            border-radius: 6px;
            border-width: 0;
            box-sizing: border-box;
            color: #fff;
            height: 40px;
            margin: 12px 0 0;
            padding: 0 25px;
            position: relative;
            text-align: center;
            width: 100%;
        }

         /* The switch - the box around the slider */
        .switch {
            position: relative;
            display: inline-block;
            width: 30px;
            height: 17px;
        }

        /* Hide default HTML checkbox */
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 13px;
            width: 13px;
            left: 2px;
            bottom: 2px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            transform: translateX(13px);
        }
    </style>
</head>
<body>
    <form action="exercise1.php" method="post">
        <h1>Sign In</h1>
        <hr>
        <div id="genderdiv">
            <label class="genderbutton" for="genderm"><input type="radio" value="male" name="gender" id="genderm">Man</input></label>
            <label class="genderbutton" for="genderw"><input type="radio" value="female" name="gender" id="genderw">Woman</input></label>
        </div>
        <label for="lastname">Last Name: </label><input type="text" id="lastname" name="lastname"></input>
        <label for="firstname">First Name: </label><input type="text" id="firstname" name="firstname"></input>
        <label for="age">Age: </label><input type="number" id="age" name="age"></input>
        <label for="login">Login: </label><input type="text" id="login" name="login"></input>
        <label for="password">Password: </label><input type="password" id="password" name="password"></input>
        <label for="confpass">Confirm Password: </label><input type="password" id="confpass" name="confpass"></input>
        <label for="country">Select your country: </label>
        <select id="country" name="country">
            <option value="rok">Korea, Republic of</option>
            <option value="jp">Isla Nublar</option>
            <option value="atl">Atlantis</option>
            <option value="who">Gallifrey</option>
        </select>
        <label for="newsletter">I want to get the newsletter!
            <label class="switch" for="newsletter">
                <input type="checkbox" name="newsletter" id="newsletter">
                <span class="slider"></span>
            </label>
        </label>
        <div class="buttons">
            <input class="button" type="submit" id="submit" value="Submit"/>
            <input class="button" type="reset" id="reset" />
        </div>
    </form>
    <div class="data">
        <h1>Received Data</h1>
        <ul>
            <li>Gender: <?= $gender; ?></li>
            <li>Last Name: <?= $lname; ?></li>
            <li>First Name: <?= $fname; ?></li>
            <li>Age: <?= $age; ?></li>
            <li>Login: <?= $login; ?></li>
            <li id="pwdisplay">Click To Reveal Your Password</li>
            <li>Country: <?= $country; ?></li>
            <li>Newsletter: <?= $newsletter; ?></li>
        </ul>
    </div>
    <script>
        let hideYoPW = document.querySelector("#pwdisplay");
        hideYoPW.addEventListener("click", () => {
            hideYoPW.innerHTML = "Password: <?= $pw; ?>";
        });
    </script>
</body>
</html>