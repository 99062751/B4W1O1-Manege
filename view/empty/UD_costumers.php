<?php
 $riders= getAllInfoFromTable($tablename= "Ruiters");
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>UD_reservation</title>
</head>
<body>
<h2>Wijzig of verwijder een klant:</h2>

    <h2>Wijzig een klant:</h2>

    <form id="register" name="create" method="post" action="<?=URL?>empty/EditCostumer">
            <!-- bouw hier je formulier -->
            <label for="editID">ID klant die gewijzigd moet worden:</label>
            <select name="editID" id="editID">

                        <?php foreach ($riders as $r => $rider) {  ?>     ?>

                <option value="<?=$rider["id"]?>"><?=$rider["id"]?></option>

                <?php        } ?>
                </select>
                <br>
            <br>



            <label for="name_resevator">Nieuwe naam klant:</label>
            <input type="text" value="<?=$name?>" name="name_resevator">

        <!-- <select name="name_resevator" id="name_resevator">
                         foreach ($riders as $r => $rider) {  ?>    

                <option value="$rider["naam"]?>">$rider["naam"]?></option>

                      } 
        </select> -->
            <br>
            <br>

            <label for="adress">Adres:</label>
            <input name='adress' type="text" placeholder="Artonastaart 9" value="<?=$adress?>">
            <br>
            <br>

            <label for="tel_nmbr">Telefoonnummer:</label>
            <input name='tel_nmbr' type="text" placeholder="0612345678" value="<?=$nrumbe?>">
            <br>
            <br>

            <button type="submit">Wijzig</button>

        </form>

<h2>Verwijder een reservering:</h2>
<form id="register" name="create" method="post" action="<?=URL?>empty/RemoveCostumer">
        <!-- bouw hier je formulier -->
        <label for="klantnaam">Welke klant:</label>
        <select name="klantnaam" id="klantnaam">
        <?php foreach ($riders as $r => $rider) {  ?>     ?>

                <option value="<?=$rider["naam"]?>"><?=$rider["naam"]?></option>
        
        <?php        } ?>
     
               
        </select>
        <br>
        <br>

        <button type="submit">Verwijder</button>

</form>   
</body>
</html>