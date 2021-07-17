<?php 

// Connecting to Database
try {
    $conn = new PDO('mysql:host=localhost; port=3306; dbname=products_crud', 'root', '');
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>