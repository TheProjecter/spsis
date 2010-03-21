<?php
	include '../ajax/connection.php';
	include '../ajax/sessions.inc';
	
	if (isset($_SESSION['username'])) {
		$machId = $_GET['dtrue'];
		$query = mysql_query("SELECT * FROM machine where id='$machId'");
		$name = mysql_fetch_array($query);		
		$temp = $name['name'];
		$result = mysql_query("DELETE FROM machine WHERE id='$machId'");
		$result2 = mysql_query("DELETE FROM item WHERE machine='$machId'");
		echo "<h3>Machine <a id='highlight'>" . $temp . "</a> has been successfully deleted! </h3>";
	}
	else {
		echo "<script type = 'text/javascript'>
				alert('Please log in first.');
				</script>";
		echo "<script>document.location='../logInReg.php'</script>";
	}
?>