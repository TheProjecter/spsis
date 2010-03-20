<?php 
	include "../ajax/connection.php";
	include "../ajax/sessions.inc";

	if(isset($_GET['dtrue'])){
		$temp = $_GET['dtrue'];
		$result = mysql_query("SELECT * FROM item where matno='$temp'");
		
		$rows = mysql_fetch_array($result);

		if($rows['stock']!=0){
			echo "<h3>Cannot delete item '" . $rows['desc1'] . "'.</h3><h4>It is a Non Empty Stock. </h4>";
			echo "<a href='mainForAdmin.php'><input type='button' value='BACK to LIST'></a>";
		}
		else{
			echo "<h2>Item '" . $rows['desc1'] . "' has been successfully deleted! </h2>";
			mysql_query("DELETE FROM item where matno='{$rows['matno']}'");
			echo "<a href='mainForAdmin.php'><input type='button' class='ui-state-default ui-corner-all' value='BACK to LIST'></a>";
		}
	}
?>
		
	