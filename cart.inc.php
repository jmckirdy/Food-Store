<?php
   echo "<h2>Your shopping cart:</h2>\n";
   if (!isset($_SESSION['cart']))
   {
      $_SESSION['cart'] = array();
      echo "is empty\n";
   } else
   {
      $items = count($_SESSION['cart']);
      if ($items == 0)
      {
         echo "is empty\n";
      } else
      {
         $total = 0;
         echo "<table width=\"100%\" cellpadding=\"1\" border=\"1\">\n";
         echo "<tr><td>Product</td><td>Quantity</td><td>Total</td></tr>\n";
         foreach($_SESSION['cart'] as $prodid => $quantity)
         {
            $query = "SELECT description, price FROM products WHERE prodid = $prodid";
            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $description = $row['description'];
            $price = $row['price'];

            $subtotal = $price * $quantity;
            $total += $subtotal;

            printf("<tr><td>%s</td><td>%s</td><td>$%.2lf</td></tr>\n", $description, $quantity, $subtotal);
         }
         printf("<tr><td colspan=\"2\">Total</td><td>$%.2lf</td></tr>\n", $total);
         echo "</table>\n";

      }
   }
?>