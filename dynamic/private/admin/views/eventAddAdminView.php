

<div id="event" class="contenutab container" style="max-width: 1000px">

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
                <td> <label for=""> Contenu de l'évènement </label> </td> 
                <td>
                    <textarea name="content" id="content" rows="10" cols="80"></textarea>
                    <script>
                        CKEDITOR.replace( 'content', {
                            language: 'fr'
                        });
                    </script>
                </td>
                </td> 
            </tr>


            <tr>
                <td> <label for=""> Date prévue </label> </td> 
                <td> <input name="predicted_date" type="datetime-local" required> </td> 
            </tr>

            

            <tr>
            <td> <label for=""> Créateur </label> </td> 
                <td> 
                    <select  class="selectpicker" data-live-search="true" id="id_creator" name="id_creator">
                    
                        <?php foreach ($personList as $person) { ?>
                            <option data-subtext="<?= $person->getRole()->type ?>" value="<?= $person->id ?>"> <?= $person->surname." ".$person->name ?></option>
                        <?php } ?>
                      
                    </select>
                </td> 
            </tr>
          

            <tr>
                <td> <label for=""> Projet de l'évènement </label> </td> 
                <td> 
                    <select  class="selectpicker" data-live-search="true" id="num_project" name="num_project">
                        <option  value="" > Aucun projet </option>
                        <?php foreach ($projectsList as $project) { ?>
                            <option data-subtext="<?php echo "(" ; foreach ($project->getGroupList() as $group ) { echo $group->name.", " ; }  echo ")" ; ?>" value="<?= $project->num ?>"> <?= $project->name ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td>Action</td>
            <td class="form-inline">
                <button class="form-control btn-info" type="submit" name="addEvent" > <i class="fa fa-plus"></i> Ajouter </button> 
             
            </td>
                
            
            </tr>

    </table>
    </form>

</div>

<script>

$('select').selectpicker();


</script>

