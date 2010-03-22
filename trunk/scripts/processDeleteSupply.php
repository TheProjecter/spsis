<?php   
	if(isset($_GET['delt'])){
		$link = mysql_connect('localhost', 'mentak', 'mentak');		
		mysql_select_db('spsis', $link);
		$temp = $_GET['delt'];
		$result = mysql_query("SELECT * FROM item where matno='$temp'");
		
		$rows = mysql_fetch_array($result);
		echo "<br /><div id='deleteDialog'>Are you sure you want to DELETE <a id='highlight'>" . $rows['matno'] . "</a>?";
		echo "<input type='hidden' id='dtrue' name='dtrue' value=" . $rows['desc1'] . ">";
	}
?>