<?php 
	include "../ajax/connection.php";
	include "../ajax/sessions.inc";

	if(isset($_SESSION['username'])){
		$temp = $_GET['te'];
		$result = mysql_query("SELECT * FROM item where matno='$temp' or desc1='$temp' or machine='$temp'");

		$rows = mysql_fetch_array($result);
		echo "<table id='usersDialog' class='ui-widget ui-widget-content'>";
		echo "<thead>";
		echo "</thead>";
		echo "<tbody>";
		echo "<tr><td class='ui-widget-header '>Material No.</td><td>" . $rows['matno'] . "</td></tr>";
		echo "<tr><td class='ui-widget-header '>Description</td><td>" . $rows['desc1'] . "</td></tr>";
		echo "<tr><td class='ui-widget-header '>Stock</td><td>" . $rows['stock'] . "</td></tr>";
		echo "<tr><td class='ui-widget-header '>Bin</td><td>" . $rows['bin'] . "</td></tr>";
		echo "<tr><td class='ui-widget-header '>Bun</td><td>" . $rows['bun'] . "</td></tr>";
		echo "<tr><td class='ui-widget-header '>Cost Center</td><td>" . $rows['cc'] . "</td></tr>";
		echo "<tr><td class='ui-widget-header '>Machine</td><td>" . $rows['machine'] . "</td></tr>";
		if ($_SESSION['type']=='admin') {
			echo "<tr><td class='ui-widget-header '>Actions</td><td><input type='hidden' name='delt' id='delt2' value=" . $rows['matno'] . " /><input type='submit' value='Delete' name='delete' onclick='del2();' class='ui-state-default ui-corner-all' /><input type='button' value='Edit' name='edit' onclick='edit2();' class='ui-state-default ui-corner-all' /></td></tr>";	
		}
		echo "</tbody>";
		echo "</table>";
	}
	else {
		echo "<script type = 'text/javascript'>
			alert('Please log in first.');
			</script>";
		echo "<script>document.location='../logInReg.php'</script>";
	}
?>