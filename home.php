<?php
    session_start();
    require "validatecustomer.php";
    require "home1.php";
    require "home3.html";
    $sql= "select ss.*, p.* from specialsales ss inner join product p on ss.productId=p.productId;";
    $con= mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
    if(!$con){die('Could not be able to connect to  mysql');}
    mysql_select_db('hwdb', $con);
    $res = mysql_query($sql);
    while ($rows = mysql_fetch_assoc($res)){
            $resultlist[] = $rows;
    }  
    echo '<br><div align="center"><table><tr><td colspan="5"><b>Special Sales</b></td>';
    $counter = 0; $k=0;
    foreach ($resultlist as $products) {
		$counter++;
        echo "<td align='center' ";
        if($k==0){ echo "style='display:none;'>"; } else{ echo ">"; }
        echo "
        	<form method='GET' action='mychoice.php'>
        	<input type='text' name='proid' id='proid' value='".$products['productId']."' style='display:none;'/>
        	<input type='image' src='/dbcopela/productimages/".$products['productImage']."' alt='".$products['productName']."' width='240px' height='165px'/><br>
            <a href='mychoice.php?proid=", urlencode($products['productId']) ,"' style='color:maroon'>".$products['productName']."</a></td></form>";
        if($counter==5){ $k=1; $counter=0;echo '</tr><tr>'; }
    }    
?>
