<?php
$a[] = 1;
$a['kiran'] =2;
$a[] = 3;
$a[4] = 4;
$a[] =5;

print_r(array_keys($a)); 
function getarray()
{
	try{
	echo $a[17];
}
catch(Exception $e){
echo $e->getMessage();
}
}
/**
* 
*/
class ClassName extends Exception
{
	public $msg;
	function __construct($e)
	{
		 $this->msg=$e;
	}

	function getMsg()
	{
		return $msg;
	}

}
function inverse($x)  {
 
try {
 	$val = 1/$x;
 	throw new ClassName("divide by zero");
} catch (ClassName $e) {
 echo 'Caught exception: '.$e->getMsg()."\n";
}
}
inverse(0);
// Contin;ue execution
//echo "Hello World\n";
?>