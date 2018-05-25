
<?php
    include "./cart/cart.php";
    require "include/classes/Item.php";
 	require "include/classes/LineItem.php";
 	require "include/classes/ObjectCollection.php";
?>

    <div class="test second-column">
       <?php
        try {
            $dbh = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
            $count = $_GET['count'];
            $id=$_GET['theid'];
            
            $ca = new ObjectCollection();

            if (isset($_SESSION['line'])){
            	$ca = unserialize($_SESSION['line']);
            	if($count != null) {
					$line = $ca->getLineItem($count);
	            	$ca->delLineItem($line);
				}
				if($ca->getLineCount()!= 0){
					print "<table border = 1 align='center'>"; 
						    	print "	<tr><th align='center' style='color:white;' width='100px'>ID</th>
						    			<th align='center' style='color:white;' width='100px'>Price</th>
						    			<th align='center' style='color:white;' width='100px'>Quantity</th>
						    			<th align='center' style='color:white;' width='100px'>Action</th></tr>
						    		  ";
					for ($i = 0; $i < $ca->getLineCount(); $i++) {
						    $li = $ca->getLineItem($i);
						    $item = $li->getItem();
						    
			                    print "  <tr>"; 
			                    
			                    print "    <td align='center'>" . $item->getId() .  "</td>"; 

			                    print "    <td align='center'>" . $item->getPrice() .  "</td>"; 

			                    print "    <td align='center'>" . $li->getQuantity() .  "</td>"; 

			                    print "    <td align='center'><a href='web_dev.php?content=mainPage/OOTest.php&count=".$i."'>Remove</a> </td>"; 

			                    print "  </tr>"; 

			                
			                
					}
				}print "</table>"; 
				$_SESSION['line'] =serialize($ca);	
			}
			$query = "SELECT * FROM products";
            $result = $dbh->query($query);
            while ($row = $result->fetch()){  
              $ob = new ObjectCollection();
                $item2 = new Item($row['id'],$row['price']);
                $item2->setName($row['name']);
                $item2->setImage($row['image']);
                $item2->setType($row['type']);
                $lineitem2 = new LineItem($item2, 1);
                $ob->addLineItem($lineitem2);
                for ($i = 0; $i < $ob -> getLineCount(); $i++) {
                    $li = $ob -> getLineItem($i);
                    $item = $li -> getItem();
                    print "<table border = 1 align='center'>"; 
                	print"<th align='center'>Products</th>";
					print"<th align='center'>ID</th>";
					print"<th align='center'>Name</th>";
					print"<th align='center'>Type</th>";
					print"<th align='center'>Price</th>";
					print"<th align='center'>Cart</th>";
                    print "  <tr>"; 
                    print "    <td>" . $item -> getId() .  "</td>"; 

                    print "    <td width=150px;>" . $item -> getName() .  "</td>"; 

                    print "    <td width=100px;>" . $item -> getType() .  "</td>"; 

                    print "    <td>" . $item -> getPrice() . "</td>"; 

                    print '<td>'. '<img src="'.$row['image'].'"width = "100px" height = "150px"/>'.'</td>'; 

                    print '<td>'. '<a href="web_dev.php?content=cart/Collection.php&theid='. $row['id']. '">Add to Cart</a>'.'</td>';  

                    print "  </tr>"; 

                }
                print "</table>"; 
                
            }
			$resultrr=$dbh->query("SELECT * FROM products WHERE id='$id'");
			$rowrr=$resultrr->fetch();
	        }catch(PDOException $e){
	            print $e->getMessage();
	            die();
	        }
            

        ?>
		    </div>
