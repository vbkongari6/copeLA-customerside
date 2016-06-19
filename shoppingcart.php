<?php
	session_start();
	require "validatecustomer.php";	
	require "home1.php";
	echo '</body>
		<body onload="display()"><br>
				<table width="100%">
					<tr width="100%">
						<td>
							<span style="font-size:1.2em;"><b>Shopping Cart</b></span>
							<label name="shoppingcart" id="shoppingcart"><label>				
						</td>
						<td align="center" valign="top">
							<p><b>Sub Total: <label id="subtotal"></label>$<b></p>
							<form action="checkout.php">
							<input type="submit" name="proceddtocheckout" id="proceedtocheckout" value="Proceed to Checkout"/>
							</form>
						</td>			
					</tr>
				</table>
	';
?>