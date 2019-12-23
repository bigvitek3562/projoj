<?php
require('includes/header.php');
if(!isset($_SESSION['userId'])){
  header("Location: ../titleScreen.php");
  exit();
}
 ?>
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/styles.css">
<script src="scripts/jquery-3.4.1.min.js"></script>
<script src="scripts/main.js"></script>
<script>

var selectedIngredients = [];
function searchq(){
  var searchTxt = $("input[name='ingredient']").val();
  //console.log(searchTxt);
  //if(searchTxt=="") searchTxt = "no";
  $.post("includes/search.php", {searchVal: searchTxt}, function(output) {
    $("#output").html(output);
  });
}

searchq();

function addIngredient(ingr_id, ingr_name){
  var exists = false;
  for(var i = 0; i < selectedIngredients.length; i++){
    if(selectedIngredients[i].name == ingr_name)
    exists = true;
  }
  if(!exists) selectedIngredients.push(new ingredient_c(ingr_id, ingr_name));
  showList();
}

function deleteIngredient(ingr_id){
  selectedIngredients.splice(ingr_id,1);
  showList();
}

function showList(){
  if(!selectedIngredients.empty){
    //if(selectedIngredients.length>0)
    //$("#search_buttonDiv").html("<input class=\"search_button\" type=\"button\" id=\"searchBTN\" onclick='requestRecipes();' value=\"Найти!\"/>");
    //else $("#search_buttonDiv").html("<input class=\"search_button\" type=\"button\" id=\"searchBTN\" value=\"Найти!\" disabled/>");
    var otpstring = "";
    for(var i = 0; i < selectedIngredients.length; i++){
      otpstring += "<div class=\"ingred_holder\"> <input class=\"ingred_delete\" type='button' value='-' onclick='deleteIngredient("+i+");' /> "+(i+1)+". "+selectedIngredients[i].name+"</div>";
    }
    $("#selectedStuff").html(otpstring);

    var searchString = "";
    for(var i = 0; i < selectedIngredients.length-1; i++){
      searchString += selectedIngredients[i].id.trim() + ", ";
    }
    searchString += selectedIngredients[selectedIngredients.length-1].id.trim();
    searchString = searchString.trim();
    console.log(searchString);
    $("#ingredInput").html('<input id="ingredInput" name="ingredients" type="hidden" value="'+searchString+'"></input>');
  }
}
</script>

<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="http://allfont.ru/allfont.css?fonts=pollock3ctt" rel="stylesheet" type="text/css" />
  <title>Добавление рецепта</title>
</head>

<div style="margin-top:100px; color: white; top: 0px; background-color: RGBa(120,123,128,0.8); border-radius: 4px; font-size: 60px; padding-left: 10px; position: relative">
<form form action="includes/addrecipe.inc.php" method="post">
  <p>Название блюда:<br>
    <input class="textbox" name="title" type="text" size="40" placeholder="Введите название...">
  </p>
  <p>Описание блюда:<br>
    <textarea class="textbox" name="description" cols="80" rows="8" placeholder="Введите описание..."></textarea>
    <br><small style="font-size:28px; color: RGB(200,200,200);">В описание так же можно добавлять html-элементы, например ссылки, параграфы и т.п.</small>
  </p>
  <p>Ссылка на картинку:<br>
    <input class="textbox" name="image" type="text" size="40" placeholder="Вставьте ссылку...">
    <br><small style="font-size:28px; color: RGB(200,200,200);">Необязательно</small>
  </p>
  <p style="margin-bottom: 0;">Список требуемых ингредиентов:<br>
    <input class="searchbar" onkeyup="searchq();" name="ingredient" type="text" id="ingred_input" autocomplete="off" placeholder="Введите ингредиент..."/>
    <input type="button" style="border-radius: 3px; border: none; background-color: RGB(0,150,50); font-size: 30px; width: 36px; cursor: pointer; color: white;" value="+"><small style="margin-left: 10px; font-size:28px; color: RGB(200,200,200);">Нет подходящего ингредиента? Добавьте, нажав на "+".</small></input>
    <div class="ingred_result" id="output" ></div>
    <div class="ingred_selected" id="selectedStuff"></div>
  </p>
  <input id="ingredInput" name="ingredients" type="hidden"></input>
  <button class="search_button" type="submit" name="recipe_submit">Добавить!</button>
</form>
</div>
