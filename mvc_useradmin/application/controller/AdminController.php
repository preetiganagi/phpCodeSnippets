<?php

namespace Compassite\controller;

use Compassite\model\Admin;

class AdminController 
{
	const ADMINROLE = 1;

	public function getMyview()
	{
		$adminObj = new Admin();

		$adminObj->getModelData();
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{   
			if(isset($_POST['adminLoginSubmit']))
			{
				if (empty($name) || empty($_POST['password']))
				{
					$passwordErr =" user name or password not matched";
				}	
		    	$name = $_POST['name'];
		    	$password = md5($_POST['password']);
				$result =$adminObj->checkValidation($name,$password);
				//print_r($result);
				if(($result)>0)
				{	
					if($result['roleid'] == 1) 
					{
						session_start();
						$_SESSION['userName'] = $name;
						header("location:index.php?action='userInformation'");
					}	
					$passwordErr ="not valid admin";
				}
				else 
				{
					$passwordErr ="not matched";
				}
			}
		}
		require "/var/www/html/phpCodeSnippets/mvc_useradmin/application/view/adminLogin.php";
	}		

	function getUserInformation()
	{
		$adminObject = new Admin();
		$allUsers = $adminObject->listUsers();
		
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			if(isset($_POST['submitDisable']))
			{
				$deleted=$adminObject->changeStatus($value['username']);
					if($deleted){
						$msgDisable = " disabled";
					}
						$msgDisable = "  not possible";
						
			}
			if(isset($_POST['makeadmin']))
			{
				$success=$adminObject->makeAdmin($value['username']);
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
			if(isset($_POST['submitEnable']))
			{
				$enabled=$adminObject->changeStatusEnable($value['username']);
					if($enabled){
						$enableMsg = " Enabled";
					}
					$enableMsg =  "  not possible";
			}
			if(isset($_POST['delete']))
			{
				$enabled=$adminObject->removeUsers($value['username']);
					if($enabled){
						$deleteMsg= " User deleted";
					}
				$deleteMsg= "can not delete";
			}

		}
		if(sizeof($allUsers) <= 0) {
			$noUserMsg = "no registered users";
		}	
	require "/var/www/html/phpCodeSnippets/mvc_useradmin/application/view/usersInformation.php";	
	}

	function adminLogout()
	{

	}

}
