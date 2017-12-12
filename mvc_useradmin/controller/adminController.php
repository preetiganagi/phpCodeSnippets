<?php
include("../model/adminclass.php");
 function adminLoginValidation(){
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
    	$name = $_POST['name'];
    	$adminObj = new Admin();
		$result =$adminObj->allUsers();
		if(sizeof($result)>0)
		{	
			foreach ($result as $key => $value) {
				if(($value['username'] == $name) && ($value['password'] == md5($_POST['password'])))
				{
					if ($value['roleid'] == 1) {
						session_start();
						$_SESSION['userName'] = $name;
						header("location:../view/usersInformation.php");
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

function usersInformation(){
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
		$adminObj1 = new Admin();
		$allUsers = $adminObj1->listUsers();
		$adminObj2 = new Admin();
				if($_SERVER["REQUEST_METHOD"] == "POST")
				{
					if(isset($_POST['submit']))
					{
						$deleted=$adminObj2->changeStatus($_POST['statusDisable']);
							if($deleted){
								$msg = " disabled";
							}
							$msg = "  not possible";
						
					}
					if(isset($_POST['makeadmin']))
					{
						$success=$adminObj2->makeAdmin($_POST['adminname']);
						if($success){
							$addAdminMsg=" added admin";
							$to      = 'preetiganagi@gmail.com';
						$subject = 'status ';
						$message = 'u r admin now';
						$headers = 'From:preetiganagi777@gmail.com';
						mail($to, $subject, $message, $headers);
						}
						$msg ="  not possible";
						
					}
					if(isset($_POST['submit']))
					{
						$enabled=$adminObj2->changeStatusEnable($_POST['statusEnable']);
							if($enabled){
								$enableMsg = " Enabled";
							}
						$msg =  "  not possible";
					}
					if(isset($_POST['delete']))
					{
						$enabled=$adminObj2->removeUsers($_POST['deleteUser']);
							if($enabled){
								$deleteMsg= " User deleted";
							}
						$msg= "can not delete";
					}

				}	
				else{
					$noUserMsg = "no registered users";
				}
			require "../view/usersInformation.php";	
		}
				
	}
usersInformation();


?>
