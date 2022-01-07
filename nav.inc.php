<table width="100%" cellpadding="2">
  <tr>
    <td><h3>Welcome to the store!</h3></td>
  </tr>
  <tr>
    <td><a href="index.php"><strong>Home</strong></a></td>
  </tr>
  <tr>
    <td><hr size="1" noshade="noshade" /></td>
  </tr>
  <tr>
    <td>
       <label><h3>Browse Products:<br><br></h3> </label>
       <?php
         $query="SELECT catid,name from categories";
         $result=mysqli_query($con, $query);
         while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
         {
             $catid = $row['catid'];
             $name = $row['name'];
             $query2="SELECT count(prodid) FROM products WHERE catid = $catid";
             $result2 = mysqli_query($con, $query2);
             $row=mysqli_fetch_array($result2);
             $total = $row[0];
             echo "<a href=\"index.php?content=buyproducts&cat=$catid\">$name</a> ($total)<br>\n";
         }
       ?>
   </td>
  </tr>
  <tr>
    <td><hr size="1" noshade="noshade" /></td>
  </tr>
  <tr>
    <td>
<form action="index.php" method="get">
    <label><font color="#663300" size="-1">search for product:</font> </label>
      <input name="searchFor" type="text" size="14" />
      <input name="goButton" type="submit" value="find" />
      <input name="content" type="hidden" value="search" />
  </form>  </td>
  </tr>
  <tr>
    <td><hr size="1" noshade="noshade" /></td>
  </tr>
  <tr>
    <td><a href="index.php?content=reviewcart"><strong>Review shopping cart</strong></a></td>
  </tr>

  <tr>
    <td><hr size="1" noshade="noshade" /></td>
  </tr>
  <tr>
    <td bgcolor=#FFFF99><a href="index.php?content=checkout"><strong>Check out</strong></a></td>
  </tr>
  <tr>
    <td><hr size="1" noshade="noshade" /></td>
  </tr>
  <tr>
    <td> </td>
  </tr>
</table>