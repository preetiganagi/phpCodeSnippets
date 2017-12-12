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
    $msg ="";
    $id = $_GET['id'];
    //echo  $id;
include("userclass.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

    $name = $email =$pwd = $cpwd = $phoneNumber = $contryCode ="";
   
    $name = $_POST['name'];
    $phoneNumber = $_POST['phoneNumber'];
    $email = $_POST['email'];
    //echo  $name, $phoneNumber, $email ;
    
    $userObj = new User();
    $success= $userObj->editProfile($id,$name,$email,$phoneNumber);
    if($success)
    {
       
        $msg= "<h3>updated successfully</h3>";
    }
    else
    {
        $msg = "<h3>not updating</h3>";
    }
}
$userObject = new User();
$info= $userObject->information($id);
foreach ($info as $key => $value) {
   

?>


<form method="post" action="">  
    <h3>Edit Profile</h3>
   <h4> <a href="userList.php">Back</a>&nbsp;&nbsp;<a href="logout.php">Log out</a></h4>

    User Name: <input type="text" name="name" value="<?php echo $value['username']; ?>">
 
    <br> <br>
    E-mail: <input type="text" name="email" value="<?php echo $value['email'];?>">
    
    <br> <br>
   
     Mobile Number:  <input type="text" name="contryCode" value="<?php echo $value['contrycode'];?>" size=5px maxlength=3 placeholder="+91">&nbsp;<input type="text" name="phoneNumber" value="<?php echo $value['phonenumber'];?>" maxlength=10>
  <?php } ?>
    <br> <br>
    <input type="submit" value="save changes">&nbsp;<?php echo $msg;?>
</form>

 <!-- Password: <input type="password" name="password" ><br><br>
    Confirm Password: <input type="password" name="confirmPassword"><span style="color:red;" ><?php echo $passwordMsg;?></span>
    <br> <br> -->
</body>
</html>