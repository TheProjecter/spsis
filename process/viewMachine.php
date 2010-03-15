<table>
	<thead>
	</thead>
	<tbody>		
	<?php 
		include "../ajax/connection.php";
		include "../ajax/sessions.inc";
		
		if(isset($_GET['mach']) && isset($_SESSION['type'])){
			$temp1 = $_GET['mach'];
			$result1 = mysql_query("SELECT * FROM machine where id='$temp1'");
			$rows1 = mysql_fetch_array($result1);
			$machName = mysql_query("SELECT name FROM machine where id='$temp1'");
			$result2 = mysql_query("SELECT * FROM item where machine='$machName'");
			
			echo "<tr><td class='ui-widget-header '>Name</td><td>" . $rows1['name'] . "</td></tr>";
			echo "<tr><td class='ui-widget-header '>Spare Part</td></tr><tr>";
			$i=0;
			echo "<td><ul>";
			while($rows2 = mysql_fetch_array($result2)){
				echo "<li>" . $rows2['matno'] . "</li>";
				$i++;
			}
			echo "</ul></td></tr>";
			if ($_SESSION['type']=='admin')
			{
				echo "<tr><td class='ui-widget-header '>Actions</td><td><input type='hidden' name='delt' id='deltMach' value=" . $rows1['id'] . " /> <input type='submit' value='delete' name='delete' onclick='del5();' class='ui-state-default ui-corner-all' /> <input type='button' value='edit' name='edit' onclick='edit1();' class='ui-state-default ui-corner-all' /></td></tr>";	
			}
			
		}
	?>
	</tbody>
</table>
