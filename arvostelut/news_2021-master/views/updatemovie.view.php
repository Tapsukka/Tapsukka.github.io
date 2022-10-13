<?php require "partials/head.php";

?>

<h2 class="centered">Elokuvan muokkaus</h2>

<div class="inputarea">
<form  action="/updatemovie" method="post" >

    <label for="elokuva">Elokuva:</label>
    <input id="elokuva" name="elokuva" value=<?=$elokuva["elokuva"]?>>
    
    <label for="kuvaus">Kuvaus:</label>
    <textarea id="kuvaus" name="kuvaus" value=<?=$elokuva["kuvaus"]?>></textarea>

    <label for="ohjaaja">Ohjaaja:</label>
    <input id="ohjaaja" name="ohjaaja"  value=<?=$elokuva["ohjaaja"]?>>
  
    <input type="hidden" id="elokuvaID" name="elokuvaID" value=<?=$elokuva["elokuvaID"]?>>  
    <input id="sendbutton" type="submit" value="Lähetä">
</form>
</div>

<?php require "partials/footer.php"; ?>