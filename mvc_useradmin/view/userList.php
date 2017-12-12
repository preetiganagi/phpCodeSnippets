
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
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $_SESSION['userName'] = $_POST['name'];
        echo  "<h2>Welcome   ".$_SESSION['userName']."</h2>";
         $prename=$_SESSION['userName'];
    }
    else
    {   
    echo  "<h2>Welcome   ".$_SESSION['userName']."</h2>";
     $prename=$_SESSION['userName'];
    }

    include("userclass.php");
    $userObj = new User();
  
   $userid = $userObj->getRegisterId($prename);
   foreach ($userid as $key => $value) {
      $id = $value['userid'];

   }
    $users =  $userObj->information($id);
    ?>
    <a href="logout.php">Log out</a>
	<h4>Your Profile</h4>
    <?php  foreach ($users as $key => $user) {
        echo "name Is :".$user['username'];
        echo "<br>";
        echo "email Is :".$user['email'];
         echo "<br>";
        echo "phone number Is :".$user['phonenumber'];
    } ?>
    <br><h4>Edit Profile<a href="editProfile.php?id=<?php echo $id; ?>">Click Here</a></h4>

</body>
</html>




