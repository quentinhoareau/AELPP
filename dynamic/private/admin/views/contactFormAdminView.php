
<div id="contact" class="contenutab container" style="max-width: 800px">

    <form action="" method="POST">
    <table class="display table" id="tableContact">
        <thead class="thead-dark">
            <tr>
                <?php if(isset($contact)){ ?>
                    <th colspan="2"> <h5>L' <?= "#".$contact->id; ?> </h3>  </th>
                <?php } ?>
            </tr>
        </thead>
        
            <?php if(isset($contact)){ ?>
                <tr>
                    <td> <label for=""> Id </label>   </td> 
                    <td> <?php if(isset($contact)){ echo $contact->id; } ?> </td> 
                </tr>

                <tr>
                    <td> <label for=""> Date en </label> </td> 
                    <td> <?= Website::convertDateDB($contact->date, 'd/m/Y à H:i') ?></td> 
                </tr>
                


            <?php } ?>
            <tr>
                <td> <label for=""> De </label> </td> 
                <td> <?php if(isset($contact)){ echo $contact->surname." ".$contact->name ; } ?> </td> 
            </tr>

            <tr>
                <td> <label for=""> Téléphone </label> </td> 
                <td> <?php if(isset($contact)){ echo $contact->phone; } ?> </td> 
            </tr>
            
            <tr>
                <td> <label for=""> Objet </label> </td> 
                <td> <?php if(isset($contact)){ echo $contact->object; } ?> </td> 
            </tr>


            <tr>
                <td> <label for="fmessage"> Message </label> </td> 
                <td>
                    <textarea readonly id="fmessage" palceholder="Décrivez votre contact ici..." rows="10" cols="80"><?php if(isset($contact)){ echo $contact->message ;} ?></textarea>
                    <script>
                        CKEDITOR.replace( 'html_content', {
                            language: 'fr'
                        });
                    </script>
                </td>
                </td> 
            </tr>

            <tr>
                <td>Action</td>
           

            <td class="form-inline">
                <?php if(isset($contact)){ ?>
                    <form action="" method="POST"> <button onclick="return confirm('Voulez-vous vraiment supprimer cette contact ?')" class="form-control btn-danger" type="submit" name="deleteContact" value="<?= $contact->id; ?>"><i class="fa fa-trash"></i></button> </form>  
                <?php } ?>
           </td>

                
            
            </tr>

    </table>
    </form>

</div>

<script>

    $('select').selectpicker();

</script>

