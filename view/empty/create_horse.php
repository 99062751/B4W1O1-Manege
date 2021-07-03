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
