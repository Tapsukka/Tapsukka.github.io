<?php
require_once "database/connection.php";

function getAllreviews(){
    $pdo = connectDB();
    $sql = "SELECT * FROM arvosteluja";
    $stm = $pdo->query($sql);
    $all = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $all;
}

function addreview($stars, $arvostelu, $lisayspvm,  $elokuvaID, $userid){
    $pdo =connectDB();
    $data = [$stars, $arvostelu, $lisayspvm, $elokuvaID, $userid];
    $sql = "INSERT INTO arvosteluja (stars, arvostelu, lisayspvm, elokuvaID, userid) VALUES(?,?,?,?,?)";
    $stm=$pdo->prepare($sql);
    return $stm->execute($data);
}

function getreviewById($arvosteluID){
    $pdo = connectDB();
    $sql = "SELECT * FROM arvosteluja WHERE arvosteluID=?";
    $stm= $pdo->prepare($sql);
    $stm->execute([$arvosteluID]);
    $all = $stm->fetch(PDO::FETCH_ASSOC);
    return $all;
}

function deletereview($arvosteluID){
    $pdo = connectDB();
    $sql = "DELETE FROM arvosteluja WHERE arvosteluID = ?";
    $stm=$pdo->prepare($sql);
    return $stm->execute([$arvosteluID]);
}

function updatereview($stars, $arvostelu, $arvosteluID){
    $pdo = connectDB();
    $data = [$stars, $arvostelu, $arvosteluID];
    $sql = "UPDATE arvosteluja SET stars = ?, arvostelu = ? WHERE arvosteluID = ?";
    $stm = $pdo->prepare($sql);
    return $stm->execute($data);
}