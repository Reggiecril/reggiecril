<?php
try {

  	$dbh = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
	//Check to see form has been submitted		
	if(isset($_POST['subProduct'])){
		

		//gather data from form
		$name=$_POST['txtName'];
		$type=$_POST['txtBrand'];
		$price=$_POST['txtPrice'];
		$country=$_POST['txtCountry'];
		$alcohol=$_POST['txtAlcohol'];
		$centilitre=$_POST['txtCentilitre'];
		$review=$_POST['txtReview'];
		$image = $_POST['image'];

	   if(isset($_FILES['image'])){
	      $errors= array();
	      $file_name = $_FILES['image']['name'];
	      $file_size = $_FILES['image']['size'];
	      $file_tmp = $_FILES['image']['tmp_name'];
	      $file_type = $_FILES['image']['type'];
	      $tmp = explode('.', $file_name);
		$file_extension = end($tmp);
	      $image="./assets/images/".$file_name;
	      $expensions= array("jpeg","jpg","png");
	      
	      if(in_array($file_extension,$expensions)=== false){
	         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
	      }
	      
	      if($file_size > 2097152) {
	         $errors[]='File size must be excately 2 MB';
	      }
	      
	      if(empty($errors)==true) {
	         move_uploaded_file($file_tmp,$image);
	       
	         //prepare query
			$query= "INSERT INTO products
			(name,type,price,country,alcohol,centilitre,image,review)
			VALUES
			('$name', '$type', '$price', '$country' , '$alcohol', '$centilitre' , '$image', '$review' )";
			
			//run query to INSERT new record
			$result=$dbh->query($query);
			header("location:web_dev.php?content=mainPage/PDO.php");
		//relocate back to front page
	      }else{
	         print_r($errors);
	      }
	   }

	}
}catch(PDOException $e){

    print $e->getMessage();
    die();
}


?>
