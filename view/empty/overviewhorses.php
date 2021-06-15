<?php
    $horses= getAllInfoFromTable($tablename= "Paarden");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>RESERVEREN PAARD</h1>

    <table>
        <tr>
            <th>Naam</th>
            <th>Leeftijd</th>
            <th>Ras</th>
            <th>Hoogte</th>
            <th>Kan springsport</th>    
            <th>Reserveren</th>    
        </tr>
<?php   foreach ($horses as $h => $horse) {  ?> 
            <tr class="horse-info">
                <td class="list-item"><?=$horse["naam"]?></td>
                <td class="list-item"><?=$horse["leeftijd"]?></td>
                <td class="list-item"><?=$horse["ras"]?></td>
                <td class="list-item"><?=$horse["hoogte"]?></td>
                <td class="list-item"><?=$horse["springsport"]?></td>
                <td> <a href="detailsreservation">RESERVEREN</a></td>
               
            </tr>
           
<?php   }     ?>

    </table>

    <a class="edit-link" href="edithorses">Wijziging aanbrengen:</a>
</body>
</html>