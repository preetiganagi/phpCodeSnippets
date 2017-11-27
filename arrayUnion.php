
<!DOCTYPE html>
<html>
<head>
	<title>Array Union</title>
</head>
<body>
	<?php 
		$fruits = array("papaya","apple","banana","orange");
		$flowers = array("rose","jasmine","lotus");

		echo " array1 is ";
		echo "<br>";
		print_r($fruits);
		echo "<br>";
		echo "  array1 is";
		print_r($flowers);
	//	$fruits = array_merge($flowers);
		$union = array_unique(array_merge($fruits, $flowers));
		echo "<br>";
		echo " union of array1&2 is";
		print_r($union);


$even = array(2,4,6,8,10,12);
		$odd = array(1,3,5,7,9,11);
		$multiple3 = array(3,6,9,12);


		



	 ?>
</body>
</html>
