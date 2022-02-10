<html>
<body>
<div><p>Fill out this form to calculate the total cost:</p>

<form action="" method="post">

<p>Price: <input type="text" name="price" size="5" /></p>

<p>Quantity: <input type="text" name="quantity" size="5" /></p>

<p>Discount: <input type="text" name="discount" size="5" /></p>

<p>Tax: <input type="text" name="tax" size="3" /> (%)</p>

<p>Shipping method: <select name="shipping">
<option value="5.00">Slow and steady</option>
<option value="8.95">Put a move on it.</option>
<option value="19.36">I need it yesterday!</option>
</select></p>

<p>Number of payments to make: <input type="text" name="payments" size="3" /></p>

<input type="submit" name="submit" value="Calculate!" />

</form>

</div>


<?php 
 if ($_SERVER['REQUEST_METHOD'] == 'POST')
 {
// Get the values from the $_POST array:
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$discount = $_POST['discount'];
$tax = $_POST['tax'];
$shipping = $_POST['shipping'];
$payments = $_POST['payments'];

// Calculate the total:
$total = $price * $quantity;
$total = $total + $shipping;
$total = $total - $discount;

// Determine the tax rate:
$taxrate = $tax/100;
$taxrate = $taxrate + 1;

// Factor in the tax rate:
$total = $total * $taxrate;

// Calculate the monthly payments:
$monthly = $total / $payments;

// Print out the results:
print "<p>You have selected to purchase:<br />
<span class=\"number\">$quantity</span> widget(s) at <br />
$<span class=\"number\">$price</span> price each plus a <br />
$<span class=\"number\">$shipping</span> shipping cost and a <br />
<span class=\"number\">$tax</span> percent tax rate.<br />
After your $<span class=\"number\">$discount</span> discount, the total cost is 
$<span class=\"number\">$total</span>.<br />
Divided over <span class=\"number\">$payments</span> monthly payments, that would be $<span class=\"number\">$monthly</span> each.</p>";
 }



?>
</body>
</html>