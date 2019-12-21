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

  $queryString = "select *
                  from recipes r
                  where not exists (
                    select 1 from recipes_ingredients i where r.id=i.recipe_id and i.ingredient_id not in (".$searchTerm.")
                  )";

  $query = mysqli_query($db->getDB(), $queryString);

  $output = '';
  if($searchTerm!="")
  if(mysqli_num_rows($query)>0){
    while ($row = mysqli_fetch_array($query)){
		$output .= '<div class="recipe_link"><a href="recipepage.php?id='.$row['id'].'" target="_blank" rel="noopener noreferrer" style="font-size: 30px; color:white; text-decoration: none;"
      ">'.$row['title'].'</a></div>';
    }
  }else $output = 'Мы пока не знаем что можно сделать из этих ингредиентов...';

  echo($output);
?>
