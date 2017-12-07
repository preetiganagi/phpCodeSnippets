
<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">

	</script>
</head>
<body>
	<?php
		echo  "<h2>Hi   ",$_SESSION['userName'],"</h2>";

		$checkUserQuery = "select * from userinformation where roleid=2";
		include("dbconnect.php");
		$dbObj = new DBController();
		$result = $dbObj->runQuery($checkUserQuery);
		include("adminclass.php");
		$adminObj = new Admin();
		if($_POST['SERVER_REQUEST'] == "POST")
		{

		}
		echo "<h3>Registered users are :".sizeof($result)."</h3>";
			foreach ($result as $key => $value) { 
				
				echo "<br>";
				echo "name Is :".$value['username'];
        		echo "<br>";
        		echo "email Is :".$value['email'];
        		echo "<br>";
        		echo "phone number Is :".$value['phonenumber'];
				echo "<br>";
				//echo "<input type='submit' value='disable'>&nbsp;&nbsp;";
				echo "<form method= 'post' action=''>";
				echo "<input type='submit' name ='submit' value='desable'></form>";

				echo "<br>";
				echo "<br>";
			}
	?>

	<form method= 'post' action='userLogin.php'>
		<input type="submit" value="Logout"><br>
	</form>

</body>
</html>