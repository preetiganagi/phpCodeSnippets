<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
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

    include("userclass.php");
    $userObj = new User($name,$email,$phoneNumber,$pwd,2,$contryCode,1);
    $success= $userObj->registration($userObj);
    if($success)
    {
        header("location:userLogin.php?msg=success fully registered");
        //echo "registered successfully";
    }
    else
    {
        echo "not registered";
    }
   
}
?>
	
<form method="post" action="">  
    User Name: <input type="text" name="name" value="<?php echo $name;?>">
 
    <br> <br>
    E-mail: <input type="text" name="email" value="<?php echo $email;?>">
    <span >*</span>
    <br> <br>
    Password: <input type="password" name="password" ><br><br>
    Confirm Password: <input type="password" name="confirmPassword"><span style="color:red;" ><?php echo $passwordMsg;?></span>
    <br> <br>
     Mobile Number:  <input type="text" name="contryCode" value="<?php echo $contryCode;?>" size=5px maxlength=3 placeholder="+91">&nbsp;<input type="text" name="phoneNumber" value="<?php echo $phoneNumber;?>" maxlength=10>
  
    <br> <br>
    <input type="submit" value="submit">&nbsp;
</form>




</body>
</html>