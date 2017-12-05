
<?php
header("Access-Control-Allow-Origin: *");
 header("Content-Type: application/json; charset=UTF-8");
 header("Access-Control-Allow-Methods: POST");
 header("Access-Control-Max-Age: 3600");
 header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 $data = json_decode(file_get_contents("php://input"), true);
if($_SERVER['REQUEST_METHOD'] == "POST") {
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
			echo "registered successfully";

		}
		else
		{
			echo "not inserting";
		}
}
 

	