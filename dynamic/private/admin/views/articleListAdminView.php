
<div id="article" class="contenutab">
    <h3>Les articles</h3>
    <table class ="display" id="tableArticle">
        <thead>
            <th>Id </th> <th>Titre </th>  <th>Auteur</th> <th>Action</th>
        </thead>
        <?php
            foreach ($articleList as $article){ ?>
        <tr> 
            <td> <?= $article->id; ?> </td> 
            <td> <?= $article->title; ?> </td>
            <td> <?= $article->getAuthor()->name; ?> </td> 
            <td> 
                <form action="" method="POST" class="form-inline"> 
                    <button class="form-control btn-info" type="button" name="consult" value="<?= $article->id; ?>"><a href="../../article/<?= $article->id; ?>"> <i class="fa fa-eye"></i> </a> </button> 
                    <button class="form-control btn-primary" type="button" name="update"><a href="article/update/<?= $article->id; ?>"><i class="fa fa-pencil"></a></i></button> 
                    <button class="form-control btn-danger" type="submit" name="delete" value="<?= $article->id; ?>"><i class="fa fa-trash"></i></button> 
                </form> 
             
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