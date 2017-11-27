<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr ="";
$name = $email = $gender = $comment ="";

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
  
  $Hobbies = test_input($_POST["Hobbies"]);
  
if (empty($_POST["subject"])) {
    $subjectErr = "subjects  is required";
  } else {
    $subject = test_input($_POST["subject"]);
    
  }
   if (isset($_POST['subject']))
    {
        foreach ($_POST['subject'] as $selectedDay)
            $selected[$selectedDay] = "checked";
    }
	
	if (isset($_POST['subject']))
    {
        foreach ($_POST['subject'] as $selectedDay)
            $selected[$selectedDay] = "checked";
    }



}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

  

$hobbies = array("playingChess","painting","drawing","swimming");

?>

	<h2>Form Validation Example</h2>
<p><span>* required field.</span></p>
<form method="post" action="">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span >* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span >* <?php echo $emailErr;?></span>
  <br><br>
 
  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <span class="error">* <?php echo $genderErr;?></span>
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
if(empty($nameErr) && empty($emailErr) && empty($genderErr))
{

echo "<h2>Your Input:</h2>";

echo "Name is:",$name;
echo "<br>";
echo "email is:",$email;
echo "<br>";

echo "comments :",$comment;
echo "<br>";

echo "genderis:",$gender;
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
}
?>


</body>
</html>