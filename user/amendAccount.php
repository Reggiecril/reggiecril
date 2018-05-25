<?php
try {
	$dbh = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
	$email=$_SESSION['email'];
	$password=$_SESSION['password'];
	$result = $dbh->query("SELECT * FROM users WHERE email='$email' AND password='$password'");
	$row = $result->fetch();
	$_SESSION['id']=$row['id'];
	
	

}catch(PDOException $e){

    echo $e->getMessage();
    die();
}
?>
<form method="post" action="web_dev.php?content=user/updateAccount.php">
	<fieldset style="background-color: #ccc;width: 50%;margin:0 auto;border: 2px double #000;border-radius: 15px;padding: 10px;">
						<p><strong>First Name:</strong></p>
						<input type="text" name="firstname" value="<?php  echo ''.$row['firstname'].'';?>">
						<p><strong>Last Name:</strong></p>
						<input type="text" name="lastname" value="<?php  echo ''.$row['lastname'].'';?>">
						<p><strong>Email:</strong></p>
						<input type="text" name="email" value="<?php  echo ''.$row['email'].'';?>">
						<p><strong>Age:</strong></p>
						<input type="text" name="age" value="<?php  echo ''.$row['age'].'';?>">
						
	</fieldset>
	<div style="color: black;text-align: center;">
	<input type="submit" name="amendAccount-Submit" value="Confirm">
	</div>
</form>
