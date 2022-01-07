<?php
   session_start();
   include("mylibrary/login.php");
   $con = login();

   $firstname = $_POST['firstname'];
   $lastname = $_POST['lastname'];
   $address = $_POST['address'];
   $city = $_POST['city'];
   $state = $_POST['state'];
   $zip = $_POST['zip'];
   $phone = $_POST['phone'];
   $email = $_POST['email'];
   $password1 = $_POST['password1'];
   $password2 = $_POST['password2'];

   if (get_magic_quotes_gpc())
   {
      $firstname = stripslashes($firstname);
      $lastname = stripslashes($lastname);
      $address = stripslashes($address);
      $city = stripslashes($city);
      $state = stripslashes($state);
      $zip = stripslashes($zip);
      $phone = stripslashes($phone);
      $email = stripslashes($email);
      $password1 = stripslashes($password1);
      $password2 = stripslashes($password2);
   }
   $firstname = mysqli_real_escape_string($con, $firstname);
   $lastname = mysqli_real_escape_string($con, $lastname);
   $address = mysqli_real_escape_string($con, $address);
   $city = mysqli_real_escape_string($con, $city);
   $state = mysqli_real_escape_string($con, $state);
   $zip = mysqli_real_escape_string($con, $zip);
   $phone = mysqli_real_escape_string($con, $phone);
   $email = mysqli_real_escape_string($con, $email);
   $password1 = mysqli_real_escape_string($con, $password1);
   $password2 = mysqli_real_escape_string($con, $password2);


   $baduser = 0;

   if (trim($email) == '')
      $baduser = 1;

   if (trim($password1) == '')
      $baduser = 2;

   if ($password1 != $password2)
      $baduser = 3;

   $query = "SELECT * from customers where email = '$email'";
   $result = mysqli_query($con, $query);
   $rows = mysqli_num_rows($result);

   if ($rows != 0)
      $baduser = 4;

   if ($baduser == 0)
   {
      $query = "INSERT INTO customers (firstname, lastname, address, city, state, " .
              "zip, phone, email, password) VALUES ('$firstname', '$lastname' , " .
              " '$address', '$city', '$state', '$zip' , '$phone', '$email', " .
              " PASSWORD('$password1'))";
      $result=mysqli_query($con, $query);


      if ($result)
      {
         $query = "SELECT LAST_INSERT_ID() from customers";
         $result = mysqli_query($con, $query);
         $row = mysqli_fetch_array($result);
         $_SESSION['cust'] = $row[0];
         header("Location: index.php?content=confirmorder");
      }
      else
      {
         echo "<h2>Sorry, I could not process your form at this time</h2>\n";
      }
   } else
   {
      switch($baduser)
      {
         case(1):
            echo "<h2>Please enter an e-mail address</h2>\n";
            break;
         case(2):
            echo "<h2>Please enter a password</h2>\n";
            break;
         case(3):
            echo "<h2>Your passwords did not match!</h2>\n";
            break;
         case(4):
            echo "<h2>I'm sorry, that e-mail address already exists.</h2>\n";
       }
       echo "<a href=\"index.php?content=newcust\">Try again</a>\n";
   }
?>