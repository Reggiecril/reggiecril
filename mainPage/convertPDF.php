<?php
// Include autoloader
	require_once '../dompdf/autoload.inc.php';

use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
	try {
            $dbh = new PDO("mysql:host=localhost;dbname=reggiecr_c3470912", "reggiecr_root", "Cloud19961008");
            $query = "SELECT * FROM products where id = '1'";
            $result = $dbh->query($query);
            $response = array();
            $Products = array();
            $row = $result->fetch();
            	$Products[] = array(
                    'id' => $row["id"],
                    'name' => $row["name"],
                    'type' => $row["type"],
                    'price' => $row["price"],
                    'image' => $row["image"]
                );
            
            	$response['Products'] = $Products;
            	$html="<div class='test second-column'>
						<table border = 1 >
					       	<tr>        
						        <td>" . $row['id'] .  "</td> 

						        <td width=150px;>" . $row['name'] .  "</td> 

						        <td width=100px;>" . $row['type'] .  "</td> 

						        <td>" . $row['price'] . "</td> 

							    <td><img src='.".$row['image']."' width = '100px' height = '150px'/></td> 
						   	</tr>           
						</table>
					</div>";
					$html.= json_encode($Products);
            $query1 = "SELECT * FROM products where id = '2'";
            $result1 = $dbh->query($query1);
            $Products1 = array();
            $row1 = $result1->fetch();
            	$Products[] = array(
                    'id' => $row1["id"],
                    'name' => $row1["name"],
                    'type' => $row1["type"],
                    'price' => $row1["price"],
                    'image' => $row1["image"]
                );
            
            	$html.="<div class='test second-column'>
						<table border = 1 >
					       	<tr>        
						        <td>" . $row1['id'] .  "</td> 

						        <td width=150px;>" . $row1['name'] .  "</td> 

						        <td width=100px;>" . $row1['type'] .  "</td> 

						        <td>" . $row1['price'] . "</td> 

							    <td><img src='.".$row1['image']."' width = '100px' height = '150px'/></td> 
						   	</tr>           
						</table>
					</div>";
					$html.= json_encode($Products);

        }catch(PDOException $e){

            print $e->getMessage();
            die();
        }
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("convertPDF.pdf", array("Attachment" => false));

exit(0);
?>