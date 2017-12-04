
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

		$checkUserQuery = "select username from userinformation";
		$conn = mysqli_connect("localhost","root","compass","sessiondatabase");
		echo mysqli_error($conn);
		$checkUserResult = mysqli_query($conn,$checkUserQuery);
		
		
		if(mysqli_num_rows($checkUserResult)>0)
		{	
			echo "<h3>Registered users are :".mysqli_num_rows($checkUserResult)."</h3>";
			while ($result = mysqli_fetch_assoc($checkUserResult)) {
				
				echo "<h4>";
				echo $result['username'],"</h4>";

			}
		}


	?>

	<form method= 'post' action='index.php'>
		<input type="submit" value="Logout"><br>
	</form>
	
</body>
</html>