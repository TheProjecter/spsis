<?php
	include '../ajax/connection.php';
	include '../ajax/sessions.inc';
	
	$username = $_POST['username'];
	$query = "DELETE FROM reg_user where username = '$username'";
	$result = mysql_query($query);
	
	echo "<script type = 'text/javascript'>
		alert('Account Successfully Deleted!');
		</script>";
	
	if ($_SESSION['type']=='admin')
		echo "<script>document.location='../mainForAdmin.php'</script>";
	else echo "<script>document.location='../mainForRegUser.php'</script>";
	mysql_close($con);
?>