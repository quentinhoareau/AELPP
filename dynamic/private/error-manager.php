<?php
   /*****Gestionnaire d'erreur php personalisé*****/
   set_error_handler('exceptions_error_handler');
   function exceptions_error_handler($severity, $message, $filename, $lineno) {
      if (error_reporting() == 0) {
         return;
      }
      if (error_reporting() & $severity) {
         throw new ErrorException($message, 500, $severity, $filename, $lineno);
      }
   }
   /*****---------------------------------*****/
?>