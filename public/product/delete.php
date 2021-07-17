<?php

//Connecting Database.
/** @var $conn \PDO */
require_once "../../database.php";

$id = $_POST["id"] ? : null;

if(!$id){
    header('location: index.php');
}

$statement = $conn->prepare('DELETE FROM products WHERE id = :id');
$statement->bindValue(':id', $id);
$statement->execute();

header('location: index.php');
?>