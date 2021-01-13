
<div id="contact" class="contenutab">
    <h3>Les contacts</h3>
    <table class ="display" id="tableContact">
        <thead>
            <th>Id </th>  <th>De</th>  <th>Email</th> <th>Objet</th> <th>Date</th> <th>Action</th>
        </thead>
        <?php
            foreach ($contactList as $contact){ ?>
        <tr> 
            <td> <?= $contact->id; ?> </td> 
            <td> <?= $contact->surname." ".$contact->name; ?> </td>
            <td> <?= $contact->email; ?> </td>
            <td> <?= $contact->object; ?> </td>
            <td> <?= $contact->date; ?> </td>
            <td class="form-inline"> 
                    <a href="contact/<?= $contact->id; ?>"><button class="form-control btn-info" type="button" name="consult" value="<?= $contact->id; ?>"> <i class="fa fa-eye"></i> </button> </a> 
                    <form action="" method="POST"><button onclick="return confirm('Voulez-vous vraiment supprimer cette évènement ?')" class="form-control btn-danger" type="submit" name="deleteContact" value="<?= $contact->id; ?>"><i class="fa fa-trash"></i></button> </form>
            </td> 
        </tr>

    <?php } ?>

    </table>
</div>


<script>    

//Implémentation de DataTable
$(document).ready(function(){
      $('#tableContact').DataTable({
         dom:'ftpl',
         order: [[ 0, "asc" ]], //Order des dates en premier
         language:{
               url:"assets/Datatable/french.json" //
         }
      })
   });
</script>