<?php
	include '../ajax/connection.php';
	
	if (isset($_GET['dtrue'])) {
		$username = $_GET['dtrue'];
		$query = "DELETE FROM reg_user where username = '$username'";
		$result = mysql_query($query);
		
		echo "<h2>Account '" . $username . "' has been successfully deleted! </h2>";
	}
	else {
		echo "<script type = 'text/javascript'>
				alert('Please log in first.');
				</script>";
		echo "<script>document.location='../logInReg.php'</script>";
	}
?>