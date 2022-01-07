<?php
session_start();
include ("../mylibrary/login.php");
$con = login();

$userid = $_POST['userid'];
$password = $_POST['password'];

$query = "SELECT userid, name from admins where userid = '$userid' and password = PASSWORD('$password')";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) == 0)
{
   echo "<h2>Sorry, your account was not validated.</h2><br>\n";
   echo "<a href=\"admin.php\">Try again</a><br>\n";
} else
{
   $_SESSION['store_admin'] = $userid;
   header("Location: admin.php");
}
?>