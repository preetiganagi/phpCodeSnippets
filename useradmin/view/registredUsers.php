
<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
	<title></title>
	<!-- <script type="text/javascript">
		$(document).ready(function(){
    		$(#disableUser).click(function(){
       		 	$.ajax({
       		 		url :"registredUsers.php";
       		 		success:

       		 	})
   		 });
	});
	</script> -->
</head>
<body>
	<?php
	$name ="";
		echo  "<h2>Hi   ",$_SESSION['userName'],"</h2>";
		$adminName =$_SESSION['userName'];
		
		include("adminclass.php");
		
		$adminObj1 = new Admin();
		$result = $adminObj1->listUsers();
		

		echo "<h3>Registered users are :".sizeof($result)."</h3>";
		if (sizeof($result)>0) {
		echo "<table border=1px>
			<tbody>
				<tr>
					<th>status</th>
					<th>User Name:</th>
					<th>Email</th>
					<th>Phone Number</th>
				</tr>";

			foreach ($variable as $key => $value) {
				# code...
			}









			foreach ($result as $key => $value) { 
			echo "<tr> "	;
				if ($value['userstatus'] == 1)
				{	
					echo "<td>";
					echo "<font color='green'>active</font>";
					echo "</td>";
					echo "<td>".$value['username'];
					$name = $value['username'];
	        		echo "</td>";
	        		echo "<td>".$value['email'];
	        		echo "</td>";
	        		echo "<td>".$value['phonenumber'];
					echo "</td>";
					//echo "<input type='submit' value='disable'>&nbsp;&nbsp;";
					echo "<form method= 'post' action=''>";
					echo "<input type='hidden'  name ='statusDisable' value='$name' onclick=''>";
					echo "<td><input type='submit' id='disableUser' name ='submit' value='desable'></td></form>";
					
					echo "<form method= 'post' action=''>";
					echo "<input type='hidden' name ='adminname' value='$name'>";
					echo "<td><input type='submit' id='makeAdmin' name ='makeadmin' value='make admin'></td></form>";
					echo "<form method= 'post' action=''>";
					echo "<input type='hidden' name ='deleteUser' value='$name'>";
					echo "<td><input type='submit' id='deleteUser' name ='delete' value=' Delete'></td></form>";
					//echo "<form method= 'post' action=''>";
					//echo "<input type='hidden' name ='adminname' value='$name'>";
					echo "<td><a href='profileEditUser.php?id=".$value['userid']."'>&nbsp;edit&nbsp;</td></form>";
				}else
				{
					echo "<td>";
					echo"<font color='red'>not active</font>";
					echo "</td>";
					echo "<td>".$value['username'];
					$name = $value['username'];
	        		echo "</td>";
	        		echo "<td>".$value['email'];
	        		echo "</td>";
	        		echo "<td>".$value['phonenumber'];
					echo "</td>";
					//echo "<input type='submit' value='disable'>&nbsp;&nbsp;";
					echo "<form method= 'post' action=''>";
				echo "<input type='hidden' name ='statusEnable' value='$name'>";
				echo "<td><input type='submit' id='enableUser' name ='submit' value='enable'></td></form>";
					
					echo "<form method= 'post' action=''>";
					echo "<input type='hidden' name ='adminname' value='$name'>";
					echo "<td><input type='submit' id='makeAdmin' name ='makeadmin' value='make admin'></td></form>";
					echo "<form method= 'post' action=''>";
					echo "<input type='hidden' name ='deleteUser' value='$name'>";
					echo "<td><input type='submit' id='deleteUser' name ='delete' value=' Delete'></td></form>";
					echo "<td><a href='profileEditUser.php?id=".$value['userid']."'>&nbsp;edit&nbsp;</td></form>";
				}
			}
			echo "</tr>";
			echo "</tbody></table>";
			$adminObj2 = new Admin();
				if($_SERVER["REQUEST_METHOD"] == "POST")
				{
					if(isset($_POST['submit']))
					{
						$deleted=$adminObj2->changeStatus($_POST['statusDisable']);
							if($deleted){
							$msg = " disabled";
						}
						else
						{
							$msg = "  not possible";
						}
					}
					if(isset($_POST['makeadmin']))
					{
						$success=$adminObj2->makeAdmin($_POST['adminname']);
						if($success){
							echo " added admin";
							$to      = 'preetiganagi@gmail.com';
						$subject = 'status ';
						$message = 'u r admin now';
						$headers = 'From:preetiganagi777@gmail.com';
						mail($to, $subject, $message, $headers);
						}
						else
						{
							echo "  not possible";
						}
						
					}
					if(isset($_POST['submit']))
					{
						$enabled=$adminObj2->changeStatusEnable($_POST['statusEnable']);
							if($enabled){
							echo " Enabled";
						}
						else
						{
							echo "  not possible";
						}
					}
					if(isset($_POST['delete']))
					{
						$enabled=$adminObj2->removeUsers($_POST['deleteUser']);
							if($enabled){
							echo " User deleted";
						}
						else
						{
							echo "can not delete";
						}
					}


				}	
				
			}
			else{
					echo "no registered users";
				}

			$result1 = $adminObj1->listAdmins($adminName);
		//print_r($result);

		echo "<h3>Registered admins are :".sizeof($result1)."</h3>";
		if (sizeof($result1)>0) {
		echo "<table border=1px>
			<tbody>
				<tr>
					<th></th>
					<th>User Name:</th>
					<th>Email</th>
					<th>Phone Number</th>
				</tr>";
			foreach ($result1 as $key => $value) { 
			echo "<tr> <td></td>"	;	
				
				echo "<td>".$value['username'];
				echo "</td>";
        		$nameAdmin = $value['username'];
        		
        		echo "<td>".$value['email'];
        		echo "</td>";
        		echo "<td>".$value['phonenumber'];
				echo "</td>";
				//echo "<input type='submit' value='disable'>&nbsp;&nbsp;";
				
				echo "<form method= 'post' action=''>";
				echo "<input type='hidden' name ='admin' value='$nameAdmin'>";
				echo "<td><input type='submit' name ='removeadmin' value='remove admin'></td></form>";
				
				
				}
				echo "</tr>";
				echo "</tbody></table>";
				$adminObj = new Admin();
				if($_SERVER["REQUEST_METHOD"] == "POST")
				{
					
					if(isset($_POST['removeadmin']))
					{
					$success1=$adminObj->removeAdmin($_POST['admin']);
					if($success1){
						echo " removed admin";
					}
					else
					{
						echo "  not possible";
					}
					}

				}
			}
			else{
					echo "no registered admins";
				}
?>
	<br>
	<h2>
		<form method= 'post' action='userLogin.php'>
			<input type="submit" value="Logout"><br>
		</form>
	</h2>
</body>
</html>