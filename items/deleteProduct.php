<?php
try {

  	$dbh = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
	$id=$_GET['theid'];
	//generate query to select record
	$query="DELETE FROM products WHERE id='$id'";
	
	$result=$dbh->query($query);
	header("Location: {$_SERVER['HTTP_REFERER']}");
}catch(PDOException $e){

    print $e->getMessage();
    die();
}

?>