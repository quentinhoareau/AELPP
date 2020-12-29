
<div id="event" class="contenutab">
    <h3>Les events</h3>
    <table class ="display" id="tableEvent">
        <thead>
            <th>Id </th> <th>Titre </th>  <th>Date de création</th>  <th>Date prévue</th> <th>Créateur</th> <th>Projet concerné</th> <th>Actions</th>
        </thead>
        <?php
            foreach ($eventList as $event){ ?>
        <tr> 
            <td> <?= $event->id; ?> </td> 
            <td> <?= $event->title; ?> </td>
            <td> <?= $event->date_creation; ?> </td>
            <td> <?= $event->predicted_date; ?> </td>
            <td> <?= $event->getCreator()->name; ?> </td> 
            <td> <?php if($event->getProject() != null){ echo $event->getProject()->name; } else{ echo "Aucun" ;} ?> </td>
            <td class="form-inline"> 
                    <a href="../../event/<?= $event->id; ?>"><button class="form-control btn-info" type="button" name="consult" value="<?= $event->id; ?>"> <i class="fa fa-eye"></i> </button> </a> 
                    <a href="event/update/<?= $event->id; ?>"><button class="form-control btn-primary" type="button" name="update"><i class="fa fa-pencil"></i></button> </a>
                    <form action="" method="POST"><button onclick="return confirm('Voulez-vous vraiment supprimer cette évènement ?')" class="form-control btn-danger" type="submit" name="deleteEvent" value="<?= $event->id; ?>"><i class="fa fa-trash"></i></button> </form>
            </td> 
        </tr>

    <?php } ?>

    </table>
</div>


<script>    

//Implémentation de DataTable
$(document).ready(function(){
      $('#tableEvent').DataTable({
         dom:'ftpl',
         order: [[ 0, "asc" ]], //Order des dates en premier
         language:{
               url:"assets/Datatable/french.json" //
         }
      })
   });
</script>