
 <?php
session_start();
?> 
<!DOCTYPE html>
<html>
<?php
session_start();
?>

<head>
	<title></title>
</head>
<body>
	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $_SESSION['userName'] = $_POST['name'];
		echo  "<h2>Welcome   ".$_SESSION['userName']."</h2>";
	}
	else
	{	
	echo  "<h2>Welcome   ".$_SESSION['userName']."</h2>";
	}
	?>
	<?php

	 $nameErr = $emailErr =$pwdErr = $cpwdErr =  $phoneNumberErr = $contryCode = "";
    $name = $email =$pwd = $cpwd = $phoneNumber = $contryCode ="";
	
  	if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {

        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } 
        else{
                $name =($_POST["name"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                    $nameErr = "Only letters and white space allowed"; 
                }
            }
  
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
                  $email =($_POST["email"]);
                  // check if e-mail address is well-formed
                  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                          $emailErr = "Invalid email format"; 
                  }
                }

        if (empty($_POST["phoneNumber"])) {
            $phoneNumberErr = "phone number is required";
        } 
        elseif(!preg_match('/^[0-9]{3}[0-9]{3}[0-9]{4}$/', $_POST['phoneNumber']))
        {
            $phoneNumberErr = 'Invalid Number!';
        } 
        else {
            $phoneNumber =($_POST["phoneNumber"]);
        }

        if (empty($_POST["contryCode"])) {
            $contryCodeErr = "Country code is required";
        }
        elseif(!preg_match('/[+][0-9]{2}$/', $_POST['contryCode']))
        {
            $contryCodeErr = 'country code is not correct!';
        } 
        else {
            $contryCode =($_POST["contryCode"]);
        }
        if (empty($_POST["password"])) {
            $pwdErr = "password is required";
        }
        else {
            $pwd =md5($_POST["password"]);
          
        }
        if (empty($_POST["confirmPassword"]) || $pwd != md5($_POST["confirmPassword"])) {
            $passwordMsg="Your passwords do not match. Please type carefully.";
        } else {
            $cpwd =($_POST["confirmPassword"]);
        }
	
	$conn = mysqli_connect("localhost","root","compass","sessiondatabase");
	if($conn){
		$insertUserInfo = "INSERT INTO userinformation (username,password,phonenumber,email) 
        VALUES ('$name','$pwd','$phoneNumber','$email')";
		//echo $insertUserInfo;
		$result = mysqli_query($conn,$insertUserInfo) or die("<br><br>".mysqli_error($conn));
		if($result)
		{
			echo "inserted in database";
		}
        else
        {
            echo "not inserted";
        }
	}
}
?>
	<h4>users registered <a href="registredUsers.php">click here</a>  

</body>
</html>




