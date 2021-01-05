
<div id="person" class="contenutab container" style="max-width: 800px">

    <form action="" method="POST">
    <table class="display table" id="tablePerson">
        <thead class="thead-dark">
            <tr>
            <?php if(isset($person)){ ?>
                <th colspan="2"> <h5>Personne <?= "#".$person->id; ?> </h3>  </th>
            <?php } else{ ?>
                <th colspan="2"> <h5>Ajouter un nouvel ARTICLE </h3>  </th>
            <?php } ?>
            </tr>
        </thead>
        
            <?php if(isset($person)){ ?>
                <tr>
                    <td> <label for=""> Id </label>   </td> 
                    <td> <input type="text" disabled value="<?= $person->id; ?>"> <span> L'identifiant n'est pas modifiable.</span>  </td> 
                </tr>       
            <?php } ?>

            
            <tr>
                <td> <label for=""> Nom </label> </td> 
                <td> <input name="surname" type="text" <?php if(isset($person)){ echo "value='$person->surname'"; } ?> required>  </td> 
            </tr>

            
            <tr>
                <td> <label for=""> Prénom </label> </td> 
                <td> <input name="name" type="text" <?php if(isset($person)){ echo "value='$person->name'"; } ?> required>  </td> 
            </tr>
            
            <tr>
                <td> <label for=""> Email </label> </td> 
                <td> <input name="email" type="email" <?php if(isset($person)){ echo "value='$person->email'"; } ?> required>  </td> 
            </tr>

            <tr>
                <td> <label for=""> Téléphone </label> </td> 
                <td> <input name="phone" type="text" <?php if(isset($person)){ echo "value='$person->phone'"; } ?> required>  </td> 
            </tr>



            <tr>
                <td> <label for=""> Rôle </label> </td> 
                <td> 
                    <select  class="selectpicker" data-live-search="true" name="role_code" title="Choisir un rôle" required>
                        <?php foreach ($roleList as $role) { ?>
                            <option data-subtext="<?= $role->code ?>" value="<?= $role->code ?>" > <?= $role->type ?></option>
                        <?php } ?>
                    </select>
                </td> 
                
            </tr>

            <tr>
                <td>Action</td>
                <td class="form-inline">
                </td>

                <td class="form-inline">
                    <?php if(isset($person)){ ?>
                        <button class="form-control btn-info" type="button" name="consult" value="<?= $person->id; ?>"><a href="../../person/<?= $person->id; ?>"> <i class="fa fa-eye"></i> </a> </button> 
                        <button class="form-control btn-primary" type="submit" name="updatePerson" value="<?= $person->id; ?>"><i class="fa fa-save"></i></button> 
                        <form action="" method="POST"> <button onclick="return confirm('Voulez-vous vraiment supprimer cette personne ?')" class="form-control btn-danger" type="submit" name="deletePerson" value="<?= $person->id; ?>"><i class="fa fa-trash"></i></button> </form>  
                    <?php } else{ ?>
                        <button class="form-control btn-primary" type="submit" value="1" name="addPerson" ><i class="fa fa-plus"></i> Ajouter la personne </button>
                    <?php } ?>
            </td>

                
            
            </tr>

    </table>
    </form>

</div>

<script>

    $('select').selectpicker();

    <?php if(isset($person)){ ?>
        $('.selectpicker').selectpicker('val', '<?= $person->role_code ?>');
    <?php } ?>

</script>

