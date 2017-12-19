<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
		<h2>Hi  <?= $_SESSION['adminName']; ?> </h2>
		<h3>Registered users are :<?= sizeof($allUsers); ?> </h3>
		
		<table border=1px>
			<tr>
				
				<th>User Name:</th>
				<th>Email</th>
				<th>Phone Number</th>
				<th>status</th>

			</tr>
			<form method = 'post' action="index.php?page=userInformation">
			<?php foreach ($allUsers as $user): ?> 
			<tr>
				<td><?=$user['username']; ?></td>
				<td><?=$user['email']; ?></td>
				<td><?=$user['phonenumber']; ?></td>

				<td><a href="index.php?page=userInformation&action=profileEdit&id=<?=$user['userid']?>">&nbsp;edit&nbsp;</a></td>
				
				<form action="index.php?page=userInformation&action=makeAdmin" method="POST">
					<input type="hidden" name='userid' value='<?= $user['userid'] ?>'>
				<td><input type='submit' id='makeAdmin' name ='makeadmin' value='make admin'></td><?= $makeAdminMsg; ?>
				</form>
				
				<form action="index.php?page=userInformation&action=delete" method="POST">
					<input type="hidden" name='userid' value='<?= $user['userid'] ?>'>
				<td><input type='submit' id='deleteUser' name ='delete' value=' Delete'></td><?= $deleteMsg; ?>
				</form>
				
				<?php if($user['userstatus'] == 1){ ?>
				<td><?= "active" ?></td>
				</form>	
				<td>
					<form action="index.php?page=userInformation&action=disable" method="POST">
					<input type="hidden" name='userid' value='<?= $user['userid'] ?>'>
					<input type='submit' name ='submitDisable' value='disable'>
					</form>
				</td><?= $msgDisable; ?>

				<?php }else{ ?> 

				<td><?= " not active" ?></td>
				
				<td>
					<form action="index.php?page=userInformation&action=enable" method="POST">
					<input type="hidden" name='userid' value='<?= $user['userid'] ?>'>
					<input type='submit' id='enableUser' name ='submitEnable' value='enable'>
					</form>
				</td><?= $enableMsg; ?>
			
			<?php  } endforeach; ?>

			</tr>
			
			</table>
			
<br>
	<h2>
		<form method= 'post' action='index.php?page=adminLogout'>
			<input type="submit" value="Logout"><br>
		</form>
	</h2>


</body>
</html>
