<?php 
	if(isset($_GET['dtrue'])){
		$link = mysql_connect('localhost', 'root', '');		
		mysql_select_db('spsis', $link);
		$temp = $_GET['dtrue'];
		$result = mysql_query("SELECT * FROM item where matno='$temp' or desc1='$temp'");
		
		$rows = mysql_fetch_array($result);

		if($rows['stock']!=0){
			echo "<h2>Spare Part '" . $rows['desc1'] . "' is a Non Empty Stock! </h2>";
			echo "<a href='../mainForAdmin.php'><input type='button' value='BACK to LIST'></a>";
		}
		else{
			echo "<h2>Spare Part '" . $rows['desc1'] . "' has been successfully deleted! </h2>";
			mysql_query("DELETE FROM item where mat_no='{$rows['mat_no']}'");
			echo "<a href='mainForAdmin.php'><input type='button' class='ui-state-default ui-corner-all' value='BACK to LIST'></a>";
		}
		//echo "<script>document.location='integrate_list_to_dialog.php'</script>";
	}
	else {
		echo "<script type = 'text/javascript'>
				alert('Please log in first.');
				</script>";
		echo "<script>document.location='../logInReg.php'</script>";
	}
?>
		
	