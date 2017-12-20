<?php

namespace Compassite\model;

use Compassite\model\UserAdmin;
/**
* user class
*/
class User extends UserAdmin
{

	
	function __construct($name=null,$email=null,$phNum=null,$password=null,$roleid=null,$concode=null,$status = null)
	{
		parent:: __construct($name,$email,$phNum,$password,$roleid,$concode,$status);
	}

	public function getRegisterId($name)
	{
		$dbObj = new DBConnection();
		$userId = "select userid from userinformation where username='$name'";
		$success = $dbObj->pdo->prepare($userId);
		$success->execute();
		return $success->fetch(\PDO::FETCH_ASSOC);

	}
	/**
	* register profile
	*/
	public function registration(User $user)
	{
		$dbObj = new DBConnection();
      	$insertUserInfo = "INSERT INTO userinformation (username,password,phonenumber,email,roleid,contrycode,userstatus) 
        VALUES ('".$user->name."','".$user->password."','".$user->phoneNumber."','".$user->email."','".$user->roleid."','".$user->concode."',".$user->status.")";
		$success = $dbObj->pdo->prepare($userId);
		return $success->execute();
		
	}	
}
