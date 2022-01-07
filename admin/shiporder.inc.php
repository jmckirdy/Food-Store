<?php

   $orderid = $_GET['id'];
   $query = "SELECT t1.orderid, t1.custid, t1.date,";
   $query = $query . " t2.lastname, t2.firstname, t2.address,";
   $query = $query . " t2.city, t2.state, t2.zip FROM";
   $query = $query . " orders as t1, customers as t2 WHERE t1.orderid = $orderid AND";
   $query = $query . " t1.custid = t2.custid";
   $result = mysqli_query($con, $query);
   $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
   $custid = $row['custid'];
   $date = $row['date'];
   $firstname = $row['firstname'];
   $lastname = $row['lastname'];
   $address = $row['address'];
   $city = $row['city'];
   $state = $row['state'];
   $zip = $row['zip'];
   echo "<h2>Order information for order #" . $orderid . "</h2><br>\n";
   echo $firstname . " " . $lastname . "<br>\n";
   echo $address . "<br>\n";
   echo $city . ", " . $state . "  " . $zip . "<br><br>\n";
   
   echo "<h3>Items:</h3>\n";
   echo "<table width=\"75%\" cellpadding=\"1\" border=\"1\">\n";
   echo "<tr><td>Product ID</td><td>Description</td><td>Price</td><td>Quantity</td><td>Total</td></tr>\n";
   $query = "SELECT t1.prodid, t1.quantity, t2.description, t2.price";
   $query = $query . " FROM order_items as t1, products as t2 WHERE t1.orderid = $orderid";
   $query = $query . " AND t1.prodid = t2.prodid";
   $result = mysqli_query($con, $query);
   $total = 0;
   while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
   {
      $prodid = $row['prodid'];
      $quantity = $row['quantity'];
      $description = $row['description'];
      $price = $row['price'];
      $subtotal = $price * $quantity;
      $total += $subtotal;
      echo "<tr><td>$prodid</td><td>$description</td>\n";
      printf("<td>%.2f</td><td>%d</td><td>%.2f</td></tr>\n", $price, $quantity, $subtotal);
   }
   echo "<tr><td colspan=\"4\"><b>Order Total</b></td>\n";
   printf("<td>%.2f</td></tr>\n", $total);
   echo "</table>\n";
   echo "<form action=\"admin.php\" method=\"post\">\n";
   echo "<input type=\"hidden\" name=\"content\" value=\"postorder\">\n";
   echo "<input type=\"hidden\" name=\"orderid\" value=\"$orderid\">\n";
   echo "<input type=\"submit\" name=\"button\" value=\"Post order\">\n";
   echo "</form>\n";
?>