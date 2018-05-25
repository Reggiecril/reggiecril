<?php
	require "include/classes/Item.php";
 	require "include/classes/LineItem.php";
 	require "include/classes/ObjectCollection.php";
try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
    
	$id=$_GET['theid'];
	
	$result=$dbh->query("SELECT * FROM products WHERE id='$id'");
	$row=$result->fetch();
	
	if(isset($_POST['quantity-Submit1'])){
		$quantity = $_POST['quantity'];	
		$result1=$dbh->query("SELECT * FROM products WHERE id='$id'");
		$rower=$result1->fetch();
	    $ca = new ObjectCollection();
		$item1 = new Item($rower['id'],$rower['price']);
		$item1->setname($rower['name']);
		$item1->setImage($rower['image']);
		$item1->setType($rower['type']);
		$lineitem1 = new LineItem($item1,$quantity);
		if (!isset($_SESSION['line'])){
			$_SESSION['line'] =new ObjectCollection();
			$ca->addLineItem($lineitem1);
			$_SESSION['line'] = serialize($ca);
		}else{
			$ca = unserialize($_SESSION['line']);
			$ca->addLineItem($lineitem1);
			$_SESSION['line'] = serialize($ca);
			
		}
		header("location:web_dev.php?content=mainPage/OOTest.php");
	}
}catch(PDOException $e){

    print $e->getMessage();
    die();
}

?>

<h1>Add it To You Cart</h1>
<form method="post" action="" >
	<span  style="display: inline-block;width:100px;float: left;">ProductName:</span>
	<span  style="display: inline-block;width:400px;float: right;"><?php echo $row['name']?></span>
	</br></br>

	<span  style="display: inline-block;width:100px;float: left;">ProductPrice:</span>
	<span  style="display: inline-block;width:400px;float: right;"><?php echo $row['price']?></span>
	</br></br>
	<label style="width:100px;float: left;">Quantity:</label>
	<input type="text" name="quantity" value="1" size="2" style="width:400px;float:right;">
	</br></br>
	</br></br>
	<input type="submit" value="Confirm" name="quantity-Submit1" style="padding:20px;width:60%;">
</form>