<?php
$user_login = "kirillsankov2014@gmail.com";
$user_password = "12345678";
$errorText = "";
session_start();

    if(!isset($_SESSION["login"])&&!isset($_SESSION["password"])
        &&$_POST["password"] == $user_password && $_POST["login"] == $user_login) {
        $_SESSION["login"] = $_POST["login"];
        $_SESSION["password"] = $_POST["password"];
        header("Location: /labsession/auth.php");
    }
    if(isset($_POST["login"]) && isset($_POST["password"])
        &&($_POST["password"] != $user_password || $_POST["login"] != $user_login)){
        $errorText = "Логин или пароль введены неверно";
    }

    if($_SESSION["login"] == $user_login && $_SESSION["password"] == $user_password){
        header("Location: /labsession/auth.php");
    }

    if(isset($_GET["logout"])&&$_GET["logout"]=="yes"){
       unset($_SESSION["login"]);
       unset($_SESSION["password"]);
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
    <title>labsession</title>
</head>
<body class="main-content">
<form action="/labsession/" method="post" class="form-login">
    <p class="form-login__text form-item">Вход</p>
    <input type="text" name="login" id="" class="form-login__input form-item" placeholder="Логин">
    <input type="password" name="password" id="" class="form-login__input form-item" placeholder="Пароль">
    <p class="form-login__error form-item">
        <?
            echo($errorText);
        ?>
    </p>
    <button type="submit" class="form-login__button form-item">Войти</button>
</form>
</body>
</html>