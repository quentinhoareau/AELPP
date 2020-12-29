
<?php
abstract class Website{


   public static function convertDateDB($dbDate, $format){

         $dbDate = new DateTime($dbDate);
         $dateFormat = date_format($dbDate, $format) ;
         
   
         return $dateFormat;
   }


}

?>