<?php
  require('connect_db.php');

  $db = new DBConnect();

  $searchTerm = trim($_POST['searchVal']);
  $searchArray = explode(',', $searchTerm);
  //$searchTerm = "4,3";

  //
  //select recipes.id, recipes.title,
  //recipes.description from recipes
  //join recipes_ingredients on recipes_ingredients.recipe_id = recipes.id
  //where recipes_ingredients.ingredient_id IN (1, 2, 3) group by recipes.id,
  //recipes.title, recipes.description having count(recipes_ingredients.ingredient_id) = 3
  //где (1, 2, 3) id из таблицы ingredients

  //asort($searchArray);
  //$searchTerm = preg_replace("#[^0-9a-z]#i","",$searchTerm);
  //$query = $db->query("SELECT * FROM ingredients_table WHERE name LIKE '%".$searchTerm."%' AND status = 1 ORDER BY skill ASC");
  //SELECT * FROM `recipes_table` WHERE `ingredients` LIKE "%[3]%" AND `ingredients` LIKE "%[4]%"
  //$queryString = "select recipes.id, recipes.title, recipes.description from recipes join recipes_ingredients on recipes_ingredients.recipe_id = recipes.id where recipes_ingredients.ingredient_id IN (".$searchTerm.") group by recipes.id, recipes.title, recipes.description having count(recipes_ingredients.ingredient_id) = ";

  //$queryString1 = "select *
  //                from recipes r
  //                where not exists (
  //                  select 1 from recipes_ingredients i where r.id=i.recipe_id and i.ingredient_id not in (".$searchTerm.")
  //                )";

  //$query1 = mysqli_query($db->getDB(), $queryString1);

  $queryString2 = "select recipe_id, COUNT(ingredient_id) FROM recipes_ingredients WHERE ingredient_id IN (".$searchTerm.") GROUP BY recipe_id ORDER BY COUNT(ingredient_id) DESC;";

  $query2 = mysqli_query($db->getDB(), $queryString2);

  $output = '';
  //if($searchTerm!="")
  //if(mysqli_num_rows($query1)>0){
  //  while ($row = mysqli_fetch_array($query1)){
	//	$output .= '<div class="recipe_link"><a href="recipepage.php?id='.$row['id'].'" target="_blank" rel="noopener noreferrer" style="font-size: 30px; color:white; text-decoration: none;"
  //    ">'.$row['title'].'</a></div>';
  //  }
  //}
  if(mysqli_num_rows($query2)>0){
    while ($row = mysqli_fetch_array($query2)){
		    $getrecipe = mysqli_query($db->getDB(), "select * from recipes where id=".$row['recipe_id']);
        if(mysqli_num_rows($getrecipe)>0){
          $recipe = mysqli_fetch_array($getrecipe);

          $sql = "select ingredient_id from recipes_ingredients where recipe_id=".$recipe['id'];
          $query3 = mysqli_query($db->getDB(), $sql);

          $full = "Не хватает некоторых ингредиентов.";
          $ingred_sum = 0;
          $matched_sum = 0;
          $ingred_names = "";
          while($row2 = mysqli_fetch_array($query3)){
            $ingred_sum++;
            $ingred_name = mysqli_fetch_array(mysqli_query($db->getDB(), "select title from ingredients where id=".$row2['ingredient_id']));
            $color = "coral";
            foreach ($searchArray as $key) {
              if((int)$key == (int)$row2['ingredient_id']){
                $matched_sum++;
                $color = "lightgreen";
                break;
              }
            }
            $ingred_names .= "<div style='color: ".$color.";'>".$ingred_name['title']."; </div>";
          }

          //$full .= $matched_sum."==".$ingred_sum;

          if($matched_sum == $ingred_sum){
            $full = "Всё есть!";
          }

          $output .= '<div class="recipe_link"><div class="recipe_link_text"><a href="recipepage.php?id='.$recipe['id'].'" target="_blank" rel="noopener noreferrer" style="font-size: 30px; color:white; text-decoration: none;"
            ">'.$recipe['title'].'<div class="recipe_link_status">'.$full.'</div><div class="recipe_link_ingredlist"><br>'.$ingred_names.'</div></a></div></div>';
        }
    }
  }else $output = 'Мы пока не знаем что можно сделать из этих ингредиентов...';

  echo($output);
?>
