<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Grekostar</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="icon" href="favicon.ico" type="images/x-icon">

  </head>
  <body>
    <div id="guideBlock">
      <img src="images/cookit.PNG" style="width: 12%; height: 100%; margin-left: 44%; margin-top: 3px">
    </div>

<form align="center" name="test" autocomplete="off">

  <!--<input name="ingredient" type="text" placeholder="Введите ингридиенты..." style="width: 300px; height: 28px; border-radius: 7px ">-->
  <input type="submit" title="Найти рецепты" onclick="#fndForm" value="Найти" style="width: 350px; height: 180px;border: 7px;cursor: pointer; border-radius: 7px; background: transparent;font: 128px/1.3 Impact;color: #fff; margin-top: 21%; border-color:transparent;border-style: dashed;; margin-left:11%">
  </form>

  <div id="veggies">
    <img src="images/Salat.PNG" style="transform: rotate(-5deg); margin-top: 30px">
  </div>

  <a href="https://www.youtube.com/watch?v=fFj_O8p48C4" target="_blank"> <img src="images/quMark.png" title="Как это работает?" style="width:120px;height:120px;position: fixed; top:85%; left: 1%;"> </a>

    
    </div>

    <div id="sidebar">
      <div class="toggle-btn" onclick="OpenMenu()" title="Меню">
        <span></span>
        <span></span>
        <span></span>
      </div>
      <ul>
        <li>Меню</li>
        <li><a href="/" title="Главная">Главная</a></li>
        <li><a href="" title="Новости">Новости</a></li>
        <li><a href="" title="Описание">Описание</a></li>
        <li><a href="https://www.youtube.com/channel/UCdVe7C8WNN8wdmeRTsPbzaA?view_as=subscriber" target="_blank" title="Ютуб канал">Канал</a></li>
        <li><a href="https://vk.com/grekostars" target="_blank" title="Группа ВК">Группа</a></li>
      </ul>
    </div>

    <script>
      function OpenMenu() {
        document.getElementById('sidebar').classList.toggle('active');
      }
    </script>
  </body>
</html>
