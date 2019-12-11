<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/signupstyles.css"
<!doctype html>
<html lang="ru">


  <head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="http://allfont.ru/allfont.css?fonts=pollock3ctt" rel="stylesheet" type="text/css" />
    <title>Регистрация</title>
  </head>
  <body>
    <div class="signupbody">
      РЕГИСТРАЦИЯ
      <form action="includes/signup.inc.php" method="post">
        <input type="text" name="uid" placeholder="Логин" autocomplete="off">
        <input type="text" name="mail" placeholder="Адрес электронной почты" autocomplete="off">
        <input type="password" name="pwd" placeholder="Пароль">
        <input type="password" name="pwd-repeat" placeholder="Повторите пароль">
        <button type="submit" name="signup-submit">Отправить</button>
      </form>
    </div>
  </body>

<?php
  require('includes/header.php');
?>
