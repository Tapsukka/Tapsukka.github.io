<?php

function connectDB(){
        static $connection;
        if(!isset($connection)) {
            $connection = connect();
        }      
        return $connection;
}

function connect() {
        $host = getenv('DB_HOST', true) ?: "89.163.146.32";
        $port = getenv('DB_PORT', true) ?: 3306; 
        $dbname = getenv('DB_NAME', true) ?: "tapyli21_elokuvat"; 
        $user = getenv('DB_USERNAME', true) ?: "tapyli21_arvostelut"; 
        $password = getenv('DB_PASSWORD', true) ?: "JJf3Yb{2T5Vh"; 

        $connectionString = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8";

        try {       
                $pdo = new PDO($connectionString, $user, $password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $pdo;
        } catch (PDOException $e){
                echo "Virhe tietokantayhteydessä: " . $e->getMessage();
                die();
        }
}