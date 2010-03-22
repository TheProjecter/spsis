<?php 
	include "../ajax/connection.php";
	include "../ajax/sessions.inc";

	if(isset($_GET['dtrue'])){
		$temp = $_GET['dtrue'];
		$result = mysql_query("SELECT * FROM item where matno='$temp'");
		$rows = mysql_fetch_array($result);

		if($rows['stock']!=0){
			echo "<h3>Cannot delete item <a id='highlight'>" . $rows['matno'] . "</a>.</h3><h4>It is a non-empty stock. </h4>";
		}
		else{
			$query = mysql_query("DELETE FROM item where matno='{$rows['matno']}'");
			if ($query) {
				echo "<h3>Item <a id='highlight'>" . $rows['matno'] . "</a> has been successfully deleted! </h3>";
			}
		}
	}
?>
		
	