<?php  
	include "../ajax/connection.php";
	include "../ajax/sessions.inc";

	if (!isset($_SESSION['username'])) {
		echo "<script type = 'text/javascript'>
			alert('Please log in first.');
			</script>";
		echo "<script>document.location='../logInReg.php'</script>";
	}
	else {
		$temp = $_GET['delt'];
		$result = mysql_query("SELECT * FROM reg_user where username='$temp'");
		$rows = mysql_fetch_array($result);

		echo "<br /><div id='deleteDialog'>Are you sure you want to DELETE <a id='highlight'>" . $rows['username'] . "</a>?";
		echo "<input type='hidden' id='dtrue' name='dtrue' value=" . $rows['username'] . ">"; 
		echo "<br />";
		echo "<br />";
		echo "<table id='usersDel'>";
			echo "<tr>";
				echo "<td><input type='submit' id='aff' class='ui-state-default ui-corner-all' value='YES' onclick='conf3();'/></td>";
				echo "<td><a href=''><input type='button' class='ui-state-default ui-corner-all' value='NO' /></a></td>";
			echo "</tr>";
		echo "</table>";
		echo "</div>";
	}
?>