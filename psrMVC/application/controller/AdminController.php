<?php

namespace Compassite\controller;

use Compassite\model\Admin;
use Compassite\model\UserAdmin;

class AdminController 
{
	const ADMINROLE = 1;
	public $adminObj;
	function __Construct()
	{
		$this->adminObj = new Admin();
	}

	public function getMyview()
	{
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
		    		$adminInfo =$this->adminObj->checkValidation($name,$password);
				
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
		require APP_PATH."/psrMVC/application/view/adminLogin.php";
	}
		
	function getUserInformation()
	{
		$allUsers = $this->adminObj->listUsers();
		if(sizeof($allUsers) <= 0) {
			$noUserMsg = "no registered users";
		}
		require APP_PATH."/psrMVC/application/view/usersInformation.php";
	}

	function userDisable()
	{
		try
		{
			if(isset($_POST['submitDisable']))	{
				$deleted=$this->adminObj->changeStatusDisable($_POST['userid']);
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
			if(isset($_POST['submitEnable'])) {
				$enabled=$this->adminObj->changeStatusEnable($_POST['userid']);
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
			if(isset($_POST['makeadmin']))
			{
				$success=$this->adminObj->makeAdmin($_POST['userid']);
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
			if(isset($_POST['delete']))
			{
				$enabled=$this->adminObj->removeUsers($_POST['userid']);
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

	function editProfileOfUser() {
		try
		{
			$userObj = new UserAdmin();
			$info= $userObj->information($_GET['id']);	

			if(isset($_POST['editProfile']))
			{
			    $name = $_POST['name'];
			    $phoneNumber = $_POST['phoneNumber'];
			    $email = $_POST['email'];
				$enabled=$userObj->editProfile($_POST['userid'],$name,$email,$phoneNumber);
				if($enabled)
				{
					$deleteMsg= " Profile edited";
				}
			}
			require APP_PATH."/psrMVC/application/view/editProfile.php";
		} catch(\Exception $e) {
			$deleteMsg = $e->getMessage();
		}	
	}		

	function adminLogout()
	{
		$_SESSION['adminName'] = null;
		require APP_PATH."/psrMVC/application/view/logout.php";
	}
}
