<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $pwdErr = $cpwdErr = $subjectErr = $phoneNumberErr = $contryCode = "";
$name = $email = $gender = $comment =$pwd = $cpwd = $phoneNumber = $contryCode ="";
$passwordMsg="";
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
    
  

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
  if (empty($_POST["phoneNumber"])) {
    $phoneNumberErr = "phone number is required";
  }
   elseif(!preg_match('/^[0-9]{3}[0-9]{3}[0-9]{4}$/', $_POST['phoneNumber']))
    {
      $phoneNumberErr = 'Invalid Number!';
    } 
     else {
    $phoneNumber = test_input($_POST["phoneNumber"]);
  }

  if (empty($_POST["contryCode"])) {
    $contryCodeErr = "Country code is required";
  }
   elseif(!preg_match('/[+][0-9]{2}$/', $_POST['contryCode']))
    {
      $contryCodeErr = 'country code is not correct!';
    } 
     else {
    $contryCode = test_input($_POST["contryCode"]);
  }

  
if (empty($_POST["subject"])) {
    $subjectErr = "minimum one language should select ";
  } else {
    $subject = test_input($_POST["subject"]);
    
  }
   if (isset($_POST['subject']))
    {
        foreach ($_POST['subject'] as $selectedDay)
            $selected[$selectedDay] = "checked";
    }
  
 
if (empty($_POST["password"])) {
    $pwdErr = "password is required";
  } else {
    $pwd = test_input($_POST["password"]);
  }
  if (empty($_POST["confirmPassword"])) {
   $cpwdErr= "";
   } else {
    $cpwd = test_input($_POST["confirmPassword"]);
  }
// function for password verificatio
     
    if ($pwd != $cpwd) {
         // error matching passwords
          $passwordMsg="Your passwords do not match. Please type carefully.";

     }

}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

  
 $countryList = array("Australia", "Argentina", "Bangladesh", "Bulgaria","Cambodia", "Cameroon", "Canada","India","Uganda","United Kingdom", "United States","Yemen","Zimbabwe");
   

$hobbies = array("playingChess","painting","drawing","swimming");

?>

	<h2>User Registration Form</h2>
<p><span>* required field.</span></p>
<form method="post" action="">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span >*</span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span >*</span>
  <br><br>
 Password: <input type="password" name="password" ><span >* </span><br><br>
 Confirm Password: <input type="password" name="confirmPassword"><span style="color:red;" ><?php echo $passwordMsg;?></span>
 <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <span class="error">* </span>
  <br><br>
  Mobile Number:  <input type="text" name="contryCode" value="<?php echo $contryCode;?>" size=5px maxlength=3 placeholder="+91">&nbsp;<input type="text" name="phoneNumber" value="<?php echo $phoneNumber;?>" maxlength=10>
  <span >*</span>
  <br><br>




	<b>Hobbies :</b><select name="hobby[]" id="Hobbies" multiple="multiple" size=3>
	

	<?php foreach ($hobbies as $key => $value) {
?>					
		<option name="hobby" value= <?php echo $value; ?>
		 <?php 
			
			$hobbyarray = $_POST['hobby'];	
			
			if(in_array($value, $hobbyarray))
			{
				echo "selected=selected";
				
			}
		
		 ?> 
		 > <?php echo $value; ?>
			
		</option>
			<?php }	?>	 
		
		</select>
		
		<br>
		<br>
		<b>Tech Languages:</b><br>
		<input type="checkbox" name="subject[]" id ="subject" <?php echo $selected['java'] ?>  value="java">Java<br>
		<input type="checkbox" name="subject[]" value="php" <?php echo $selected['php'] ?>>php<br>
		<input type="checkbox" name="subject[]" value=".net" <?php echo $selected['.net'] ?>>.net<br>

  <input type="submit" name="submit" value="Submit">  
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
if(empty($nameErr) && empty($emailErr) && empty($genderErr) && empty($subjectErr) && empty($pwdErr) && empty($contryCodeErr) && empty($phoneNumberErr) && empty($passwordMsg) && empty($cpwdErr) )
{
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
echo "hobbies are<br>";
foreach ($_POST['hobby'] as $key => $value) {
	echo $key+1,")";
	echo $value,"<br>";

}
echo "<br>Subjects are <br>";

foreach ($_POST['subject'] as $key => $value) {
	//print_r($subject);
	echo $key+1,")",$value,"<br>";
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