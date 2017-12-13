<?php

namespace Compassite\controller;

use Compassite\model\Admin;

class AdminController 
{
	const ADMINROLE = 1;

	public function getMyview()
	{
	
		require "/var/www/html/phpCodeSnippets/mvc_useradmin/application/view/adminLogin.php";
		$adminObj = new Admin();

		$adminObj->getModelData();
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{   
			if(isset($_POST['adminLoginSubmit']))
			{
		    	$name = $_POST['name'];
		    	$adminObj = new Admin();
				$result =$adminObj->allUsers();
				if(sizeof($result)>0)
				{	
					foreach ($result as $key => $value) {
						if(($value['username'] == $name) && ($value['password'] == md5($_POST['password'])))
						{
							if ($value['roleid'] == ADMINROLE) {
								session_start();
								$_SESSION['userName'] = $name;
								header("location:../view/userInformationController.php");
							}	
							$passwordErr ="not valid admin";
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
		}		
	}

}