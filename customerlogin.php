<?php
	session_start();
	require "validatecustomer.php";
	$destroy = strlen($_GET['destroy']);
	if($destroy==1){
		session_destroy();
	}
	    require "home1.php";
	    echo '
			<div id="customerlogininfo" align="center">
				<fieldset id="fieldsetautowidth">
					<legend>Customer Login</legend>
					<form method="POST" action="customerloginverify.php" onsubmit="return validateCustomerLogin()">
						<table>
						<tr>
							<td>Customer Email :</td>
							<td><input type="email" name="custloginemail" id="custloginemail"/></td>
						</tr>
						<tr><td>Password :</td>
							<td><input type="password" name="custloginpassword" id="custloginpassword"/></td></tr>
						<tr><td></td><td><input type="submit" name="submitcustlogin" value="Login"/></td></tr>
						</table>
					</form>			
				</fieldset>
				<a href="customerregistration.php">New Customer? Click here to Register</a>
				<p id="error"></p>
			</div>
		</body>
	</html>';
?>