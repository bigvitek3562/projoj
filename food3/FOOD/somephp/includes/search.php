<?php
  require('connect_db.php');

  $db = new DBConnect();

  $searchTerm = trim($_POST['searchVal']);

  //$searchTerm = preg_replace("#[^0-9a-z]#i","",$searchTerm);
  //$query = $db->query("SELECT * FROM ingredients_table WHERE name LIKE '%".$searchTerm."%' AND status = 1 ORDER BY skill ASC");

  $query = '';
  $output = '';
  if($searchTerm!=""){
    $sql = "SELECT * FROM `ingredients` WHERE `title` LIKE CONCAT('%',?,'%')";
    $stmt = mysqli_stmt_init($db->getDB());
     if(mysqli_stmt_prepare($stmt, $sql)){
       $stmt->bind_param('s', $searchTerm);
       $stmt->execute();
       $result = $stmt->get_result();
       if(mysqli_num_rows($result)>0){
         while ($row = $result->fetch_assoc()) {
           $output .= '<div> <input class="ingred_button" type="button" value="'.$row['title'].'" onclick="addIngredient(` '.$row['id'].'`,`'.$row['title'].' `);" /> </div>';
         }
       }else $output = 'Мы не знаем таких ингредиентов...';
       mysqli_stmt_close($stmt);
     }else $output = 'what';
  }else{
    $query = mysqli_query($db->getDB(), 'select * from ingredients');
    if(mysqli_num_rows($query)>0){
      while ($row = mysqli_fetch_array($query)){
        $output .= '<div> <input class="ingred_button" type="button" value="'.$row['title'].'" onclick="addIngredient(` '.$row['id'].'`,`'.$row['title'].' `);" /> </div>';
      }
    }else $output = 'Нет таких ингредиентов...';
  }

  echo($output);
?>
