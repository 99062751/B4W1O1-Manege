<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Wijzig een paard:</h2>

<form id="register" name="update" method="post" action="<?=URL?>empty/ControleP">
        <!-- bouw hier je formulier -->
       
        <label for="newname">Naam:</label>
        <input name='newname' type="text" placeholder="Truus" value="<?=$data['naam']?>">
        <p style="display: inline">* <?=$data["nieuwenaam"]?></p>
        <br>
        <br>
        <input name="updateID" type="hidden" value="<?=$data["id"]?>">

        <label for="update_age">Leeftijd:</label>
        <input name='update_age' type="number" min="1" step="1" max="60" placeholder="26" value="<?=$data['leeftijd']?>">
        <br>
        <br>

        <label for="race">Ras:</label>
        <input name='race' type="text" placeholder="Pony" value="<?=$data['ras']?>">
        <p style="display: inline">* <?=$data["race"]?></p>
        <br>
        <br>

        <label for="update_height">Hoogte in cm:</label>
        <input name='update_height' type="number" min="40" max="300" step="0.1" placeholder="185" value="<?=$data['hoogte']?>">
        <br>
        <br>

        <label for="update_show_jumping">Kan springsport:</label>

        <select name='update_show_jumping' id="update_show_jumping" value="<?=$data['springsport']?>">
        <option value="ja">ja</option>
        <option value="nee">nee</option>
        </select>
        <br>
        <br>

        <button name="update_horse" type="submit">Wijzig</button>
</form>

</body>
</html>