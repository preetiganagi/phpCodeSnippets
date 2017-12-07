
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
	$name ="";
		echo  "<h2>Hi   ",$_SESSION['userName'],"</h2>";

		//$checkUserQuery = "select * from userinformation where roleid=2";
		include("adminclass.php");
		/*$dbObj = new DBController();
		$result = $dbObj->runQuery($checkUserQuery);*/
		$adminObj1 = new Admin();
		$result = $adminObj1->listUsers();
		//print_r($result);

		echo "<h3>Registered users are :".sizeof($result)."</h3>";
		if (sizeof($result)>0) {
		
			foreach ($result as $key => $value) { 
				
				echo "<br>";
				echo "<input type='checkbox' name='delete[]' id ='delete' value='".$value['username']."'><br>";
				echo "name Is :".$value['username'];
				$name = $value['username'];
        		echo "<br>";
        		echo "email Is :".$value['email'];
        		echo "<br>";
        		echo "phone number Is :".$value['phonenumber'];
				echo "<br>";
				//echo "<input type='submit' value='disable'>&nbsp;&nbsp;";
				echo "<form method= 'post' action=''>";
				echo "<input type='hidden' name ='adminname' value='$name'>";
				echo "<input type='submit' name ='submit' value='desable'></form>";
				echo "<form method= 'post' action=''>";
				echo "<input type='hidden' name ='adminname' value='$name'>";
				echo "<input type='submit' name ='makeadmin' value='make admin'></form>";
				echo "<br>";
				echo "<br>";
			}
			$adminObj2 = new Admin();
				if($_SERVER["REQUEST_METHOD"] == "POST")
				{
					if(isset($_POST['submit']))
					{
					$deleted=$adminObj2->changeStatus($_POST['adminname']);
						if($deleted){
						echo " disabled";
					}
					else
					{
						echo "  not possible";
					}
					}
					if(isset($_POST['makeadmin']))
					{
					$success=$adminObj2->makeAdmin($_POST['adminname']);
					if($success){
						echo " added admin";
					}
					else
					{
						echo "  not possible";
					}
					}	

				}	
				
			}
			$result1 = $adminObj1->listAdmins();
		//print_r($result);

		echo "<h3>Registered admins are :".sizeof($result1)."</h3>";
		if (sizeof($result1)>0) {
		
			foreach ($result1 as $key => $value) { 
				
				echo "<br>";
				echo "name Is :".$value['username'];
        		$nameAdmin = $value['username'];
        		echo "<br>";
        		echo "email Is :".$value['email'];
        		echo "<br>";
        		echo "phone number Is :".$value['phonenumber'];
				echo "<br>";
				//echo "<input type='submit' value='disable'>&nbsp;&nbsp;";
				
				echo "<form method= 'post' action=''>";
				echo "<input type='hidden' name ='admin' value='$nameAdmin'>";
				echo "<input type='submit' name ='removeadmin' value='remove admin'></form>";
				echo "<br>";
				echo "<br>";
				}
			}
				$adminObj = new Admin();
				if($_SERVER["REQUEST_METHOD"] == "POST")
				{
					
					if(isset($_POST['removeadmin']))
					{
					$success1=$adminObj->removeAdmin($_POST['admin']);
					if($success1){
						echo " removed admin";
					}
					else
					{
						echo "  not possible";
					}
					}

				}
				else{
					echo "no registered users";
				}
		
	?>

	<form method= 'post' action='userLogin.php'>
		<input type="submit" value="Logout"><br>
	</form>

</body>
</html>