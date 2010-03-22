<?php 
	include "connection.php";
	include "sessions.inc";
	
	if(isset($_SESSION['username'])){
		$temp = $_GET['te'];
		$result = mysql_query("SELECT * FROM machine where id='$temp'");
		$rows = mysql_fetch_array($result);
		$query = mysql_query("SELECT * FROM machine");
		$i = 0;
		while($row = mysql_fetch_array($query,MYSQL_ASSOC)){
				echo "<input type = 'hidden' name ='" . $row['name'] . "' id = 'temp".$i."' value = '" . $row['name'] . "'>";
			$i++;
		}

		echo "<table id='usersDialog' class='ui-widget ui-widget-content'>";
		echo "<thead>";
		echo "</thead>";
		echo "<tbody>";
		echo "<tr><td class='ui-widget-header '>Name</td>
			<td><input type='text' maxlength='30' name='machName' id='machName_edit1' class='letter number dash space required' value='" . $rows['name'] . "'>
			<input type='hidden' id='orig' value='" . $rows['name'] . "'>";
		echo "</td></tr>";
		echo "</tbody>";
		echo "</table>";
		echo "<div id='msg' align='center'></div>";
		echo "<input type='hidden' name='mach_edit' id='mach_edit' value=" . $rows['id'] . ">";
	}
	else {
		echo "<script type = 'text/javascript'>
			alert('Please log in first.');
			</script>";
		echo "<script>document.location='logInReg.php'</script>";
	}
?>