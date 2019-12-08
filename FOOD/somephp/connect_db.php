<?php
class DBConnect{
  private static $dbIP='localhost';
  private static $dbUser='root';
  private static $dbPassword = '';
  private static $dbName ='foodnshit';
  private static $dbPort=3306;
  public static $db=null;
  
  public function __construct(){
    self::getDB();
  }
  public function __destruct(){
    if(self::$db!=null){
      mysqli_close(self::$db);
    }
  }
  public static function getDB(){
    if(self::$db===null){
      self::$db = mysqli_connect(self::$dbIP, self::$dbUser, self::$dbPassword, self::$dbName, self::$dbPort);
    }
    return self::$db;
  }
}
?>
