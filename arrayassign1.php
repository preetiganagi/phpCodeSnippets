<!DOCTYPE html>
<html>
<head>
	<title></title>
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


		echo"<h4> array values</h4>";

		$salary = array( "preeti"=> 10000,"priya"=>20000, "sagar"=>30000);

		print_r($salary);
		echo "<br>";		

		echo "<h4>multidimentional array </h4>";

		$marks=array(
			"preeti" => array("Maths"=>80),
			"Prita" =>array("Maths"=>90,"Physics"=>78),
			"pinku"=>array("Maths"=>78,"Physics"=>90)
			);
		echo "array values are<br>";
		print_r($marks);

		echo "<br><h4>displaying key-value pair in table form</h4>";

		echo "<table border=1px>";
		echo "<tr>";
			echo "<td><h5>name</h5></td>";
			echo "<td><h5>salary</h5></td>";
		echo "</tr>";

		foreach ($salary as $key => $value) {
			echo "<tr>";
					echo "<td>".$key."</td>";
					echo "<td>".$value."</td>";
			echo "</tr>";
		}
		echo "</table>";

		echo "<h5>Use array_slice and cut the array with between two index</h5>";

		
		$a=array("red","green","blue","yellow","brown");
        echo "  array1 is<br>";
		echo "<pre>";
		print_r($a);
        
        echo " array_slice at 2nd index<br> ";

        print_r(array_slice($a,2));
        	 echo "cutting array at 1st and last 2 index<br> ";
        print_r(array_splice($a,1,-2));
        
         echo "Define a variable with the small paragraph , and identify the given string how many times its repeated n the variable";
		echo "<br><br>";
			$str = "My name is Preeti.My name is Preeti.My name is Preeti. I work in Compassites.I come to office at 9:30.";

			echo $str."<br><br>";
			echo "search word :Preeti ,count is :";
			echo substr_count($str, "Preeti");

	?>
</body>
</html>