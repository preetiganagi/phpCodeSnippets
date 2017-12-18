<?php

namespace Compassite\controller;

use Compassite\model\Admin;

class AdminController 
{
	const ADMINROLE = 1;

	public function getMyview()
	{
		$adminObj = new Admin();

		require "/var/www/html/phpCodeSnippets/psrMVC/application/view/adminLogin.php";
		
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
		    	try
		    	{
		    		$adminInfo =$adminObj->checkValidation($name,$password);
				
					foreach ($adminInfo as $value) 
					{
						if($value['roleid'] == self::ADMINROLE) 
						{
							$_SESSION['adminName']=$name;
							header("location:index.php?action=usersInformation");
						}	
						
					}
		    	} catch (Exception $e) {

		    		$passwordErr ="not valid admin".$e->getMessage(); 

		    	}
			}
		}
	}
		
	function getUserInformation()
	{
		$adminObject = new Admin();
		$allUsers = $adminObject->listUsers();
		require "/var/www/html/phpCodeSnippets/psrMVC/application/view/usersInformation.php";	

			if(isset($_POST['submitDisable']))
			{
				$deleted=$adminObject->changeStatus($value['username']);
					if($deleted)
					{
						$msgDisable = " disabled";
					}
						$msgDisable = "  not possible";
							
			}
			if(isset($_POST['makeadmin']))
			{
				$success=$adminObject->makeAdmin($value['username']);
				if($success){
					$makeAdminMsg = "admin added";
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

			if(sizeof($allUsers) <= 0) {

				$noUserMsg = "no registered users";

			}	
	}

	function adminLogout()
	{

		session_destroy();

		require "/var/www/html/phpCodeSnippets/psrMVC/application/view/logout.php";
	}
}
