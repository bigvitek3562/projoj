<?php
  require('includes/header.php');
?>
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
      <?php
        if(isset($_GET['error'])){
          if($_GET['error'] == "emptyfields"){
            echo'<div class="signup_error">Заполните все поля!</div>';
          }else if($_GET['error'] == "invalidmailuid"){
            echo'<div class="signup_error">Введите действительный адрес электронной почты!</div>';
          }else if($_GET['error'] == "invaliduid"){
            echo'<div class="signup_error">Недопустимый логин!</div>';
          }else if($_GET['error'] == "passwordcheck"){
            echo'<div class="signup_error">Пароли не совпадают!</div>';
          }else if($_GET['error'] == "usertaken"){
            echo'<div class="signup_error">Этот логин уже занят!</div>';
          }
        }else if($_GET['signup'] == 'success'){
          echo'<div class="signup_success">Вы успешно зарегистрировались!</div>';
        }
      ?>
      <form action="includes/signup.inc.php" method="post">
        <input type="text" name="uid" placeholder="Логин" autocomplete="off">
        <input type="text" name="mail" placeholder="Адрес электронной почты" autocomplete="off">
        <input type="password" name="pwd" placeholder="Пароль">
        <input type="password" name="pwd-repeat" placeholder="Повторите пароль">
        <button type="submit" name="signup-submit">Отправить</button>
      </form>
    </div>
  </body>
