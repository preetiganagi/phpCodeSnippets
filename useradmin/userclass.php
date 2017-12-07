
<?php

include("userabstract.php");
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
		$dbObj = new DBController();
		$userId = "select userid from userinformation where username='$name'";
		$result = $dbObj->runQuery($userId);
		return $result;

	}
	/**
	* updating profile
	*/
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
	/**
	* register profile
	*/
	public function registration(User $user)
	{
		$dbObj = new DBController();
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
	public function information($id)
	{
		$dbObj = new DBController();
		$userQuery = "select username,phonenumber,email,contrycode from userinformation where userid =$id";
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