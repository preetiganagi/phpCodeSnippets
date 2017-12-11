<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h2>Logged Out successfully </h2>
<h3>Thank You Havea nice day</h3>
<?php
session_destroy();
?>

<h4><a href="login.php"> Login Again</a></h4>
</body>
</html>