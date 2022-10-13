<?php
require_once "database/connection.php";

function getAllmovies(){
    $pdo = connectDB();
    $sql = "SELECT * FROM movies";
    $stm = $pdo->query($sql);
    $all = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $all;
}

function addmovie($julkaisuvuosi, $kuvaus, $ohjaaja, $elokuva, $kuva){
    $pdo = connectDB();
    $data = [$julkaisuvuosi, $kuvaus, $ohjaaja, $elokuva, $kuva];
    $sql = "INSERT INTO movies (julkaisuvuosi, kuvaus, ohjaaja, elokuva, kuva) VALUES(?,?,?,?,?)";
    $stm=$pdo->prepare($sql);
    return $stm->execute($data);
}

function getmovieById($elokuvaID){
    $pdo = connectDB();
    $sql = "SELECT * FROM movies WHERE elokuvaID=?";
    $stm= $pdo->prepare($sql);
    $stm->execute([$elokuvaID]);
    $all = $stm->fetch(PDO::FETCH_ASSOC);
    return $all;
}

function deletemovie($elokuvaID){
    $pdo = connectDB();
    $sql = "DELETE FROM movies WHERE elokuvaID=?";
    $stm=$pdo->prepare($sql);
    return $stm->execute([$elokuvaID]);
}

function updatemovie($kuvaus, $ohjaaja, $elokuva, $elokuvaID){
    $pdo = connectDB();
    $data = [$kuvaus, $ohjaaja, $elokuva, $elokuvaID];
    $sql = "UPDATE movies SET kuvaus = ?, ohjaaja = ?, elokuva = ? WHERE elokuvaID = ?";
    $stm = $pdo->prepare($sql);
    return $stm->execute($data);
}