<?php

   $search = $_GET['searchFor'];
   if (get_magic_quotes_gpc())
   {
      $search = stripslashes($search);
   }
   $searchsql = mysqli_real_escape_string($con, $search);
   echo "<h2>Results of searching '$search'<br><br></h2>\n";
   $query = "SELECT * from products WHERE description REGEXP '$searchsql'";
   $result = mysqli_query($con, $query);
   if (!$result)
   {
      echo "<h2>Sorry, unable to process search string.</h2>\n";
   } else
   {
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
               echo "<a href=\"index.php?&content;=updatecart&id;=$prodid\">";
               echo "<font size=\"3\"><b><u>$description</u></b></font></a>\n";
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
   }
?>