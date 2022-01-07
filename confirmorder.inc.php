<?php
   echo "<h2><u>Confirming Order</u></h2><br>\n";

   $total = 0;
   echo "<table width=\"100%\" cellpadding=\"1\" border=\"1\">\n";
   echo "<tr><td>Product</td><td>Price</td><td>Quantity</td><td>Total</td>\n";
   foreach($_SESSION['cart'] as $prodid => $quantity)
   {
      $query = "SELECT description, price FROM products WHERE prodid = $prodid";
      $result = mysqli_query($con, $query);
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      $description = $row['description'];
      $price = $row['price'];

      $subtotal = $price * $quantity;
      $total += $subtotal;
       printf("<tr><td>%s</td><td>%s</td><td>%d</td><td>$%.2f</td></tr>\n",
              $description, $price, $quantity, $subtotal);
   }
   printf("<tr><td colspan=\"3\"><b>Total</b></td><td>$%.2f</td></tr>\n", $total);
   echo "</table>\n";

   echo "<form action=\"index.php\" method=\"post\">\n";
   echo "<input type=\"hidden\" name=\"content\" value=\"finishorder\">\n";
   echo "<input type=\"submit\" name=\"button\" value=\"Confirm order\">\n";
   echo "</form>\n";
   echo "<form action=\"index.php\" method=\"post\">\n";
   echo "<input type=\"hidden\" name=\"content\" value=\"reviewcart\">\n";
   echo "<input type=\"submit\" name=\"button\" value=\"Change Order\">\n";
   echo "</form\">\n";

?>