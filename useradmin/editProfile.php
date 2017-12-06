<?php
session_start();
?> 
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<?php

    $prename = $_GET['prename'];
    echo  $prename;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

    $name = $email =$pwd = $cpwd = $phoneNumber = $contryCode ="";
   
    $name = $_POST['name'];
    $phoneNumber = $_POST['phoneNumber'];
    $email = $_POST['email'];
    echo  $name, $phoneNumber, $email ;
    include("userclass.php");
    $userObj = new User();
    $success= $userObj->editProfile($prename,$name,$email,$phoneNumber);
    if($success)
    {
        //header("location:userLogin.php?msg=success fully registered");
        echo "updated successfully";
    }
    else
    {
        echo "not updating";
    }
}
?>

<form method="post" action="">  
    User Name: <input type="text" name="name" value="<?php echo $name;?>">
 
    <br> <br>
    E-mail: <input type="text" name="email" value="<?php echo $email;?>">
    
    <br> <br>
   
     Mobile Number:  <input type="text" name="contryCode" value="<?php echo $contryCode;?>" size=5px maxlength=3 placeholder="+91">&nbsp;<input type="text" name="phoneNumber" value="<?php echo $phoneNumber;?>" maxlength=10>
  
    <br> <br>
    <input type="submit" value="save changes">&nbsp;
</form>

 <!-- Password: <input type="password" name="password" ><br><br>
    Confirm Password: <input type="password" name="confirmPassword"><span style="color:red;" ><?php echo $passwordMsg;?></span>
    <br> <br> -->
</body>
</html>