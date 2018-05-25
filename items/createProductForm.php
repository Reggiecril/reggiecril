<form method="post" action="web_dev.php?content=items/createProduct.php" enctype="multipart/form-data">
			<fieldset class="fieldset-width">
				<legend>
					Add Product 
				</legend>
				<label for="name">Product Name:  </label>
				<input type="text" name="txtName" />
				<p></p>
				<label for="name">Product Brand: </label>
				<input type="text" name="txtBrand" />
				<p></p>
				<label for="name">Product Price: </label>
				<input type="text" name="txtPrice" />
				<p></p>
				<label for="name">Product Country: </label>
				<input type="text" name="txtCountry" />
				<p></p>
				<label for="name">Product Alcohol: </label>
				<input type="text" name="txtAlcohol" />
				<p></p>
				<label for="name">Product Centilitre: </label>
				<input type="text" name="txtCentilitre" />
				<p></p>
				<label for="name">Product Image: </label>
				<input type="file" name="image" id="file" />
				<p></p>
				<label for="name">Product Review: </label>
				<input type="text" name="txtReview" />
				<p></p>
				<input type="submit" value="Submit" name="subProduct" />
				<input type="reset" value="Clear" />
			</fieldset>
</form>