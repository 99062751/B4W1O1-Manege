<?php
require(ROOT . "model/EmptyModel.php");


function index()
{
	$connection = checkConnection();
     render('empty/index', ['connection' => $connection]);
}

/* ======== Klanten CRUD ========*/

function register()
{
    //1. Geef een view weer waarin een formulier staat voor het aanmaken van een medewerker
    render('empty/register');
}

function storeCostumer()
{
    //1. Maak een nieuwe medewerker aan met de data uit het formulier en sla deze op in de database
    $data = $_POST;
    AddCostumer($data); 
    //2. Bouw een url op en redirect hierheen
    render('empty/index', );
}

function EditCostumer()
{
    //1. Update een bestaand persoon met de data uit het formulier en sla deze op in de database
    $data= $_POST;
    updateCostumer($data);
   
    //2. Bouw een url en redirect hierheen
    render('empty/riders');
}

function RemoveCostumer(){
    $data = $_POST;

    DeleteCostumer($data);
    render('empty/riders');
}

/* ======== Paarden CRUD ========*/

function AddHorse()
{
    $data = $_POST;
    StoreHorse($data);
    render('empty/overviewhorses');
}

function ChangeHorse()  
{
    $data = $_POST;
    UpdateHorse($data);

    render('empty/overviewhorses');
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
