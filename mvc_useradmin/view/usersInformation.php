
<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
	<title></title>
</head>
<body>
	
		<h2>Hi  <?= $_SESSION['userName']; ?> </h2>
		<h3>Registered users are :<?= sizeof($allUsers); ?> </h3>
		<table border=1px>
			<tr>
				
				<th>User Name:</th>
				<th>Email</th>
				<th>Phone Number</th>
				<th>status</th>
			</tr>
			<?php foreach ($allUsers as $value): ?> { ?> 
			<tr>
				<td><?= $value['username']; ?></td>
				<td><?= $value['email']; ?></td>
				<td><?= $value['phonenumber']; ?></td>
				<td><a href='profileEditUser.php?id=<?= $value['userid']; ?>'>&nbsp;edit&nbsp;</a></td>
				
				<form method= 'post' action=''>
				<input type='hidden' name ='adminname' value='$name'>
				<td><input type='submit' id='makeAdmin' name ='makeadmin' value='make admin'></td></form>
				<form method= 'post' action=''>
				<input type='hidden' name ='deleteUser' value='$name'>
				<td><input type='submit' id='deleteUser' name ='delete' value=' Delete'></td></form>
				<td><?php if($value['userstatus'] == 1){  echo "active" ?></td>
				<form method= 'post' action=''>
				<input type='hidden'  name ='statusDisable' value='$name' onclick=''>
				<td><input type='submit' id='disableUser' name ='submit' value='desable'></td></form>
				<?php }  echo "not active"; ?>
				<form method= 'post' action=''>
				<input type='hidden' name ='statusEnable' value='$name'>
				<td><input type='submit' id='enableUser' name ='submit' value='enable'></td></form>
		
			<?php endforeach; ?>

			</tr>
			</table>	
<br>
	<h2>
		<form method= 'post' action='userLogin.php'>
			<input type="submit" value="Logout"><br>
		</form>
	</h2>


</body>
</html>
