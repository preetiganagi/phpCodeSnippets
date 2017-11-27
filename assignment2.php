<html>
<head>
</head>
<body>
	<form action="" method="post">
	Start date<input type="date" name="year1">
	end  date<input type="date" name="year2">
	<input type="submit" value="submit">
</form>
<?php
    $year1 = $_POST["year1"];
	$year2 = $_POST["year2"];
	echo "startdate is ".$year1;
	echo "end date is ".$year2;
	echo "<br>";
	echo "<br>";
	$startDate = date('d-m-Y',strtotime($year1));
	$endDate = date('d-m-Y',strtotime($year2));
	$nodays = (strtotime($endDate) - strtotime($startDate))/ (60 * 60 * 24);
	echo "total number of days: ".$nodays;

	echo "<br>";
	//echo "starting day is".Date('D',strtotime($year1));
	echo "<br>";

	echo "startdate is ".$startDate;
	echo "<br>";
	echo "end date is ".$endDate;
	echo "<br>";
	$datetime1 = new DateTime($year1);

	$datetime2 = new DateTime($year2);

	//echo "starting day ". $datetime1->format('d');


	echo "<br>";
	$difference = $datetime1->diff($datetime2);

	echo 'Difference: '.$difference->y.' years, ' 
                   .$difference->m.' months, ' 
                   .$difference->d.' days';

	//echo "nextxt month is ". $datetime1->format('+ 1 month');
	echo "<br>";

	for($i=0; $i < $difference->m ; $i++)
		{
			echo "next month is 1st ";
			$datetime1->modify( 'next month' );

			echo $datetime1->format( 'F' );
			echo " ---starts--".$datetime1->format('D');

			echo "---days in month- ";
			$days = cal_days_in_month(CAL_GREGORIAN, $datetime1->format('m'), $datetime1->format('y')); 

			echo $days."<br>";
 			echo "week days are... ";
        	echo "<br>";

			for($j=0; $j <= ($days / 7); $j++)
			{

				echo $j+1;
				echo " week from  ";
				echo ($j*7)+1;

	
				echo " --".$datetime1->format('D');
				echo " to ";
	 			$datetime1->modify('+6 days');
				echo $datetime1->format('D');
	
	//$date =$datetime1;
//$date->add(new DateInterval('P7D'));
//echo date( strtotime($datetime1. ' + 7 days'));	
//	echo "  to ".$date('D');
//	echo ($j*7)+7;
				echo "<br>";
	

}



}

echo "<br>";
echo "<br>";

?>



</body>
</html>
