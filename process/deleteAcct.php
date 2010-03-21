<?php
	include '../ajax/connection.php';
	include '../ajax/sessions.inc';
	
	if (isset($_SESSION['username'])) {
		$username = $_GET['dtrue'];
		$query = "DELETE FROM reg_user where username = '$username'";
		$result = mysql_query($query);
		
		echo "<h3>Account <a id='highlight'>" . $username . "</a> has been successfully deleted! </h3>";
	}
	else {
		echo "<script type = 'text/javascript'>
				alert('Please log in first.');
				</script>";
		echo "<script>document.location='../logInReg.php'</script>";
	}
?>