<?php 
	include "../ajax/connection.php";
	include "../ajax/sessions.inc";

	if(isset($_SESSION['username'])){
		$temp = $_GET['te'];
		$result = mysql_query("SELECT * FROM reg_user WHERE username='$temp' and status = '1'");		
		$rows = mysql_fetch_array($result);
		
		echo "<table id='usersDialog' class='ui-widget ui-widget-content'>";
		echo "<thead>";
		echo "</thead>";
		echo "<tbody>";
		echo "<tr><td class='ui-widget-header '>Username</td><td>" . $rows['username'] . "</td></tr>";
		echo "<tr><td class='ui-widget-header '>Employee #</td><td>" . $rows['empno'] . "</td></tr>";
		echo "<tr><td class='ui-widget-header '>First Name</td><td>" . $rows['first'] . "</td></tr>";
		echo "<tr><td class='ui-widget-header '>Middle Name</td><td>" . $rows['middle'] . "</td></tr>";
		echo "<tr><td class='ui-widget-header '>Last Name</td><td>" . $rows['last'] . "</td></tr>";
		echo "<tr><td class='ui-widget-header '>Position</td><td>" . $rows['position'] . "</td></tr>";
		if ($_SESSION['type']=='admin') {
			echo "<tr><td class='ui-widget-header '>Actions</td><td><input type='hidden' name='deltAccts' id='deltAccts' value=" . $rows['username'] . " /> <input type='submit' value='Delete' name='delete' onclick='del4();' class='ui-state-default ui-corner-all' /></td></tr>";	
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
