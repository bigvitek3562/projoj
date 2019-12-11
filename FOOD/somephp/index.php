
<!--<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>!-->



<script src="scripts/jquery-3.4.1.min.js"></script>

<link rel="stylesheet" type="text/css" href="css/main.css">
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
  selectedIngredients.push(new ingredient_c(ingr_id, ingr_name));
  showList();
}

function deleteIngredient(ingr_id){
  selectedIngredients.splice(ingr_id,1);
  showList();
}

function showList(){
  if(!selectedIngredients.empty){
    if(selectedIngredients.length>0)
    $("#search_buttonDiv").html("<input class=\"search_button\" type=\"button\" id=\"searchBTN\" onclick='requestRecipes();' value=\"Найти!\"/>");
    else $("#search_buttonDiv").html("<input class=\"search_button\" type=\"button\" id=\"searchBTN\" value=\"Найти!\" disabled/>");
    var otpstring = "";
    for(var i = 0; i < selectedIngredients.length; i++){
      otpstring += "<div class=\"ingred_holder\"> <input class=\"ingred_delete\" type='button' value='-' onclick='deleteIngredient("+i+");' /> "+(i+1)+". "+selectedIngredients[i].name+"</div>";
    }
    $("#selectedStuff").html(otpstring);
  }
}

function requestRecipes(){
  var searchString = "";
  for(var i = 0; i < selectedIngredients.length-1; i++){
    searchString += selectedIngredients[i].id.trim() + ", ";
  }
  searchString += selectedIngredients[selectedIngredients.length-1].id.trim();
  searchString = searchString.trim();
  console.log(searchString);
  $.post("includes/request.php", {searchVal: searchString}, function(output){
    $("#recipe_output").html(output);
  });
}
</script>

<!doctype html>
<html lang="ru">


  <head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="http://allfont.ru/allfont.css?fonts=pollock3ctt" rel="stylesheet" type="text/css" />
    <title>Поиск</title>
  </head>

<?php
  require('includes/header.php');
?>

  <div class="left_side">
    <h1 style="font-size:100px; color: white; margin: 0;">ИНГРЕДИЕНТЫ</h1>
    <input class="searchbar" onkeyup="searchq();" name="ingredient" type="text" id="ingred_input" autocomplete="off" placeholder="Введите ингредиент..."/>
    <div class="ingred_result" id="output" ></div>
    <div class="ingred_selected" id="selectedStuff"> </div>
    <div id="search_buttonDiv"><input class="search_button" type="button" id="searchBTN" value="Найти!" disabled/></div>
  </div>

  <div class="right_side">
    <h1 style="font-size:100px; color:white; margin: 0;"> РЕЦЕПТЫ</h1>
    <div class="recipe_list" id="recipe_output"> </div>
  </div>

<?php
  require('includes/footer.html');
 ?>
