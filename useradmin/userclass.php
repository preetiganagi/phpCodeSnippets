
<?php

include("userabstract.php");
/**
* user class
*/
class User extends UserAdmin
{

	
	function __construct($name=null,$email=null,$phNum=null,$password=null,$roleid=null)
	{
		parent:: __construct($name,$email,$phNum,$password,$roleid);
	}
	public function changePassword($pwd)
	{

	}
	public function getRegisterId($name)
	{
		$dbObj = new DBController();
		$userId = "select userid from userinformation where username='$name'";
		$result = $dbObj->runQuery($userId);
		return $result;

	}
	/**
	* updating profile
	*/
	public function editProfile($preName,$name,$email=null,$phNum=null)
	{
		$flag = false;
		$dbObj = new DBController();
		$uid = $this->getRegisterId($preName);
		foreach ($uid as $key => $value) {
			if ($email == null && $phNum == null) {
			$userQuery = " UPDATE userinformation SET username ='$name' WHERE userid=".$value['userid']."";
			}
			elseif($email == null)
			{
			$userQuery = " UPDATE userinformation SET username ='$name', phonenumber ='$phNum' WHERE userid=".$value['userid']."";
			}
			elseif ($phNum == null) {
				$userQuery = " UPDATE userinformation SET username ='$name', email ='$email' WHERE userid=".$value['userid']."";
			}
			elseif ($name == null) {
				$userQuery = " UPDATE userinformation SET email ='$email',phonenumber ='$phNum' WHERE userid=".$value['userid']."";
			}

		
				$result = $dbObj->runInsertQuery($userQuery);
				if($result)
				{
				$flag =  true;
				
				}
			
			
		
		}
		return $flag;
		
		

	}
	/**
	* register profile
	*/
	public function registration(User $user)
	{
		$dbObj = new DBController();
      	$insertUserInfo = "INSERT INTO userinformation (username,password,phonenumber,email,roleid) 
        VALUES ('".$user->name."','".$user->password."','".$user->phoneNumber."','".$user->email."','".$user->roleid."')";
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
	public function information($name)
	{
		$dbObj = new DBController();
		$userQuery = "select username,phonenumber,email from userinformation where username ='".$name."'";
		try
		{
			$result = $dbObj->runQuery($userQuery);
			if(sizeof($result))
			{
				return $result;
			}
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}
	
}

?>