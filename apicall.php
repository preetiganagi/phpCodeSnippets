<?php
header("Access-Control-Allow-Origin: *"); 
header("Content-Type: application/json; charset=UTF-8");

?>

	<?php
$names = array(1=>"preeti",2=>"meena");
foreach ($names as $key => $value) {
	$m .= $value. ' ';
}
$n= json_encode($m);
echo $n;
/*foreach ($names as $key => $value) {
	# code...
	echo json_encode($names);
}*/

?>

