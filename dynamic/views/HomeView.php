     
      <div class="about container">
         <div>
            <h3> <span>Qui</span> sommes nous ?</h3> 
            <p>
               Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed 
               do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
               Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
               nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in 
               reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla 
               pariatur. Excepteur sint occaecat cupidatat non proident, sunt in 
               culpa qui officia deserunt mollit anim id est laborum.
               Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed 
               do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
               Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
               nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in 
               reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla 
               pariatur. Excepteur sint occaecat cupidatat non proident, sunt in 
               culpa qui officia deserunt mollit anim id est laborum.
            </p>
         </div>
         <img src="assets/img/people-eco.jpg" height="400" alt="">
      </div>

      <div class="second-part-home">
         <div id="last-article" class="container">
            <h1 class="title-home" >Nos derniers articles</h1>
            <?php foreach ($lastThreeArticles as $article ) { ?>
               <div class="card mb-3">
                  <div class="article-thumbnail">
                     <img class="card-img-top" src="assets/img/article-icon.png" alt="Card image cap">
                  </div>
                  
                  <div class="card-body">
                     <h5 class="card-title"><?= $article->title ?></h5>
                     <hr class="article">
                     <small class="author">Écrit par <?= $article->getAuthor()->name ?></small>
                     <p class="card-text"><?= $article->html_content ?></p>
                     <p class="card-text"><small class="text-muted">Dernière mise à jours il y a 3 mins</small></p>
                  </div>
               </div>
               <?php } ?>


           


         </div>
      </div>
 
