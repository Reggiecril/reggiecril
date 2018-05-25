<?php
try {

  	$dbh = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
	$id=$_GET['theid'];
	//generate query to select record
	$query="SELECT * FROM products WHERE id='$id'";
	$result=$dbh->query($query);
	$row = $result->fetch();
	
}catch(PDOException $e){

    print $e->getMessage();
    die();
}

?>
<form method="post" action="web_dev.php?content=items/updateProduct.php">
			<fieldset">
				<legend>
					Edit Product Details
				</legend>
				<input type="hidden" name="ProductID" value="<?php  echo $row['id']; ?>" />
				<label for="txtProductName">Product Name: </label>
				<input type="text" name="ProductName"  value="<?php  echo $row['name']; ?>"/>
				<br />
				<br />
				<label for="txtProductType">Type: </label>
				<input type="text" name="ProductType"  value="<?php  echo $row['type']; ?>"/>
				<br />
				<br />
				<label for="txtProductPrice">Price: </label>
				<input type="text" name="ProductPrice" value="<?php  echo $row['price']; ?>" />
				
				

			</fieldset>

			<input type="submit" value="Submit" name='amendProduct-Submit' />
			<input type="reset" value="Clear" />
		</form>