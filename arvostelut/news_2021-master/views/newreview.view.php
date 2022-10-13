<?php require "partials/head.php"; 
require_once "database/models/movie.php";
$pdo = connectDB();
$movies = getAllmovies($pdo);
?>

<h2 class="centered">Syötä arvionti</h2>

<div class="inputarea">
<form  action="/review" method="post">

    <label for="stars">Tähdet elokuvalle:</label>
    <input id="stars" type="number" name="stars" min="1" max="10">
    
    <label for="arvostelu">Arvostelu:</label>
    <textarea id="arvostelu" name="arvostelu"></textarea>

    <label for="lisayspvm">Arvionti päivämäärä:</label>
    <input id="lisayspvm"  type="datetime-local" name="lisayspvm">
    <br>       <br>  
    <select required class="form-select" name="elokuvaID" id="elokuvaID">
        <?php
            foreach($movies as $movie):?>
                <option value="<?= $movie["elokuvaID"]?>"><?= $movie["elokuva"] ?></option>
        <?php endforeach;?>
    </select>
    <label for="elokuvaID">Valitse elokuva</label>

                  <br>       <br>  
    <input id="sendbutton" type="submit" value="Lähetä">
</form>
</div>

<?php require "partials/footer.php"; ?>