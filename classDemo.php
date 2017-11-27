<?php
/**
* 
*/
define("name", "preeti");
class A  
{
	
	function __construct()
	{
		echo "class A called";

	}
}
class B extends A
{
	
	function __construct()
	{
		echo "class  B called";
		echo name;
	}
}

//$obj1 = new A();


echo "<br>";
$obj2 = new B();


?>