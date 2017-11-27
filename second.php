<html>
<head>
</head>
<body>

<?php

function printFibonacci($n)
 {
 
  $first = 0;
  $second = 1;
 
  echo "Fibonacci Series \n";
 
  echo $first.' '.$second.' ';
 
  for($i = 2; $i < $n; $i++){
 
    $third = $first + $second;
 
    echo $third.' ';
 
    $first = $second;
    $second = $third;
 
    }
}
  
/* Function call to print Fibonacci series upto 6 numbers. */
 
printFibonacci($_POST["number"]);

?>
<form action="second.php" method="post">
<h4>fibonacci series</h4>
number<input type="text" name="number"/>
<input type="submit" value="submit"/>
</form>
</body>
</html>
