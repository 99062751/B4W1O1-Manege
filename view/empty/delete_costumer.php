<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verwijder klant</title>
</head>
<body>
<h2>Verwijder een reservering:</h2>
<form id="register" name="create" method="post" action="<?=URL?>empty/RemoveCostumer">
        <!-- bouw hier je formulier -->
        <label for="id">Weet u zeker dat u deze klant wilt verwijderen?</label>
        <input name="costumerID" type="hidden" value="<?=$data["id"]?>">

       

        <br>
        <br>
        <button name="back"type="submit">Nee, breng mij terug</button>
        <button name="delete_costumer" type="submit">Ja</button>

</form>  
</body>
</html>