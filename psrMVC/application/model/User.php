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

	public function changePassword($pwd)
	{
		

	}
	
	public function getRegisterId($name)
	{
		$dbObj = new DBConnection();
		$userId = "select userid from userinformation where username='$name'";
		$result = $dbObj->runQuery($userId);
		return $result;

	}
	/**
	* register profile
	*/
	public function registration(User $user)
	{
		$dbObj = new DBConnection();
      	$insertUserInfo = "INSERT INTO userinformation (username,password,phonenumber,email,roleid,contrycode,userstatus) 
        VALUES ('".$user->name."','".$user->password."','".$user->phoneNumber."','".$user->email."','".$user->roleid."','".$user->concode."',".$user->status.")";
		//echo $insertUserInfo;
		$result = $dbObj->runInsertQuery($insertUserInfo);
		if($result)
		{
			return true;
		}
        else
        {
            return false;
        }
	}	
}
