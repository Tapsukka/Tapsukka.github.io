<?php require "partials/head.php";
$pdo = connectDB();
$review = getAllreviews($pdo);
$movie  = getAllmovies($pdo);

?>

<h2 class="centered">Lue elokuva</h2>


<?php
    foreach($movie as $movieitem): ?><br>
         <div class ="movie">
          <div class='movieitem'> 
 
        <p>Elokuva numero: <?=$movieitem["elokuvaID"]?></p>
        <p>Elokuva nimi: <?=$movieitem["elokuva"]?></p>
        <p>Elokuva kuvaus: <?=$movieitem["kuvaus"]?> </p>
        <p>Elokuva ohjaaja: <?=$movieitem["ohjaaja"]?>   </p>
        <p>Elokuva julkaisuvuosi: <?=$movieitem["julkaisuvuosi"]?>  </p>
        <img src=<?=$movieitem["kuva"]?>  />
        <?php   if(isLoggedIn()){ ?>   
        <form method="POST" action="/delete">
    <input type="hidden" name="elokuvaID" value="<?=$movieitem['elokuvaID']?>">
    <button type="submit">Poista</button>  </form>
 <br>  <a href='/updatemovie?id=<?=$movieitem['elokuvaID']?>'>Päivitä</a> <?php }?> 
 </div>
</div>
        <?php endforeach ?>
<br>  <h2 class="centered">Lue arvio</h2>
<?php foreach($review as $reviewitem): ?>
    <div class = "review">  
        <div class='reviewitem'>
        <p>Tähtiä: <?=$reviewitem["stars"]?></p>
        <p>Arvio: <?=$reviewitem["arvostelu"]?> </p>
        <p>Lisayspvm: <?=$reviewitem["lisayspvm"]?>   </p>
        <p>Elokuva numero: <?=$reviewitem["elokuvaID"]?>   </p>
        <p>Käyttäjä: <?=$reviewitem["userid"]?>   </p>
       
   <?php if(isLoggedIn() && $_SESSION['userid'] && $_SESSION['userid']==$reviewitem['userid']): ?>   
  
        <form method="POST" action="/deletereview">
    <input type="hidden" name="arvosteluID" value="<?= $reviewitem['arvosteluID']?>">
      <button type="submit">Poista</button>  
       </form><br>  <a href='/updatereview?id=<?=$reviewitem['arvosteluID']?>'>Päivitä</a>  </div>  
 
    <?php endif;?> </div>   <br> <?php endforeach ?>      


<?php require "partials/footer.php"; ?>