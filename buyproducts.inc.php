<?php
   $catid = $_GET['cat'];
   $query="SELECT name from categories WHERE catid = $catid";
   $result = mysqli_query($con, $query);
   $row=mysqli_fetch_array($result, MYSQLI_ASSOC);
   echo "<h2>{$row['name']} - Click on a product to purchase it</h2>\n";

   if (!isset($_GET['page']))
      $page = 1;
   else
      $page = $_GET['page'];

showproducts($catid, $page, "index.php?content=buyproducts", "index.php?content=updatecart");
?>