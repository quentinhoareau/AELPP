<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <base href="<?= SERVER_FOLDER ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="assets/js/jquery.js"></script>                                 <!-- JQuery 3.4.0 -->
    <link rel="stylesheet" href="assets/bootstrap-4.3.1/bootstrap.min.css">     <!-- Boostrap 4.3.1 -->
    <script src="assets/bootstrap-4.3.1/bootstrap.min.js"> </script>            <!-- Boostrap 4.3.1 -->  
    
    
    <title> <?php echo $title  ?> </title>                                      <!-- Titre de l'onglet -->

    <link rel="stylesheet" href="assets/css/aelpp.css">                       <!-- Css Principal du site -->
    <link rel="stylesheet" href="assets/css/navigation.css">                    <!-- Css de la Navigation -->
    <link rel="stylesheet" href="assets/css/footer.css">                        <!-- Css du Footer -->
    <link rel="stylesheet" href="assets/DataTable/datatable.css">               <!-- Css pour la librerie DataTable -->
    <script src="assets/DataTable/datatable.js"> </script>                      <!-- Script pour la librerie DataTable -->
    <link rel="stylesheet" href="assets/fontawesome/font-awesome.min.css">      <!-- Css pour les icones avec la librerie Fontawesome -->    
    <?php 
        //Insertion de tous les liens css
        foreach ($cssList as $cssPath) { echo "<link rel='stylesheet' href='$cssPath'>" ; }

        //Insertion de tous scripts JS
        foreach ($scriptList as $scriptPath) { echo "<script src='$scriptPath'></script>" ;}
    ?>            
    
</head>
<body>
 
   
    <?php echo $nav  //Insertion de la bar de navigation ?>
    <?php echo $header  //Insertion de la bar de navigation ?>

    <main role="main" id="mainContent" class="container">
        <?php echo $content  //Insertion des contenue de la page active ?>
    </main>


    <?php echo $footer  //Insertion du footer ?>



  
    


  
</body>


        
</html>