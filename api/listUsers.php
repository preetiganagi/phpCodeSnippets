<?php
header("Access-Control-Allow-Origin: *");
 header("Content-Type: application/json; charset=UTF-8");
 header("Access-Control-Allow-Methods: POST");
 header("Access-Control-Max-Age: 3600");
 header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 $data = json_decode(file_get_contents("php://input"), true);
if($_SERVER['REQUEST_METHOD'] == "POST") {

	include("dbconnect.php");
	$empQuery ="select * from employee";
	$dbObj = new DBController();
	$result = $dbObj->runQuery($empQuery);
		foreach ($result as $key => $value) {
				echo json_encode($value);
		}
}