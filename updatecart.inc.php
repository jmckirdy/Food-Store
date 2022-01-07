<?php
$prodid = $_GET['id'];

echo "<h2>Add item to cart</h2>\n";

$query = "SELECT description, price from products WHERE prodid=$prodid";
// $result = mysqli_query($con, MYSQLI_ASSOC);
$result = mysqli_query($con, $query) or die(mysqli_error($con));

$row = mysqli_fetch_array($result);

$description = $row['description'];
$price = $row['price'];
$quantity = 1;

echo "<form action=\"index.php\" method=\"post\">\n";
echo "<table width=\"100%\" cellpadding=\"1\" border=\"1\">\n";
echo "<tr><td>Image</td><td>Product</td><td>Price</td><td>Quantity</td></tr>\n";
echo "<tr><td><img src=\"showimage.php?id=$prodid\" width=\"80\" height=\"60\"></td>\n";
echo "<td>$description</td><td>$price</td>\n";
echo "<td><input type=\"text\" name=\"quantity\" value=\"$quantity\" size=\"3\"</td></tr>\n";
echo "</table>\n";
echo "<input type=\"hidden\" name=\"content\" value=\"addtocart\">\n";
echo "<input type=\"hidden\" name=\"prodid\" value=\"$prodid\">\n";
echo "<input type=\"submit\" value=\"Add to cart\">\n";
echo "</form>\n";

?>