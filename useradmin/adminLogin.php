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
		$checkUserQuery = "select * from userinformation where username='$name'";
		include("dbconnect.php");
		$dbObj = new DBController();
		$result = $dbObj->runQuery($checkUserQuery);
		if(sizeof($result)>0)
		{	
			foreach ($result as $key => $value) {
				if(($value['username'] == $name) && ($value['password'] == md5($_POST['password'])))
				{
					if ($value['roleid'] == 1) {
						session_start();
						$_SESSION['userName'] = $name;
						header("location:registredUsers.php");
					}
						else {
					$passwordErr ="not valid admin";
				}
				
			}
			else {
					$passwordErr ="not matched";
				}

		}
	}
		if (empty($name) || empty($_POST['password'])) {
			
					$passwordErr =" user name or password not matched";
				}
		
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
 
<?php $msg=$_GET['msg'];
	echo $msg;
	?>
</body>
</html>