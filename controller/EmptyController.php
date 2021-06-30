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

    //Adres controle
    if(preg_match("/^[a-zA-Z0-9-,' ]*$/", $_POST["adress"]) && !empty($_POST["adress"])){
        $adress= trimdata($_POST["adress"]);
        $data["adress"]= $adress;
    }elseif(empty($_POST["adress"])){
        $error["adres"] = "Adres is leeg.";
    }else{
        $error["adres"] = "Adres bestaat niet.";
    }

  //telefoonnummer controle
    if(is_numeric($_POST["nummer"]) && isset($_POST["nummer"]) && !empty($_POST["nummer"])){
        $minDigits= 10; 
        $maxDigits= 14; 
        if(preg_match('/^[0-9]{'.$minDigits.','.$maxDigits.'}\z/', $_POST["nummer"])){
            $number= trimdata($_POST["nummer"]);
            $data["nummer"]= $number;
        }
    }elseif(empty($_POST["nummer"])){
        $error["nummer"] = "Telefoonnummer is leeg.";
    }else{
        $error["nummer"] = "Telefoonnummer mag geen letters of tekens bevatten! ";
    }
       
    if(isset($_POST["register_costumer"])){
        storeCostumer($data, $error);
    }elseif(isset($_POST["update_costumer"])){
        EditCostumer($data, $error);
    }
}

/* ======== Controle Paard ========*/
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
    
            if(isset($_POST["add_horse"])){
                AddHorse($data, $error);
            }elseif(isset($_POST["update_horse"])){
                ChangeHorse($data, $error);
            }
        }else{
            echo "werkt niet2";
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
        }else{
            echo "werkt niet1";
        }
    }
}

/* ======== Controle Reservering ========*/
function ControleR(){
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

    $data["start_time"]= $_POST["start_time"];
    $data["end_time"]= $_POST["end_time"];
    storeReservation($data, $error);
}

/* ======== Klanten CRUD ========*/

function storeCostumer($data, $error)
{
    //1. Maak een nieuwe medewerker aan met de data uit het formulier en sla deze op in de database
    AddCostumer($data, $error); 
    //2. Bouw een url op en redirect hierheen
    render('empty/register', $error);
}

function EditCostumer($data, $error)
{
    //1. Update een bestaand persoon met de data uit het formulier en sla deze op in de database
    updateCostumer($data);
   
    //2. Bouw een url en redirect hierheen
    render('empty/UD_costumers', $error);
}

function RemoveCostumer(){
    $data = $_POST;

    DeleteCostumer($data);
    render('empty/riders');
}

/* ======== Paarden CRUD ========*/

function AddHorse($data, $error)
{
    StoreHorse($data, $error);
    render('empty/UD_horses', $error);
}

function ChangeHorse($data, $error)  
{
    UpdateHorse($data);

    render('empty/UD_horses', $error);
}

function RemoveHorse()
{
    //1. Delete een medewerker uit de database
    $data= $_POST;
    DeleteHorse($data);
    //2. Bouw een url en redirect hierheen
    render('empty/overviewhorses');   
}

/* ======== Reserveringen CRUD ========*/

function StoreReservation()
{
    $data = $_POST;
    echo "lol";
    AddReservation($data);
    render('empty/myreservations');
}

function ChangeReservation()  
{
    $data = $_POST;
    UpdateReservation($data);

    render('empty/myreservations');
}

function RemoveReservation()
{
    //1. Delete een medewerker uit de database
    $data= $_POST;
    DeleteReservation($data);
    //2. Bouw een url en redirect hierheen
    render('empty/myreservations');   
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

function EditHorses()
{
    render('empty/UD_horses');
}

function Change(){
    render('empty/UD_reservation');
}

function DetailReservation($id)
{
    $horse= getCostumer($id, $tablename= "Paarden");
    render('empty/detailsreservation', $horse);
  
}

function myreservations(){
    render('empty/myreservations');
}

function ud_costumers(){
    render('empty/UD_costumers');
}


function getreservation($id){
    $info_reservation= getcostumer($id,$tablename= "Reserveringen");
    CalculatePrice($info_reservation);
}

function CalculatePrice($info_reservation){
    $start_time= strtotime($info_reservation["Begintijd"]);
    $end_time= strtotime($info_reservation["Eindtijd"]);

    $STH= date("H", $start_time);
    $STM= date("i", $start_time);

    $ETH= date("H", $end_time);
    $ETM= date("i", $end_time);

    $start_time = $STH. $STM; 
    $end_time= $ETH. $ETM; 

    $ans= $end_time- $start_time;
    $ans2= $ans / 60;


    $ans3= 55 / 60; 
    $price= $ans3 * $ans2;
    $info_reservation["prijs"]= $price;
    render('empty/buyreservation', $info_reservation);
}