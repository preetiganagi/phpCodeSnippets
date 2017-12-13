<?php
	include("../model/adminclass.php");

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
	require "../view/usersInformation.php";	
?>		
				

