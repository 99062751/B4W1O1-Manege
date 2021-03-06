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

    function getCostumer($id, $tablename= "Ruiters"){
        try {
            // Open de verbinding met de database
            $conn=openDatabaseConnection();

            if (!empty($id) && is_numeric($id) && isset($id) && ($tablename == "Reserveringen" || $tablename == "Ruiters" || $tablename == "Paarden")) {
                // Zet de query klaar door midel van de prepare method. Voeg hierbij een
                // WHERE clause toe (WHERE id = :id. Deze vullen we later in de code
                $stmt = $conn->prepare("SELECT * FROM `$tablename` WHERE id = :id");
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

    // CRUD klanten

    function AddCostumer($data){
        // Maak hier de code om een medewerker toe te voegen
        if((!empty($data["name_costumer"]) && !empty($data["adress_costumer"]) && !empty($data["tel_nmbr"]))){ 
            echo "werkt wel";
            try {
                $conn=openDatabaseConnection();
                
                $stmt = $conn->prepare("INSERT INTO Ruiters (naam, adres, telefoonnmr) VALUES(:naam, :adres, :telnmr)");
                $stmt->bindParam(':naam', $data["name_costumer"]);
                $stmt->bindParam(':adres', $data["adress_costumer"]);
                $stmt->bindParam(':telnmr', $data["tel_nmbr"]);
                $stmt->execute();
            }
            catch(PDOException $e){
                echo "Function AddCostumer Error. Connection failed: " . $e->getMessage();
            }
        }
        $conn = null;
    }

    function UpdateCostumer($data){
        if(!empty($data["name_costumer"]) && !empty($data["adress_costumer"]) && !empty($data["tel_nmbr"])){ 
            // Maak hier de code om een medewerker te bewerken
            try {
                $conn=openDatabaseConnection();

                $stmt = $conn->prepare("UPDATE Ruiters SET naam=:naam, adres=:adres, telefoonnmr=:telnmr WHERE id = :id");
                $stmt->bindParam(':naam', $data["name_costumer"]);
                $stmt->bindParam(':adres', $data["adress_costumer"]);
                $stmt->bindParam(':telnmr', $data["tel_nmbr"]);
                $stmt->bindParam(':id', $data["editID"]);
                $stmt->execute(); 
            }
            catch(PDOException $e){
                echo "Function UpdateCostumer Error. Connection failed: " . $e->getMessage();
            }
            $conn = null;
        }else{
            echo "niet waar :(";
        }
    }

    function DeleteCostumer($data){
        // Maak hier de code om een medewerker te verwijderen
        try {      
            $conn=openDatabaseConnection();

            $stmt = $conn->prepare("DELETE FROM Ruiters WHERE id = :id");
            $stmt->bindParam(':id', $data["costumerID"]);
            $stmt->execute();  
        }
        catch(PDOException $e){
            echo "Function DeleteCostumer Error. Connection failed: " . $e->getMessage();
        }
        $conn = null;
    }

    // CRUD paarden

    function StoreHorse($data){
        echo $error["name_horse"];
        // Maak hier de code om een medewerker toe te voegen
        if((!empty($data["name"]) && !empty($data["newrace"]) && !empty($data["age"]) && !empty($data["height"]) && !empty($data["show_jumping"]))){ 
            try {
                $conn=openDatabaseConnection();
                
                $stmt = $conn->prepare("INSERT INTO Paarden (naam, leeftijd, ras, hoogte, springsport) VALUES(:naam, :leeftijd, :ras, :hoogte, :springsport)");
                $stmt->bindParam(':naam', $data["name"]);
                $stmt->bindParam(':leeftijd', $data["age"]);
                $stmt->bindParam(':ras', $data["newrace"]);
                $stmt->bindParam(':hoogte', $data["height"]);
                $stmt->bindParam(':springsport', $data["show_jumping"]);
                $stmt->execute();
            }
            catch(PDOException $e){
                echo "Function StoreHorse Error. Connection failed: " . $e->getMessage();
            }

            $conn = null;
        }
    }

    function UpdateHorse($data){
        // Maak hier de code om een medewerker te bewerken
        if((!empty($data["newname"]) && !empty($data["race"]) && !empty($data["update_age"]) && !empty($data["update_height"]) && !empty($data["update_show_jumping"]))){ 
            try {
                $conn=openDatabaseConnection();

                $stmt = $conn->prepare("UPDATE Paarden SET naam=:newname, leeftijd=:leeftijd, ras= :ras, hoogte= :hoogte, springsport= :springsport WHERE id = :updateID");
                $stmt->bindParam(':newname', $data["newname"]);
                $stmt->bindParam(':leeftijd', $data["update_age"]);
                $stmt->bindParam(':ras', $data["race"]);
                $stmt->bindParam(':hoogte', $data["update_height"]);
                $stmt->bindParam(':springsport', $data["update_show_jumping"]);
                $stmt->bindParam(':updateID', $data["updateID"]);
                $stmt->execute(); 
            }
            catch(PDOException $e){
                echo "Function UpdateCostumer Error. Connection failed: " . $e->getMessage();
            }
            $conn = null;
        }
    }

    function DeleteHorse($data){
        if(!empty($data["deleteID"]) && is_numeric($data["deleteID"])){     
            // Maak hier de code om een medewerker te verwijderen
            try {      
                $conn=openDatabaseConnection();

                $stmt = $conn->prepare("DELETE FROM Paarden WHERE id = :id");
                $stmt->bindParam(':id', $data["deleteID"]);
                $stmt->execute();  
            }
            catch(PDOException $e){
                echo "Function DeleteHorse Error. Connection failed: " . $e->getMessage();
            }
            $conn = null;
        }
    }

    //CRUD reserveringen

    function AddReservation($data){
        if((!empty($data["name_resevator"]) && !empty($data["name_horse"]) && !empty($data["date"]) && !empty($data["start_time"]) && !empty($data["end_time"]))){ 
            // Maak hier de code om een medewerker toe te voegen
    
            try {
                $conn=openDatabaseConnection();
                
                $stmt = $conn->prepare("INSERT INTO Reserveringen (ruiter, paard, datum, Begintijd, Eindtijd) VALUES(:ruiter, :paard, :datum, :Begintijd, :Eindtijd)");
                $stmt->bindParam(':ruiter', $data["name_resevator"]);
                $stmt->bindParam(':paard', $data["name_horse"]);
                $stmt->bindParam(':datum', $data["date"]);
                $stmt->bindParam(':Begintijd', $data["start_time"]);
                $stmt->bindParam(':Eindtijd', $data["end_time"]);
                $stmt->execute();
            }
            catch(PDOException $e){
                echo "Function AddReservation Error. Connection failed: " . $e->getMessage();
            }

            $conn = null;
        }
    }

    function UpdateReservation($data){
        echo $data["name_resevator"], $data["naam_paard_update"], $data["date"], $data["start_time"], $data["end_time"], $data["editID"];
        if((!empty($data["name_resevator"]) && !empty($data["naam_paard_update"]) && !empty($data["date"]) && !empty($data["start_time"]) && !empty($data["end_time"]))){ 
            // Maak hier de code om een medewerker te bewerken
            try {
                $conn=openDatabaseConnection();

                $stmt = $conn->prepare("UPDATE Reserveringen SET ruiter=:ruiter, paard=:paard, datum=:datum, Begintijd=:Begintijd, Eindtijd=:Eindtijd  WHERE id = :id");
                $stmt->bindParam(':ruiter', $data["name_resevator"]);
                $stmt->bindParam(':paard', $data["naam_paard_update"]);
                $stmt->bindParam(':datum', $data["date"]);
                $stmt->bindParam(':Begintijd', $data["start_time"]);
                $stmt->bindParam(':Eindtijd', $data["end_time"]);
                $stmt->bindParam(':id', $data["editID"]);
                $stmt->execute(); 
            }
            catch(PDOException $e){
                echo "Function UpdateReservation Error. Connection failed: " . $e->getMessage();
            }
            $conn = null;
        }
    }

    function DeleteReservation($data){
        if(!empty($data["reservationID"]) && is_numeric($data["reservationID"])){ 
            // Maak hier de code om een medewerker te verwijderen
            try {      
                $conn=openDatabaseConnection();

                $stmt = $conn->prepare("DELETE FROM Reserveringen WHERE id = :id");
                $stmt->bindParam(':id', $data["reservationID"]);
                $stmt->execute();  
            }
            catch(PDOException $e){
                echo "Function DeleteReservation Error. Connection failed: " . $e->getMessage();
            }
            $conn = null;
        }else{
            echo "id is vals";
        }
    }
