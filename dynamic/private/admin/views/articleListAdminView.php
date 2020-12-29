
<div id="article" class="contenutab">
    <h3>Les articles</h3>
    <table class ="display" id="tableArticle">
        <thead>
            <th>Id </th> <th>Titre </th>  <th>Statut</th>  <th>Auteur</th> <th>Action</th>
        </thead>
        <?php
            foreach ($articleList as $article){ ?>
        <tr> 
            <td> <?= $article->id; ?> </td> 
            <td> <?= $article->title; ?> </td>
            <td> 
                <?php 
                    if( $article->published){echo "<span style='color:green'><i class='fa fa-eye'></i> Publié</span>";} 
                    else{echo "<span style='color:red'><i class='fa fa-eye-slash'></i> Non publié</span>"  ;} 
                ?> 
            
            </td>
            <td> <?= $article->getAuthor()->name; ?> </td> 
            <td class="form-inline"> 
            
                    <a href="../../article/<?= $article->id; ?>"><button class="form-control btn-info" type="button" name="consult" value="<?= $article->id; ?>"> <i class="fa fa-eye"></i> </button> </a> 
                    <a href="article/update/<?= $article->id; ?>"><button class="form-control btn-primary" type="button" name="update"><i class="fa fa-pencil"></i></button> </a>
                    <form action="" method="POST"><button onclick="return confirm('Voulez-vous vraiment supprimer cette article ?')" class="form-control btn-danger" type="submit" name="deleteArticle" value="<?= $article->id; ?>"><i class="fa fa-trash"></i></button> </form>
             
             
            </td> 
        </tr>

    <?php } ?>

    </table>
</div>


<script>    

//Implémentation de DataTable
$(document).ready(function(){
      $('#tableArticle').DataTable({
         dom:'ftpl',
         order: [[ 0, "asc" ]], //Order des dates en premier
         language:{
               url:"assets/Datatable/french.json" //
         }
      })
   });
</script>