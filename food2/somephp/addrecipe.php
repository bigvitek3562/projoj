<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/styles.css">

<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="http://allfont.ru/allfont.css?fonts=pollock3ctt" rel="stylesheet" type="text/css" />
  <title>Добавление рецепта</title>
</head>

<?php
require('includes/header.php');
if(!isset($_SESSION['userId'])){
  header("Location: ../titleScreen.php");
  exit();
}
 ?>
<div style="margin-top:100px; color: white; top: 0px; background-color: RGBa(130,130,130,0.8); border-radius: 4px; font-size: 60px; padding-left: 10px; position: relative">
<form>
  <p>Название блюда:<br>
    <input class="textbox" type="text" size="40">
  </p>
  <p>Описание блюда:<br>
    <textarea class="textbox" cols="80" rows="8"></textarea>
    <br><small style="font-size:28px; color: RGB(200,200,200);">В описание так же можно добавлять html-элементы, например ссылки, параграфы и т.п.</small>
  </p>
  <p>Ссылка на картинку:<br>
    <input class="textbox" type="text" size="40">
    <br><small style="font-size:28px; color: RGB(200,200,200);">Необязательно</small>
  </p>
</form>
</div>
