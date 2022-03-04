<?php
//check if form has been submitted
//with id(hidden) and quantity
if(isset($_POST['product_id'],$_POST['quantity']))
{
    //pass these two values to a local variable
    $product_id=(int)$_POST['product_id'];
    $quantity=(int)$_POST['quantity'];
    //display the product selected using SELECT query
    $stmt=$pdo->prepare('SELECT * FROM products WHERE id=?');
    $stmt->execute([$_POST['product_id']]);
    //fetch them as array
    $product=$stmt->fetch(PDO::FETCH_ASSOC);
    //update the cart value based on the items added to cart
    if($product && $quantity>0)
    {
        //product exist in DB , so update session variable
        if(isset($_SESSION['cart']) && is_array($_SESSION['cart']))
        {
            if(array_key_exists($product_id,$_SESSION['cart']))
            {
            //if cart has products added with same id then add to their quantity
            $_SESSION['cart'][$product_id]+=$quantity;
            }
            else{
            //product not in cart so add it as a next product
            $_SESSION['cart'][$product_id]=$quantity;
            }
        }//close if product exist
        else{
            //no product in cart-add as first product
            //create as an array 
            $_SESSION['cart']=array($product_id=>$quantity);
        }
    }
    //call cart page to avoid form resubmission
    header('location: index.php?page=cart');
    exit;
}//close cart varaible modification

//write codes for 'update' button
//check if update is clicked and cart has items in it
// Update product quantities in cart if the user clicks the "Update" button on the shopping cart page
if (isset($_POST['update']) && isset($_SESSION['cart'])) {
    // Loop through the post data so we can update the quantities for every product in cart
    foreach ($_POST as $k => $v) {
        //str_replace(oldstring,newstring,actual string);
        $id = str_replace('quantity-', '', $k);
        $quantity = (int)$v;
        // Always do checks and validation
        if (isset($_SESSION['cart'][$id]) && $quantity > 0) {
            // Update new quantity
            $_SESSION['cart'][$id] = $quantity;
        }
    }
    // Prevent form resubmission...
    header('location: index.php?page=cart');
    exit;
}
//display the items in the cart
//use ternary operatorm to fill the $products_in_cart value
//if session exists session is assigned, else empty array is assigned
$products_in_cart=isset($_SESSION['cart']) ? $_SESSION['cart']:array();
$products=array();
//a variable to calculate total RM value
$subtotal=0.00;
//check if cart has products
if($products_in_cart)
{
    //all our products info is stored as array=> key and values
    //we need a function called implode to return a string from array
    $array_products=implode(',',array_fill(0,count($products_in_cart),'?'));
    //array_fill fills an array with values
    $stmt=$pdo->prepare('SELECT * FROM products WHERE id IN('.$array_products.')');
    //SELECT * FROM products WHERE id = ?
    $stmt->execute(array_keys($products_in_cart));
    //since $products in cart is an array we use array_keys to execute it
    $products=$stmt->fetchAll(PDO::FETCH_ASSOC);
    //now that we have our array/info in $products
    //calculate total
    foreach($products as $product)
    {
        $subtotal += (float)$product['price']  * (int)$products_in_cart[$product['id']];
    }
}

//remove/delete item from cart
//check if remove link is clicked and still in cart session 
if(isset($_GET['remove']) && isset($_SESSION['cart'][$_GET['remove']]))
{
    //remove the product from session/cart
    unset($_SESSION['cart'][$_GET['remove']]);
}

//placeorder page when placeorder button clicked
if(isset($_POST['placeorder'])&& isset($_SESSION['cart']))
{
    header('Location:index.php?page=placeorder');
    exit;
}
?>
<?= template_header('Cart') ?>
<div class="cart content-wrapper">
    <h1>Shopping Cart</h1>
    <form action="index.php?page=cart" method="post">
        <table>
            <thead>
                <tr>
                    <td colspan="2">Product</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Total</td>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($products)) : ?>
                    <tr>
                        <td colspan="5" style="text-align:center;">You have no products added in your Shopping Cart</td>
                    </tr>
                <?php else : ?>
                    <?php foreach ($products as $product) : ?>
                        <tr>
                            <td class="img">
                                <a href="index.php?page=product&id=<?= $product['id'] ?>">
                                    <img src="images/<?= $product['img'] ?>" width="50" height="50" 
                                    alt="<?= $product['name'] ?>">
                                </a>
                            </td>
                            <td>
                                <a href="index.php?page=product&id=<?= $product['id'] ?>"><?= $product['name'] ?></a>
                                <br>
                                <a href="index.php?page=cart&remove=<?= $product['id'] ?>" class="remove">Remove</a>
                            </td>
                            <td class="price">RM <?= $product['price'] ?></td>
                            <td class="quantity">
                                <input type="number" name="quantity-<?= $product['id'] ?>" 
                                value="<?= $products_in_cart[$product['id']] ?>" 
                                min="1" max="<?= $product['quantity'] ?>" placeholder="Quantity" required>
                            </td>
                            <td class="price">RM <?= $product['price'] * $products_in_cart[$product['id']] ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="subtotal">
            <span class="text">Subtotal</span>
            <span class="price">RM <?= $subtotal ?></span>
        </div>
        <div class="buttons">
            <input type="submit" value="Update" name="update">
            <input type="submit" value="Place Order" name="placeorder">
        </div>
    </form>
</div>

<?= template_footer() ?>