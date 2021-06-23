<?php

// $price= $ans * 55;

// echo $price;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resevering betalen</title>
</head>
<body>
    <h1>Betaal hier de reservering</h1>

        <h3>Info reservering</h3>
    <table>
        <tr>
            <th>Naam reserveerder</th>
            <th>Naam paard</th>
            <th>Datum</th>
            <th>Begintijd</th>  
            <th>Eindtijd</th>  
            <th>Prijs</th>  
        </tr>
                    <a href=""><tr class="horse-info">
                        <td class="list-item"><?=$data["ruiter"]?></td>
                        <td class="list-item"><?=$data["paard"]?></td>
                        <td class="list-item"><?=$data["datum"]?></td>
                        <td class="list-item"><?=date('H:i',strtotime($data["Begintijd"]));?></td>
                        <td class="list-item"><?=date('H:i',strtotime($data["Eindtijd"]));?></td>
                        <td class="list-item"><?=round($data["prijs"])."€";?></td>
                    </tr></a>
                
    </table>
            <a href="">AFREKENEN</a>
</body>
</html>