<?php
	include "../ajax/connection.php";
	include "../ajax/sessions.inc";

	if(isset($_SESSION['username'])){
		$temp1 = $_GET['mach'];
		$result1 = mysql_query("SELECT * FROM machine where id='$temp1'");
		$rows1 = mysql_fetch_array($result1);
		$machName = $rows1['name'];
		$result2 = mysql_query("SELECT * FROM item where machine='$temp1' and type='1'");
		$n = mysql_num_rows($result2);
		
		echo "<table id='usersDialog' class='ui-widget ui-widget-content'>";
		echo "<thead>";
		echo "</thead>";
		echo "<tbody>";
		echo "<tr><td class='ui-widget-header '>Name</td><td>" . $rows1['name'] . "</td></tr>";
		echo "<tr rowspan=" . $n . "><td class='ui-widget-header '>Spare Part</td>";
		$i=0;

		while($rows2 = mysql_fetch_array($result2)){
			if ($i>0) echo "<tr><td></td><td>" . $rows2['matno'] . "</td></tr>";
			else echo "<td>" . $rows2['matno'] . "</td>";
			$i++;
		}
		
		if ($_SESSION['type']=='admin')
		{
			echo "<tr><td class='ui-widget-header '>Actions</td><td><input type='hidden' name='deltMachs' id='deltMachs' value=" . $rows1['id'] . " /> <input type='submit' value='Delete' name='delete' onclick='del6();' class='ui-state-default ui-corner-all' /> <input type='button' value='Edit' name='edit' onclick='edit4();' class='ui-state-default ui-corner-all' /></td></tr>";	
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