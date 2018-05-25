<?php
	 try {
            $dbh = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
            $query = "SELECT * FROM products";
            $result = $dbh->query($query);

            $response = array();
            $Products = array();
            while ($row = $result->fetch()) {
            	$Products[] = array(
                    'id' => $row["id"],
                    'name' => $row["name"],
                    'type' => $row["type"],
                    'price' => $row["price"],
                    'image' => $row["image"]
                );
            }
            $response['Products'] = $Products;

            $fp = fopen('./json/database.json', 'w');
            fwrite($fp, json_encode($response['Products'] ));
            fclose($fp);
 
        }catch(PDOException $e){

            print $e->getMessage();
            die();
        }
?>