<?php
	session_start();
	require "validatecustomer.php";
	$email = $_SESSION['email'];
	$lname = $_SESSION['lname'];
	echo '
	<!DOCTYPE html>
	<!--this is home.html-->
	<html>
		<head>
			<title>
				CopeLA : Online shopping for Cars and its Accessories
			</title>
			<link href="copela.css" rel="stylesheet" type="text/css">
			<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
			<script type="text/javascript" src="copela.js"></script>
		</head>
		<body style="color:maroon">
			<div id="title">
				<label><a href="home.php" style="color:white; text-decoration:none">copeLA</label><sup>&reg -autos</sup></a>
			</div>
			<div id="searchcart">
				<div id="search">
					<form method="GET" action="products.php">
						<select name="searchcapability" id="searchcapability">
							<option value="Select Category" selected disabled>Select Category</option>';
							$sql= "select categoryName from productcategory;";							
						    $con= mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
						    if(!$con){die('Could not be able to connect to  mysql');}
						    mysql_select_db('hwdb', $con);
						    $res = mysql_query($sql);
						    while ($rows = mysql_fetch_assoc($res)){
						            $resultlist[] = $rows;
						    }  
						    foreach ($resultlist as $name) {
						            echo "<option value=".$name['categoryName'].">".$name['categoryName']."</option>";
						    }
						    echo '
						    <option value="specialsales">Special Sales</option>
	                    </select>
	                    <input type="text" name="searchfield" id="searchfield" placeholder="Search.." size="30px"/>
	                    <span style="color:white">
	                        <select name="sortby" id="sortby">
	                            <option value="SortBy" selected disabled/>Sort By</option>
	                            <option value="Name"/>Name ASC</option>
	                            <option value="Price"/>Price ASC</option>
	                        </select>
	                    </span>
	                    <input type="submit" name="serachbutton" id="searchbutton" value="&#128269" />
	                </form>
	            </div>
	            <div id="logincart">
	                <ul><li><a href="#" id="carthover">Shopping Cart &#9662</a>
	                        <ul><div id="cart">
	                                <fieldset>
	                                    <!--<p># of Products Ordered : </p><br>
	                                    <p>Quantity : </p><br>
	                                    <p>Total Price : </p>-->
	                                    <input type="button" id="editcheckout" name="checkout" value="Edit Cart"/>
	                                    <input type="button" id="proceedcheckout" name="checkout" value="Proceed to Checkout"/>                    
	                                </fieldset>
	                            </div></ul>
	                    </li>';
	                    if(strlen($email)>0){
	                    	$dest = 1;
		                    echo '		                    
		                    <div id="loggedin">
			                    <li>
			                        <a href="#">Logged as '.$lname.' &#9662</a>
			                        <ul><li><a href="customermyprofile.php">My Profile</a></li>
			                        	<li><a href="myorders.php">My Orders</a></li>
			                            <li><a href="customerlogin.php?destroy=1" id="destroysession" >Not '.$lname.'? Logout</a></li>';
			                        echo '
			                        </ul>
			                    </li>
		                    </div>';}
	                    else{
		                    echo '
		                    <div id="notlogged">
			                    <li>
			                        <a href="#">Login &#9662</a>
			                        <ul><li><a href="customerlogin.php">Customer</a></li>
			                            <li><a href="customerregistration.php">New Customer? Register</a></li>
			                            <li><a href="/dbcopela/login.php">Employee</a></li></ul>
			                    </li>
		                    </div>';}
	                    echo'
	                </ul>
	            </div>
	        </div>';
?>
