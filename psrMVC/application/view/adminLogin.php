<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form method="post" action="index.php?action=adminLogin">
    Name: <input type="text" name="name">
    <br> <br>
    Password: <input type="password" name="password" >
    <?php echo $passwordErr; ?>
    <br><br>
   
    <input type="submit" value="Login" name="adminLoginSubmit" ><br>
</form>
</body>
</html>