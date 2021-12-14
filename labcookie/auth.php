<?php
    if(!(isset($_COOKIE["login"]) && isset($_COOKIE["password"]))){
        header("Location: /labcookie/");
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>
        <?
        echo("Привет, " . $_COOKIE["login"]);
        ?>
    </h1>
    <a href="index.php?logout=yes">Удалить cookie</a>
</body>
</html>