<h2><u>Check Out Procedure</u></h2><br><br>
<p>If you are a returning customer, please enter your e-mail address and password<p>
<form action="verifycust.php" method="post">
<table width="50%" cellpadding="1" border="1">
<tr>
   <td>e-mail address</td>
   <td><input type="text" name="email"></td>
</tr>
<tr>
   <td>password</td>
   <td><input type="password" name="password1"></td>
</tr>
</table>
<input type="submit" name="button" value="Login">
</form>

<br><br><br>
<form action="index.php" method="get">
<input type="submit" name="button" value="Click here if you're a new customer">
<input type="hidden" name="content" value="newcust">
</form>