<?php
require(ROOT . "model/EmptyModel.php");


function index()
{
	$connection = checkConnection();
     render('empty/index', ['connection' => $connection]);
}
/* ======== Controle klanten ========*/
function trimdata($var){
    $var= trim($var);
    $var= stripslashes($var);
    $var= htmlspecialchars($var);
    return $var;
}

function ControleK(){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST["register_costumer"])){
            //naam controle
            if(preg_match("/^([a-zA-Z' ]+)$/", $_POST["name_costumer"])){
                $name_costumer= trimdata($_POST["name_costumer"]);
                $data["name_costumer"]= $name_costumer;
            }elseif(empty($_POST["name_costumer"])){
                $error["naam_klant"] = "naam_klant is leeg.";
            }elseif(is_numeric($_POST["name_costumer"])){
                $error["naam_klant"] = "Er mogen geen cijfers.";
            }else{
                $error["naam_klant"] = "naam_klant bevat ongeldige tekens.";
            }

            //Adres controle
            if(preg_match("/[A-Za-z0-9]+/", $_POST["adress_costumer"]) && !empty($_POST["adress_costumer"])){
                $adress_costumer= trimdata($_POST["adress_costumer"]);
                $data["adress_costumer"]= $adress_costumer;
            }elseif(empty($_POST["adress_costumer"])){
                $error["adress"] = "Adres is leeg.";
            }else{
                $error["adress"] = "Adres bestaat niet.";
            }

        //telefoonnummer controle
            if(preg_match("/^[0-9]*$/", $_POST["tel_nmbr"])){
                $number= trimdata($_POST["tel_nmbr"]);
                $data["tel_nmbr"]= $number;
            }elseif(empty($_POST["tel_nmbr"])){
                $error["tel_nmbr"] = "Telefoontel_nmbr is leeg.";
            }else{
                $error["tel_nmbr"] = "Telefoontel_nmbr mag geen letters of tekens bevatten! ";
            }
                storeCostumer($data, $error);
        }


        if(isset($_POST["update_costumer"])){
            //            
            //naam controle
            if(preg_match("/^([a-zA-Z' ]+)$/", $_POST["name_costumer"])){
                $name_costumer= trimdata($_POST["name_costumer"]);
                $data["name_costumer"]= $name_costumer;
            }elseif(empty($_POST["name_costumer"])){
                $error["naam_klant"] = "naam_klant is leeg.";
            }elseif(is_numeric($_POST["name_costumer"])){
                $error["naam_klant"] = "Er mogen geen cijfers.";
            }else{
                $error["naam_klant"] = "naam_klant bevat ongeldige tekens.";
            }

            //Adres controle
            if(preg_match("/[A-Za-z0-9]+/", $_POST["adress_costumer"]) && !empty($_POST["adress_costumer"])){
                $adress_costumer= trimdata($_POST["adress_costumer"]);
                $data["adress_costumer"]= $adress_costumer;
            }elseif(empty($_POST["adress_costumer"])){
                $error["adress"] = "Adres is leeg.";
            }else{
                $error["adress"] = "Adres bestaat niet";
            }

        //telefoonnummer controle
            if(preg_match("/^[0-9]*$/", $_POST["tel_nmbr"])){
                $number= trimdata($_POST["tel_nmbr"]);
                $data["tel_nmbr"]= $number;
            }elseif(empty($_POST["tel_nmbr"])){
                $error["tel_nmbr"] = "Telefoontel_nmbr is leeg.";
            }else{
                $error["tel_nmbr"] = "Telefoontel_nmbr mag geen letters of tekens bevatten! ";
            }
            $data["editID"]= $_POST["editID"];
            
            echo $data["name_costumer"], ", ", $data["adress_costumer"], ", ",  $data["tel_nmbr"], ", ",  $data["editID"], "<br>";
            EditCostumer($data, $error);
        }
    }
}

/* ======== Controle Paarden ========*/
function ControleP(){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST["add_horse"])){
             //naam controle
            if(preg_match("/^([a-zA-Z' ]+)$/", $_POST["name"])){
                $name= trimdata($_POST["name"]);
                $data["name"]= $name;
            }elseif(empty($_POST["name"])){
                $error["naam"] = "Naam is leeg.";
            }elseif(is_numeric($_POST["name"])){
                $error["naam"] = "Er mogen geen cijfers.";
            }else{
                $error["naam"] = "Naam bevat ongeldige tekens of bestaat niet.";
            }
    
            //Ras controle
            if(preg_match("/^([a-zA-Z' ]+)$/", $_POST["newrace"])){
                $newrace= trimdata($_POST["newrace"]);
                $data["newrace"]= $newrace;
            }elseif(empty($_POST["newrace"])){
                $error["newrace"] = "Nieuwe newrace is leeg.";
            }elseif(is_numeric($_POST["newrace"])){
                $error["newrace"] = "Er mogen geen cijfers.";
            }else{
                $error["newrace"] = "Nieuwe newrace bevat ongeldige tekens of bestaat niet.";
            }
    
            $data["age"]= $_POST["age"];
            $data["show_jumping"]= $_POST["show_jumping"];
            $data["height"]= $_POST["height"];
    
            AddHorse($data, $error);
        }
         
        if(isset($_POST["update_horse"])){
            //nieuwe naam controle
            if(preg_match("/^([a-zA-Z' ]+)$/", $_POST["newname"])){
                $newname= trimdata($_POST["newname"]);
                $data["newname"]= $newname;
            }elseif(empty($_POST["newname"])){
                $error["nieuwenaam"] = "Nieuwe nieuwenaam is leeg.";
            }elseif(is_numeric($_POST["newname"])){
                $error["nieuwenaam"] = "Er mogen geen cijfers.";
            }else{
                $error["nieuwenaam"] = "Nieuwe nieuwenaam bevat ongeldige tekens of bestaat niet.";
            }
    
            //nieuwe ras controle
            if(preg_match("/^([a-zA-Z' ]+)$/", $_POST["race"])){
                $race= trimdata($_POST["race"]);
                $data["race"]= $race;
            }elseif(empty($_POST["race"])){
                $error["race"] = "Nieuwe race is leeg.";
            }elseif(is_numeric($_POST["race"])){
                $error["race"] = "Er mogen geen cijfers.";
            }else{
                $error["race"] = "Nieuwe race bevat ongeldige tekens of bestaat niet.";
            }
            $data["update_age"]= $_POST["update_age"];
            $data["update_show_jumping"]= $_POST["update_show_jumping"];
            $data["update_height"]= $_POST["update_height"];
            $data["updateID"]= $_POST["updateID"];

            ChangeHorse($data, $error);
        }else{
            echo "werkt niet update";
        }
    }
}

/* ======== Controle Reservering ========*/
function ControleR(){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST["add_reservation"])){
            if(preg_match("/^([a-zA-Z' ]+)$/", $_POST["name_resevator"])){
                $name_resevator= trimdata($_POST["name_resevator"]);
                $data["name_resevator"]= $name_resevator;
            }elseif(empty($_POST["name_resevator"])){
                $error["naam_reserveerder"] = "naam_reserveerder is leeg.";
            }elseif(is_numeric($_POST["name"])){
                $error["naam_reserveerder"] = "Er mogen geen cijfers.";
            }else{
                $error["naam_reserveerder"] = "naam_reserveerder bevat ongeldige tekens of bestaat niet.";
            }

            if(preg_match("/^([a-zA-Z' ]+)$/", $_POST["name_horse"])){
                $name_horse= trimdata($_POST["name_horse"]);
                $data["name_horse"]= $name_horse;
            }elseif(empty($_POST["name_horse"])){
                $error["naam_paard"] = "naam_paard is leeg.";
            }elseif(is_numeric($_POST["name"])){
                $error["naam_paard"] = "Er mogen geen cijfers.";
            }else{
                $error["naam_paard"] = "naam_paard bevat ongeldige tekens of bestaat niet.";
            }

            if(!is_numeric($_POST["race_horse"]) && isset($_POST["race_horse"]) && !empty($_POST["race_horse"])){
                $race_horse= trimdata($_POST["race_horse"]);
                $data["race_horse"]= $race_horse;
            }elseif(empty($_POST["race_horse"])){
                $error["ras_paard"] = "ras_paard is leeg.";
            }elseif(is_numeric($_POST["race_horse"])){
                $error["naam_paard"] = "Er mogen geen cijfers.";
            }else{
                $error["ras_paard"] = "Er mogen geen cijfers of tekens in ras_paard staan.";
            }

            $data["date"]= $_POST["date"];
            $data["start_time"]= $_POST["start_time"];
            $data["end_time"]= $_POST["end_time"];
            $data["editID"]= $_POST["editID"];
            
            storeReservation($data, $error);
        }
        
        if(isset($_POST["update_reservation"])){
            if(preg_match("/^([a-zA-Z' ]+)$/", $_POST["name_resevator"])){
                $name_resevator= trimdata($_POST["name_resevator"]);
                $data["name_resevator"]= $name_resevator;
            }elseif(empty($_POST["name_resevator"])){
                $error["naam_reserveerder"] = "naam_reserveerder is leeg.";
            }elseif(is_numeric($_POST["name"])){
                $error["naam_reserveerder"] = "Er mogen geen cijfers.";
            }else{
                $error["naam_reserveerder"] = "naam_reserveerder bevat ongeldige tekens of bestaat niet.";
            }

            if(preg_match("/^([a-zA-Z' ]+)$/", $_POST["naam_paard_update"])){
                $naam_paard_update= trimdata($_POST["naam_paard_update"]);
                $data["naam_paard_update"]= $naam_paard_update;
            }elseif(empty($_POST["naam_paard_update"])){
                $error["naam_paard_update"] = "naam_paard_update is leeg.";
            }elseif(is_numeric($_POST["naam_paard_update"])){
                $error["naam_paard_update"] = "Er mogen geen cijfers.";
            }else{
                $error["naam_paard_update"] = "naam_paard_update bevat ongeldige tekens of bestaat niet.";
            }

            if(!is_numeric($_POST["race_horse"]) && isset($_POST["race_horse"]) && !empty($_POST["race_horse"])){
                $race_horse= trimdata($_POST["race_horse"]);
                $data["race_horse"]= $race_horse;
            }elseif(empty($_POST["race_horse"])){
                $error["ras_paard"] = "ras_paard is leeg.";
            }elseif(is_numeric($_POST["race_horse"])){
                $error["naam_paard"] = "Er mogen geen cijfers.";
            }else{
                $error["ras_paard"] = "Er mogen geen cijfers of tekens in ras_paard staan.";
            }

            $data["date"]= $_POST["date"];
            $data["start_time"]= $_POST["start_time"];
            $data["end_time"]= $_POST["end_time"];
            $data["editID"]= $_POST["editID"];

            ChangeReservation($data, $error);
        }
    }
}

/* ======== Klanten CRUD ========*/

function storeCostumer($data, $error)
{
    //1. Maak een nieuwe medewerker aan met de data uit het formulier en sla deze op in de database
    AddCostumer($data, $error); 
    //2. Bouw een url op en redirect hierheen
    render('empty/riders', $error);
}

function EditCostumer($data, $error)
{
    //1. Update een bestaand persoon met de data uit het formulier en sla deze op in de database
    UpdateCostumer($data);
   
    //2. Bouw een url en redirect hierheen
    render('empty/riders', $error);
}

function RemoveCostumer(){
    $data = $_POST;
    if(isset($_POST["delete_costumer"])){
        DeleteCostumer($data);
        render('empty/riders');
    }else{
        render('empty/riders');
    }    
}

/* ======== Paarden CRUD ========*/

function AddHorse($data, $error)
{
    StoreHorse($data);
    render('empty/overviewhorses', $error);
}

function ChangeHorse($data, $error)  
{
    UpdateHorse($data);

    render('empty/overviewhorses', $error);
}

function RemoveHorse()
{
    $data = $_POST;
    //1. Delete een medewerker uit de database
    if(isset($_POST["delete_horse"])){
        DeleteHorse($data);
        render('empty/overviewhorses');   
    }else{
        render('empty/overviewhorses');   
    }
}

/* ======== Reserveringen CRUD ========*/

function StoreReservation($data, $error)
{
    AddReservation($data);
    render('empty/UD_reservation', $error);
}

function ChangeReservation($data, $error)  
{
    UpdateReservation($data);

    render('empty/myreservations', $error);
}

function RemoveReservation()
{
    $data= $_POST;
    if(isset($_POST["delete_reservation"])){
        DeleteReservation($data);
        render('empty/myreservations');   
    }else{
        render('empty/myreservations');    
    }

}

/* ======== Manege url's ========*/
function register()
{
    //1. Geef een view weer waarin een formulier staat voor het aanmaken van een medewerker
    render('empty/register');
}

function about()
{
    //1. Geef een view weer waarin een formulier staat voor het aanmaken van een medewerker
    render('empty/about');
}

function contact()
{
    //1. Geef een view weer waarin een formulier staat voor het aanmaken van een medewerker
    render('empty/contact');
}

function riders()
{
      //1. Geef een view weer waarin een formulier staat voor het aanmaken van een medewerker
      render('empty/riders');
}

function overviewhorses()
{
    //1. Geef een view weer waarin een formulier staat voor het aanmaken van een medewerker
    render('empty/overviewhorses');
}

function create_horse()
{
    render('empty/create_horse');
}

function DetailReservation($id)
{
    $horse= getCostumer($id, $tablename= "Paarden");
    render('empty/detailsreservation', $horse);
  
}

function myreservations(){
    render('empty/myreservations');
}

function getreservation($id){
    $info_reservation= getcostumer($id,$tablename= "Reserveringen");
    CalculatePrice($info_reservation);
}

function CalculatePrice($info_reservation){
    // €55 per uur

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
    $info_reservation["prijs"]= $price;
    render('empty/buyreservation', $info_reservation);
}

function update_horse($id){
    $info= getCostumer($id, $tablename= "Paarden");
    render('empty/update_horse', $info);
}

function delete_horse($id){
    $info= getCostumer($id, $tablename= "Paarden");
    render('empty/delete_horse', $info);
}

function create_reservation(){
    render('empty/create_reservation');
}

function update_reservation($id){
    $info2= getCostumer($id, $tablename= "Reserveringen");
    render('empty/update_reservation', $info2);
}

function update_costumer($id){
    $info3= getCostumer($id, $tablename= "Ruiters");
    render('empty/update_costumer', $info3);
}

function delete_costumer($id){
    $info4= getCostumer($id, $tablename= "Ruiters");
    render('empty/delete_costumer', $info4);
}

function delete_reservation($id){
    $info5= getCostumer($id, $tablename= "Reserveringen");
    render('empty/delete_reservation', $info5);
}