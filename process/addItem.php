<?php
	include '../ajax/connection.php';
	include '../ajax/sessions.inc';
	
	if (isset($_SESSION['username'])) {
		$query = "INSERT INTO item VALUES(NULL, '$_GET[matno]', '$_GET[desc1]', '$_GET[stock]', '$_GET[bin]', '$_GET[bun]', '$_GET[cc]', '$_GET[itemType]', '$_GET[machine]')";
		$result = mysql_query($query);
		
		if($result){
			echo "<h3>Item <a id='highlight'>" . $_GET['matno'] . "</a> has been successfully added!</h3>";
		}
	}
	else {
		echo "<script type = 'text/javascript'>
				alert('Please log in first.');
				</script>";
		echo "<script>document.location='../logInReg.php'</script>";
	}	
?>