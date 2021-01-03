
<div id="group" class="contenutab">
    <h3>Les groups</h3>
    <table class ="display" id="tableGroup">
        <thead>
            <th>Id </th> <th>name </th>  <th>Description</th>  <th>Membre(s)</th> <th>Actions</th>
        </thead>
        <?php
            foreach ($groupList as $group){ ?>
        <tr> 
            <td> <?= $group->id; ?> </td> 
            <td> <?= $group->name; ?> </td>
            <td> <?= $group->description; ?> </td>
            <td> <?= count( $group->getPersonList() ); ?>
            </td>
                <td class="form-inline"> 
                    <a href="../../group/<?= $group->id; ?>"><button class="form-control btn-info" type="button" name="consult" value="<?= $group->id; ?>"> <i class="fa fa-eye"></i> </button> </a> 
                    <a href="group/update/<?= $group->id; ?>"><button class="form-control btn-primary" type="button" name="update"><i class="fa fa-pencil"></i></button> </a>
                    <form action="" method="POST"><button onclick="return confirm('Voulez-vous vraiment supprimer cette évènement ?')" class="form-control btn-danger" type="submit" name="deleteGroup" value="<?= $group->id; ?>"><i class="fa fa-trash"></i></button> </form>
                </td> 
            </tr>

    <?php } ?>

    </table>
</div>


<script>    

//Implémentation de DataTable
$(document).ready(function(){
      $('#tableGroup').DataTable({
         dom:'ftpl',
         order: [[ 0, "asc" ]], //Order des dates en premier
         language:{
               url:"assets/Datatable/french.json" //
         }
      })
   });
</script>