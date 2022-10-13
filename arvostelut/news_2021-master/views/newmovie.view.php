<?php require "partials/head.php"; ?>

<h2 class="centered">Syötä elokuva</h2>

<div class="inputarea">
<form  action="/movie" method="post">

    <label for="elokuva">Elokuva:</label>
    <input id="elokuva" type="text" name="elokuva">
    
    <label for="kuvaus">Kuvaus:</label>
    <textarea id="kuvaus" name="kuvaus"></textarea>

    <label for="ohjaaja">Ohjaaja:</label>
    <input id="ohjaaja" type="text" name="ohjaaja">
    
    <label for="julkaisuvuosi">Valitse elokuvan päivämäärä</label>
    <input id="julkaisuvuosi" type="datetime-local"  name="julkaisuvuosi" > 

    <label for="kuva">Kuva:</label><br>
    <input id="kuva" type="text" name="kuva"> 
    <br>  <br>
    
    

    <input id="sendbutton" type="submit" value="Lähetä">
</form>
</div>

<?php require "partials/footer.php"; ?>