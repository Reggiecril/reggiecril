<?php 
try {
	$dbh = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
	$query = "SELECT * FROM products"; 
	$result = $dbh->query($query);
	
	
	//Top of xml file
	$_xml = '<?xml version="1.0"?>'; 
	$_xml .="<products>"; 
	while($row = $result->fetch()) {
	$_xml .="<product>"; 
	$_xml .="<product_id>".$row['id']."</product_id>"; 
	$_xml .="<product_name>".$row['name']."</product_name>"; 
	$_xml .="<product_type>".$row['type']."</product_type>"; 
	$_xml .="<product_price>".$row['price']."</product_price>"; 
	$_xml .="<product_image>".$row['image']."</product_image>";
	$_xml .="</product>"; 
	} 
	$_xml .="</products>"; 
	//Parse and create an xml object using the string
	$xmlobj=new SimpleXMLElement($_xml);
	//or we could write to a file
	$xmlobj->asXML('./xml/1.xml');
}catch(PDOException $e){

    echo $e->getMessage();
    die();
  }
?>