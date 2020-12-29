
<div id="article" class="contenutab container" style="max-width: 800px">

    <form action="" method="POST">
    <table class="display table" id="tableEvent">
    <thead class="thead-dark">
            <tr>
            <th colspan="2"> <h5>Ajouter un nouvel évènement </h3>  </th>
            </tr>
        </thead>

            <tr>
                <td> <label for=""> Titre </label> </td> 
                <td> <input name="title" type="text" >  </td> 
            </tr>

            <tr>
                <td> <label for=""> Contenu HTML </label> </td> 
                <td>
                    <textarea name="html_content" id="html_content" rows="10" cols="80">Décrivez le contenu de votre article</textarea>
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
                <button class="form-control btn-primary" type="submit" value="0" name="addArticle" ><i class="fa fa-save"></i> Sauvegarder l'article </button>    
                <button class="form-control btn-success" type="submit" value="1" name="addArticle" ><i class="fa fa-globe"></i> Publier l'article </button>            
            </td>
                
            
            </tr>

    </table>
    </form>

</div>

<script>

$('select').selectpicker();


</script>

