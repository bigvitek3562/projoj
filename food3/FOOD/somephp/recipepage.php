<?php
require('includes/header.php');
 ?>
 <link rel="stylesheet" type="text/css" href="css/main.css">
 <link rel="stylesheet" type="text/css" href="css/recipee.css">

 <head>
   <meta charset="UTF-8">
   <meta name="viewport"
         content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link href="http://allfont.ru/allfont.css?fonts=pollock3ctt" rel="stylesheet" type="text/css" />
 </head>
<main>
<div style="margin-top:100px; color: white; top: 0px; background-color: RGBa(130,130,130,0.8); border-radius: 4px; font-size: 60px; position: relative">

<?php

  if(isset($_GET['id'])){
    require('includes/connect_db.php');
    $db = new DBConnect();
    $query = mysqli_query($db->getDB(), 'SELECT * FROM `recipes` WHERE `id`='.$_GET['id']);
    if(mysqli_num_rows($query)>0){
      $row = mysqli_fetch_array($query);
      $output .= '<title>'.$row['title'].'</title>';
  	  $output .= '<img src="'.$row['image'].'" class="recipe_img">';
      $output .= '<div class="recipetitle">'.$row['title'].'</div>';
      $output .= '<p style="font-size:42px;">Что нужно?</p>';
      //$ingredquery = mysqli_query($db->getDB(), 'select title from ingredients where id like ()'
      $output .= '<p style="font-size:40px; white-space: pre-line;">'.$row['description'].'</p>';

    }
    echo $output;
  }else{
    echo 'get out';
  }

?>

</div>
</main>
<?php
  require('includes/footer.html');
?>
