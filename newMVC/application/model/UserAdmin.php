<?php
namespace Compassite\model;

use Compassite\model\Dbconnection;
use Compassite\model\UserAdminFunctions;

class UserAdmin implements UserAdminFunctions
{
	protected $name;
	protected $email;
	protected $phoneNumber;
	protected $password;
	protected $roleid;
	protected $concode;
	protected $status;
	function __construct($name=null, $email=null ,$phNum=null ,$password=null, 
		$roleid=null,$concode=null,$status=null)
	{
		$this->name=$name;
		$this->email=$email;
		$this->phoneNumber=$phNum;
		$this->password=$password;
		$this->roleid=$roleid;
		$this->concode=$concode;
		$this->status=$status;
		
	}
	public function setName($name)
	{
		$this->name = $name;
	}
	public function getName()
	{
		return $this->name;
	}
	public function setEmail($email)
	{
		$this->email = $email;
	}
	public function getEmail()
	{
		return $this->email;
	}
	public function setPhoneNumber($phNum)
	{
		$this->phoneNumber = $phNum;
	}
	public function getPhoneNumber()
	{
		return $this->phoneNumber;
	}
	public function setPassword($password)
	{
		$this->password = $password;
	}
	public function getPassword()
	{
		return $this->password;
	}
	public function setRoleid($role)
	{
		$this->roleid = $role;
	}
	public function getRoleid()
	{
		return $this->roleid;
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
      if ($subqry) {
	       	$userQuery = "UPDATE userinformation set ".$subqry." where userid=".$uid."";
	      	$updateUser = $dbObj->pdo->prepare($userQuery);
	      	$updateUser->execute();
	      	return $updateUser->fetch(\PDO::FETCH_ASSOC);
        }
        else
        {
        	throw new \Exception("can not update profile", 0);
        }	   
    }

	public function information($id)
	{
		try
		{
			$dbObj = new DBConnection();
			$userQuery = "select * from userinformation where userid =$id";
			$information = $dbObj->pdo->prepare($userQuery);
	        $information->execute();
	        return $information->fetch(\PDO::FETCH_ASSOC);

		} catch(\Exception $e){
			throw new \Exception("no information found", 0);
		}	
	}	
}	
