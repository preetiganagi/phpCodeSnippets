

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php

    	$name = $_POST['name'];
		$checkUserQuery = "select userid,username,password from userinformation where username='$name'
";
		$conn = mysqli_connect("localhost","root","compass","sessiondatabase");
		echo mysqli_error($conn);
		$checkUserResult = mysqli_query($conn,$checkUserQuery);
		//echo mysqli_num_rows($checkUserResult);
		
		if(mysqli_num_rows($checkUserResult)>0)
		{	

			while ($result = mysqli_fetch_assoc($checkUserResult)) {
				if($result['username'] == $name && $result['password'] == md5($_POST['password'])) 
				{
				session_start();
				$_SESSION['userName'] = $name;
				header("location:userList.php");
				}
				else {
					$passwordErr ="password not matched";
				}
			}
		}
		
	
?>
<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
    
		echo "<h2>logged out successfully</h2>";
	}
?>
	
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
</body>
</html>