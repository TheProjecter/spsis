<?php   
	include "../ajax/connection.php";
	include "../ajax/sessions.inc";
	
	if(isset($_SESSION['username'])){
		$temp = $_GET['mach'];
		$id = $_GET['te'];
		
		mysql_query("UPDATE machine SET name='$temp' WHERE id='$id'");

		echo "<h2>MACHINE was UPDATED</h2>";
		echo "<div id='dialogSmall'><a href='mainForAdmin.php'><input type='button' value='Back to List' class='ui-state-default ui-corner-all'></a><br /></div>";
	}
	else {
		echo "<script type = 'text/javascript'>
			alert('Please log in first.');
			</script>";
		echo "<script>document.location='logInReg.php'</script>";
	}
?>


