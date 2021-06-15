<h2>Voeg nieuw paard toe:</h2>
    <form id="register" name="create" method="post" action="<?=URL?>empty/AddHorse">
            <!-- bouw hier je formulier -->
            <label for="name">Naam:</label>
            <input name='name' type="text" placeholder="Naam" value="<?=$name?>">
            <br>
            <br>

            <label for="age">Leeftijd:</label>
            <input name='age' type="number" min="1" step="1" max="60" placeholder="26" value="<?=$adress?>">
            <br>
            <br>

            <label for="race">Ras:</label>
            <input name='race' type="text" placeholder="Pony" value="<?=$adress?>">
            <br>
            <br>

            <label for="height">Hoogte in cm:</label>
            <input name='height' type="number" min="40" max="300" step="0.1" placeholder="185" value="<?=$number?>">
            <br>
            <br>

            <label for="show_jumping">Kan springsport:</label>
            <input name='show_jumping' type="text" placeholder="ja" value="<?=$number?>">

            <!-- <label for="show_jumping">Kan springsport:</label>
            <select name='show_jumping' id="">
                <option value="">ja</option>
                <option value="">nee</option>
            </select> -->
            <br>
            <br>

            <button type="submit">Voeg toe</button>
    </form>

    <h2>Wijzig een paard:</h2>

<form id="register" name="create" method="post" action="<?=URL?>empty/ChangeHorse">
        <!-- bouw hier je formulier -->
        <label for="name">Wie wil je wijzigen:</label>
        <input name='name' type="text" placeholder="Naam van het paard" value="<?=$name?>">
        <br>
        <br>

        <label for="new-name">Nieuwe naam:</label>
        <input name='new-name' type="text" placeholder="Truus" value="<?=$name?>">
        <br>
        <br>

        <label for="age">Leeftijd:</label>
        <input name='age' type="number" min="1" step="1" max="60" placeholder="26" value="<?=$adress?>">
        <br>
        <br>

        <label for="race">Ras:</label>
        <input name='race' type="text" placeholder="Pony" value="<?=$adress?>">
        <br>
        <br>

        <label for="height">Hoogte in cm:</label>
        <input name='height' type="text" placeholder="185" value="<?=$number?>">
        <br>
        <br>

        <label for="show_jumping">Kan springsport:</label>
        <input name='show_jumping' type="text" placeholder="ja" value="<?=$number?>">
        <br>
        <br>

        <button type="submit">Wijzig</button>
</form>

<h2>Verwijder een paard:</h2>
<form id="register" name="create" method="post" action="<?=URL?>empty/RemoveHorse">
        <!-- bouw hier je formulier -->
        <label for="name">Naam paard:</label>
        <input name='name' type="text" placeholder="Naam" value="<?=$name?>">
        <br>
        <br>

        <button type="submit">Verwijder</button>

</form>