<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>UD_reservation</title>
</head>
<body>

    <h2>Wijzig een klant:</h2>

    <form id="register" name="create" method="post" action="<?=URL?>empty/ControleK">
        <!-- bouw hier je formulier -->
        <input name="editID" type="hidden" value="<?=$data["id"]?>">

        <label for="name_costumer">Naam klant:</label>
        <input type="text" value="<?=$data["naam"]?>" name="name_costumer">
        <p style="display: inline">* <?=$data["naam_klant"]?></p>
        <br>
        <br>

        <label for="adress_costumer">Adres:</label>
        <input name="adress_costumer" type="text" placeholder="Artonastaart 9" value="<?=$data["adres"]?>">
        <p style="display: inline">* <?=$data["adress"]?></p>
        <br>
        <br>

        <label for="tel_nmbr">Telefoonnummer:</label>
        <input name='tel_nmbr' type="text" placeholder="0612345678" value="<?=$data["telefoonnmr"]?>">
        <p style="display: inline">* <?=$data["nummer"]?></p>
        <br>
        <br>

        <button name="update_costumer" type="submit">Wijzig</button>

</form> 
</body>
</html>