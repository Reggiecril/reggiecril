
<?php
try {
	$dbh = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
	if(isset($_SESSION['email'])){
		$email=$_SESSION['email'];
		$password=$_SESSION['password'];
		$result = $dbh->query("SELECT * FROM users WHERE email='$email' AND password='$password'");
		$row=$result->fetch();
	}else{
		header("location:web_dev.php?content=user/login.php");
	}
	

}catch(PDOException $e){

    echo $e->getMessage();
    die();
}
?>
<fieldset style="width: 40%;margin:0 auto;border: 2px double #000;border-radius: 15px;padding: 10px;">
					<p><strong>First Name:</strong><?php  echo '&nbsp;'.$row['firstname'].'<br/>';?></p>
					<p><strong>Last Name:</strong><?php  echo '&nbsp;'.$row['lastname'].'<br/>';?></p>
					<p><strong>Email:</strong><?php  echo '&nbsp;'.$row['email'].'';?></p>
					<p><strong>Age:</strong><?php  echo '&nbsp;'.$row['age'].'<br/>';?></p>
				
</fieldset>
<div style="color: black;text-align: center;">
	<a href="web_dev.php?content=user/amendAccount.php">Edit</a>
	
</div>
