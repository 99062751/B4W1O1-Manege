<?php
require(ROOT . "model/EmptyModel.php");


function index()
{
	$connection = checkConnection();
     render('empty/index', ['connection' => $connection]);
}

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

function EditCostumer($id)
{
    //1. Haal een medewerker op met een specifiek id en sla deze op in een variable
    $employee= getCostumer($id);

    //2. Geef een view weer voor het updaten en geef de variable met medewerker hieraan mee
    render('empty/update', $employee);
}

function SaveCostumer($id)
{
    //1. Update een bestaand persoon met de data uit het formulier en sla deze op in de database
    $data= $id;
    updateCostumer($data);
   
    //2. Bouw een url en redirect hierheen
    render('empty/index');
}

// function AlertCostumer($id){
//     //1. Haal een medewerker op met een specifiek id en sla deze op in een variable
//     $employee= get($id);
//     //2. Geef een view weer voor het verwijderen en geef de variable met medewerker hieraan mee
//     render('empty/delete', $employee);
// }

function RemoveHorse()
{
    //1. Delete een medewerker uit de database
    $data= $_POST;
    DeleteHorse($data);
    //2. Bouw een url en redirect hierheen
    render('empty/overviewhorses');   
}

function riders()
{
      //1. Geef een view weer waarin een formulier staat voor het aanmaken van een medewerker
      render('empty/riders');
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

function overviewhorses()
{
    //1. Geef een view weer waarin een formulier staat voor het aanmaken van een medewerker
    render('empty/overviewhorses');
}

function DetailsReservation()
{
    render('empty/detailsreservation');
}

function EditHorses()
{
    render('empty/UD_reservation');
}

function ChangeHorse()  
{
    $data = $_POST;
    UpdateHorse($data);

    render('empty/overviewhorses');
}
function AddHorse()
{
    $data = $_POST;
    StoreHorse($data);
    render('empty/overviewhorses');
}