<?php
	include '../ajax/connection.php';
	
	if (isset($_GET['dtrue'])) {
		$machId = $_GET['dtrue'];
		
		$temp = mysql_query("SELECT * FROM machine where id='$machId'");
		$name = $temp['name'];
		echo "<script>alert(".$name.");</script>";
		//$result2 = mysql_query("DELETE FROM item WHERE machine='$name'");
		//$result = mysql_query("DELETE FROM machine WHERE id='$machId'");
		
		//echo "<h2>Machine '" . $name . "' has been successfully deleted! </h2>";
	}
	//else {
		//echo "<script type = 'text/javascript'>
				//alert('Please log in first.');
				//</script>";
		//echo "<script>document.location='../logInReg.php'</script>";
	//}
?>