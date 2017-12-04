
<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		echo  "<h2>Welcome   ",$_SESSION['userName'],"</h2>";
	?>

	<h4>users registered <a href="registredUsers.php">click here</a>  

</body>
</html>