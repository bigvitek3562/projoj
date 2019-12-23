<?php

if(isset($_POST['recipe_submit'])){
  $name = trim($_POST['title']);
  $description = $_POST['description'];
  $image = $_POST['image'];
  if(empty($image)) $image = "NULL";
  $ingredients = $_POST['ingredients'];
  if(empty($name)  || empty($description)){
    header("Location: ../addrecipe.php?error=emptyfields");
    exit();
  }else if(empty($ingredients)){
    header("Location: ../addrecipe.php?error=emptyingredients");
    exit();
  }
  require 'connect_db.php';

  $db = new DBConnect();
  $conn = $db->getDB();
  $stmt = mysqli_stmt_init($conn);
  $sql = "INSERT INTO recipes (title, image, description) VALUES (?, ?, ?)";
  if(!mysqli_stmt_prepare($stmt,$sql)){
    header("Location: ../addrecipe.php?error=sqlerror");
    exit();
  }else{
    mysqli_stmt_bind_param($stmt, "sss", $name,  $image, $description);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    $insertedId;
    $query = mysqli_query($db->getDB(), "select * FROM recipes WHERE title LIKE '".$name."';");
    if(mysqli_num_rows($query)>0){
      $row = mysqli_fetch_array($query);
      $insertedId = $row['id'];
    }
    $ingredArray = explode(',', $ingredients);

    foreach ($ingredArray as $val) {
      mysqli_query($db->getDB(), "INSERT INTO recipes_ingredients (ingredient_id, recipe_id) VALUES ($val, $insertedId)");
    }
    //echo($insertedId."ass");
    header("Location: ../addrecipe.php?added=success");
    exit();
  }

}
