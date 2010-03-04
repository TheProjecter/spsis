<?php
	include "connection.php";
	include "sessions.inc";
	
	if(isset($_SESSION['username'])){
		$query = "SELECT name FROM machine ORDER BY name ASC";
		$result = mysql_query($query);
		$num = mysql_num_rows($result);
		if ($num > 0) {
			echo "<p><span id='bitPageTitle'>List of Machines</span></p><br />";
			echo "<table id='insideFrame'><tr><td>Name</td></tr>";
			
			while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
				echo "<tr>";
				echo "<td> <a href = 'ajax/viewMachine.php?name={$row['name']}'>{$row['name']}</a> </td>";
				echo "</tr>";
			}
			echo "</table>";
		}
		else{
			echo "<script type = 'text/javascript'>
				alert('NO MACHINES YET!');
				</script>";
			echo "<a href = 'mainForAdmin.php'>BACK </a>";
		}
	}
	else{
		echo "<script type = 'text/javascript'>
				alert('Please log in first.');
				</script>";
		echo "<script>document.location='../logInReg.php'</script>";
	}
?>