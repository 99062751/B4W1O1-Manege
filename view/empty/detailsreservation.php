

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
            <input name='name_resevator' type="text" placeholder="" value="<?=$namecostumer?>">
            <br>
            <br>

            <label for="name_horse">Naam paard:</label>
            <input name='name_horse' type="text" value="<?=$data['naam']?>">
            <br>
            <label for="race_horse">Ras:</label>
            <input name='race_horse' type="text" value="<?=$data['ras']?>" disabled>
            <br>
            <label for="horse_height">Schofthoogte:</label>
            <input name='horse_height' type="text" value="<?=$data['hoogte']?>" disabled>
            <br>
            <br>

            <label for="date">Datum:</label>
            <input name='date' type="date" placeholder="" value="<?=$date?>">
            <br>
            <br>

            <label for="start_time">Begintijd:</label>
            <input name='start_time' type="time" placeholder="" value="<?=$time?>">
            <br>
            <br>

            <label for="end_time">Eindtijd:</label>
            <input name='end_time' type="time" placeholder="" value="<?=$endtime?>">
            <br>
            <br>

            <button type="submit">Voeg toe</button>

        </form>
</body>
</html>