<?php
function login()
{
   $con = mysqli_connect("localhost", "test", "test", "store") or die('Could not connect to server');
   return $con;
}
?>