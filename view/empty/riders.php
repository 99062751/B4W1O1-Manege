<?php
$riders= getAllInfoFromTable();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ruiters</title>
</head>
<body>
    <h1>Dit is de overzicht van de ruiters, de klanten dus :/</h1>

    <table>
        <tr>    
            <th>Naam</th>
            <th>Adres</th>
            <th>Telefoonnummer</th>
        </tr>
  
        
<?php   foreach ($riders as $r => $costumer) {  ?> 
        <tr>
            <td><?=$costumer["naam"]?></td>
            <td><?=$costumer["adress"]?></td>
            <td><?=$costumer["telefoonnmr"]?></td>
        </tr>
<?php   }     ?>

        
    </table>

    
</body>
</html>