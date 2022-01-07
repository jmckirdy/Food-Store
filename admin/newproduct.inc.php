<?php
if (!isset($_SESSION['store_admin']))
{
   echo "<h2>Sorry, you have not logged into the system</h2>\n";
   echo "<a href=\"admin.php\">Please login</a>\n";
} else
{
   $userid = $_SESSION['store_admin'];
   echo "<form enctype=\"multipart/form-data\" action=\"admin.php\" method=\"post\">\n";
   echo "<h2>Enter the new product</h2><br>\n";
   echo "<table width=\"100%\" cellpadding=\"1\" border=\"1\">\n";
   echo "<tr><td>Category</td>\n";
   echo "<td><select name=\"cat\">\n";
   $query="SELECT catid,name from categories";
   $result=mysqli_query($con, $query);
   while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
   {
       $catid = $row['catid'];
       $name = $row['name'];
       echo "<option value=\"$catid\">$name</option>\n";
   }
   echo "</select></td></tr>\n";
   echo "<tr><td>Description</td><td><input type=\"text\" size=\"40\" name=\"description\"></td></tr>\n";
   echo "<tr><td>Price</td><td><input type=\"text\" size=\"10\" name=\"price\"></td></tr>\n";
   echo "<tr><td>Quantity in stock</td><td><input type=\"text\" size=\"10\" name=\"quantity\"></td</tr>\n";
   echo "<input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"1024000\">\n";
   echo "<tr><td>Picture</td><td><input type=\"file\" name=\"picture\"></td></tr>\n";
   echo "</table>\n";
   echo "<input type=\"submit\" value=\"Submit\">\n";
   echo "<input type=\"hidden\" name=\"content\" value=\"addproduct\">\n";
   echo "</form>\n";
}
?>