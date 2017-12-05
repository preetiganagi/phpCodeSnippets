
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $_SESSION['empName'] = $_POST['empName'];
		echo  "<h2>Welcome   ".$_SESSION['empName']."</h2>";
	}

	include("empAbstract.php");
	$name = $_POST['empName'];
	$age = $_POST['empAge'];
	$project = $_POST['projectName'];
	$employee1 = new Employee($name,$age,$project);
	$employee1->display();

	include("dbconnect.php");
	$empQuery = "insert into employee (empname,empage,projectname) values('$name',$age,'$project')";
	$dbObj = new DBController();
	$result = $dbObj->runInsertQuery($empQuery);
	if($result)
	{
		echo "<br>registered successfully";

	}
	else
	{
		echo "not inserting";
	}

?>
</body>
</html>