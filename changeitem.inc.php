<?php
   $button = $_POST['button'];
   $prodid = $_POST['prodid'];
   if ($button == "Update")
   {
      $quantity = $_POST['quantity'];
      $_SESSION['cart'][$prodid] = $quantity;
      echo "<h2>Item quantity updated in cart</h2>\n";
      echo "<a href=\"index.php?content=reviewcart\">Review cart</a>\n";
   } else
   {
      unset($_SESSION['cart'][$prodid]);
      echo "<h2>Item removed from cart</h2>\n";
      echo "<a href=\"index.php?content=reviewcart\">Review cart</a>\n";
   }

?>