
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h2>Verwijder een paard:</h2>
<form id="register" name="create" method="post" action="<?=URL?>empty/RemoveHorse">
        <!-- bouw hier je formulier -->
        <label for="id">Weet u zeker dat u <?=$data["naam"]; ?> wilt verwijderen?</label>
        <input name="deleteID" type="hidden" value="<?=$data["id"]?>">
        <br>
        <br>
        <button name="delete_horse"type="submit">Ja</button>
        <button name="back"type="submit">Nee, breng mij terug</button>
</form>
</body>
</html>