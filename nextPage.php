<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
    require("header.html");
    // define variables and set to empty values
    $nameErr = $emailErr = $genderErr = $pwdErr = $cpwdErr = $subjectErr = $phoneNumberErr = $contryCode = $pinERR = $cityERR = $countryERR = $stateERR = "";
    $name = $email = $gender = $comment =$pwd = $cpwd = $phoneNumber = $contryCode = $pinCode = $cityName = $countryName = $stateName="";
    $passwordMsg="";
    $hobbyResult ="";
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
    
  

        if (empty($_POST["comment"])) {
        $comment = "";
        } else {
                  $comment =($_POST["comment"]);
                }

        if (empty($_POST["gender"])) {
            $genderErr = "Gender is required";
        } else {
                  $gender =($_POST["gender"]);
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

  
        if (empty($_POST["subject"])) {
            $subjectErr = "minimum one language should select ";
        } else {
            $subject =($_POST["subject"]);
    
        }
        if (isset($_POST['subject']))
        {
            foreach ($_POST['subject'] as $selectedDay)
                $selected[$selectedDay] = "checked";
        }
  
 
        if (empty($_POST["password"])) {
            $pwdErr = "password is required";
        }
        else {
            $pwd =($_POST["password"]);
        }
        if (empty($_POST["confirmPassword"]) || $pwd != $_POST["confirmPassword"]) {
            $passwordMsg="Your passwords do not match. Please type carefully.";
        } else {
            $cpwd =($_POST["confirmPassword"]);
        }
        if (empty($_POST["countryName"])) {
            $countryERR = " country is required";
        }
        else {
            $countryName =($_POST["countryName"]);
        }
         if (empty($_POST["stateName"])) {
            $stateERR = " state is required";
        }
        else {
            $stateName =($_POST["stateName"]);
        }
         if (empty($_POST["cityName"])) {
            $cityERR = " city is required";
        }
        else {
            $cityName =($_POST["cityName"]);
        }
        if (empty($_POST["pinCode"])) {
            $pinERR = " pin code is required";
        }
        else {
            $pinCode =($_POST["pinCode"]);
        }
       
    }

   
    //$hobbyResult = mysqli_query($hobbyQuery,$connectionLink);
    //print_R($hobbyResult);

    

    
   

    /*$hobbies = array("playingChess","painting","drawing","swimming");*/

?>

<?php


   if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        if(empty($nameErr) && empty($emailErr) && empty($genderErr) && empty($subjectErr) && empty($pwdErr) && empty($contryCodeErr) && empty($phoneNumberErr) && empty($passwordMsg) && empty($pinERR) && empty($stateERR) && empty($countryERR) && empty($cityERR))
        {
            //header("location:nextPage.php");
           echo "<h2 style=\"color:green;\">Registered successfully</h2>";
            echo "<h2 style=\"color:blue;\">Your Input:</h2>";

            echo "<h4>Name is : ",$name;
            echo "<br>";
            echo "email is : ",$email;
            echo "<br>";

            echo "comments : ",$comment;
            echo "<br>";

            echo "genderis : ",$gender;
            echo "<br>";
            echo "phoneNumber : ",$contryCode."-".$phoneNumber;
            echo "<br>";
            echo "<br>";
            echo "address is:<br>";
            echo "country : ",$countryName;
            echo ",  ";
            echo "state : ",$stateName;
            echo ",    ";
            echo "city : ",$cityName;
            echo "    ";
             echo "pincode : ",$pinCode;
            echo "<br>";
include("dbconnect.php");
$dbObj = new DBController();         
            echo "hobbies are<br>";

            
            foreach ($_POST['hobby'] as $key => $hobby) {
                echo $key+1,")",$hobby,"<br>";

            }
            echo "<br>Subjects are <br>";

            foreach ($_POST['subject'] as $key => $subject) {
                //print_r($subject);
                echo $key+1,")",$subject,"<br>";
            }
          
        $userInfoQuery = "INSERT INTO userinformationdemo(userName,password,pincode,email,gender,city) values ('$name','$password','$pinCode','$email','$gender','$cityName')"; 
        $userResult = mysqli_query($dbObj->connectDB(),$userInfoQuery);
   			if($userResult)
   			{
   				echo "<h3>saved to database</h3>";
   			}
   			else{
   				echo "some problem happened";
   			}

        $userIdQuery = "select userId from userinformationdemo where userName ='".$name."'";
            $userIdResult =mysqli_query($dbObj->connectDB(),$userIdQuery);
            //print_r($userIdResult);
            if ($_SERVER["REQUEST_METHOD"] == "POST") 
            {
                while($userId=mysqli_fetch_assoc($userIdResult))
                { 
                  foreach ($_POST['hobby'] as $key => $hobby) {
                    $insertHobbies = "INSERT INTO userhobbies (userId,hobbyId) values (".$userId['userId'].",".$hobby.")";
                    $insertHobbyResult=mysqli_query($dbObj->connectDB(),$insertHobbies);
                    //echo $insertHobbies;
                    /*if($insertHobbyResult)
                    {
                    echo "hobbies added";    
                    }
                    else {
                        echo "not saved to database";
                    }*/
                  }
                  echo "<h3>hobbies added</h3>";
                  
                  //iserting courses to database
                  foreach ($_POST['subject'] as $key => $subject) {
                    $insertSubjects = "INSERT INTO usersubjects (userId,techId) values (".$userId['userId'].",".$subject.")";
                    $insertSubjectResult=mysqli_query($dbObj->connectDB(),$insertSubjects);
                    //echo $insertHobbies;
                    /*if($insertSubjectResult)
                    {
                     echo "<h3>subjects are added</h3>";
                    }
                    else {
                        echo "not saved to database";
                    }*/
                  }
                  echo "<h3>subjects are added</h3>";
                 
                }
            }

        }
        
else
{
    echo "<h2 style=\"color:red;\">Not successful</h2>";
    echo "<h4 style=\"color:red;\">";
    echo "<ul>";
    if($nameErr){
      echo "<li>";
      echo $nameErr."<br>";
       echo "</li>";
      }  
   if($emailErr){
     echo "<li>";
      echo $emailErr;
      echo "<br>";
       echo "</li>";
    }
    if($pwdErr){
     echo "<li>";
    echo $pwdErr;
      echo "<br>";
       echo "</li>";
    }
    if($genderErr){
       echo "<li>";
    echo $genderErr;

     echo "<br>";
      echo "</li>";
    }
    if($subjectErr){
       echo "<li>";
    echo $subjectErr;
     echo "<br>";
      echo "</li>";
    }
     if($contryCodeErr){
       echo "<li>";
     echo $contryCodeErr;
     echo "<br>";
      echo "</li>";
    }
     if($phoneNumberErr){
   echo "<li>";
    echo $phoneNumberErr."</h4>";
     echo "</li>";
    }
}
echo "<ul>";
}
 
?>



</body>
</html>