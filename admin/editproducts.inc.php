 <?php
   if (!isset($_SESSION['store_admin']))
   {
      echo "<h2>Sorry, you have not logged into the system</h2>\n";
      echo "<a href=\"admin.php\">Please login</a>\n";
   } else
   {
      echo "<h2>Click on a product to edit it</h2>\n";
      $catid = $_GET['cat'];
      if (!isset($_GET['page']))
         $page = 1;
      else
         $page = $_GET['page'];

      showproducts($catid, $page, "admin.php?content=editproducts", "admin.php?content=updateproduct");
   }
?>