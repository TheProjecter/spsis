<?php 
	include "../ajax/connection.php";
	include "../ajax/sessions.inc";
	
	if(isset($_SESSION['username'])){
		if ($_SESSION['type']=='admin')
			$result = mysql_query("UPDATE admin SET password='$_GET[pass1]', empno='$_GET[emp]', first='$_GET[f]', middle='$_GET[m]', last='$_GET[l]', position='$_GET[pos]' WHERE username='$_SESSION[username]'");
		else 
			$result = mysql_query("UPDATE reg_user SET password='$_GET[pass1]', empno='$_GET[emp]', first='$_GET[f]', middle='$_GET[m]', last='$_GET[l]', position='$_GET[pos]' WHERE username='$_SESSION[username]'");
			
		echo "<script type = 'text/javascript'>
				alert('Account successfully edited!');
				</script>";
		if ($_SESSION['type']=='admin')
			echo "<script>document.location='../mainForAdmin.php'</script>";
		else echo "<script>document.location='../mainForRegUser.php'</script>";
	}
	else {
		echo "<script type = 'text/javascript'>
				alert('Please log in first.');
				</script>";
		echo "<script>document.location='logInReg.php'</script>";
	}
?>
