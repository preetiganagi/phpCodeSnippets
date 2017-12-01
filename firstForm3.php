

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    <?php require("header.html"); 
    $statesList = array("Karnataka","maharastra","kerala","tamilnadu","andra","Dhaka","Chittagong","Khulna","Rajshahi");
    $countryList = array("Australia", "Argentina", "Bangladesh", "Bulgaria","Cambodia", "Cameroon", "Canada","India","Uganda","United Kingdom", "United States","Yemen","Zimbabwe");
    
    include("dbconnect.php");

    $dbObj = new DBController();
    $hobbyQuery="select * from hobbies";
    $hobbyResult=$dbObj->runQuery($hobbyQuery);

    $subjectQuery = "select * from techsubjects";
    $subjectResult=$dbObj->runQuery($subjectQuery);

    



    ?>
<!-- <h2>User Registration Form</h2> -->
<p><span>* required field.</span></p>
<form method="post" action="nextPage.php">  
    Name: <input type="text" name="name" value="<?php echo $name;?>">
    <span >*</span>
    <br> <br>
    E-mail: <input type="text" name="email" value="<?php echo $email;?>">
    <span >*</span>
    <br> <br>
    Password: <input type="password" name="password" ><span >* </span><br><br>
    Confirm Password: <input type="password" name="confirmPassword"><span style="color:red;" ><?php echo $passwordMsg;?></span>
    <br> <br>
    Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
    <br> <br>
    Gender:
    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">other
    <span class="error">* </span>
    <br> <br>
    Mobile Number:  <input type="text" name="contryCode" value="<?php echo $contryCode;?>" size=5px maxlength=3 placeholder="+91">&nbsp;<input type="text" name="phoneNumber" value="<?php echo $phoneNumber;?>" maxlength=10>
    <span >*</span>
    <br> <br>
    Country :<select name="countryName" id="countryName">
                <?php foreach ($countryList as $key => $country) { ?>
                    <option  value="<?php  echo $country;?>" <?php if (isset($countryName) && $countryName==$country) echo "selected=selected";?>> <?php echo $country; ?>
                    </option>
              
                <?php  } ?>
                  

            </select>
    <br> <br>

    State :<select name="stateName" id="stateName">
           
            
                <?php foreach ($statesList as $key => $state) { ?>
                    <option  value="<?php  echo $state;?>" <?php if (isset($stateName) && $stateName==$state) echo "selected=selected";?>> <?php echo $state; ?>
                    </option>
              
                <?php  } ?>
               </select>
    <br> <br>
    City Name :<input type="text" name="cityName"  value="<?php echo $cityName;?>">
    <br> <br>
    PinCode :<input type="text" name="pinCode"  value="<?php echo $pinCode;?>">
    <br> <br>
	  <b>Hobbies :</b><select name="hobby[]" id="hobbies" multiple="multiple" size=3>
	

	                   <?php foreach ($hobbyResult as $value) { ?>					
		                  <option name="hobby" value="<?php echo $value['hobbyId']; ?>"
		                      <?php if(!empty($_POST['hobby']))
                               {
			                        $hobbyarray = $_POST['hobby'];	
			
			                        if(in_array($value['hobbyId'], $hobbyarray))
			                        {
				                        echo "selected=selected";
				
			                        }
		                        }
		                      ?> 
		                  > <?php echo $value['hobbyName']; ?>
			
		                  </option>
			                <?php }	?>	 
		                </select><br><br>
		<b>Tech Languages:</b><br>
            <?php foreach ($subjectResult as $value) { ?>
		        <input type="checkbox" name="subject[]" id ="subject" <?php echo $selected[$value["techId"]]; ?>  value="<?php echo $value["techId"]; ?>"> <?php echo $value["techName"] ?>&nbsp;
		    <?php } ?><br><br>

    <input type="submit" name="submit" value="Submit"> &nbsp;
    <input type="reset" name="reset" value="reset">   
</form>


<?php require("footer.html"); ?>

</body>
</html>