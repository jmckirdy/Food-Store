<h2>Welcome to our store!</h2>
<br>
<br>
<p>Please feel free to browse our great selection of products. Select the category
from the drop-down menu in the navigation bar. Add items to your cart, then check out.
<p>
<h2>Items on sale today:</h2>

<?php
   $query = "SELECT * from products where onsale = TRUE";
   $result = mysqli_query($con, $query);

   echo "<table width=\"100%\" border=\"0\">\n";
   while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
   {
      $prodid = $row['prodid'];
      $description = $row['description'];
      $price = $row['price'];
      $quantity = $row['quantity'];
 
      echo "<tr><td>\n";
         echo "<img src=\"showimage.php?id=$prodid\" width=\"80\" height=\"60\">";
      echo "</td><td>\n";
         if ($quantity == 0)
            echo "<font size=\"3\">$description</font>\n";
         else
         {
            echo "<a href=\"index.php?content=updatecart&id=$prodid\">";
            echo "<font size=\"3\"><b><u>$description</u></b></font>\n";
         }
      echo "</td><td>\n";
         printf("$%.2f\n", $price);
      echo "</td><td>\n";
         if ($quantity == 0)
            echo "<font color=\"red\">Sorry, this item out of stock</font>\n";
         else if ($quantity < 5)
            echo "Hurry, only $quantity left in stock!\n";
         else
            echo " \n";
      echo "</td></tr>\n";
   }
   echo "</table>\n";
?>