<?php
	session_start();

	if(!isset($_SESSION["cart"])){
		$_SESSION["cart"] = array();
	}

	class MyClass{
		public $productName;
		public $productPrice;
		public $Quantity;
		public $productId;
		public function __construct($productName,$productPrice,$Quantity,$productId){
		$this->productName = $productName;
		$this->productPrice = $productPrice;
		$this->Quantity = $Quantity;
		$this->productId = $productId;
		}
	}

	if(isset($_POST['prod'])){
		$deleteVal = $_POST['prod'];
		$arr = $_SESSION["cart"];
		for($i = 0; $i< count($arr); $i++){
			if($arr[$i]->productId == $deleteVal){
				unset($arr[$i]);}
		}
		$_SESSION["cart"] = array_values($arr); 
		echo 'success';
	}

	if(isset($_POST['value'])){
		if($_POST['value'] == 'retrieve'){
			echo json_encode($_SESSION["cart"]);}
	}

	if(isset($_POST['pname']) && isset($_POST['pprice']) && isset($_POST['quantity']) && isset($_POST['pid']) ) {
		$pname = $_POST['pname'];
		$pprice = $_POST['pprice'];

		$quantity = $_POST['quantity'];
		//echo '<script type="text/javascript">'.$quantity.'</script>';
		$pid = $_POST['pid'];
		$flag = false;
		$arr = $_SESSION["cart"];
		for($i = 0; $i< count($arr); $i++){
			if($arr[$i]->productName == $pname){
				$flag =true;
				//echo '<script type="text/javascript">'.$Quantity.'</script>';
				$arr[$i]->Quantity = intval($arr[$i]->Quantity) + intval($quantity);
			}
		}
		if($flag == false){ 
			$temp = new MyClass($pname,$pprice,$quantity,$pid);
			array_push($arr, $temp);
		}
		$_SESSION["cart"] = $arr;
		echo "success";
	}

	if(isset($_POST['count']) && isset($_POST['pid']) ) {
		$count = $_POST['count'];
		$pid = $_POST['pid'];
		echo '<script type="text/javascript">'.$count.'</script>';
		$sql = "select productPrice from product where productId = '".trim($pid)."';";
		$con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
		if(!$con){
		die ("Connection failed");
	}
	mysql_select_db('hwdb',$con);
	$res = mysql_query($sql);
	if (!$res) {
		die('Invalid query: ' . mysql_error());
		require 'header.html';
	}

	if($row = mysql_fetch_assoc($res)){
		$pprice = $row['productPrice'];
	}

	$arr = $_SESSION["cart"];
	for($i = 0; $i< count($arr); $i++){
		if($arr[$i]->productId == $pid){			
			$arr[$i]->Quantity = intval($count);
		}
	}

	$_SESSION["cart"] = $arr;
	echo "success";
	exit();
	}  
?>
