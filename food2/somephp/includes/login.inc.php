<?php

if(isset($_POST['login-submit'])){
   require 'connect_db.php';
   $mailuid = $_POST['mailuid'];
   $password = $_POST['pwd'];

   if(empty($mailuid)  || empty($password)){
     header("Location: ../titleScreen.php?error=emptyfields");
     exit();
   }else{
     $sql = "SELECT * FROM users WHERE uidUsers = ? OR emailUsers = ?;";
     $db = new DBConnect();
     $stmt = mysqli_stmt_init($db->getDB());
     if(!mysqli_stmt_prepare($stmt,$sql)){
       header("Location: ../titleScreen.php?error=sqlerror");
       exit();
     }else{
       mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
       mysqli_stmt_execute($stmt);
       $result = mysqli_stmt_get_result($stmt);
       if($row = mysqli_fetch_assoc($result)){
         $pwdCheck = password_verify($password, $row['pwdUsers']);
         if($pwdCheck == false){
           header("Location: ../titleScreen.php?error=wrongpwd");
           exit();
         }else if($pwdCheck == true){
           session_start();
           $_SESSION['userId'] = $row['idUsers'];
           $_SESSION['userUid'] = $row['uidUsers'];

           header("Location: ../titleScreen.php?login=success");
           exit();
         }else{
           header("Location: ../titleScreen.php?error=wrongpwd");
           exit();
         }
       }else{
         header("Location: ../titleScreen.php?error=nouser");
         exit();
       }

     }
   }

}else{
  header("Location: ../titleScreen.php");
  exit();
}
