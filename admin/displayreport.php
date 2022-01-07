<?php
   header("Content-type: application/vnd.ms-excel");
   header("Content-Disposition: attachment; filename=report.xls");
   header("Pragma: no-cache");
   header("Expires: 0");

   include("../mylibrary/login.php");
   $con = login();
   $startday = $_REQUEST['startday'];
   $startmonth = $_REQUEST['startmonth'];
   $startyear = $_REQUEST['startyear'];
   $dbstartdate = $startyear . "-" . $startmonth . "-" . $startday;
   $startdate = $startmonth . "/" . $startday . "/" . $startyear;
   $endday = $_REQUEST['endday'];
   $endmonth = $_REQUEST['endmonth'];
   $endyear = $_REQUEST['endyear'];
   $dbenddate = $endyear . "-" . $endmonth . "-" . $endday;
   $enddate = $endmonth . "/" . $endday . "/" . $endyear;

   $query = "SELECT products.description, sum(order_items.quantity) as total, products.price ";
   $query .= " FROM orders, order_items, products";
   $query .= " WHERE orders.orderid = order_items.orderid";
   $query .= " AND order_items.prodid = products.prodid";
   $query .= " AND orders.status = 'shipped'";
   $query .= " AND orders.date >= '$dbstartdate' AND orders.date <= '$dbenddate'";
   $query .= " GROUP BY products.description, products.price";
   $result = mysqli_query($con, $query);
   echo "<table width=\"100%\" cellpadding=\"1\" border=\"1\">\n";
   echo "<tr><td colspan=\"4\"><b>Products sold between " . $startdate . " and " . $enddate . "</b></td></tr>\n";
   echo "<tr><td><b>Product</b></td><td><b>Quantity Sold</b></td><td><b>Unit price</b></td><td><b>Total</b></td></tr>\n";
   $count = 3;
   while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
   {
      $product = $row['description'];
      $quantity = $row['total'];
      $price = $row['price'];
      $total = $quantity * $price;
      echo "<tr><td>$product</td><td>$quantity</td>\n";
      printf("<td>%.2f</td><td>=B%s * C%s</tr>\n", $price, $count, $count);
      $count++;
   }
   $count--;
   echo "<tr><td><b>Total</b></td><td>=SUM(B3:B" . $count . ")</td><td> </td>\n";
   echo "<td>=SUM(D3:D" . $count . ")</td></tr>\n";
   echo "</table>\n";
   ?>