<?php
	session_start();
	require "validatecustomer.php";
	
	$email = $_SESSION['email'];
	if(strlen($email) > 0){
	    $sql = "select * from customers where emailAddress = '".$email."';";
	    $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
	    if(!$con){die('Could not be able to connect to  mysql');}
	    mysql_select_db('hwdb', $con);
	    $res = mysql_query($sql);
	    if((mysql_num_rows($res))==0){echo "<div align='center' style='color:red'>No Data</div>";}
	}

	if ($res){
	    $row = mysql_fetch_assoc($res);
	    require "home1.php";
	    echo ' 
	                <div id="customermyprofile" align="center">                    
	                    <p><input type="button" name="checkout" id="checkout" value="Order" style="color:maroon; padding:3px"/></p>
	                    <fieldset id="fieldsetautowidth" style="padding-bottom:10px">
	                        <legend style="text-decoration:underline">Check Details</legend>
	                        <table cellpadding="5">
	                            <tr><td>First Name :</td>                           
	                                <td>'.$row['firstName'].'</td></tr>
	                            <tr><td>Last Name :</td>
	                                <td>'.$row['lastName'].'</td></tr>                            
	                            <tr><td>Email Address :</td>
	                                <td>'.$row['emailAddress'].'</td></tr>
	                            <tr><td>Shipping Address :</td>
	                                <td>'.$row['shippingAddress'].'</td></tr>
	                            <tr><td>City :</td>
	                                <td>'.$row['city'].'</td></tr>
	                            <tr><td>State :</td>
	                                <td>'.$row['state'].'</td></tr> 
	                            <tr><td>Country :</td>
	                                <td>'.$row['country'].'</td></tr>
	                            <tr><td>Zip Code :</td>
	                                <td>'.$row['zipCode'].'</td></tr>
	                            <tr><td>Billing Address :</td>
	                                <td>'.$row['billingAddress'].'</td></tr>                          
	                            <tr><td>Card Type :</td>
	                                <td>';
	                                    if($row['cardType'] == "Credit"){echo 'Credit';}
	                                    elseif($row['cardType'] == "Debit"){echo 'Debit';}
	                                    echo '
	                                </td></tr>
	                            <tr><td>Card Number :</td>
	                                <td>************'.substr($row['cardNumber'], -4).'</td></tr>
	                        </table>
	                    </fieldset>
	                </div>
	            </body>
	        </html>
	    ';  }
	else{ require "home1.php"; echo '<br><div align="center"><b>You need to login to check out</b></div>'; }
?>
