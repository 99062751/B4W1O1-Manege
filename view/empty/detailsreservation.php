<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details reserveren</title>
</head>
<body>
    <h1>Details reserveren</h1>

    <form id="register" name="create" method="post" action="<?=URL?>empty/storeCostumer">
            <!-- bouw hier je formulier -->
            <label for="name">Naam:</label>
            <input name='name' type="text" placeholder="Voornaam" value="<?=$name?>">
            <br>
            <br>

            <label for="adress">Adres:</label>
            <input name='adress' type="text" placeholder="Antoniuslaan 24" value="<?=$adress?>">
            <br>
            <br>

            <label for="nummer">Telefoonnummer:</label>
            <input name='nummer' type="text" placeholder="061234678" value="<?=$number?>">
            <br>
            <br>

            <button type="submit">Voeg toe</button>
        </form>
</body>
</html>