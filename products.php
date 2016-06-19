<?php
	session_start();
	require "validatecustomer.php";
	$searchcap = $_GET['searchcapability'];
	$searchfld = $_GET['searchfield'];	
	$sortby = $_GET['sortby'];

    require "home1.php";    

    echo '<span style="color:maroon;">';
    //require "customersearches.html";
    echo '<table id="productimages" border="0px" style="border-collapse:collapse;" align="center"><tr>';
    $sql1="";
    if(strlen(trim($searchcap))>0){
    	$sql1= "select ss.*, p.* from specialsales ss inner join product p on ss.productId=p.productId inner join productcategory pc on p.productCategoryId = pc.categoryId where pc.CategoryName='".$searchcap."' order by p.productName asc;";
    }
    if($sortby=="Name" || $sortby==""){
		if(strlen(trim($searchcap))>0 && strlen(trim($searchfld))==0){
			echo '<p style="text-decoration:underline" align="center"><b>'.$searchcap.'</b><p>';
			if($searchcap=="specialsales"){
				$sql= "select p.* from product p inner join specialsales ss on p.productId = ss.productId order by p.productName asc;";
			}
			else{
				$sql= "select p.* from product p inner join productcategory pc on p.productCategoryId = pc.categoryId where pc.CategoryName='".$searchcap."' order by p.productName asc;";
			}
		}
		elseif(strlen(trim($searchcap))==0 && strlen(trim($searchfld))>0){
			$sql= "select * from product where productName like '%".$searchfld."%' order by productName asc;";}
		elseif(strlen(trim($searchcap))>0 && strlen(trim($searchfld))>0){
			echo '<p style="text-decoration:underline" align="center">'.$searchcap.'<p>';
			if($searchcap=="specialsales"){
				$sql= "select p.* from product p inner join specialsales ss on p.productId = ss.productId where p.productName like '%".$searchfld."%' order by p.productName asc;";}
			else{
				$sql= "select p.* from product p inner join productcategory pc on p.productCategoryId = pc.categoryId where pc.CategoryName='".$searchcap."' and p.productName like '%".$searchfld."%' order by p.productName asc;";
			}
		}
		else{$sql= "select * from product order by productName asc;";}
	}
	if($sortby=="Price"){
		if(strlen(trim($searchcap))>0 && strlen(trim($searchfld))==0){
			echo '<p style="text-decoration:underline" align="center">'.$searchcap.'<p>';
			if($searchcap=="specialsales"){
				$sql= "select p.* from product p inner join specialsales ss on p.productId = ss.productId order by p.productPrice asc;";
			}
			else{
			$sql= "select p.* from product p inner join productcategory pc on p.productCategoryId = pc.categoryId where pc.CategoryName='".$searchcap."' order by p.productPrice asc;";}
		}
		elseif(strlen(trim($searchcap))==0 && strlen(trim($searchfld))>0){
			$sql= "select * from product where productName like '%".$searchfld."%' order by productPrice asc;";}
		elseif(strlen(trim($searchcap))>0 && strlen(trim($searchfld))>0){
			echo '<p style="text-decoration:underline" align="center">'.$searchcap.'<p>';
			if($searchcap=="specialsales"){
				$sql= "select p.* from product p inner join specialsales ss on p.productId = ss.productId where p.productName like '%".$searchfld."%' order by p.productPrice asc;";}
			else{
				$sql= "select p.* from product p inner join productcategory pc on p.productCategoryId = pc.categoryId where pc.CategoryName='".$searchcap."' and p.productName like '%".$searchfld."%' order by p.productPrice asc;";
			}
		}
		else{$sql= "select * from product order by productPrice asc;";}
	}

    $con= mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
    if(!$con){die('Could not be able to connect to  mysql');}
    mysql_select_db('hwdb', $con);
    $res = mysql_query($sql);
    if($res){
	    while ($rows = mysql_fetch_assoc($res)){
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
	            	<input type='image' src='/dbcopela/productimages/".$products['productImage']."' alt='".$products['productName']."' width='240px' height='165px'/><br>
	            	<a href='mychoice.php?proid=", urlencode($products['productId']) ,"' style='color:maroon'>".$products['productName']."</a></td>
	            </form>";	            	
            if($counter==5){ $k=1;$counter=0;echo '</tr><tr>'; }
	    }
	}
	echo "</tr></table></span>";

	if($sql1!=""){
		//$con= mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
	    //if(!$con){die('Could not be able to connect to  mysql');}
	    //mysql_select_db('hwdb', $con);
		$res1 = mysql_query($sql1);	
		if(mysql_num_rows($res1)>0){
		    while ($rows1 = mysql_fetch_assoc($res1)){
		        $resultlist1[] = $rows1;
		    }
		    echo '<br><div align="center"><table><tr><td colspan="5"><b>Special Sales</b></td></tr><tr>';
		    $counter1 = 0; //$k1=0;
		    foreach ($resultlist1 as $products1) {
				$counter1++;
		        echo "<td align='center' ";
		        /*if($k1==0){ echo "style='display:none;'>"; } else{*/ echo ">"; //}
		        echo "
		        	<form method='GET' action='mychoice.php'>
		        	<input type='text' name='proid' id='proid' value='".$products1['productId']."' style='display:none;'/>
		        	<input type='image' src='/dbcopela/productimages/".$products1['productImage']."' alt='".$products1['productName']."' width='180px' height='100px'/><br>
		        	<a href='mychoice.php?proid=", urlencode($products1['productId']) ,"' style='color:maroon'>".$products1['productName']."</a></td></form>";

		        if($counter1==5){ /*$k=1;*/$counter1=0;echo '</tr><tr>'; }
		    }
		}
	}
?>
