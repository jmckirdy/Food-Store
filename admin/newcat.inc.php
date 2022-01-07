<?php 
    if (!isset($_SESSION['store_admin']))
    {
        echo "<h2>Sorry, you have not logged into the system</h2>\n";
        echo "<a href=\"admin.php\">Please Login</a>\n";
    } else 
    {
        echo "<h2>Add a new food category</h2>\n";
        echo "<table width=\"100%\" cellpadding=\"1\" border=\"1\">\n";
        echo "<form action=\"admin.php\" method=\"post\">\n";
        echo "<tr><td>New category</td><td><input type=\"text\" name=\"catname\" size=\"40\"></td></tr>\n";
        echo "</table>\n";
        echo "<input type=\"hidden\" name=\"content\" value=\"addcat\">\n";
        echo "<input type=\"submit\" value=\"Submit\">\n";
        echo "</form>\n";
    }
?>