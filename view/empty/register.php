
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Voeg een klant toe</h1>
    

        <form id="register" name="create" method="post" action="<?=URL?>empty/ControleK">
            <!-- bouw hier je formulier -->
            <label for="name_costumer">Naam:</label>
            <input name='name_costumer' type="text" placeholder="Henk" value="<?=$name?>">
            <p style="display: inline">* <?=$data["naam_klant"]?></p>
            <br>
            <br>

            <label for="adress_costumer">Adres:</label>
            <input style= "width: 220px"name='adress_costumer' type="text" placeholder="15e aanstaanlaan" value="<?=$adress?>">
            <p style="display: inline">* <?=$data["adress"]?></p>
            <br>
            <br>

            <label for="tel_nmbr">Telefoonnummer:</label>
            <input name='tel_nmbr' type="text" placeholder="06123467890" value="<?=$number?>">
            <p style="display: inline">* <?=$data["tel_nmbr"]?></p>
            <br>
            <br>
                <p>* verplicht</p>
            <button name="register_costumer" type="submit">Voeg toe</button>
        </form>

    
</body>
</html>



