<?php
    $title = "Random";
    if (isset($_GET["title"])) $title = htmlspecialchars($_GET["title"]);
    $path = "";
    if (isset($_GET["path"])) $path = htmlspecialchars($_GET["path"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <style>
        video {
            height: 720px;
            width: 1080px;
        }
    </style>
</head>
<body>
    <video src="<?= $path ?>">
</body>
</html>