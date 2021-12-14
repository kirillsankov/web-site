<?php
$user_login = "kirillsankov2014@gmail.com";
$user_password = "12345678";
$errorText = "";
    if(isset($_POST["login"]) && isset($_POST["password"])
        &&$_POST["password"] == $user_password && $_POST["login"] == $user_login) {
        setcookie("login", $_POST["login"], time() + 3600);
        setcookie("password", $_POST["password"], time() + 3600);
        header("Location: /lab/auth.php");
    }else if(isset($_POST["login"]) && isset($_POST["password"])
        &&($_POST["password"] != $user_password || $_POST["login"] != $user_login)){
        $errorText = "Логин или пароль введены неверно";
    }

    if(isset($_COOKIE["login"]) && isset($_COOKIE["password"])){
        header("Location: /lab/auth.php");
    }

    if(isset($_GET["logout"])&&$_GET["logout"]=="yes"){
        setcookie("login", $_POST["login"], time()-3600);
        setcookie("password", $_POST["password"], time()-3600);
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
    <title>lab</title>
</head>
<body>
<form action="/lab/" method="post" class="form-login">
    <p class="form-login__text form-item">Вход</p>
    <input type="text" name="login"  class="form-login__input form-item" placeholder="Логин">
    <input type="password" name="password"  class="form-login__input form-item" placeholder="Пароль">
    <p class="form-login__error form-item">
        <?
            echo($errorText);
        ?>
    </p>
    <button type="submit" class="form-login__button form-item">Войти</button>
</form>
</body>
</html>