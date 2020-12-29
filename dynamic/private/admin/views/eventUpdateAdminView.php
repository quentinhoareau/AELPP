

<div id="event" class="contenutab container" style="max-width: 1000px">

    <form action="" method="POST">
    <table class="display table" id="tableEvent">

        <thead class="thead-dark">
            <tr>
            <th colspan="2"> <h5>L'event <?= "#".$event->id; ?> </h3>  </th>
            </tr>
        </thead>

            <tr>
                <td> <label for=""> Id </label>   </td> 
                <td> <input type="text" disabled value="<?= $event->id; ?>"> <span> L'identifiant n'est pas modifiable.</span>  </td> 
            </tr>

            <tr>
                <td> <label for=""> Titre </label> </td> 
                <td> <input name="title" type="text" value="<?= $event->title; ?>">  </td> 
            </tr>

            <tr>
                <td> <label for=""> Contenu de l'évènement </label> </td> 
                <td>
                    <textarea name="content" id="content" rows="10" cols="80"><?= $event->content ?></textarea>
                    <script>
                        CKEDITOR.replace( 'content', {
                            language: 'fr'
                        });
                    </script>
                </td>
                </td> 
            </tr>

            
            <tr>
                <td> <label for=""> Date de création </label> </td> 
            
                <td> <input disabled name="date_creation" type="datetime-local" value="<?= Website::convertDateDB($event->date_creation, 'Y-m-d\TH:i'); ?>"> </td> 
            </tr>

            <tr>
                <td> <label for=""> Date prévue </label> </td> 
                <td> <input name="predicted_date" type="datetime-local" value="<?= Website::convertDateDB($event->predicted_date, 'Y-m-d\TH:i'); ?>"> </td> 
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
                <button class="form-control btn-info" type="button" name="consult" value="<?= $event->id; ?>"><a href="../../event/<?= $event->id; ?>"> <i class="fa fa-eye"></i> </a> </button> 
                <button class="form-control btn-primary" type="submit" name="updateEvent" value="<?= $event->id; ?>"><i class="fa fa-save"></i></button> 
                <form action="" method="POST"> <button onclick="return confirm('Voulez-vous vraiment supprimer cette évènement ?')" class="form-control btn-danger" type="submit" name="deleteEvent" value="<?= $event->id; ?>"><i class="fa fa-trash"></i></button> </form>  
             
            </td>
                
            
            </tr>

    </table>
    </form>

</div>

<script>

$('select').selectpicker();
$('#id_creator').selectpicker('val', '<?= $event->id_creator ?>');
$('#num_project').selectpicker('val', '<?= $event->num_project ?>');


</script>

