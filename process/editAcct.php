<?php
	include '../ajax/connection.php';
	include '../ajax/sessions.inc';
	$ref = $_SERVER['HTTP_REFERER'];
	if(isset($_SESSION['username'])){
		$type = $_SESSION['type'];
		$query = "UPDATE $type SET first = '$_GET[first]', middle= '$_GET[middle]', last= '$_GET[last]', position= '$_GET[position]' WHERE username = '$_SESSION[username]'";
		$result = mysql_query($query);
		if($result)
			echo "<script type = 'text/javascript'>
				alert('Successfully Edited Your Account!');
				</script>";
		else
			echo "<script type = 'text/javascript'>
				alert('Failed!');
				</script>";

		echo "<script>document.location='".$ref."'</script>";
		
	}
	else{
		echo "<script type = 'text/javascript'>
				alert('Log In First!');
				</script>";
		echo "<script>document.location='".$ref."'</script>";
	}
?>