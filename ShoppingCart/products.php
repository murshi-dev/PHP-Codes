<?php
//display the products from the 'products' table
$stmt=$pdo->prepare('SELECT * FROM products ORDER BY date_added');
$stmt->execute();
//fetch all records as array
$products=$stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- header is called here -->
<?=template_header('Products')?>
<!-- design the display area to display the products from the table -->
<div class="products content-wrapper">
    <h1>Products</h1>
    <div class="products-wrapper">
        <?php foreach ($products as $product) : ?>
        <!-- create  a hyperlink that points to each of the product -->
        <!-- place the image, name and price inside 'a' tag -->
        <a href="index.php?page=product&id=<?= $product['id']?>" class="product">
            <!-- display the image -->
            <img src="images/<?= $product['img']?>" width=200 height=200 alt="product1">
            <!-- display the name -->
            <span class="name"><?=$product['name']?></span>
            <!-- display the price -->
            <span class="price"><?=$product['price']?></span>
        </a>
    <?php endforeach; ?>
    </div>

</div>


<!-- footer is called here -->
<?=template_footer()?>