<?php
//display one product which was selected
//by user in the products page
//check if some product has been selected
if(isset($_GET['id']))
{
    //select query with 'where' clause
    $stmt=$pdo->prepare('SELECT * FROM products where id=?');
    //execute based on the 'id'
    $stmt->execute([$_GET['id']]);
    //retrieve the info as array
    $product=$stmt->fetch(PDO::FETCH_ASSOC);
    //check if product exist or array not empty
    if(!$product)
    {
        exit('product does not exist');
    }
}
?>
<!-- design product page -->
<!-- header -->
<?=template_header('Product')?>
<!-- product display -->
<div class="product content-wrapper">
    <!-- image display -->
    <img src="images/<?= $product['img']?>" width=500 height=500 alt="product">
    <div>
    <!-- form display -->
    <h1 class="name"><?=$product['name']?></h1>
    <span class="price"><?=$product['price']?></span>
    <form action="index.php?page=cart" method="post">
    <!-- accept quantity in a text box -->
    <input type="number" name="quantity" value="1">
    <!-- use a hidden text box to know the id -->
    <!-- selected by user -->
    <input type="hidden" name="product_id" value="<?=$product['id']?>">
    <!-- a submit button -->
    <input type="submit" value="Add To Cart">
    </form>
    </div>
</div>
<!-- footer -->
<?=template_footer()?>