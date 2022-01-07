<?php
   $prodid = $_GET['id'];
   $query = "SELECT prodid, catid, description, price, quantity, onsale FROM products where prodid = $prodid";

   $result = mysqli_query($con, $query);
// added or die() to get error message, it is stopping rest of page load tho.
   $row = mysqli_fetch_array($result, MYSQLI_ASSOC) or die(mysqli_error($con));

   $catid = $row['catid'];
   $description = $row['description'];
   $price = $row['price'];
   $quantity = $row['quantity'];
   $onsale = $row['onsale'];

   $query = "SELECT name FROM categories WHERE catid = $catid";
   $result=mysqli_query($con, $query);
   $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

   $catname = $row['name'];

   echo "<h2>Update Product Information</h2>\n";

   echo "<form enctype=\"multipart/form-data\" action=\"admin.php\" method=\"post\">\n";
   echo "<input type=\"hidden\" name=\"content\" value=\"changeproduct\">\n";
   echo "<input type=\"hidden\" name=\"prodid\" value=\"$prodid\">\n";
   echo "<table width=\"100%\" cellpadding=\"1\" border=\"1\">\n";
   echo "<tr><td><h3>Product ID</h3></td><td>$prodid</td></tr>\n";
   echo "<tr><td><h3>Category</h3></td>\n";
   echo "<td><select name=\"catid\">\n";

   $query="SELECT catid,name from categories";
   $result=mysqli_query($con, $query);
   while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
   {
       $tempcatid = $row['catid'];
       $name = $row['name'];
       if ($tempcatid == $catid)
         echo "<option value=\"$tempcatid\" selected=\"selected\">$name</option>\n";
       else
         echo "<option value=\"$tempcatid\">$name</option>";
   }
   echo "</select></td></tr>\n";
   echo "<tr><td><h3>Description</h3></td><td><input type=\"text\" name=\"description\" value=\"$description\"></td></tr>\n";
   echo "<tr><td><h3>Price</h3></td><td><input type=\"text\" name=\"price\" value=\"$price\"></td></tr>\n";
   echo "<tr><td><h3>Quantity</h3></td><td><input type=\"text\" name=\"quantity\" value=\"$quantity\"></td></tr>\n";
   if ($onsale)
      echo "<tr><td><h3>On Sale</h3></td><td><input type=\"checkbox\" name=\"onsale\" value=\"1\" checked></td></tr>\n";
   else
      echo "<tr><td><h3>On Sale</h3></td><td><input type=\"checkbox\" name=\"onsale\" value=\"1\"></td></tr>\n";
   echo "<tr><td><h3>Image</h3></td><td><img src=\"showimage.php?id=$prodid\" width=\"80\" height=\"60\"></td></tr>\n";
   echo "<tr><td><h3>Update image</h3></td><td><input type=\"file\" name=\"picture\"></td></tr>\n";
   echo "</table>\n";
   echo "<input type=\"submit\" name=\"button\" value=\"Update\">\n";
   echo "<input type=\"submit\" name=\"button\" value=\"Delete Product\">\n";
   echo "</form>\n";
?>