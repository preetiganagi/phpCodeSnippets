<?php
session_start();
?> 
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<form method="post" action="index.php?page=userInformation">  
    <h3>Edit Profile</h3>
   <h4> <a href="userList.php">Back</a>&nbsp;&nbsp;<a href="logout.php">Log out</a></h4>

    User Name: <input type="text" name="name" value="<?php echo $info['username']; ?>">
 
    <br> <br>
    E-mail: <input type="text" name="email" value="<?php echo $info['email'];?>">
    
    <br> <br>
   
     Mobile Number:  <input type="text" name="contryCode" value="<?php echo $info['contrycode'];?>" size=5px maxlength=3 placeholder="+91">&nbsp;<input type="text" name="phoneNumber" value="<?php echo $info['phonenumber'];?>" maxlength=10>
    <br> <br>
    <input type="submit" value="save changes" name="editProfile">&nbsp;<?php echo $msg;?>
</form>

 <!-- Password: <input type="password" name="password" ><br><br>
    Confirm Password: <input type="password" name="confirmPassword"><span style="color:red;" ><?php echo $passwordMsg;?></span>
    <br> <br> -->
</body>
</html>