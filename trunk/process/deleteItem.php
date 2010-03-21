<?php 
	include "../ajax/connection.php";
	include "../ajax/sessions.inc";

	if(isset($_GET['dtrue'])){
		$temp = $_GET['dtrue'];
		$result = mysql_query("SELECT * FROM item where matno='$temp'");
		$rows = mysql_fetch_array($result);

		if($rows['stock']!=0){
			echo "<h3>Cannot delete item <a id='highlight'>" . $rows['desc1'] . "</a>.</h3><h4>It is a non-empty stock. </h4><br />";
			echo "<div id='dialogSmall'><a href='mainForAdmin.php'><input type='button' class='ui-state-default ui-corner-all' value='Back to List'></a></div>";
		}
		else{
			echo "<h3>Item <a id='highlight'>" . $rows['desc1'] . "</a> has been successfully deleted! </h3><br />";
			mysql_query("DELETE FROM item where matno='{$rows['matno']}'");
			echo "<div id='dialogSmall'><a href='mainForAdmin.php'><input type='button' class='ui-state-default ui-corner-all' value='Back to List'></a></div>";
		}
	}
?>
		
	