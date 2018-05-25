<?php

try {
	$dbh = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$email= $_POST['email'];
		$age=$_POST['age'];
		$id=$_SESSION['id'];


		//build update query
		$dbh->query("UPDATE users SET firstname='$firstname',lastname='$lastname',email='$email',age='$age'WHERE id='$id'");
		$_SESSION['email'] = $email;
		//relocate back to main page
		header("Location:web_dev.php?content=user/securePage.php");

}catch(PDOException $e){

    echo $e->getMessage();
    die();
}
?>