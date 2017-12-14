<?php

namespace Compassite\model;

use Compassite\model\UserAdmin;
use Compassite\model\DBConnection;

class Admin extends UserAdmin
{
	/**
	* Admin class
	*/
	const USERID = 2;	
	function __construct($name=null,$email=null,$phNum=null,$password=null,$roleid=null,$concode=null,$status = null)
	{
		parent:: __construct($name,$email,$phNum,$password,$roleid,$concode,$status);
	}
	

	public function getModelData()
	{
		echo "Hello Buddy! I am here";
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
		/*$dbObj = new DBConnection();
		$userQuery = "select userid,username ,email,phonenumber,contrycode,userstatus from userinformation where roleid = 2";
		$result = $dbObj->runQuery($userQuery);
		if(sizeof($result)>0)
		{
			
		}
	return $result;*/
	}
	
	public function listAdmins($name)
	{
		$dbObj = new DBConnection();
		$userQuery = "select username ,email,phonenumber,contrycode,userstatus from userinformation where roleid = 1 and username <>'$name'";
		$result = $dbObj->runQuery($userQuery);
		/*if(sizeof($result)>0)
		{
			
		}*/
		return $result;
	}
	/*public function removeUsers($name)
	{
		$dbObj = new DBConnection();
		$userQuery = " DELETE FROM userinformation WHERE username='$name'";
		$result = $dbObj->runInsertQuery($userQuery);
		if($result)
		{
			return true;
		}
		
			return false;
		
	}*/
	public function removeUsers($name)
	{
		$name=$removeUsers->getName();
		$password=$removeUsers->getPassword();
		$email=$removeUsers->getEmail();

	    $removeQuery = $this->pdo->prepare("DELETE FROM userinformation 
	    			WHERE username='".$name."'");
	  
		$removeQuery->bindParam(':username', $name);
		$removeQuery->bindParam(':password', $password);
		$removeQuery->bindParam(':email', $email);

	$removeQuery->execute();

}

	public function makeAdmin($name)
	{
		$dbObj = new DBConnection();
		$userQuery="UPDATE userinformation SET roleid=1 WHERE username='$name'";
		$result = $dbObj->runInsertQuery($userQuery);
		if($result)
		{
			return true;
		}
		
			return false;
		
	}
	public function removeAdmin($name)
	{
		$dbObj = new DBConnection();
		$userQuery="UPDATE userinformation SET roleid=2 WHERE username='$name'";
		$result = $dbObj->runInsertQuery($userQuery);
		if($result)
		{
			return true;
		}
		
			return false;
		
	}
	public function changeStatus($name)
	{
		$dbObj = new DBConnection();
		$userQuery="UPDATE userinformation SET userstatus=0 WHERE username='$name'";
		$result = $dbObj->runInsertQuery($userQuery);
		if($result)
		{
			return true;
		}
			return false;
	}
	public function changeStatusEnable($name)
	{
		$dbObj = new DBConnection();
		$userQuery="UPDATE userinformation SET userstatus=1 WHERE username='$name'";
		$result = $dbObj->runInsertQuery($userQuery);
		if($result)
		{
			return true;
		}
		
			return false;
		
	}


	public function findAdminId($name)
	{
		$dbObj = new DBConnection();
		$adminQuery = "select roleid from userinformation where username='$name'";
		$result = $dbObj->runInsertQuery($adminQuery);
		$id = mysqli_fetch_assoc($result);
		return $id;
	}
	public function information($id)
	{
		$dbObj = new DBConnection();
		$userQuery = "select * from userinformation where userid =$id";
		try
		{
			$result = $dbObj->runQuery($userQuery);
			if(sizeof($result)>0)
			{
				return $result;
			}
		}
		catch(Exception $e){
			//echo $e->getMessage();
		}
	}

	public function editProfile($uid,$name=null,$email=null,$phonenumber=null) {
        
        $dbObj = new DBConnection();

        if($name) {
            $subqry="username='$name',";
        }
        if($email) {
            $subqry.="email='$email',";
        }
        if($contact) {
            $subqry.="phonenumber=$phonenumber";
        }

        $userQuery = "UPDATE userinformation set ".$subqry." where userid=".$uid."";

        if($dbObj->runQuery($userQuery)) {
       
            return true;
        }      
        return false;
    }



	function checkValidation($name,$password)
	{
		$dbObj = new DBConnection();
		
			$stmt = $dbObj->pdo->prepare("select * from userinformation where username='$name' and password='$password'");
			$stmt->execute();
			return $stmt->fetchAll();
		 
	}
}
