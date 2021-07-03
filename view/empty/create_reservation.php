<?php
 $reservations= getAllInfoFromTable($tablename= "Reserveringen");
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
<h2>Voeg nieuwe reservering toe:</h2>
<form id="register" name="create" method="post" action="<?=URL?>empty/ControleR">
            <!-- bouw hier je formulier -->
            <label for="name_resevator">Naam reserveerder:</label>
        <select name="name_resevator" id="name_resevator">
                        <?php foreach ($riders as $r => $rider) {  ?>     ?>

                <option value="<?=$rider["naam"]?>"><?=$rider["naam"]?></option>

                <?php        } ?>
        </select>
            <br>
            <br>

            <label for="name_horse">Naam paard:</label>
            <input name='name_horse' type="text" value="<?=$data['naam']?>">
            <p style="display: inline">* <?=$data["naam_paard"]?></p>
            <br>
            <br>

            <label for="date">Datum:</label>
            <input name='date' type="date" placeholder="12-03-2011" value="<?=$date?>">
            <br>
            <br>

            <label for="start_time">Begintijd:</label>
            <input name='start_time' type="time" placeholder="" value="<?=$time?>">
            <br>
            <br>

            <label for="end_time">Eindtijd:</label>
            <input name='end_time' type="time" placeholder="" value="<?=$time?>">
            <br>
            <br>

            <button name="add_reservation" type="submit">Voeg toe</button>

        </form>
</body>
</html>