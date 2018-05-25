<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
	<xsl:template match="/products">
		<table border="1">
			<tr bgcolor="yellow">
				<th align="left">ID</th>
				<th align="left">Name</th>
				<th align="left">Type</th>
				<th align="left">Price</th>
				<th align="left">Image</th>
				<th align="left">Cart</th>
			</tr>
			<xsl:for-each select="product">
				<tr>
					<td>
						<xsl:value-of select="product_id"/>
					</td>
					<td>
						<xsl:value-of select="product_name"/>
					</td>
					<td>
						<xsl:value-of select="product_type"/>
					</td>
					<td>
						<xsl:value-of select="product_price"/>
					</td>
					<td>
						<img src="{product_image}" style="width:100px;height:150px;"/>
					</td>
					<td>
						<a href="web_dev.php?content=cart/addToCart.php&amp;theid={product_id}">Add to Cart</a>
					</td>
				</tr>
			</xsl:for-each>
		</table>
	</xsl:template>
</xsl:stylesheet>