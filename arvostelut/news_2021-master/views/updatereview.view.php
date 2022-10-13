<?php require "partials/head.php";

?>

<h2 class="centered">Elokuvan muokkaus</h2>

<div class="inputarea">
<form  action="/updatereview" method="post" >

    <label for="arvostelu">Arvostelu:</label>
    <textarea id="arvostelu" name="arvostelu" value=<?=$arvostelu["arvostelu"]?>></textarea>

    <label for="stars">Tähdet:</label>
    <input id="stars" name="stars" min="1" max="10" type="number" value=<?=$arvostelu["stars"]?>>

    <input type="hidden" id="arvosteluID" name="arvosteluID" value=<?=$arvostelu["arvosteluID"]?>>  
 <br>   <br>  <input id="sendbutton" type="submit" value="Lähetä">
</form>
</div>
<br>  <br> 

<?php require "partials/footer.php"; ?>