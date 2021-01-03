
<div id="article" class="contenutab container" style="max-width: 800px">

    <form action="" method="POST">
    <table class="display table" id="tableArticle">
        <thead class="thead-dark">
            <tr>
            <?php if(isset($article)){ ?>
                <th colspan="2"> <h5>L'ARTICLE <?= "#".$article->id; ?> </h3>  </th>
            <?php } else{ ?>
                <th colspan="2"> <h5>Ajouter un nouvel ARTICLE </h3>  </th>
            <?php } ?>
            </tr>
        </thead>
        
            <?php if(isset($article)){ ?>
                <tr>
                    <td> <label for=""> Id </label>   </td> 
                    <td> <input type="text" disabled value="<?= $article->id; ?>"> <span> L'identifiant n'est pas modifiable.</span>  </td> 
                </tr>

                <tr>
                    <td> <label for=""> Publié </label> </td> 
                    <td> <input name="published" type="checkbox" value="1" <?php if($article->published) { echo "checked";}?>></td> 
                </tr>

                <tr>
                    <td> <label for=""> Date publié </label> </td> 
                    <td> <input type="text" disabled value="<?= $article->publish_date; ?>"></td> 
                </tr>
                
                <tr>
                    <td> <label for=""> Dernière éditions</label> </td> 
                    <td> <input placeholder="Aucune édition" type="text" disabled value="<?= $article->edit_date; ?>"></td> 
                </tr>
            <?php } ?>
            
            <tr>
                <td> <label for=""> Titre </label> </td> 
                <td> <input name="title" required type="text" <?php if(isset($article)){ echo "value='$article->title'"; } ?> required>  </td> 
            </tr>


            <tr>
                <td> <label for=""> Contenu HTML </label> </td> 
                <td>
                    <textarea name="html_content" id="html_content" palceholder="Décrivez votre article ici..." rows="10" cols="80"><?php if(isset($article)){ echo $article->html_content ;} ?></textarea>
                    <script>
                        CKEDITOR.replace( 'html_content', {
                            language: 'fr'
                        });
                    </script>
                </td>
                </td> 
            </tr>

            <tr>
                <td> <label for=""> Auteur </label> </td> 
                <td> 
                    <select  class="selectpicker" data-live-search="true" name="author_id">
                        <?php foreach ($personList as $person) { ?>
                            <option data-subtext="<?= $person->getRole()->type ?>" value="<?= $person->id ?>" > <?= $person->surname." ".$person->name ?></option>
                        <?php } ?>
                    </select>
                </td> 
                
            </tr>

            <tr>
                <td>Action</td>
            <td class="form-inline">
                    
            </td>

            <td class="form-inline">
                <?php if(isset($article)){ ?>
                    <button class="form-control btn-info" type="button" name="consult" value="<?= $article->id; ?>"><a href="../../article/<?= $article->id; ?>"> <i class="fa fa-eye"></i> </a> </button> 
                    <button class="form-control btn-primary" type="submit" name="updateArticle" value="<?= $article->id; ?>"><i class="fa fa-save"></i></button> 
                    <form action="" method="POST"> <button onclick="return confirm('Voulez-vous vraiment supprimer cette article ?')" class="form-control btn-danger" type="submit" name="deleteArticle" value="<?= $article->id; ?>"><i class="fa fa-trash"></i></button> </form>  
                <?php } else{ ?>
                    <button class="form-control btn-primary" type="submit" value="0" name="addArticle" ><i class="fa fa-save"></i> Sauvegarder l'article (Privé) </button>    
                    <button class="form-control btn-success" type="submit" value="1" name="addArticle" ><i class="fa fa-globe"></i> Publier l'article </button>       
                <?php } ?>
           </td>

                
            
            </tr>

    </table>
    </form>

</div>

<script>

    $('select').selectpicker();

    <?php if(isset($article)){ ?>
        $('.selectpicker').selectpicker('val', '<?= $article->author_id ?>');
    <?php } ?>

</script>

