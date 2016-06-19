<?php
	session_start();
	require "validatecustomer.php";
	$email = $_SESSION['email'];

	if(strlen(trim($email))==0){
		require "customerlogin.php";
		echo "<script type='text/javascript'>alert('Login is must to order the product');</script>";
		exit();
	}

	class MyClass{
		public $productName;
		public $productPrice;
		public $Quantity;
		public $productId;
		public function __construct($productName,$productPrice,$Quantity,$productId ){
			$this->productName = $productName;
			$this->productPrice = $productPrice;
			$this->Quantity = $Quantity;
			$this->productId = $productId;
		}
	}

	$sum = 0;
	$arr = $_SESSION['cart'];
	if ($arr != NULL){
		for($i = 0; $i< count($arr); $i++){
			$temp = $arr[$i]->productPrice;
			$sum = intval($sum) + intval($arr[$i]->Quantity) * intval($temp);
		}

		$con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
	    if(!$con){die('Could not be able to connect to  mysql');}
	    mysql_select_db('hwdb', $con);
		$sql = "select * from customers where emailAddress = '".$email."'";   
	    $res = mysql_query($sql);
	    if((mysql_num_rows($res))!=0){
	        $row = mysql_fetch_assoc($res); }

	    $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
	    if(!$con){die('Could not be able to connect to  mysql');}
	    mysql_select_db('hwdb', $con);
		$sql = "insert into orders values ( NULL, '".trim($sum)."', curdate(), curtime(), '".trim($email)."', '".trim($row['cardType'])."', '".trim($row['shippingAddress'])."', '".trim($row['billingAddress'])."')";
		$res = mysql_query($sql);

		for($i = 0; $i< count($arr); $i++){
			$temp = $arr[$i]->productPrice;
			$sql = "insert into orderdetails values (LAST_INSERT_ID(),'".trim($arr[$i]->productId)."','".trim($arr[$i]->productName)."','".trim($arr[$i]->Quantity)."','".trim($temp)."')";
			$res = mysql_query($sql);
			if (!$res) {
				die('Invalid query: ' . mysql_error());
				$flag = false;
			}
			else{
				$flag = true;
			}
		}

		if($flag == true){
			require "home.php";
			$message = "Order successful, will be shipped within 3 working days";
			echo "<script type='text/javascript'>alert('$message');</script>";
			$_SESSION["cart"] = array();
			exit();
		}
	}
	else{
		require "home.php";
		echo "<script type='text/javascript'>alert('Add Products to cart before ordering');</script>";
	}

?>
