<table width="100%" cellpadding="2">
  <tr>
    <td><h3>Store Administration</h3></td>
  </tr>
  <tr>
    <td><a href="admin.php"><strong>Home</strong></a></td>
  </tr>
  <tr>
    <td><hr size="1" noshade="noshade" /></td>
  </tr>
<?php
   if (isset($_SESSION['store_admin']))
   {
      echo "<tr><td>\n";
      echo "<form action=\"admin.php\" method=\"get\">\n";
      echo "<label><font color=\"#663300\"><br>Browse Products<br></font> </label>\n";
      echo "<select name=\"cat\">\n";

      $query="SELECT catid,name from categories";
      $result=mysqli_query($con, $query);
      while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
      {
          $catid = $row['catid'];
          $name = $row['name'];
          echo "<option value=\"$catid\">$name</option>";
      }

      echo "</select>\n";
      echo "<input name=\"goButton\" type=\"submit\" value=\"browse\" />\n";
      echo "<input name=\"content\" type=\"hidden\" value=\"editproducts\" />\n";
      echo "</form> </td></tr>\n";

      echo "<tr><td><hr size=\"1\" noshade=\"noshade\" /></td></tr>\n";
      echo "<tr><td bgcolor=\"#FFFF99\"><a href=\"admin.php?content=newproduct\"><strong>Add a new product</strong></a></td></tr>\n";
      echo "<tr><td><hr size=\"1\" noshade=\"noshade\" /></td></tr>\n";
      echo "<tr><td><a href=\"admin.php?content=newcat\"><strong>Add a new category</strong></a></td></tr>\n";
      echo "<tr><td><hr size=\"1\" noshade=\"noshade\" /></td></tr>\n";
      echo "<tr><td><a href=\"admin.php?content=process\"><strong>Process Pending Orders</strong></a></td></tr>\n";
      echo "<tr><td><hr size=\"1\" noshade=\"noshade\" /></td></tr>\n";
      echo "<tr><td><a href=\"admin.php?content=outofstock\"><strong>List out-of-stock</strong></a></td></tr>\n";
      echo "<tr><td><hr size=\"1\" noshade=\"noshade\" /></td></tr>\n";
      echo "<tr><td><a href=\"admin.php?content=report\"><strong>Generate report</strong></a></td></tr>\n";
      echo "<tr><td><hr size=\"1\" noshade=\"noshade\" /></td></tr>\n";
      echo "<tr><td><a href=\"logout.php\"><strong>Log Out</strong></a></td></tr>\n";
      echo "<tr><td> </td></tr>\n";
   }
?>

</table>