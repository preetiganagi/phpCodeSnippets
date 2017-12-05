<?php
	abstract class Person 
	{
		protected $name;
		protected $age;
		function __construct($name,$age)
		{
			$this->name = $name;
			$this->age = $age;

		}
		public function setName($name)
		{
			$this->name = $name;

		}

		public function setAge($age)
		{
			$this->age = $age;

		}
		abstract public function display();
		
	}

	/**
	*  employee class
	*/
	class Employee extends Person
	{
		public $projectName;
		function __construct($name,$age,$projectName)
		{
			$this->projectName = $projectName;
			parent::__construct($name,$age);
		
		}
		public function setProjectName($project)
		{
			$this->projectName = $project;

		}

		public function display()
		{
			echo "name is : ".$this->name;
			echo "<br>";
			echo "age is : ".$this->age;
			echo "<br>";
			echo "project is : ".$this->projectName;
			
		}	
	}
	/**
	*  manager class
	*/
	class Manager extends Person
	{
		public $numberOfEmps;

		function __construct($name,$age,$numberOfEmps)
		{
			$this->numberOfEmps = $numberOfEmps;
			parent::__construct($name,$age);
		
		}
		public function setProjectName($emps)
		{
			$this->numberOfEmps = $emps;

		}
		public function display()
		{
			echo "name is : ".$this->name;
			echo "<br>";
			echo "age is : ".$this->age;
			echo "<br>";
			echo " employees under working : ".$this->numberOfEmps;
			
		}	
	}
?>