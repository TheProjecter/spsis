<?php 
	include "../ajax/connection.php";
	include "../ajax/sessions.inc";
	
	if(isset($_GET['delt'])){
		$temp = $_GET['delt'];
		$result = mysql_query("SELECT * FROM item where matno='$temp'");
		
		$rows = mysql_fetch_array($result);
		echo "<br /><div id='deleteDialog'>Are you sure you want to DELETE <a id='highlight'>" . $rows['matno'] . "</a>?";
		echo "<input type='hidden' id='dtrue' name='dtrue' value=" . $rows['matno'] . ">";
	}
?>