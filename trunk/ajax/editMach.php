<?php 
	include "connection.php";
	include "sessions.inc";
	
	if(isset($_SESSION['username'])){
		$temp = $_GET['te'];
		$result = mysql_query("SELECT * FROM machine where id='$temp'");

		$rows = mysql_fetch_array($result);
		echo "<table id='usersDialog' class='ui-widget ui-widget-content'>";
		echo "<thead>";
		echo "</thead>";
		echo "<tbody>";
		echo "<tr><td class='ui-widget-header '>Name</td>
			<td><input type='text' maxlength='30' name='machName' id='machName_edit1' value='" . $rows['name'] . "' class='letter number dash space required'></td></tr>";
		echo "</tbody>";
		echo "</table>";
		echo "<input type='hidden' name='mach_edit' id='mach_edit' value=" . $rows['id'] . ">";
		echo "<div id='dialogSmaller'><input type='submit' value='Save' name='edit' onclick='processEditMachine();' class='ui-state-default ui-corner-all' ></div>";
	}
	else {
		echo "<script type = 'text/javascript'>
			alert('Please log in first.');
			</script>";
		echo "<script>document.location='logInReg.php'</script>";
	}
?>