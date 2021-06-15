<?php
	function checkConnection(){
	    try{ 
    		$conn = openDatabaseConnection(); 
	       	$stmt = $conn->prepare("SHOW TABLES");
       		$stmt->execute();
       		$stmt->fetchAll();
       		
	    }catch(Exception $e){
			return false;
	    }

	    return true;
	}


function getAllInfoFromTable($tablename= "Ruiters"){
  // Met het try statement kunnen we code proberen uit te voeren. Wanneer deze
  // mislukt kunnen we de foutmelding afvangen en eventueel de gebruiker een
  // nette foutmelding laten zien. In het catch statement wordt de fout afgevangen
   try {
       // Open de verbinding met de database
       $conn=openDatabaseConnection();
   
       // Zet de query klaar door middel van de prepare method
	   $stmt = $conn->prepare("SELECT * FROM $tablename");
	   //$stmt->bindParam(':tablename', $tablename);

       // Voer de query uit
       $stmt->execute();

       // Haal alle resultaten op en maak deze op in een array
       // In dit geval is het mogelijk dat we meedere medewerkers ophalen, daarom gebruiken we
       // hier de fetchAll functie.
       $result = $stmt->fetchAll();

   }
   // Vang de foutmelding af
   catch(PDOException $e){
       // Zet de foutmelding op het scherm
       echo "Function GetallInfoFromTable Error. Connection failed: " . $e->getMessage();
   }

   // Maak de database verbinding leeg. Dit zorgt ervoor dat het geheugen
   // van de server opgeschoond blijft
   $conn = null;

   // Geef het resultaat terug aan de controller
   return $result;


   //maak ook een animal tabel met naam id ras age geschikt voor springsport
   // voor pony's is hetzelfde maar geschiktheid voor springsport en wel schofthoogte belangrijk
   // ook nog een reservations table met id, klant, paard, datum, tijd
}	

function getCostumer($id){
    try {
        // Open de verbinding met de database
        $conn=openDatabaseConnection();
 
        // Zet de query klaar door midel van de prepare method. Voeg hierbij een
        // WHERE clause toe (WHERE id = :id. Deze vullen we later in de code
        $stmt = $conn->prepare("SELECT * FROM Ruiters WHERE id = :id");
        // Met bindParam kunnen we een parameter binden. Dit vult de waarde op de plaats in
        // We vervangen :id in de query voor het id wat de functie binnen is gekomen.
        $stmt->bindParam(":id", $id);

        // Voer de query uit
        $stmt->execute();

        // Haal alle resultaten op en maak deze op in een array
        // In dit geval weten we zeker dat we maar 1 medewerker op halen (de where clause), 
        //daarom gebruiken we hier de fetch functie.
        $result = $stmt->fetch();
 
    }
    catch(PDOException $e){

        echo "Function getCostumer Error. Connection failed: " . $e->getMessage();
    }
    // Maak de database verbinding leeg. Dit zorgt ervoor dat het geheugen
    // van de server opgeschoond blijft
    $conn = null;
 
    // Geef het resultaat terug aan de controller
    return $result;
 }

function trimdata($var){
    $var= trim($var);
    $var= stripslashes($var);
    $var= htmlspecialchars($var);
    return $var;
}

// CRUD klanten



function AddCostumer($data){
	// Maak hier de code om een medewerker toe te voegen
    try {
        $conn=openDatabaseConnection();
        
        $stmt = $conn->prepare("INSERT INTO Ruiters (naam, adres, telefoonnmr) VALUES(:naam, :adres, :telnmr)");
        $stmt->bindParam(':naam', $data["name"]);
        $stmt->bindParam(':adres', $data["adress"]);
        $stmt->bindParam(':telnmr', $data["nummer"]);
        $stmt->execute();
    }
    catch(PDOException $e){
        echo "Function AddCostumer Error. Connection failed: " . $e->getMessage();
    }

    $conn = null;
}

 function UpdateCostumer($data){
    // Maak hier de code om een medewerker te bewerken

    try {
        $conn=openDatabaseConnection();
  
        $stmt = $conn->prepare("UPDATE Ruiters SET naam=:name, adres=:adres, telefoonmr=:telnmr WHERE id = :id");
        $stmt->bindParam(':naam', $data["name"]);
        $stmt->bindParam(':adres', $data["adress"]);
        $stmt->bindParam(':telnmr', $data["nummer"]);
        $stmt->bindParam(':id', $data["id"]);
        $stmt->execute(); 
    }
    catch(PDOException $e){
        echo "Function UpdateCostumer Error. Connection failed: " . $e->getMessage();
    }
    $conn = null;
 }

 function DeleteCostumer($data){
     // Maak hier de code om een medewerker te verwijderen
     try {      
        $conn=openDatabaseConnection();

        $stmt = $conn->prepare("DELETE FROM Ruiters WHERE id = :id");
        $stmt->bindParam(':id', $data);
        $stmt->execute();  
    }
    catch(PDOException $e){
        echo "Function DeleteCostumer Error. Connection failed: " . $e->getMessage();
    }
    $conn = null;
 }

// CRUD paarden




function StoreHorse($data){
	// Maak hier de code om een medewerker toe te voegen
    try {
        $conn=openDatabaseConnection();
        
        $stmt = $conn->prepare("INSERT INTO Paarden (naam, leeftijd, ras, hoogte, springsport) VALUES(:naam, :leeftijd, :ras, :hoogte, :springsport)");
        $stmt->bindParam(':naam', $data["name"]);
        $stmt->bindParam(':leeftijd', $data["age"]);
        $stmt->bindParam(':ras', $data["race"]);
        $stmt->bindParam(':hoogte', $data["height"]);
        $stmt->bindParam(':springsport', $data["show_jumping"]);
        $stmt->execute();
    }
    catch(PDOException $e){
        echo "Function StoreHorse Error. Connection failed: " . $e->getMessage();
    }

    $conn = null;
}

 function UpdateHorse($data){
    // Maak hier de code om een medewerker te bewerken
    $oldname= $data["name"];

    try {
        $conn=openDatabaseConnection();
  
        $stmt = $conn->prepare("UPDATE Paarden SET naam=:newname, leeftijd=:leeftijd, ras= :ras, hoogte= :hoogte, springsport= :springsport   WHERE naam = :naam");
        $stmt->bindParam(':newname', $data["new-name"]);
        $stmt->bindParam(':leeftijd', $data["age"]);
        $stmt->bindParam(':ras', $data["race"]);
        $stmt->bindParam(':hoogte', $data["height"]);
        $stmt->bindParam(':springsport', $data["show_jumping"]);
        $stmt->bindParam(':naam', $oldname);
        $stmt->execute(); 
    }
    catch(PDOException $e){
        echo "Function UpdateCostumer Error. Connection failed: " . $e->getMessage();
    }
    $conn = null;
 }

 function DeleteHorse($data){
     // Maak hier de code om een medewerker te verwijderen
     try {      
        $conn=openDatabaseConnection();

        $stmt = $conn->prepare("DELETE FROM Paarden WHERE naam = :naam");
        $stmt->bindParam(':naam', $data["name"]);
        $stmt->execute();  
    }
    catch(PDOException $e){
        echo "Function DeleteHorse Error. Connection failed: " . $e->getMessage();
    }
    $conn = null;
 }
?>