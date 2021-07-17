<!-- Forms validation output -->
<?php if (!empty($errors)) : ?>
        <?php foreach ($errors as $error) : ?>
            <div class="alert alert-danger " role="alert">
                <div><?php echo $error ?> </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <!-- enctype is for telling the form that I will also submit files/multimedia -->
        <div class="mb-3">
            <label class="form-label">Product Image</label>
            <br>
            <?php if ($product['image']) : ?>
                <img src="<?php echo $product['image'] ?>" alt="" class="update-image">
            <?php endif; ?>
            <input type="file" name="image">
        </div>
        <div class="mb-3">
            <label class="form-label">Product Title</label>
            <input type="text" class="form-control" name="title" value="<?php echo $title ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Product Description</label>
            <textarea class="form-control" name="description"><?php echo $description ?></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Product Price</label>
            <input type="number" class="form-control" step="0.1" name="price" value="<?php echo $price ?>">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>