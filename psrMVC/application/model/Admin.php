<?php

namespace Compassite\model;

use Compassite\model\UserAdmin;
use Compassite\model\Dbconnection;

class Admin extends UserAdmin
{
	const USERID = 2;	
	const ADMINROLE = 1;
	const DISABLE = 0;
	const ENABLE = 1;
	
	function __construct($name=null,$email=null,$phNum=null,$password=null,$roleid=null,$concode=null,$status = null)
	{
		parent:: __construct($name,$email,$phNum,$password,$roleid,$concode,$status);
	}
	
	public function getRegisterId($name)
	{
		$dbObj = new DBConnection();
		$userId = "select userid from userinformation where username='$name'";
		$result = $dbObj->runInsertQuery($userId);
		$res = mysqli_fetch_assoc($result);
		return $res;

	}
	public function listUsers()
	{
		try
		{
			$dbObj = new DBConnection();
			$userQuery = "select userid,username ,email,phonenumber,contrycode,userstatus from userinformation where roleid = ".self::USERID."";
			$listUsers = $dbObj->pdo->prepare($userQuery);
			$listUsers->execute();
			return $listUsers->fetchAll();			
		} catch (\Exception $e) {
			throw new \Exception("No Users Found", 0);	
		}
		
	}
	
	public function listAdmins($name)
	{
		$dbObj = new DBConnection();

		$userQuery = "select username ,email,phonenumber,contrycode,userstatus from userinformation where roleid = ".self::ADMINROLE." and username <>'$name'" ;

		$listUsers = $dbObj->pdo->prepare($userQuery);

		$listUsers->execute();
		
		return $listUsers->fetchAll();
	}

	public function removeUsers($name)
	{
		$dbObj = new DBConnection();
	    $removeQuery = $dbObj->pdo->prepare("DELETE FROM userinformation 
	    			WHERE username='".$name."'");	  
		if ($removeQuery->execute()) {
			return true;
		}
		else {
			throw new \Exception("can not delete", 0);	
		}
	}

	public function makeAdmin($name)
	{
		$dbObj = new DBConnection();
		$userQuery="UPDATE userinformation SET roleid=".self::ADMINROLE." WHERE username='".$name."'";
		$success = $dbObj->pdo->prepare($userQuery);
		$success->execute();				
		return $success;
	}
	public function removeAdmin($name)
	{
		$dbObj = new DBConnection();
		$userQuery="UPDATE userinformation SET roleid=".self::USERID." WHERE username='$name'";
		$result = $dbObj->runInsertQuery($userQuery);
		if($result)
		{
			return true;
		}
			return false;
	}

	public function changeStatusDisable($id)
	{
		try
		{
			$dbObj = new DBConnection();
			$userQuery="UPDATE userinformation SET userstatus=".self::DISABLE." WHERE userid=$id";
			$success = $dbObj->pdo->prepare($userQuery);
			return $success->execute();
		} catch(\Exception $e){
			throw new \Exception("can not disable User", 0);	
		}	
	}

	public function changeStatusEnable($id)
	{
		try
		{
			$dbObj = new DBConnection();
			$userQuery="UPDATE userinformation SET userstatus=".self::ENABLE." WHERE userid=$id";
			$success = $dbObj->pdo->prepare($userQuery);
			$success->execute();		
			return $success;
		} catch(\Exception $e) {
			throw new \Exception("can not enable user", 0);
			
		}
		
	}

	function checkValidation($name,$password)
	{
	
		$dbObj = new DBConnection();
		$vlaidateQuery = $dbObj->pdo->prepare("select * from userinformation where username='".$name."' and password='".$password."'");
		$vlaidateQuery->execute();
		if ($validUser = $vlaidateQuery->fetchAll()) {

			return $validUser;
		}
		else{

			throw new \Exception("no such admin", 0);
		}	
	}
}
