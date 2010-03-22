<?php   
	include "../ajax/connection.php";
	include "../ajax/sessions.inc";
	
	if(isset($_SESSION['username'])){
		$temp = $_GET['mach'];
		$id = $_GET['te'];
		
		mysql_query("UPDATE machine SET name='$temp' WHERE id='$id'");

		echo "<h3>Machine update successful!</h3>";
	}
	else {
		echo "<script type = 'text/javascript'>
			alert('Please log in first.');
			</script>";
		echo "<script>document.location='../logInReg.php'</script>";
	}
?>


