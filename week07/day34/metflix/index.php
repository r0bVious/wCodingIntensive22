<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies</title>
    <style>
        * {
            padding: 0;
            margin: 0
        }
        body {
            height: 100vh;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            margin: auto;
            gap: 1em;
            background: #141414;
            color: #E50914;
        }
        .movies-wrapper {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 1em;
            padding-bottom: 1em;
        }

        h1 {
            font-size: 5em;
            font-family: sans-serif;
        }
        .cardbody {
            width: 30%;
            height: 30%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background: #DCDCDC;
            border-radius: 10px;
        }

        video {
            max-width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
    <h1>Cullen's Favorite Films</h1>
    <div class="movies-wrapper">
    <?php
$movies = json_decode(file_get_contents("./movies.json"), true);

foreach ($movies["movies"] as $film) {
    $current_movie = $film["title"];
    $poster = "./posters/{$film['poster']}";
    $urlTitle = urlencode($current_movie);
    $videolink = "video_files/video.mp4";
    include("./card.php");
}

?></div>
</body>
</html>