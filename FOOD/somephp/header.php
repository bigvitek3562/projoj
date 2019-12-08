<link rel="stylesheet" type="text/css" href="css/styles.css">
<body>
  <header onmouseover="show(this)" onmouseout="hide(this)">
    <div style="font-size: 38px; color: white;" alt="На главную">
      <a href="titleScreen.php" style="padding-right: 10px; background: RGB(42, 184, 92); border-radius: 5px; color: white; text-decoration: none;"> <img width="70" height="60" src="images/salat.png" alt="На главную страницу">
        На главную
      </a>
    </div>
    <div style="font-size: 38px; color: white; top: 30px; right:30px; position: absolute; padding-left: 10px; padding-right: 10px cursor: pointer;" alt="Войти">
      <input type="button" value="Войти" onmouseup="showLogin();" style="background: RGB(42, 184, 92); border-radius: 5px; border: none; color: white; font-size: 30px;">
      <div id="loginid" class="login">
        <form>

          <div style="font-size: 30px;">Логин:<div>
          <div style="display:block;">
            <input type="text" placeholder="Ваш логин...">
          </div>

          <div style="font-size: 30px;">Пароль:<div>
          <div style="display:block;">
            <input type="password" placeholder="Ваш пароль...">
          </div>

          <input style="border-radius: 3px; border: none; font-size: 30px; color: white; background: green; margin-top: 10px; float: right;" type="button" value="Подтвердить">
        </form>
      </div>
    </div>
  </header>

  <script>
  var showinglogin = false;
  function show(x){
    x.style.opacity = "1";
    x.style.top = "0px"
  }
  function hide(x){
    if(!showinglogin){
      x.style.opacity = "0";
      x.style.top = "-10px"
    }
  }
  function showLogin(){
    showinglogin = !showinglogin;
    document.getElementById("loginid").classList.toggle('active');
  }
  </script>
