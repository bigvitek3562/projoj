<?php
  session_start();
?>
<link rel="stylesheet" type="text/css" href="css/styles.css">
<body>
  <header onmouseover="show(this)" onmouseout="hide(this)">
    <div class="header_tab" style="margin-left: 0px;" alt="На главную">
      <a href="titleScreen.php" style="padding-right: 10px; background: RGB(42, 184, 92); border-radius: 5px; color: white; text-decoration: none;"> <img width="70" height="60" src="images/salat.png" alt="На главную страницу">
        На главную
      </a>
    </div>
    <div class="header_tab" alt="Поиск">
      <a href="index.php" style="padding-right: 10px; background: RGB(42, 184, 92); border-radius: 5px; color: white; text-decoration: none;"> <img width="60" height="60" src="images/search.png" alt="Поиск">
        Поиск
      </a>
    </div>
    <?php
      if(isset($_SESSION['userId'])){
        echo('<div class="header_tab" alt="Поиск">
          <a href="addrecipe.php" style="padding-right: 10px; background: RGB(42, 184, 92); border-radius: 5px; color: white; text-decoration: none;"> <img style="filter: brightness(1);" width="60" height="60" src="images/add.png" alt="Поиск">
            Добавить рецепт
          </a>
        </div>');
        echo('<div style="position: absolute; color:white; font-size:42px; right:30px; top:0px;">Добро пожаловать, '.$_SESSION['userUid'].'!</div>');
        echo('<form action="includes/logout.inc.php" method="post">
                <button type="submit" name="logout-submit" style="position:absolute; padding-left: 20px; padding-right: 20px; right: 20px; bottom: 5px; cursor: pointer; background: RGB(42, 184, 92); border-radius: 5px; border: none; color: white; font-size: 30px;"> Выйти </button>
              </form>
        ');
      }else {
        require('loginstuff.html');
      }
    ?>
  </header>

  <script>
  var showinglogin = false;
  function show(x){
    //x.style.opacity = "1";
    //x.style.top = "0px"
  }
  function hide(x){
    //if(!showinglogin){
    //  x.style.opacity = "0";
    //  x.style.top = "-10px"
    //}
  }
  function showLogin(){
    showinglogin = !showinglogin;
    document.getElementById("loginid").classList.toggle('active');
  }
  </script>
