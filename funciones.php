<?php 

function conexion($db, $user, $password){
    try {
        $conexion = new PDO("mysql:host=localhost;dbname=$db", $user, $password);
        return $conexion;
    } catch (PDOException $e) {
        return false;
    }
}