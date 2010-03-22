<?php  
	if(isset($_GET['delt'])){
		$temp = $_GET['delt'];
		$result = mysql_query("SELECT * FROM reg_user where username='$temp'");
		$rows = mysql_fetch_array($result);
		
		echo "<br /><div id='deleteDialog'>Are you sure you want to DELETE <a id='highlight'>" . $rows['username'] . "</a>?";
		echo "<input type='hidden' id='dtrue' name='dtrue' value=" . $rows['username'] . ">"; 
	}
?>