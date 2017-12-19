<?php

namespace Compassite\controller;

use Compassite\model\Admin;

class AdminController 
{
	const ADMINROLE = 1;

	public function getMyview()
	{
		$adminObj = new Admin();
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
							header("location:index.php?page=userInformation");
						}		
					}
		    	} catch (\Exception $e) {
		    		$passwordErr = $e->getMessage(); 
				}
			}
		}
		require "/var/www/html/phpCodeSnippets/psrMVC/application/view/adminLogin.php";
	}
		
	function getUserInformation()
	{
		$adminObject = new Admin();
		$allUsers = $adminObject->listUsers();
		if(sizeof($allUsers) <= 0) {
			$noUserMsg = "no registered users";
		}
		require "/var/www/html/phpCodeSnippets/psrMVC/application/view/usersInformation.php";
	}

	function userDisable()
	{
		try
		{
			$adminObj = new Admin();
			if(isset($_POST['submitDisable']))	{
				$deleted=$adminObj->changeStatusDisable($_POST['userid']);
				if($deleted) {
					$msgDisable = " disabled";
				}		
			}
			$this->getUserInformation();	
		} catch(\Exception $e) {
			$msgDisable = $e->getMessage();
		}		
	}
	
	function userEnable()
	{	
		try
		{
			$adminObj = new Admin();
			if(isset($_POST['submitEnable'])) {
				$enabled=$adminObj->changeStatusEnable($_POST['userid']);
				if($enabled) {
					$enableMsg = " Enabled";
				}
			}
			$this->getUserInformation();	
		} catch(\Exception $e) {
			$msgDisable = $e->getMessage();
		}

	}

	function makeUserToAdmin()
	{
		try
		{
			$adminObj = new Admin();
			if(isset($_POST['makeadmin']))
			{
				$success=$adminObj->makeAdmin($value['username']);
				if($success){
					$makeAdminMsg = "admin added";
				}
			}
			$this->getUserInformation();
		} catch(\Exception $e) {
			$makeAdminMsg = $e->getMessage();
		}
	}
		
	function deleteUser()
	{
		try
		{
			$adminObj = new Admin();
			if(isset($_POST['delete']))
			{
				$enabled=$adminObj->removeUsers($value['username']);
				if($enabled)
				{
					$deleteMsg= " User deleted";
				}
			}
			getUserInformation();
		} catch(\Exception $e) {
			$deleteMsg = $e->getMessage();
		}
	}		

	function adminLogout()
	{
		$_SESSION['adminName'] = null;
		require "/var/www/html/phpCodeSnippets/psrMVC/application/view/logout.php";
	}
}
