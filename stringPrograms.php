<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		$str1 = "my name is Preeti";
		$str2 ="I work in Compassites";

		echo "String 1 : ".$str1;
		echo "<br>";
		echo "String 2 :".$str2;
		echo "<br>";
		echo "<br>";

		echo "sub string finding";
		echo "<br>";
		$substr = substr($str1,12);
		echo "substring is  ".$substr;

		echo " <br><br>string replace <br>";
		$streplace = str_replace("Preeti", "Priyanka", $str1);
		echo $streplace;

		echo " <br><br>string reverse<br>";
		
		$reverse = '';
		$i = 0;
		while(!empty($str1[$i]))
		{ 
      		$reverse = $str1[$i].$reverse; 
      		$i++;
		}
		echo $reverse;
		



	?>



</body>
</html>
