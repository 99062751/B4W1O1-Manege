<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verwijder reservering</title>
</head>
<body>  
    <h2>Verwijder een reservering:</h2>
    <form id="register" name="create" method="post" action="<?=URL?>empty/RemoveReservation">
            <!-- bouw hier je formulier -->
            <label for="id">Weet je zeker dat je deze reservering wilt verwijderen?</label>
            <br>
            <br>

        <table>
            <tr>
                <th>Naam</th>
                <th>ID</th>
                <th>Paard</th>
                <th>Datum</th>
                <th>Begintijd</th>  
                <th>Eindtijd</th>  
            </tr>
            <tr>
                <td class="list-item"><?=$data["ruiter"]?></td>
                <td class="list-item"><?=$data["id"]?></td>
                <td class="list-item"><?=$data["paard"]?></td>
                <td class="list-item"><?=$data["datum"]?></td>
                <td class="list-item"><?=date('H:i',strtotime($data["Begintijd"]));?></td>
                <td class="list-item"><?=date('H:i',strtotime($data["Eindtijd"]));?></td>
            </tr>
        </table>
        
            <input name="reservationID" type="hidden" value="<?=$data["id"]?>">
            <br>
            <br>

            <button name="delete_reservation" type="submit">Ja</button>
            <button name="back" type="submit">Nee, breng mij terug</button>
    </form>   
</body>
</html>