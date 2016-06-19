<?php
	session_start();
	require "validatecustomer.php";
	$prodid = $_GET['proid'];
	//require "title.html";
	require "home1.php";
	$sql = "select p.*, pc.*, ss.* from product p inner join productcategory pc on p.productCategoryId=pc.categoryId inner join specialsales ss on p.productId=ss.productId where p.productId='".$prodid."';";
	$con= mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
    if(!$con){die('Could not be able to connect to  mysql');}
    mysql_select_db('hwdb', $con);
    $res = mysql_query($sql);
    $product = mysql_fetch_assoc($res);    
    //require "2015 BMW i8.html";
    if($product['discountPercentage']!=""){
    	$priceafterdiscount = $product['productPrice']-(($product['productPrice'])*($product['discountPercentage'])/100);
    }
    else{
    	$sql = "select p.*, pc.* from product p inner join productcategory pc on p.productCategoryId=pc.categoryId where p.productId='".$prodid."';";
		$con= mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
	    if(!$con){die('Could not be able to connect to  mysql');}
	    mysql_select_db('hwdb', $con);
	    $res = mysql_query($sql);
	    $product = mysql_fetch_assoc($res);
    }
    echo '
    	<div align="center" style="color:maroon; padding:15px;">
	    	<table border="0px" cellpadding="10px" style="border-collapse:collapse">
	    		<tr>
	    			<td valign="top">';
	    				if($product['productImage']!=""){echo '
	    				<label id="i81" name="i81" style="padding:1px"><img src="/dbcopela/productimages/'.$product['productImage'].'" alt="'.$product['productImage'].'" width="90px" height="60"/></label><br>';}
	    				if($product['productImage2']!=""){echo '
		    			<label id="i82" name="i81" style="padding:1px"><img src="/copela/images/'.$product['productImage2'].'" alt="'.$product['productImage2'].'" width="90px" height="60"/></label><br>';}
		    			if($product['productImage3']!=""){echo '
		    			<label id="i83" name="i81" style="padding:1px"><img src="/copela/images/'.$product['productImage3'].'" alt="'.$product['productImage3'].'" width="90px" height="60"/></label><br>';}
		    			if($product['productImage4']!=""){echo '
		    			<label id="i84" name="i81" style="padding:1px"><img src="/copela/images/'.$product['productImage4'].'" alt="'.$product['productImage4'].'" width="90px" height="60"/></label>';}
		    		echo '
	    			</td>
		    		<td valign="top">
		    			<div id="bmwi81"><img src="/dbcopela/productimages/'.$product['productImage'].'" alt="'.$product['productImage'].'" width="400px" height="252.4"/></div>
		    			<div id="bmwi82"><img src="/copela/images/'.$product['productImage2'].'" alt="'.$product['productImage2'].'" width="400px"  height="252.4"/></div>
		    			<div id="bmwi83"><img src="/copela/images/'.$product['productImage3'].'" alt="'.$product['productImage3'].'" width="400px"  height="252.4"/></div>
		    			<div id="bmwi84"><img src="/copela/images/'.$product['productImage4'].'" alt="'.$product['productImage4'].'" width="400px"  height="252.4"/></div>
		    		</td>
		    		<td valign="top">
			    		<table>
				    		<tr><td>Name : </td>
				    			<td>'.$product['productName'].'</td></tr>
					    	<tr><td>Category : </td>
					    		<td>'.$product['categoryName'].'</td></tr>
				    		<tr><td valign="top">Description : </td>
				    			<td width="300px">'.$product['productDescription'].'</td></tr>
				    		<tr><td>Price (actual*) : </td>
				    			<td>'.$product['productPrice'].' $</td></tr>';
					if($product['discountPercentage']!=""){
				      echo '<tr><td>Special Sale : </td>
				      			<td><span style="text-decoration:underline">'.$product['discountPercentage'].'% discount</span></td></tr>
				      		<tr><td>Price after Discount* : </td>
				      			<td>'.$priceafterdiscount.' $</td></tr>';
				    }
				    echo '</table></td>
		    		<td valign="top">
		    			
		    				<input type="text" name="pid" id="pid" value="'.$prodid.'" hidden/>
		    				<input type="text" name="pimage" id="pimage" value="/dbcopela/productimages/'.$product['productImage'].'" hidden/>
		    				<input type="text" name="pname" id="pname" value="'.$product['productName'].'" hidden/>
		    				<input type="text" name="pprice" id="pprice" value="'.$product['productPrice'].'" hidden/>
		    				<input type="text" name="pdiscount" id="pdiscount" value="'.$product['discountPercentage'].'" hidden/>
			    			<fieldset>
			    				<table cellpadding="5px">
			    					<tr><td align="center">
			    						<span style="text-decoration:underline">Cart</span></td></tr>
			    					<tr><td  align="center">
			    							Quantity:
			    							<select name="qty" id="qty" style="color:maroon">
			    								<option value="1">1</option>
			    								<option value="2">2</option>
			    								<option value="3">3</option>
			    								<option value="4">4</option>
			    								<option value="5">5</option>
			    								<option value="6">6</option>
			    								<option value="7">7</option>
			    								<option value="8">8</option>
			    								<option value="9">9</option>
			    							</select>
			    						</td></tr>
			    					<tr>
			    						<td>			    							
			    							<input type="button" name="addtocart" id="addtocart" value="Add to Cart" onclick="cart()" />
			    						</td>
			    					</tr>
			    				</table>
			    			</fieldset>				    	 			
	    		</td></tr>
	    	<tr>
	    		<td style="padding:30px" colspan="4">
	    			<fieldset>';	    	
	    				$con= mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
					    if(!$con){die('Could not be able to connect to  mysql');}
					    mysql_select_db('hwdb', $con);	
					    $sql1 = "select o.orderId from orders o inner join orderdetails od on o.orderId=od.orderId where od.productId='".$prodid."';";
					    $res1 = mysql_query($sql1);
					    if ($res1){
					    	$row = mysql_fetch_assoc($res1);					    	
					    	$sql2 = "select o.*, od.*, p.* from orders o inner join orderdetails od on o.orderId=od.orderId inner join product p on p.productId=od.productId where o.orderId='".$row['orderId']."' and p.productId != '".$prodid."';";
						}
						echo '<br><div align="left"><table cellpadding="5px"><tr><td colspan="7"><span style="text-decoration:underline"><b>People who bought this product also bought</b></span> :</td></tr><tr>';
					    $res2 = mysql_query($sql2);						    
					    if(mysql_num_rows($res2)>0){
						    while ($rows = mysql_fetch_assoc($res2)){
						        $resultlist[] = $rows;
						    }							    		  
						    $counter = 0; $k=0;						    
						    foreach ($resultlist as $products) {
								$counter++;
						        echo "<td align='center' ";
						        if($k==0){ echo "style='display:none;'>"; } else{ echo ">"; }
						        echo "
						        	<form method='GET' action='mychoice.php'>
						        	<input type='text' name='proid' id='proid' value='".$products['productId']."' style='display:none;'/>
						        	<input type='image' src='/dbcopela/productimages/".$products['productImage']."' alt='".$products['productName']."' width='160px' height='100px'/><br>
						            <a href='mychoice.php?proid=", urlencode($products['productId']) ,"' style='color:maroon'>".$products['productName']."</a></td></form>";
						        if($counter==5){ $k=1;$counter=0;echo '</tr><tr>'; }
						    }
						}
						else{echo '<td><p>No product bought anything with this product.</p></td>';}
							
						    
			    			//<tr></tr> 
			    			echo '			
	    				</tr></table></div>
	    			</fieldset>
	    		</td>
	    	</tr>
	    </table>
    	</div>
    ';
?>

