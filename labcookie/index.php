    <?php
$user_login = "kirillsankov2014@gmail.com";
$user_password = "12345678";
$errorText = "";

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])&& isset($_POST["password"])
        &&!isset($_COOKIE["login"])&&!isset($_COOKIE["password"])){
        if($_POST["password"] == $user_password && $_POST["login"] == $user_login) {
            setcookie("login", $_POST["login"], time()+3600);
            setcookie("password", $_POST["password"], time()+3600);
            header("Location: /labcookie/auth.php");
        }
        if($_POST["password"] != $user_password || $_POST["login"] != $user_login){
            $errorText = "Логин или пароль введены неверно";
        }
    }
    if(isset($_COOKIE["login"])&&isset($_COOKIE["password"])
        && ($_COOKIE["login"] == $user_login && $_COOKIE["password"] == $user_password)){
        header("Location: /labcookie/auth.php");
    }

    if(isset($_GET["logout"])&&$_GET["logout"]=="yes"){
       setcookie("password", "", time()-3600);
       setcookie("login", "", time()-3600);
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
    <title>labcookie</title>
</head>
<body class="main-content">
<form action="/labcookie/" method="post" class="form-login">
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