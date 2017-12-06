
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
   $users =  $userObj->information($prename);
    ?>
	<h4>Your Profile</h4>
    <?php  foreach ($users as $key => $user) {
        echo "name Is :".$user['username'];
        echo "<br>";
        echo "email Is :".$user['email'];
         echo "<br>";
        echo "phone number Is :".$user['phonenumber'];
    } ?>
    <br><h4>Edit Profile<a href="editProfile.php?prename=<?php echo $prename; ?>">Click Here</a></h4>

</body>
</html>




