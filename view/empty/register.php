
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
            <label for="name">Naam:</label>
            <input name='name' type="text" placeholder="Henk Vermeulen" value="<?=$name?>">
            <p style="display: inline">* <?=$data["naam"]?></p>
            <br>
            <br>

            <label for="adress">Adres:</label>
            <input style= "width: 220px"name='adress' type="text" placeholder="15e aanstaanlaan" value="<?=$adress?>">
            <p style="display: inline">* <?=$data["adres"]?></p>
            <br>
            <br>

            <label for="nummer">Telefoonnummer:</label>
            <input name='nummer' type="text" placeholder="06123467890" value="<?=$number?>">
            <p style="display: inline">* <?=$data["nummer"]?></p>
            <br>
            <br>
                <p>* verplicht</p>
            <button name="register_costumer" type="submit">Voeg toe</button>
        </form>

    
</body>
</html>



