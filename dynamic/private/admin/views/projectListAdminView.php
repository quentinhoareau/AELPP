
<div id="project" class="contenutab">
    <h3>Les projets</h3>
    <table class ="display" id="tableProject">
        <thead>
            <th>Numéros </th>  <th>Nom</th> <th>Description</th> <th>Groupe(s) actif</th>  <th>Évènement(s) actif</th> <th>Actions</th>
        </thead>
        <?php
            foreach ($projectList as $project){ ?>
        <tr> 
            <td> <?= $project->num; ?> </td> 
            <td> <?= $project->name; ?> </td>
            <td> <?= $project->description; ?> </td>
            <td> <?= count($project->getGroupList()); ?> </td> 
            <td> <?= count($project->getEventList()); ?> </td>
            <td class="form-inline"> 
                    <a href="../../project/<?= $project->num; ?>"><button class="form-control btn-info" type="button" name="consult" value="<?= $project->num; ?>"> <i class="fa fa-eye"></i> </button> </a> 
                    <a href="project/update/<?= $project->num; ?>"><button class="form-control btn-primary" type="button" name="update"><i class="fa fa-pencil"></i></button> </a>
                    <form action="" method="POST"><button onclick="return confirm('Voulez-vous vraiment supprimer cette évènement ?')" class="form-control btn-danger" type="submit" name="deleteProject" value="<?= $project->num; ?>"><i class="fa fa-trash"></i></button> </form>
            </td> 
        </tr>

    <?php } ?>

    </table>
</div>


<script>    

//Implémentation de DataTable
$(document).ready(function(){
      $('#tableProject').DataTable({
         dom:'ftpl',
         order: [[ 0, "asc" ]], //Order des dates en premier
         language:{
               url:"assets/Datatable/french.json" //
         }
      })
   });
</script>