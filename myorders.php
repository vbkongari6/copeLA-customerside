<?php
	session_start();
	require "validatecustomer.php";
	$email = $_SESSION['email'];
	if(strlen($email) > 0){
	    $sql = "select o.*, od.* from orders o inner join orderdetails od on o.orderId=od.orderId where o.orderedBy = '".trim($email)."' order by o.orderDate DESC, o.orderTime DESC;";
	    $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
	    if(!$con){die('Could not be able to connect to  mysql');}
	    mysql_select_db('hwdb', $con);
	    $res = mysql_query($sql);
	    if(!$res){require "home1.php"; echo "<br><div align='center'><b>nope</b></div>";}
	    if((mysql_num_rows($res))==0){
	    	require "home1.php"; echo "<br><div align='center'><b>No Pruchases made till now</b></div>";}
	    elseif(mysql_num_rows($res)>0){
		    while ($rows = mysql_fetch_assoc($res)){
		        $resultlist[] = $rows;
		    }
		    require "home1.php";
		    echo '<br><div align="center"><table cellpadding="10px"><tr><td colspan="10" align="center"><b>My Orders</b></td></tr>
		    <tr><td align="center"><b>Product</b></td>
		        	<td align="center"><b>Order Placed On</b></td>
		        	<td align="center"><b>At</b></td>
		        	<td align="center"><b>Quantity</b></td>
		        	<td align="center"><b>Product Price</b></td>
		        	<td align="center"><b>Payment Method</b></td>
		        	<td align="center"><b>Shipped to</b></td>
		        	<td align="center"><b>Billed to</b></td>
		        </tr>';
		    foreach ($resultlist as $orders) {
		        echo "<form method='GET' action='mychoice.php'>
		        <tr><td align='center'><a href='/copela/mychoice.php?proid=", $orders['productId'] ,"' style='color:maroon'>".$orders['productName']."</a></td>
		        	<td align='center'>".$orders['orderDate']."</td>
		        	<td align='center'>".$orders['orderTime']."</td>
		        	<td align='center'>".$orders['quantity']."</td>
		        	<td align='center'>".$orders['price']."</td>
		        	<td align='center'>".$orders['paymentMethod']."</td>
		        	<td align='center'>".$orders['shippingAddress']."</td>
		        	<td align='center'>".$orders['billingAddress']."</td>
		        </tr></form>";
		    }
		}
	}
	else{ require "home.php"; }
?>
