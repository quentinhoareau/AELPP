

<div id="event" class="contenutab container" style="max-width: 1000px">

    <form action="" method="POST">
    <table class="display table" id="tableEvent">

        <thead class="thead-dark">
            <tr>
            <?php if(isset($event)){ ?>
                <th colspan="2"> <h5>L'èvènement <?= "#".$event->id; ?> </h3>  </th>
            <?php } else{ ?>
                <th colspan="2"> <h5>Ajouter un nouvel évènement </h3>  </th>
            <?php } ?>
            </tr>
        </thead>

            
            <?php if(isset($event)){ ?>
                <tr>
                <td> <label for=""> Id </label>   </td> 
                <td> <input type="text" disabled value="<?= $event->id; ?>"> <span> L'identifiant n'est pas modifiable.</span>  </td> 
            </tr>
            <?php } ?>

            <tr>
                <td> <label for=""> Titre </label> </td> 
                <td> <input required name="title" type="text" <?php if(isset($event)){ echo "value='$event->title'"; } ?>>  </td> 
            </tr>

            <tr>
                <td> <label for=""> Contenu de l'évènement </label> </td> 
                <td>
                    <textarea required name="content" id="content" rows="10" cols="80"><?php if(isset($event)){ echo $event->content ;} ?></textarea>
                    <script>
                        CKEDITOR.replace( 'content', {
                            language: 'fr'
                        });
                    </script>
                </td>
                </td> 
            </tr>
    
          

            <?php if(isset($event)){ ?>
                <tr>
                    <td> <label for=""> Date de création </label> </td> 
                
                    <td> <?= Website::convertDateDB($event->date_creation, 'd/m/Y à H:i'); ?> </td> 
                </tr>
            <?php } ?>


            <tr>
                <td> <label for=""> Date prévue </label> </td> 
                <td> <input name="predicted_date" type="datetime-local" required <?php if(isset($event)){ echo "value='".Website::convertDateDB($event->predicted_date, 'Y-m-d\TH:i')."'"; } ?>> </td> 
            </tr>

         
            

            <tr>
            <td> <label for=""> Créateur </label> </td> 
                <td> 
                    <select  class="selectpicker" data-live-search="true" id="creatorList" name="id_creator" title="Choisir une personne" required>
                    
                        <?php foreach ($personList as $person) { ?>
                            <option data-subtext="<?= $person->getRole()->type ?>" value="<?= $person->id ?>"> <?= $person->surname." ".$person->name ?></option>
                        <?php } ?>
                      
                    </select>
                </td> 
            </tr>
          

            <tr>
                <td> <label for=""> Projet de l'évènement </label> </td> 
                <td> 
                    <select  class="selectpicker" data-live-search="true" id="projectList" name="num_project">
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

               

                <?php if(isset($event)){ ?>
                    <button class="form-control btn-primary" type="submit" name="updateEvent" <?= "value='$event->id'"; ?>><i class="fa fa-save"></i></button> 
                    <button class="form-control btn-info" type="button" name="consult" value="<?= $event->id; ?>"><a href="../../event/<?= $event->id; ?>"> <i class="fa fa-eye"></i> </a> </button> 
                    <form action="" method="POST"> <button onclick="return confirm('Voulez-vous vraiment supprimer cette évènement ?')" class="form-control btn-danger" type="submit" name="deleteEvent" value="<?= $event->id; ?>"><i class="fa fa-trash"></i></button> </form>  
                <?php } else {?>
                    <button class="form-control btn-primary" type="submit" name="addEvent" ><i class="fa fa-plus"></i> Ajouter</button> 
                <?php } ?>

            </td>
                
            
            </tr>

    </table>
    </form>

</div>



<script>

$('select').selectpicker();

<?php if(isset($event)){ ?>
    $('#creatorList').selectpicker('val', '<?= $event->id_creator ?>');
    $('#projectList').selectpicker('val', '<?= $event->num_project ?>');
<?php } else{ ?>
    $('#creatorList').selectpicker('deselectAll');
<?php } ?>



</script>

