
<html>
<body>
	
	<form action="date.php" method="post">


	<input type="text" name="year"/>	
		<input type="submit" />
	</form>
</body>
</html>
 
<?php 
 
	if( $_POST )
	{	
		//get the year
		$year = $_POST[ 'year' ];
		
		//check if entered value is a number
		if(!is_numeric($year))
		{
			echo "Strings not allowed, Input should be a number";
			return;
		}
		
		//multiple conditions to check the leap year
		if( (0 == $year % 4) and (0 != $year % 100) or (0 == $year % 400) )
		{

			echo "$year is a leap year";
				echo "<br>"; 
		echo "weeks:53";
		echo "<br>"; 
		echo "days:366";
		echo "<br>";
		echo "months:12";
		echo "<br>"; 

	}	


	}
</body>
</html>
 
