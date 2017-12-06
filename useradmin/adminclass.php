<?php
/**
* Admin class
*/
class Admin extends UserAdmin
{
	
	function __construct($name,$email,$phNum)
	{
		parent:: __construct($name,$email,$phNum);
	}
	public function listUsers()
	{
		$dbObj = new DBController();
		$userQuery = "select username ,email,phonenumber from userinformation";
		$result = $dbObj->runQuery($userQuery);
		/*if(sizeof($result)>0)
		{
			
		}*/
		return $result;
	}
	public function removeUsers($name)
	{
		$dbObj = new DBController();
		$userQuery = " DELETE FROM userinformation WHERE username='".$name."'";
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
		$userQuery="UPDATE userinformation SET roleid=1 WHERE username='".$name."'";
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
}
?>