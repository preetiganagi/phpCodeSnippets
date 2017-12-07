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
		$userQuery = "select username ,email,phonenumber,contrycode,userstatus from userinformation";
		$result = $dbObj->runQuery($userQuery);
		/*if(sizeof($result)>0)
		{
			
		}*/
		return $result;
	}
	public function removeUsers($id)
	{
		$dbObj = new DBController();
		$userQuery = " DELETE FROM userinformation WHERE username=$id";
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
	public function makeAdmin($id)
	{
		$dbObj = new DBController();
		$userQuery="UPDATE userinformation SET roleid=1 WHERE username=$id";
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
}
?>