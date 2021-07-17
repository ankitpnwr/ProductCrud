<?php

//Connecting Database.
// for telling the comipler that this is a varibale of PDO class
/** @var $conn \PDO */
require_once "../../database.php";
require_once "../../function.php";

// $_FILES : super-global variable, return associative array
// echo '<pre>';
// var_dump($_FILES);
// echo '</pre>';


//declaring variables
$errors = [];

$title = '';
$description = '';
$price = '';
$product = [
    'image'  => ""
];

//Posting data in a database.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once "../../formValidation.php";

    // working with database.
    if (empty($errors)) {

        // preparing an statement for excution
        $statement = $conn->prepare("INSERT INTO products (title, image, description, price, create_date) 
        VALUES(:title, :image, :description, :price, :date)");

        //name parameter to secure from sql injection

        //bindValue() : parameter identifier
        $statement->bindValue(':title', $title);
        $statement->bindValue(':image', $imagePath);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':date', date('y-m-d H:i:s'));

        //To execute statement
        $statement->execute();

        // After one submit redirect to index file
        header('Location: index.php');
    }
}

?>

<?php include_once "../../Views/partials/header.php" ?>

<body>
    <p>
        <a href="index.php" class="btn btn-lg btn-secondary">Go Back To Products</a>
    </p>
    <h1>Create New Product</h1>

    <?php include_once "../../Views/products/form.php" ?>

</body>

</html>