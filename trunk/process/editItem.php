<?php
	include '../ajax/connection.php';
	include '../ajax/sessions.inc';
	
	$query = "UPDATE item SET mat_no = '$_GET[mat_no]', desc1 = '$_GET[desc1]', stock = '$_GET[stock]', bin = '$_GET[bin]', bun = '$_GET[bun]', cc = '$_GET[cc]' WHERE mat_no = '$_GET[mat_no]' ";
	
	$result = mysql_query($query);
	
	if ($result) {
		echo "<script type = 'text/javascript'>
				alert('Successfully Edited!');
				</script>";
		echo "<script>document.location='../mainForAdmin.php'</script>";
	}
	else {
		echo "<script type = 'text/javascript'>
				alert('Failed!');
				</script>";
		echo "<script>document.location='../mainForAdmin.php'</script>";
	}
?>