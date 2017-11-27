<html>
<body>

        <form action="date.php" method="post">
              Enter the date:  <input type="text" name="year" />
                <input type="submit" />
        </form>


<?php

        if( $_POST )
        {
                //get the yea0r
                $year = $_POST[ 'year' ];

                //check if entered value is a number
                if(!is_numeric($year))
                {
                        echo "Strings not allowed, Input should be a number";
                        return;
                }

                //multiple conditions to check the leap year
                if( (0 == $year % 4) && (0 != $year % 100) || (0 == $year % 400) )
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
                else
                {

                   echo "$year is not leap year";
                                echo "<br>";
                echo "weeks:52" ;               
                echo "<br>";
                echo "days:365";
                echo "<br>";
                echo "months:12";
              echo "<
              br>";      
                }


        }
}

?>
</body>
</html>

