<!DOCTYPE html>
<html>
<head>
	<title> Array </title>
</head>
<body>
<?php 
 	/*marks=array(
	"preeti" => array("Maths"=>80),
	"Prita" =>array("Maths"=>90,"Physics"=>78),
	"pinku"=>array("Maths"=>78,"Physics"=>90)
);

for($r=0;$r<count($marks);$r++)
{
	foreach ($marks[$r] as $key => $value) 
	{
		echo $key."<br>";
		foreach($value as $key=>$value)
		{
		echo $key." = ".$value."  ";
		}
		
	}
	
	
	echo "<br><br>";
}*/

$numbers= array
  (
  array(22,18),
  array(15,13),
  array(5,2),
  array(17,15)
  );
    
for ($row = 0; $row < 4; $row++) {
  echo "<br>";
  
  for ($col = 0; $col < 3; $col++) {
    echo $numbers[$row][$col];
     echo "  ";
  }
  echo "<br>";
}


	


 ?>


</body>
</html>