<?php
echo "id= ". $data["id"];
$info_reservation= getcostumer($data["id"],$tablename= "Reserveringen");

$start_time= strtotime($info_reservation["Begintijd"]);
$end_time= strtotime($info_reservation["Eindtijd"]);



$STH= date("H", $start_time);
$STM= date("i", $start_time);

$ETH= date("H", $end_time);
$ETM= date("i", $end_time);

$start_time = $STH. $STM; 
$end_time= $ETH. $ETM; 

$ans= $start_time- $end_time;
$ans2= $ans / 60;


$ans3= 55 / 60; 
$price= $ans3 * $ans2;
echo $price;
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
                        <td class="list-item"><?=$info_reservation["ruiter"]?></td>
                        <td class="list-item"><?=$info_reservation["paard"]?></td>
                        <td class="list-item"><?=$info_reservation["datum"]?></td>
                        <td class="list-item"><?=date('H:i',strtotime($info_reservation["Begintijd"]));?></td>
                        <td class="list-item"><?=date('H:i',strtotime($info_reservation["Eindtijd"]));?></td>
                        <td class="list-item"><?=round($price)."€";?></td>
                    </tr></a>
                
    </table>
            <a href="">AFREKENEN</a>
</body>
</html>