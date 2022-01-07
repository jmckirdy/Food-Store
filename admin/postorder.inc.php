<?php

   $orderid = $_POST['orderid'];
   $query = "UPDATE orders SET status = 'shipped' WHERE orderid = $orderid";
   $result = mysqli_query($con, $query) or die(mysqli_error($con));
   
   if ($result)
   {
      echo "<h2>Order processed.</h2>\n";
   } else
   {
      echo "<h2>Unable to process order at this time.</h2>\n";
   }
   echo "<a href=\"admin.php?content=process\">Process more orders</a>\n";
?>