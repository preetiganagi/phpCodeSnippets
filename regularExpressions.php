<?php
echo "Regular Expressions";

$var = preg_match("/^[a-zA-Z ]*$/","NAME123"); //only alphabates
echo $var;
if(preg_match("/^[0-9]{5}$/" ,"66666")) //strictly 5 digits
{
	echo "matched"; 
}
else
{
	echo "not matched";
}





?>