<div class="del_dialog" title="View Item"></div>
<table id="users" class="ui-widget ui-widget-content">
	<thead>
	</thead>
	<tbody>		
	<?php 
		include "../ajax/connection.php";
		if(isset($_GET['te'])){
			$temp = $_GET['te'];
			$result = mysql_query("SELECT * FROM item where matno='$temp' or desc1='$temp' or machine='$temp'");

			$rows = mysql_fetch_array($result);

			echo "<tr><td class='ui-widget-header '>Material No.</td><td>" . $rows['matno'] . "</td></tr>";
			echo "<tr><td class='ui-widget-header '>Description</td><td>" . $rows['desc1'] . "</td></tr>";
			echo "<tr><td class='ui-widget-header '>Stock</td><td>" . $rows['stock'] . "</td></tr>";
			echo "<tr><td class='ui-widget-header '>Bin</td><td>" . $rows['bin'] . "</td></tr>";
			echo "<tr><td class='ui-widget-header '>Bun</td><td>" . $rows['bun'] . "</td></tr>";
			echo "<tr><td class='ui-widget-header '>Cost Center</td><td>" . $rows['cc'] . "</td></tr>";
			echo "<tr><td class='ui-widget-header '>Machine</td><td>" . $rows['machine'] . "</td></tr>";
			echo "<tr><td class='ui-widget-header '>Actions</td><td><input type='hidden' name='delt' id='delt' value=" . $rows['matno'] . " /> <input type='submit' value='delete' name='delete' onclick='del1();' class='ui-state-default ui-corner-all' /> <input type='button' value='edit' name='edit' onclick='edit1();' class='ui-state-default ui-corner-all' /></td></tr>";			
		}
	?>
	</tbody>
</table>
