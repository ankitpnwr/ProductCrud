<?php

//Connecting Database.
// for telling the comipler that this is a varibale of PDO class
/** @var $conn \PDO */ 
require_once "../../database.php";

$search = $_GET['search'] ?? "";

if ($search) {
  $statement = $conn->prepare('SELECT * FROM products WHERE title LIKE :title ORDER BY create_date DESC');
  $statement->bindValue(':title',"%$search%");
}else{
  $statement = $conn->prepare('SELECT * FROM products ORDER BY create_date DESC');
}

$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);
// return assocative array
// echo '<pre>';
// var_dump($products);
// echo '</pre>';
?>


<?php include_once "../../Views/partials/header.php" ?>

<body>
  <h1>Product Crud</h1>

  <p>
    <a href="create.php" class="btn btn-success">Create Product</a>
  </p>

  <form action="">
    <div class="input-group mb-3">
      <input type="text" placeholder="Search for products" class="form-control" name = "search" value="<?php echo $search?>">
      <input type="submit" class="btn btn-primary">
    </div>
  </form>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">S.No</th>
        <th scope="col">Image</th>
        <th scope="col">title</th>
        <th scope="col">Price</th>
        <th scope="col">Create Date</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($products as $i => $product) { ?>
        <tr>
          <th scope="row"><?php echo $i + 1 ?></th>
          <td>
            <img src="<?php echo $product['image'] ?>">
          </td>
          <td><?php echo $product['title'] ?></td>
          <td><?php echo $product['price'] ?></td>
          <td><?php echo $product['create_date'] ?></td>
          <td>
            <a href="update.php?id=<?php echo $product['id'] ?>" class="btn btn-sm btn-outline-primary">Edit</a>
            <!-- for security issue convet it to post -->
            <form action="delete.php" method="POST" style="display: inline-block;">
              <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
              <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
            </form>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</body>

</html>