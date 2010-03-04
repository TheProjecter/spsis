<?php
	include '../ajax/connection.php';
	include '../ajax/sessions.inc';
	
	$query = "INSERT INTO item VALUES(NULL, '$_GET[mat_no]', '$_GET[desc1]', '$_GET[stock]', '$_GET[bin]', '$_GET[bun]', '$_GET[cc]', '$_GET[itemType]', '$_GET[machine]')";
	$result = mysql_query($query);
	
	if($_SESSION['type']=='admin'){
		echo "<script>document.location='../mainForAdmin.php'</script>";
	}
	else{
		echo "<script>document.location='../mainForRegUser.php'</script>";
	}
?>