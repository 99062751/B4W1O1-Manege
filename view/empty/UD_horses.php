<?php
        $horses= getAllInfoFromTable($tablename= "Paarden");
?>
<h2>Voeg nieuw paard toe:</h2>
    <form id="register" name="create" method="post" action="<?=URL?>empty/ControleP">
            <!-- bouw hier je formulier -->
            <label for="name">Naam:</label>
            <input name='name' type="text" placeholder="Naam"> 
            <p style="display: inline">* <?=$data["naam"]?></p>
            <br>
            <br>

            <label for="age">Leeftijd:</label>
            <input name='age' type="number" min="1" step="1" max="60" placeholder="26">
            <br>
            <br>

            <label for="newrace">Ras:</label>
            <input name='newrace' type="text" placeholder="Pony">
            <p style="display: inline">* <?=$data["newrace"]?></p>
            <br>
            <br>

            <label for="height">Hoogte in cm:</label>
            <input name='height' type="number" min="40" max="300" step="0.1" placeholder="185" value="">
            <br>
            <br>

            <label for="show_jumping">Kan springsport:</label>

            <select name='show_jumping' id="show_jumping">
                <option value="ja">ja</option>
                <option value="nee">nee</option>
            </select>
            <br>
            <br>

            <button name="add_horse" type="submit">Voeg toe</button>
    </form>

    <h2>Wijzig een paard:</h2>

<form id="register" name="update" method="post" action="<?=URL?>empty/ControleP">
        <!-- bouw hier je formulier -->
        <label for="updateID">ID paard die gewijzigd moet worden:</label>
            <select name="updateID" id="updateID">
                <?php foreach ($horses as $h => $horse) {  ?>     
                <option value="<?=$horse["id"]?>"><?=$horse["naam"]?></option>

                <?php        } ?>
                </select>
        <br>
        <br>

        <label for="newname">Nieuwe naam:</label>
        <input name='newname' type="text" placeholder="Truus" value="<?=$name?>">
        <p style="display: inline">* <?=$data["nieuwenaam"]?></p>
        <br>
        <br>

        <label for="update_age">Leeftijd:</label>
        <input name='update_age' type="number" min="1" step="1" max="60" placeholder="26" value="<?=$adress?>">
        <br>
        <br>

        <label for="race">Ras:</label>
        <input name='race' type="text" placeholder="Pony" value="<?=$adress?>">
        <p style="display: inline">* <?=$data["race"]?></p>
        <br>
        <br>

        <label for="update_height">Hoogte in cm:</label>
        <input name='update_height' type="number" min="40" max="300" step="0.1" placeholder="185">
        <br>
        <br>

        <label for="update_show_jumping">Kan springsport:</label>

        <select name='update_show_jumping' id="update_show_jumping">
        <option value="ja">ja</option>
        <option value="nee">nee</option>
        </select>
        <br>
        <br>

        <button name="update_horse" type="submit">Wijzig</button>
</form>

<h2>Verwijder een paard:</h2>
<form id="register" name="create" method="post" action="<?=URL?>empty/RemoveHorse">
        <!-- bouw hier je formulier -->
        <label for="id">Naam paard die gewijzigd moet worden:</label>
            <select name="id" id="id">
                <?php foreach ($horses as $h => $horse) {  ?>     
                <option value="<?=$horse["id"]?>"><?=$horse["naam"]?></option>

                <?php        } ?>
                </select>
        <br>
        <br>

        <button type="submit">Verwijder</button>

</form>