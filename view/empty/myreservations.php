<?php
 $reservations= getAllInfoFromTable($tablename= "Reserveringen");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Uw reserveringen</h1>

    <table>
        <tr>
            <th>Naam</th>
            <th>Paard</th>
            <th>Datum</th>
            <th>Tijd</th>  
            <th>Afrekenen</th>  
        </tr>
<?php   foreach ($reservations as $r => $reservation) {  ?> 
            <a href=""><tr class="horse-info">
                <td class="list-item"><?=$reservation["ruiter"]?></td>
                <td class="list-item"><?=$reservation["paard"]?></td>
                <td class="list-item"><?=$reservation["datum"]?></td>
                <td class="list-item"><?=$reservation["tijd"]?></td>
                <td> <a href="detailsreservation/<?=$reservation["id"]?>">Betalen</a></td>
            </tr></a>
           
<?php   }     ?>

    </table>

</body>
</html>