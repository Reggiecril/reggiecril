<a href="./json/database.json">Json Source Code</a>
<div class="api">
	<form method="post" action="">
		<select name="productId">
			
			<?php
			 	try {
		            $dbh = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
		            $query = "SELECT * FROM products";
		            $result = $dbh->query($query);
		            print "<option value='All'>All</option>";
		            while ($row = $result->fetch()){
		            	 print "<option>" . $row['id'] .  "</option>"; 		            
		            }

		        }catch(PDOException $e){

		            print $e->getMessage();
		            die();
		        }
			?>
		</select>
		<input type="submit" name="apiSubmit" value="confirm">
	</form>
	<?php
		if(isset($_POST['apiSubmit'])){
			$productId = $_POST['productId'];
			if($productId == 'All'){
				header("location:api.php/products");
			}else{
				header("location:api.php/products/".$productId."");
			}
		}
	?>
</div>
<button>Get JSON data</button>

<div id="ede"></div> 
<script type="text/javascript">

$(document).ready(function(){
  $("button").click(function(){
    $.getJSON("./json/database.json",function(Products){
      	$.each(Products, function(i, v){
      		$('#ede').append(
      			"<table border=1>"+
	      			"<tr bgcolor='green'>"+
	      				"<th align='center'>Products</th>"+
						"<th align='center'>ID</th>"+
						"<th align='center'>Name</th>"+
						"<th align='center'>Type</th>"+
						"<th align='center'>Price</th>"+
						"<th align='center'>Cart</th>"+
					"</tr>"+
	      			"<tr>"+
	      				"<td>"+"<img src='"+v.image+"' width='100px' height='150px'/>"+"</td>"+
	      				"<td width='30px'>"+v.id+"</td>"+
	                    "<td width='300px'>"+v.name+"</td>"+
	                    "<td width='100px'>"+v.type+"</td>"+
	                    "<td width='50px'>"+v.price+"</td>"+
	                    "<td>"+"<a href='web_dev.php?content=cart/addToCart.php&theid="+v.id+"'>Add to Cart</a>"+"</td>"+
	      			"</tr>"+
      			"</table>"
      			);
      	});
    });
  });

});
</script>