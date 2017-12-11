<?php
 function adminLoginValidation(){
		if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
    	$name = $_POST['name'];
		$checkUserQuery = "select * from userinformation where username='$name'";
		include("../model/dbconnect.php");
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
						header("location:../view/registredUsers.php");
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
	require "../view/adminLogin.php";
}
adminLoginValidation();

function registeredUsersUpdate(){


	
}



?>
