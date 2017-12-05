
<?php
header("Access-Control-Allow-Origin: *"); 
header("Content-Type: application/json_encode($checkUserResult); charset=UTF-8");

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		$checkUserQuery = "select * from userinformation";
		$conn = mysqli_connect("localhost","root","compass","sessiondatabase");
		echo mysqli_error($conn);
		$checkUserResult = mysqli_query($conn,$checkUserQuery);
		
		
		if(mysqli_num_rows($checkUserResult)>0)
		{	
			echo "<h3>Registered users are :".mysqli_num_rows($checkUserResult)."</h3>";
			
				
				echo "<h4>";
				foreach ($checkUserResult as $value) {
					foreach ($value as $key => $value) {
						echo $key." => ".$value;
				
					}

					
				}
			echo "</h4>";

			
		}


	?>

	<form method= 'post' action='userLogin.php'>
		<input type="submit" value="Logout"><br>
	</form>
</body>
</html>