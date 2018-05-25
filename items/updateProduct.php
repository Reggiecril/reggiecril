<?php

try {
	$dbh = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
	if($_POST['amendProduct-Submit']){
		$productid=$_POST['ProductID'];
		$name=$_POST['ProductName'];
		$price= $_POST['ProductPrice'];
		$type=$_POST['ProductType'];

		$query = "UPDATE products SET name='$name',price='$price',type='$type' WHERE id='$productid'";
		//build update query
		$dbh->query($query);
		
		//relocate back to main page
		header("Location:web_dev.php?content=mainPage/PDO.php");
	}else{
		header("Location:web_dev.php?content=mainPage/PDO.php");
	}
}catch(PDOException $e){

    echo $e->getMessage();
    die();
}
?>

