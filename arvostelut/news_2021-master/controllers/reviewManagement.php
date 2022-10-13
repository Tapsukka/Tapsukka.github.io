<?php
require_once "database/models/review.php";

require_once "libraries/cleaners.php";

function viewreviewController(){
    $allreviews = getAllreviews();
    require "views/moviereview.view.php";    
}

function addreviewController(){
    if(isset($_POST['stars'], $_POST['arvostelu'], $_POST['lisayspvm'], $_POST['elokuvaID'])){
        
        $stars = cleanUpInput($_POST['stars']);
        $arvostelu = cleanUpInput($_POST['arvostelu']);   
        $lisayspvm = cleanUpInput($_POST['lisayspvm']);   
        $elokuvaID = cleanUpInput($_POST['elokuvaID']);   
      
        addreview($stars, $arvostelu, $lisayspvm, $elokuvaID, $_SESSION['userid']);
        header("Location: /");   
    } else {
        require "views/newreview.view.php";
        
    }
}

function editreviewController(){
    try {
        if(isset($_GET["id"])){
            $id = cleanUpInput($_GET["id"]);
            $arvosteluja = getreviewById($id);
        } else {
            echo "Virhe: id puuttuu ";    
        }
    } catch (PDOException $e){
        echo "Virhe uutista haettaessa: " . $e->getMessage();
    }
    
    if($arvosteluja){
        $id = $arvosteluja['arvosteluID'];
        
        $stars = $arvosteluja['stars']; 
        $reviewtext = $arvosteluja['arvostelu'];
        $releasedate = $arvosteluja['lisayspvm'];
        $moviename = $arvosteluja['elokuvanimi'];
        $id = $arvosteluja['arvosteluID'];
        
        
        require "views/updateArticle.view.php";
    } else {
        header("Location: /");
        exit;
    }
}

function updatereviewController(){
    if(isset($_POST['stars'], $_POST['arvostelu'], $_POST["arvosteluID"])){
        $stars = cleanUpInput($_POST['stars']);
        $arvostelu = cleanUpInput($_POST['arvostelu']);
        $arvosteluID = cleanUpInput($_POST['arvosteluID']);
        updatereview($stars, $arvostelu, $arvosteluID);
        header("Location: /");    
    } else {
        if(isset($_GET['id'])){
            $arvosteluID = cleanUpInput($_GET['id']);
            $arvostelu = getreviewById($arvosteluID);

        require "views/updatereview.view.php";
        }
    }
}



function deletereviewController(){
    if(isLoggedIn()){
        if(isset($_POST["arvosteluID"])){
            $arvosteluID = cleanUpInput($_POST["arvosteluID"]);
            deletereview($arvosteluID);
            header('Location: /');
        } else {
            echo "Virhe: id puuttuu ";    
        }
    }
}







