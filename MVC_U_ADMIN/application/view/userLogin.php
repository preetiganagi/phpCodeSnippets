<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="post" action="">
    Name: <input type="text" name="name">
    <br> <br>
    Password: <input type="password" name="password" >
    <?php echo $passwordErr; ?>
    <br><br>
   
    <input type="submit" value="Login"></a><br>
 </form>
    <a href="userRegistration.php">
    <button> Register Here</button></a>
<?php $msg=$_GET['msg'];
	echo $msg;
	?>
</body>

</html>