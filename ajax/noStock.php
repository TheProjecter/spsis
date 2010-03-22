<?php
	include "../ajax/connection.php";
	include "../ajax/sessions.inc";
	
	if(isset($_SESSION['username'])){
		echo "<h3>Can not withdraw on item <a id='highlight'>" . $_GET['te'] . "</a>.</h3><h4>It has zero stock.</h4>";
	}
	else{
		echo "<script type = 'text/javascript'>
			alert('Please log in first.');
			</script>";
		echo "<script>document.location='../logInReg.php'</script>";
	}
?>


