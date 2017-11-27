CTYPE html>
<html>
<head>
	<title>Array Union</title>
</head>
<body>
	<?php 

		$even = array(2,4,6,8,10,12);
		$odd = array(1,3,5,7,9,11);
		$multiple3 = array(3,6,9,12);
		 
		echo "array difference";
		echo "array 1 <br>";
		 print_r($even);
		 echo "<br>";
		 echo "array 2 <br>";
		 print_r($multiple3);
		 echo "<br>";
		 echo "difference of array1 - array2 ";
		$differ = array_diff($even, $multiple3);
		print_r($differ);

		echo "difference of array2 - array1 ";
		$differ = array_diff($multiple3, $even);
		print_r($differ);

		echo "<br>";
		echo "<br>";
		echo "array intersection";

		$intersection = array_intersect($even, $multiple3);
		
		print_r($intersection);

		echo "<br>";
		echo "<br>";


	 ?>
</body>
</html>


