<?php
/**
* 
*/
interface AdminFunctions()
{
	public function listOfUsers();
	public function editProfile($name);
	public function deleteUser($name);
}
class Admin extends AdminFunctions()
{
	protected $name;
	protected $email;
	protected $phoneNumber;
	 
	function __construct($name,$email,$phNum)
	{
		$this->name=$name;
		$this->email=$email;
		$this->phoneNumber=$phNum;
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
	public function display()
	{
		echo "<br><h3>Name is:".$this->name;
		echo "<br>Email is:".$this->email;
		echo "<br>Phone Number is:".$this->phoneNumber."</h3>";
	}



	
}
