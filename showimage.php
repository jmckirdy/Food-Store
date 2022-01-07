<?php
   header("Content-type: image/jpeg");
   $prodid = $_GET['id'];
   $con = mysqli_connect("localhost", "test", "test", "store") or die('');

   $query = "SELECT picture from products WHERE prodid = $prodid";
   $result = mysqli_query($con, $query);
   $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
   $picture = $row['picture'];
   echo $picture;
?>