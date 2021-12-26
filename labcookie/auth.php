<?php
    if(!isset($_COOKIE["login"]) || !isset($_COOKIE["password"])) {
        header("Location: /labcookie/?logout=yes");
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="main">
        <h1>
            <?
            echo("Привет, " . $_COOKIE["login"]);
            ?>
        </h1>
        <a class="exit-btn" href="index.php?logout=yes">Выйти</a>
    </div>
</body>
</html>