
<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
		
		<h2>Hi  <?= $_SESSION['userName']; ?> </h2>
		<h3>Registered users are :<?= sizeof($allUsers); ?> </h3>
		<form method = 'post'>
		<table border=1px>
			<tr>
				
				<th>User Name:</th>
				<th>Email</th>
				<th>Phone Number</th>
				<th>status</th>
			</tr>
			<?php foreach ($allUsers as $value): ?> 
			<tr>
				<td><?= $value['username']; ?></td>
				<td><?= $value['email']; ?></td>
				<td><?= $value['phonenumber']; ?></td>
				<td><a href='profileEditUser.php?id=<?= $value['userid']; ?>'>&nbsp;edit&nbsp;</a></td>
			
				<td><input type='submit' id='makeAdmin' name ='makeadmin' value='make admin'></td>
				
				<td><input type='submit' id='deleteUser' name ='delete' value=' Delete'></td><?= $deleteMsg; ?>
				
				<?php if($value['userstatus'] == 1){ ?>
				<td><?= "active" ?></td>
				
				<td><input type='submit' name ='submitDisable' value='desable'></td><?= $msgDisable; ?>
				
				<?php }else{ ?> 

				<td><?= " not active" ?></td>
				
				<td><input type='submit' id='enableUser' name ='submitEnable' value='enable'></td><?= $enableMsg; ?>
			
			<?php  } endforeach; ?>

			</tr>
			</table>
			</form>	
<br>
	<h2>
		<form method= 'post' action='../controller/adminController.php'>
			<input type="submit" value="Logout"><br>
		</form>
	</h2>


</body>
</html>
