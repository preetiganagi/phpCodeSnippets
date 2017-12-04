<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	
<form method="post" action="userList.php">  
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