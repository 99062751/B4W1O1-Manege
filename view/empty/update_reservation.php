<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wijzig reservering</title>
</head>
<body>
<h2>Wijzig een reservering:</h2>

<form id="register" name="create" method="post" action="<?=URL?>empty/ControleR">
        <!-- bouw hier je formulier -->
        <input name="editID" value="<?=$data["id"]?>" type="hidden">


        <label for="name_resevator">Naam reserveerder:</label>
        <input name="name_resevator" type="text" value="<?=$data['ruiter'];?>">
        <p style="display: inline">* <?=$data["naam_reserveerder"]?></p>
        <br>
        <br>

        <label for="naam_paard_update">Naam paard:</label>
        <input name='naam_paard_update' type="text" value="<?=$data["paard"];?>">
        <p style="display: inline">* <?=$data["naam_paard_update"]?></p>
        <br>

        <label for="date">Datum:</label>
        <input name='date' type="date" placeholder="" value="<?=$data["datum"];?>">
        <br>
        <br>

        <label for="start_time">Begintijd:</label>
        <input name='start_time' type="time" placeholder="" value="<?=$data["Begintijd"];?>">
        <br>
        <br>

        <label for="end_time">Eindtijd:</label>
        <input name='end_time' type="time" placeholder="" value="<?=$data["Eindtijd"];?>">
        <br>
        <br>

        <button name="update_reservation" type="submit">Wijzig</button>

    </form>
</body>
</html>