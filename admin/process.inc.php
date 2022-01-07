<?php

   echo "<h2>Pending Orders</h2><br>\n";
   $query = "SELECT t1.orderid, t1.custid, t1.date, t2.lastname";
   $query = $query . " FROM orders as t1, customers as t2";
   $query = $query . " WHERE t1.status = 'pending' AND t1.custid = t2.custid";
   $query = $query . "  ORDER BY t1.date";
   $result = mysqli_query($con, $query);
   echo "<table width=\"100%\" cellpadding=\"1\" border=\"1\">\n";
   echo "<tr><td>Order ID</td><td>Customer ID</td><td>Last Name</td><td>Date Submitted</td><td> </td></tr>\n";
   while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
   {
      $orderid = $row['orderid'];
      $custid = $row['custid'];
      $lastname = $row['lastname'];
      $date = $row['date'];
      echo "<tr><td>$orderid</td><td>$custid</td><td>$lastname</td><td>$date</td>\n";
      echo "<td><a href=\"admin.php?content=shiporder&id=$orderid\">Process</a></td></tr>\n";
   }
   echo "</table>\n";
?>