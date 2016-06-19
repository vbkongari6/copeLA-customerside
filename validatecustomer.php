<?php
	session_start();
	if(!empty($_SESSION['email'])){		
		if(isset($_SESSION['timeout']) && (time()-$_SESSION['timeout']) > 300) {
			session_destroy();
			require "customerlogin.php";
			exit;
		}		
		$_SESSION['timeout'] = time();	
	}	
?>