<?php
	include '../ajax/connection.php';
	include '../ajax/sessions.inc';
	
	if (isset($_SESSION['username'])) {
		$temp = $_GET['mach'];
		$result = mysql_query("INSERT INTO machine VALUES(NULL, '$temp')");
		
		if($result){
			echo "<h3>Machine <a id='highlight'>" . $temp . "</a> has been successfully added!</h3>";
		}
	}
	else {
		echo "<script type = 'text/javascript'>
				alert('Please log in first.');
				</script>";
		echo "<script>document.location='../logInReg.php'</script>";
	}	
?>