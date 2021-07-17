<?php

//Connecting Database.
/** @var $conn \PDO */
require_once "../../database.php";
require_once "../../function.php";


$id = $_GET["id"] ?: null;

if (!$id) {
    header('location: index.php');
}

$statement = $conn->prepare('SELECT * FROM products Where id = :id');

$statement->bindValue(':id', $id);
$statement->execute();
$product = $statement->fetch(PDO::FETCH_ASSOC);

//declaring variables
$errors = [];

$title = $product['title'];
$description = $product['description'];
$price = $product['price'];

//Posting data in a database.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once "../../formValidation.php";

    // working with database.
    if (empty($errors)) {

        // preparing an statement for excution
        $statement = $conn->prepare("UPDATE products SET title = :title, image = :image, description = :description, price = :price WHERE id = :id");

        //bindValue() : parameter identifier
        $statement->bindValue(':title', $title);
        $statement->bindValue(':image', $imagePath);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':id', $id);

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
    <h1>Update Product</h1>

    <?php include_once "../../Views/products/form.php" ?>
    
</body>

</html>