
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
		echo  "<h2>Hi   ",$_SESSION['userName'],"</h2>";

		$checkUserQuery = "select * from userinformation";
		include("dbconnect.php");
		$dbObj = new DBController();
		$result = $dbObj->runQuery($checkUserQuery);			
		echo "<h3>Registered users are :".sizeof($result)."</h3>";
			foreach ($result as $key => $value) { 
				
				echo "<h4>";

				echo $value['username'],"</h4>";

			}
	?>

	<form method= 'post' action='userLogin.php'>
		<input type="submit" value="Logout"><br>
	</form>

</body>
</html>