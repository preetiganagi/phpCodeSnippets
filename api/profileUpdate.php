<?php
header("Access-Control-Allow-Origin: *");
 header("Content-Type: application/json; charset=UTF-8");
 //header("Access-Control-Allow-Methods: POST");
 //header("Access-Control-Max-Age: 3600");
 //header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 //$data = json_decode(file_get_contents("php://input"), true);
 include("dbconnect.php");
if($_SERVER['REQUEST_METHOD'] == "POST") {

	
	$id = $_POST['id'];
	$name = $_POST['empName'];

	echo $name;

	/*$project = $_POST['projectname'];
	$age = $_POST['age'];
	$empQuery = " UPDATE employee SET empname='".$name."' WHERE empid=$id";
*/
	//echo $empQuery ;

	/*$dbObj = new DBController();
	$result = mysqli_query($dbObj->connectDB(),$empQuery);
	echo $result;
	if($result)
	{
		echo "updated successfully";

	}
	else
	{
		echo "not updating";
	}*/
}	
?>

