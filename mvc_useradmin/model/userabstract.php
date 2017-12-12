<?php
include("dbconnection.php");
class UserAdmin 
{
	protected $name;
	protected $email;
	protected $phoneNumber;
	protected $password;
	protected $roleid;
	protected $concode;
	protected $status;
	function __construct($name, $email ,$phNum ,$password, 
		$roleid,$concode,$status)
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
	public function display()
	{
		echo "<h3>Name is:".$this->name;
		echo "<br>Email is:".$this->email;
		echo "<br>Phone Number is:".$this->phoneNumber."</h3>";


	}
	
}
?>
	
	
