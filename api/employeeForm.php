<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="post" action="employeeProfile.php">  
    Employee Name: <input type="text" name="empName" value="<?php echo $empName;?>">
    <br> <br>
    Age: <input type="text" name="empAge" value="<?php echo $empAge;?>">
    <br> <br>
     Project Name:  <input type="text" name="projectName" value="<?php echo $projectName;?>">
  	<br> <br>
    <input type="submit" value="submit">&nbsp;
</form>

</body>
</html>