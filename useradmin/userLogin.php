

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
    	$name = $_POST['name'];
		$checkUserQuery = "select userid,username,password from userinformation where username='$name'";
		include("dbconnect.php");
		$dbObj = new DBController();
		$result = $dbObj->runQuery($checkUserQuery);
		if(sizeof($result)>0)
		{	

			foreach ($result as $key => $value) {
				if($value['username'] == $name && $value['password'] == md5($_POST['password'])) 
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
		if (empty($name) || empty($_POST['password'])) {

			$passwordErr ="password not matched";
		}
	}	
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
<?php $msg=$_GET['msg'];
	echo $msg;
	?>
</body>

</html>