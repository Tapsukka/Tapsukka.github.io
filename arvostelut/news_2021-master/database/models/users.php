<?php
require_once "database/connection.php";

function getUser($pdo, $username){
    $sql = "select * from users where username=?";
    $statement = $pdo->prepare($sql);
    $statement->execute([$username]);
    $user = $statement->fetch(PDO::FETCH_DEFAULT);
    return $user;

}

function addUser($firstname, $lastname, $username, $password){
    $pdo = connectDB();
    $hashedpassword = hashPassword($password);
    $data = [$firstname, $lastname, $username, $hashedpassword];
    $sql = "INSERT INTO users (firstname, lastname, username, password) VALUES(?,?,?,?)";
    $stm=$pdo->prepare($sql);
    return $stm->execute($data);
}

function login($username, $password){
    $pdo = connectDB();
    $sql = "SELECT * FROM users WHERE username=?";
    $stm= $pdo->prepare($sql);
    $stm->execute([$username]);
    $user = $stm->fetch(PDO::FETCH_ASSOC);
    $hashedpassword = $user["password"];

    if($hashedpassword && password_verify($password, $hashedpassword))
        return $user;
    else 
        return false;
}
