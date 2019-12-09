<?php
  require('connect_db.php');

  $db = new DBConnect();

  $searchTerm = trim($_POST['searchVal']);

  //$searchTerm = preg_replace("#[^0-9a-z]#i","",$searchTerm);
  //$query = $db->query("SELECT * FROM ingredients_table WHERE name LIKE '%".$searchTerm."%' AND status = 1 ORDER BY skill ASC");

  $query = mysqli_query($db->getDB(), 'SELECT * FROM `ingredients` WHERE `title` LIKE "%'.$searchTerm.'%"');

  $output = '';
  if($searchTerm!="")
  if(mysqli_num_rows($query)>0){
    while ($row = mysqli_fetch_array($query)){
		$output .= '<div> <input class="ingred_button" type="button" value="'.$row['title'].'" onclick="addIngredient(` '.$row['id'].'`,`'.$row['title'].' `);" /> </div>';
    }
  }else $output = 'Нет таких ингредиентов...';

  echo($output);
?>
