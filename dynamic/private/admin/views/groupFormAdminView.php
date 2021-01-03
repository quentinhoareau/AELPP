

<div id="group" class="contenutab container" style="max-width: 1000px">

    <form action="" method="POST">
    <table class="display table" id="tableGroup">

        <thead class="thead-dark">
            <tr>
            <?php if(isset($group)){ ?>
                <th colspan="2"> <h5>Groupe <?= "#".$group->id; ?> </h3>  </th>
            <?php } else{ ?>
                <th colspan="2"> <h5>Ajouter un nouveau group </h3>  </th>
            <?php } ?>
            </tr>
        </thead>

            <?php if(isset($group)){ ?>
                <tr>
                <td> <label for=""> Id </label>   </td> 
                <td> <input type="text" disabled value="<?= $group->id; ?>"> <span> L'identifiant n'est pas modifiable.</span>  </td> 
            </tr>
            <?php } ?>

            <tr>
                <td> <label for=""> Nom </label> </td> 
                <td> <input name="name" type="text" <?php if(isset($group)){ echo "value='$group->name'"; } ?>>  </td>
              
            </tr>

            <tr>
                <td> <label for=""> Description  </label> </td> 
                <td>
                    <textarea name="description" rows="10" cols="80"><?php if(isset($group)){ echo $group->description; } ?></textarea>
                    
                </td>
                </td> 
            </tr>

            <tr>
            <td> <label for=""> Membre(s) </label> </td> 
                <td> 
                    <select  class="selectpicker" data-live-search="true" id="memberList" name="id_pers[]" multiple>
                        <?php foreach ($personList as $person) { ?>
                            <option data-subtext="<?= $person->getRole()->type ?>" value="<?= $person->id ?>"> <?= $person->surname." ".$person->name ?></option>
                        <?php } ?>
                    </select>
                </td> 
            </tr>

            <tr>
                <td>Action</td>
            <td class="form-inline">

            <button class="form-control btn-primary" type="submit" name="<?php if(isset($group)){ echo "updateGroup"; }else{echo "addGroup" ;} ?>" <?php if(isset($group)){ echo "value='$group->id'"; } ?>><i class="fa fa-save"></i></button> 

            <?php if(isset($group)){ ?>
               
                <button class="form-control btn-info" type="button" name="consult" value="<?= $group->id; ?>"><a href="../../group/<?= $group->id; ?>"> <i class="fa fa-eye"></i> </a> </button> 
                <form action="" method="POST"> <button onclick="return confirm('Voulez-vous vraiment supprimer ce groupe ?')" class="form-control btn-danger" type="submit" name="deleteGroup" value="<?= $group->id; ?>"><i class="fa fa-trash"></i></button> </form>  
            <?php } ?>

               
              
              
            </td>
                
            
            </tr>

    </table>
    </form>

</div>

<script>

$('select.selectpicker').selectpicker();


<?php  
   // Auto focus les membres du group de la liste de tous les personnes
    if(isset($group)){
        $memberList = null;
        foreach ($group->getPersonList()  as $person) { 
            $memberList[] = $person->id ;
        }  
?>
        $('#memberList').selectpicker('val', <?= json_encode($memberList) ?>);
<?php 
    } 
?>


</script>

