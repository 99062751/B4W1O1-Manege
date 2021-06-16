<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details reserveren</title>
</head>
<body>
    <h1>Details reserveren</h1>

    <form id="register" name="create" method="post" action="<?=URL?>empty/storeReservation">
            <!-- bouw hier je formulier -->
            <label for="name_resevator">Naam reserveerder:</label>
            <input name='name_resevator' type="text" placeholder="Voornaam" value="<?=$namecostumer?>">
            <br>
            <br>

            <label for="name_horse">Naam paard:</label>
            <input name='name_horse' type="text" placeholder="Antoniuslaan 24" value="<?=$namehorse?>">
            <br>
            <br>

            <label for="date">Datum:</label>
            <input name='date' type="date" placeholder="061234678" value="<?=$date?>">
            <br>
            <br>

            <label for="time">Tijd:</label>
            <input name='time' type="time" placeholder="061234678" value="<?=$time?>">
            <br>
            <br>

            <button type="submit">Voeg toe</button>
        </form>
</body>
</html>