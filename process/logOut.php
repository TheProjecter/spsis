<?php
	include '../ajax/connection.php';
	include '../ajax/sessions.inc';
	session_unset();
	session_destroy();
	
	echo "<script>document.location='logInReg.php'</script>";
?>