
<html>
<head>
</head>
<body>

<?php


$m = "hi";
echo $m;

function findindLeapYear($year)
 {
 	if( (0 == $year % 4) && (0 != $year % 100) || (0 == $year % 400) )
                {
                	return true;
                }
                return false;

 }

//get the yea0r
                $year1 = $_POST[ 'year1' ];
                 $year2 = $_POST[ 'year2' ];

                //check if entered value is a number
                if(!is_numeric($year1) && !is_numeric($year2) )
                {
                        echo "Strings not allowed, Input should be a number";
                        return;
                }



echo "hello";
	$monthDays = array(31,28,31,30,31,30,31,31,30,31,30,31);
	$leapDays = array(31,29,31,30,31,30,31,31,30,31,30,31);
	
	$dateValue = strtotime($year1);
    $dateValue = strtotime($year2);
    $yearNo1 = date('Y',$dateValue);
    $yearNo2 = date('Y',$dateValue);

	function EntryYeardays($yearNo){
		          $leapYear = false;
				if(findindLeapYear($yearNo))
                		{
                			$monthNo = date('m',$dateValue);
                			for($i=0; $i<$monthNo; $i++)
                			{
                				$monDays +=$leapDays[i]; 
                			}
                			$days = date('d',$dateValue);
                			$totaldays=$days +$monDays;

                		}
                		else
                		{
                			$monthNo = date('m',$dateValue);
                			for($i=0; $i<$monthNo; $i++)
                			{
                				$monDays +=$leapDays[i]; 
                			}
                			$days = date('d',$dateValue);
                			$totaldays= $days +$monDays;
                		}

                		return $totaldays;

	}
                
                 
                if($yearNo1 < $yearNo2)
                {
                	$totaldaysOfYear = null;
                	
                	$nextYear=$yearNo1+1;
                	while ($nextYear < $yearNo2) 
                	{
                		if(findindLeapYear($nextYear))
                		{
                			$totaldaysOfYear += $totaldaysOfYear + 366;
                		}
                		else
                		{
                			$totaldaysOfYear += $totaldaysOfYear + 365;
                		}

                		
                		$nextYear++;


                	}
                	$tempdays1=EntryYeardays($yearNo1);
                		$tempdays2=EntryYeardays($yearNo2);

                		$totaldaysOfYear = $tempdays1 + $tempdays2;

                		echo "total days:".$totaldaysOfYear;
                }

?>
<form action="" method="post">


        Start date<input type="date" name = "year1">

        <br>
        end date<input type="date" name="year2"/>
        <br>
        <input type="submit" value="submit"/>
   </form>

</body></html>
