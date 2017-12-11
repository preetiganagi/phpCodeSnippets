<?php
/**
* Admin class
*/
include("userabstract.php");
class Admin extends UserAdmin
{
	
	function __construct($name=null,$email=null,$phNum=null,$password=null,$roleid=null,$concode=null,$status = null)
	{
		parent:: __construct($name,$email,$phNum,$password,$roleid,$concode,$status);
	}
	public function getRegisterId($name)
	{
		$dbObj = new DBController();
		$userId = "select userid from userinformation where username='$name'";
		$result = $dbObj->runInsertQuery($userId);
		$res = mysqli_fetch_assoc($result);
		return $res;

	}
	public function listUsers()
	{
		$dbObj = new DBController();
		$userQuery = "select userid,username ,email,phonenumber,contrycode,userstatus from userinformation where roleid = 2";
		$result = $dbObj->runQuery($userQuery);
		/*if(sizeof($result)>0)
		{
			
		}*/
		return $result;
	}
	public function listAdmins($name)
	{
		$dbObj = new DBController();
		$userQuery = "select username ,email,phonenumber,contrycode,userstatus from userinformation where roleid = 1 and username <>'$name'";
		$result = $dbObj->runQuery($userQuery);
		/*if(sizeof($result)>0)
		{
			
		}*/
		return $result;
	}
	public function removeUsers($name)
	{
		$dbObj = new DBController();
		$userQuery = " DELETE FROM userinformation WHERE username='$name'";
		$result = $dbObj->runInsertQuery($userQuery);
		if($result)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function makeAdmin($name)
	{
		$dbObj = new DBController();
		$userQuery="UPDATE userinformation SET roleid=1 WHERE username='$name'";
		$result = $dbObj->runInsertQuery($userQuery);
		if($result)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function removeAdmin($name)
	{
		$dbObj = new DBController();
		$userQuery="UPDATE userinformation SET roleid=2 WHERE username='$name'";
		$result = $dbObj->runInsertQuery($userQuery);
		if($result)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function changeStatus($name)
	{
		$dbObj = new DBController();
		$userQuery="UPDATE userinformation SET userstatus=0 WHERE username='$name'";
		$result = $dbObj->runInsertQuery($userQuery);
		if($result)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function changeStatusEnable($name)
	{
		$dbObj = new DBController();
		$userQuery="UPDATE userinformation SET userstatus=1 WHERE username='$name'";
		$result = $dbObj->runInsertQuery($userQuery);
		if($result)
		{
			return true;
		}
		else
		{
			return false;
		}
	}


	public function findAdminId($name)
	{
		$dbObj = new DBController();
		$adminQuery = "select roleid from userinformation where username='$name'";
		$result = $dbObj->runInsertQuery($adminQuery);
		$id = mysqli_fetch_assoc($result);
		return $id;
	}
	public function information($id)
	{
		$dbObj = new DBController();
		$userQuery = "select username,phonenumber,email,contrycode,roleid from userinformation where userid =$id";
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
	public function editProfile($id,$name=null,$email=null,$phNum=null)
	{
		$flag = false;
		$dbObj = new DBController();
		//$uid = $this->getRegisterId($preName);
	
			if($name == null && $email == null && $phNum == null){
				return false;
			}
			elseif ($email == null && $phNum == null) {
			$userQuery = " UPDATE userinformation SET username ='$name' WHERE userid=$id";
			}
			elseif($email == null)
			{
			$userQuery = " UPDATE userinformation SET username ='$name', phonenumber ='$phNum' WHERE userid=$id";
			}
			elseif ($phNum == null) {
				$userQuery = " UPDATE userinformation SET username ='$name', email ='$email' WHERE userid=$id";
			}
			elseif ($name == null) {
				$userQuery = " UPDATE userinformation SET email ='$email',phonenumber ='$phNum' WHERE userid=$id";
			}
			else
			{
				$userQuery = " UPDATE userinformation SET username ='$name',email ='$email',phonenumber ='$phNum' WHERE userid=$id";
			}
				$result = $dbObj->runInsertQuery($userQuery);
				if($result)
				{
				$flag =  true;
				
				}
			return $flag;
	}
}
?>