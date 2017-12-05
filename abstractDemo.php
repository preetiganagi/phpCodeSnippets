<?php
	abstract class ClassA 
	{
		public $res=10;
		
		abstract protected function sum($a , $b);
		abstract protected function substraction($a , $b);

		public function display()
		{
			echo "answer is".$this->sum;
		}
		
	}
	/**
	* 
	*/
	class ClassB extends ClassA
	{
		protected $sum;
		/* public $var;
		public $var2;
		function _constructor($a,$b)
		{
			$var=$a;
			$var2 =$b;
		}*/
		public function sum($a,$b)
		{
		$this->sum = $a+$b;
			//return $a+$b;
		}

		public function substraction($a,$b)
		{
			return $a-$b;
		}

		public function displaynum()
		{
			echo parent::$res;
		}
	}



	$obj = new ClassB();

	$obj->sum(10,20);

	$obj->display();
	
	$sub=$obj->substraction(20,10);
	$obj->display($sub);
	$obj->displaynum();

?>