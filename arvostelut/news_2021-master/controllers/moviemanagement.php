<?php
require_once "database/models/movie.php";

require_once "libraries/cleaners.php";



function addmovieController(){
    if(isset($_POST['julkaisuvuosi'], $_POST['kuvaus'], $_POST['ohjaaja'], $_POST['elokuva'], $_POST['kuva'])){
        $julkaisuvuosi = cleanUpInput($_POST['julkaisuvuosi']);
        $kuvaus = cleanUpInput($_POST['kuvaus']);
        $ohjaaja = cleanUpInput($_POST['ohjaaja']);
        $elokuva = cleanUpInput($_POST['elokuva']);
        $kuva = cleanUpInput($_POST['kuva']);
        addmovie($julkaisuvuosi, $kuvaus, $ohjaaja, $elokuva, $kuva);
        header("Location: /");    
    } else {
        require "views/newmovie.view.php";
    }
}

function editmovieController(){
    try {
        if(isset($_GET["id"])){
            $id = cleanUpInput($_GET["id"]);
            $movies = getmovieById($id);
        } else {
            echo "Virhe: id puuttuu ";    
        }
    } catch (PDOException $e){
        echo "Virhe uutista haettaessa: " . $e->getMessage();
    }
    
    if($movies){
        $id = $movies['elokuvaID'];
        
        $movienames = $movies['nimi']; 
        $director = $movies['ohjaaja'];
        $descriptions = $movies['kuvaus'];
        $releaseyear = $movies['julkaisuvuosi'];
       
        $id = $movies['elokuvaID'];
        
        require "views/updatemovie.view.php";
    } else {
        header("Location: /");
        exit;
    }
}

function updatemovieController(){
    if(isset( $_POST['kuvaus'], $_POST['ohjaaja'], $_POST['elokuva'], $_POST['elokuvaID'])){
         
   
        $kuvaus = cleanUpInput($_POST['kuvaus']);
        $ohjaaja = cleanUpInput($_POST['ohjaaja']);
        $elokuva = cleanUpInput($_POST['elokuva']);
        $elokuvaID = cleanUpInput($_POST['elokuvaID']);
        updatemovie($kuvaus, $ohjaaja, $elokuva, $elokuvaID);
        header("Location: /");    
      }  else {
        if(isset($_GET['id'])){
            $elokuvaID = cleanUpInput($_GET['id']);
           
          $elokuva = getmovieById($elokuvaID);
         
           require "views/updatemovie.view.php";
        }
    }
}



function deletemovieController(){


if(isLoggedIn()){
if(isset($_POST["elokuvaID"])){
$elokuvaID = cleanUpInput($_POST["elokuvaID"]);
    
deletemovie($elokuvaID);
header('Location: /');
        }
    }
}
