<h2>Welcome, new customer!</h2><br><br>
<p>Please fill out this form so we can send you your products<p>
<form action="addcust.php" method="post">
<table width="50%" cellpadding="1" border="1">
<tr>
   <td>First name</td>
   <td><input type="text" size="40" name="firstname"></td>
</tr>
<tr>
   <td>Last name</td>
   <td><input type="text" size="40" name="lastname"></td>
</tr>
<tr>
   <td>Address</td>
   <td><input type="text" size="60" name="address"></td>
</tr>
<tr>
   <td>City</td>
   <td><input type="text" size="30" name="city"></td>
</tr>
<tr>
   <td>State</td>
   <td><input type="text" size="2" name="state"></td>
</tr>
<tr>
   <td>Zip</td>
   <td><input type="text" size="5" name="zip"></td>
</tr>
<tr>
   <td>Phone</td>
   <td><input type="text" size="15" name="phone"></td>
</tr>
<tr>
   <td>e-mail address</td>
   <td><input type="text" size="60" name="email"></td>
</tr>
<tr>
   <td>password</td>
   <td><input type="password" size="15" name="password1"></td>
</tr>
<tr>
   <td>Confirm password</td>
   <td><input type="password" size="15" name="password2"></td>
</tr>
</table>
<input type="submit" name="button" value="Submit form">
</form>