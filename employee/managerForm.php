<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="post" action="employeeList.php">  
    Manager Name: <input type="text" name="name" value="<?php echo $name;?>">
    <br> <br>
    Age: <input type="text" name="age" value="<?php echo $age;?>">
    <br> <br>
    Number of Employees:  <input type="text" name="numOfEmp" value="<?php echo $numOfEmp;?>">
  	<br> <br>
    <input type="submit" value="submit">&nbsp;
</form>
</body>
</html>