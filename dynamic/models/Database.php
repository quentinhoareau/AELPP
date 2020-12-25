<?php 

abstract class Database{
   private static $cnx;
   private static $loginPath;
   private static $configPath;

   public function __construct(){
      self::$loginPath = "private/admin_login.ini";
      self::$configPath = "private/config.ini";
   }

   public static function setLoginPath($value){
      self::$loginPath = $value;
   }

   public static function setConfigPath($value){
      self::$configPath = $value;
   }

   private static function setBdd(){

      $loginInfo = parse_ini_file(self::$loginPath);
      $user = $loginInfo["DB_USER"];
      $pwd =  $loginInfo["DB_PWD"];

      $config = parse_ini_file(self::$configPath);
      $db   = $config['DB_NAME'];
      $host   = $config['DB_SERVEUR'];
      $type   = $config['DB_SGBD'];

      
      self::$cnx = new PDO("$type:host=$host;dbname=$db;charset=utf8mb4", $user, $pwd);
      self::$cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
   }

   protected function getDB(){
      if(self::$cnx == null){
         $this->setBdd();
         return self::$cnx;
      }
   }

   //Obtenir le modèle d'un object passé en paramètre
   protected function getModel($obj, $query, array $tabValue = null){
        
         $var = [];
         $req = self::$cnx->prepare($query);
         $req->execute($tabValue);
         if($req != null || empty($req) ){
            while($data = $req->fetch(PDO::FETCH_ASSOC)){
            
               $var[] = new $obj($data);
            }
         }
         else{
            $var = null;
         }

         $req->closeCursor();
         $req = null;
         return $var;
     
   }

   //Exceute 
   protected function execQuery($query, array $tabValue = null){
      $result = null; 
      
      $req = self::$cnx->prepare($query);
      $req->execute($tabValue);
 
      
      @$result = $req->fetchAll(PDO::FETCH_ASSOC) ;

      $req->closeCursor();
      $req = null;
      return $result ;
      

   }



}


?>