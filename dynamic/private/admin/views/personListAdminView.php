
<div id="person" class="contenutab">
    <h3>Les persons</h3>
    <table class ="display" id="tablePerson">
        <thead>
            <th>Id </th>  <th>Nom</th> <th>Prénom</th>   <th>Email</th> <th>Téléphone</th> <th>Role</th> <th>Actions</th>
        </thead>
        <?php
            foreach ($personList as $person){ ?>
        <tr> 
            <td> <?= $person->id; ?> </td> 
            <td> <?= $person->surname; ?> </td>
            <td> <?= $person->name; ?> </td>
            <td> <?= $person->email; ?> </td>
            <td> <?= $person->phone; ?> </td> 
            <td> <?php if($person->getRole() != null){ echo $person->getRole()->type; } else{ echo "Aucun" ;} ?> </td>
            <td class="form-inline"> 
                    <a href="../../person/<?= $person->id; ?>"><button class="form-control btn-info" type="button" name="consult" value="<?= $person->id; ?>"> <i class="fa fa-eye"></i> </button> </a> 
                    <a href="person/update/<?= $person->id; ?>"><button class="form-control btn-primary" type="button" name="update"><i class="fa fa-pencil"></i></button> </a>
                    <form action="" method="POST"><button onclick="return confirm('Voulez-vous vraiment supprimer cette évènement ?')" class="form-control btn-danger" type="submit" name="deletePerson" value="<?= $person->id; ?>"><i class="fa fa-trash"></i></button> </form>
            </td> 
        </tr>

    <?php } ?>

    </table>
</div>


<script>    

//Implémentation de DataTable
$(document).ready(function(){
      $('#tablePerson').DataTable({
         dom:'ftpl',
         order: [[ 0, "asc" ]], //Order des dates en premier
         language:{
               url:"assets/Datatable/french.json" //
         }
      })
   });
</script>