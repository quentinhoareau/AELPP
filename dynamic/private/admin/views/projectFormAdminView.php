
<div id="project" class="contenutab container" style="max-width: 800px">

    <form action="" method="POST">
    <table class="display table" id="tableProject">
        <thead class="thead-dark">
            <tr>
            <?php if(isset($project)){ ?>
                <th colspan="2"> <h5>Projet <?= "#".$project->num; ?> </h3>  </th>
            <?php } else{ ?>
                <th colspan="2"> <h5>Ajouter un nouveau projet </h3>  </th>
            <?php } ?>
            </tr>
        </thead>
        
            <?php if(isset($project)){ ?>
                <tr>
                    <td> <label for=""> Numéro </label>   </td> 
                    <td> <input type="text" disabled value="<?= $project->num; ?>"> <span> L'identifiant n'est pas modifiable.</span>  </td> 
                </tr>    

                  <tr>
                    <td> <label for="">  Date de création  </label> </td> 
                    <td> <?= Website::convertDateDB($project->date_creation, 'd/m/Y à H:i') ; ?> </td> 
                </tr>   

            <?php } ?>

            
            <tr>
                <td> <label for=""> Nom </label> </td> 
                <td> <input name="name" type="text" <?php if(isset($project)){ echo "value='$project->name'"; } ?> required>  </td> 
            </tr>
            

            <tr>
                <td> <label for=""> Description </label> </td> 
                <td> <textarea name="description" id="" cols="30" rows="10" required><?php if(isset($project)){ echo $project->description ;} ?></textarea></td> 
            </tr>

            <tr>
                <td> <label for=""> Groupe(s) du projet </label> </td> 
                <td>   </td> 
            </tr>

            <tr>
                <td>Action</td>
                <td class="form-inline">
                </td>

                <td class="form-inline">
                    <?php if(isset($project)){ ?>
                        <button class="form-control btn-info" type="button" name="consult" value="<?= $project->num; ?>"><a href="../../project/<?= $project->num; ?>"> <i class="fa fa-eye"></i> </a> </button> 
                        <button class="form-control btn-primary" type="submit" name="updateProject" value="<?= $project->num; ?>"><i class="fa fa-save"></i></button> 
                        <form action="" method="POST"> <button onclick="return confirm('Voulez-vous vraiment supprimer cette projectne ?')" class="form-control btn-danger" type="submit" name="deleteProject" value="<?= $project->num; ?>"><i class="fa fa-trash"></i></button> </form>  
                    <?php } else{ ?>
                        <button class="form-control btn-primary" type="submit" value="1" name="addProject" ><i class="fa fa-plus"></i> Ajouter la projectne </button>
                    <?php } ?>
            </td>

                
            
            </tr>

    </table>
    </form>

</div>

<script>

    $('select').selectpicker();

    <?php if(isset($project)){ ?>
        //$('.selectpicker').selectpicker('val', '<?php //echo $project->role_code ?>');
    <?php } ?>

</script>

