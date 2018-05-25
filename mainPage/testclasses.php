
<?php
    include "./cart/cart.php";
?>

    <div class="test second-column">
       <?php
        try {

            $dbh = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
            $query = "SELECT * FROM products";
            $result = $dbh->query($query);
            while ($row = $result->fetch()){    
                print "<table border = 1 >"; 
                    print "  <tr>"; 
                    
                    print "    <td>" . $row['id'] .  "</td>"; 

                    print "    <td width=150px;>" . $row['name'] .  "</td>"; 

                    print "    <td width=100px;>" . $row['type'] .  "</td>"; 

                    print "    <td>" . $row['price'] . "</td>"; 

                    print '<td>'. '<img src="'.$row['image'].'"width = "100px" height = "150px"/>'.'</td>'; 

                    print '<td>'. '<a href="web_dev.php?content=cart/addToCart.php&theid='. $row['id']. '">Add to Cart</a>'.'</td>';  

                    print "  </tr>"; 

                
                print "</table>"; 
            }

        }catch(PDOException $e){

            print $e->getMessage();
            die();
        }
            

        ?>
        
    </div>


