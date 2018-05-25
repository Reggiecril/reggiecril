<?php

require_once("./include/classes/dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
    if(isset($_SESSION['email'])){
        $id=$_GET['theid'];
        switch($_GET["action"]) {
            case "add": 
                if(!empty($_POST["quantity"])) {
                    
                    $productByCode = $db_handle->runQuery("SELECT * FROM products WHERE id='$id'");
                    $itemArray = array($productByCode[0]["name"]=>array('type'=>$productByCode[0]["type"], 'name'=>$productByCode[0]["name"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"]));
                    
                    if(!empty($_SESSION["cart_item"])) {
                        
                        if(in_array($productByCode[0]["name"],array_keys($_SESSION["cart_item"]))) {
                            foreach($_SESSION["cart_item"] as $k => $v) {
                                    if($productByCode[0]["name"] == $k) {
                                        if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                                            $_SESSION["cart_item"][$k]["quantity"] = 0;
                                        }
                                        $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                                    }
                            }
                        } else {
                            $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                        }
                    } else {
                        $_SESSION["cart_item"] = $itemArray;
                    }
                }
                
            break;
            case "remove":
                if(!empty($_SESSION["cart_item"])) {
                    foreach($_SESSION["cart_item"] as $k => $v) {
                            if($_GET["name"] == $k)
                                unset($_SESSION["cart_item"][$k]);              
                            if(empty($_SESSION["cart_item"]))
                                unset($_SESSION["cart_item"]);
                                
                    }
                }
                
            break;
            case "empty":
                unset($_SESSION["cart_item"]);
                header("Location:web_dev.php?content=mainPage/testclasses.php");
            break;
            
        }
    }else{
        header("Location:web_dev.php?content=user/login.php");
    }

}

?>




<?php
if(isset($_SESSION["cart_item"])){
    $item_total = 0;
   
    
?>  


        <div class="cart_form">
            
            <h3 style="text-align: center;border-bottom: 4px double #ccc;padding-bottom: 15px;"> Your Basket </h3>
            <table align="center" cellpadding="10" cellspacing="1">
<tbody>
<tr >
<th style="text-align:center;"><strong>Product Name</strong></th>
<th style="text-align:center;"><strong>Description</strong></th>
<th style="text-align:center;"><strong>Quantity</strong></th>
<th style="text-align:center;"><strong>Price</strong></th>
<th style="text-align:center;"><strong>Action</strong></th>
</tr>   
<?php       
    foreach ($_SESSION["cart_item"] as $item){
        ?>
                <tr>
                <td style="text-align:center;border-bottom:#F0F0F0 1px solid;"><?php echo $item["name"]; ?></td>
                <td style="text-align:center;border-bottom:#F0F0F0 1px solid;"><?php echo $item["type"]; ?></td>
                <td style="text-align:center;border-bottom:#F0F0F0 1px solid;"><?php echo $item["quantity"]; ?></td>
                <td class="price" style="text-align:center;border-bottom:#F0F0F0 1px solid;"><?php echo "&pound;".$item["price"].".00" ?></td>
                <td style="text-align:center;border-bottom:#F0F0F0 1px solid;"><a href="web_dev.php?content=mainPage/testclasses.php&action=remove&name=<?php echo $item["name"]; ?>">remove</a></td>
                </tr>
                <?php
        $item_total += ($item["price"]*$item["quantity"]); 
        }
        ?>

<tr>
<td class="price-total" colspan="5" align=right><strong>Total:</strong> <?php echo "&pound;".$item_total.".00" ?></td>
</tr>
</tbody>
</table>

<a href="web_dev.php?content=mainPage/testclasses.php" style="text-align: center;text-decoration: none;"><h3> Continue shopping  </h3></a>

  <?php
}
?>

        </div>


