<?php 
	include 'connection.php';
	include 'sessions.inc';
	
	if(!isset($_SESSION['username'])) {
		echo "<script type = 'text/javascript'>
				alert('Please log in first.');
				</script>";
		echo "<script>document.location='logInReg.php'</script>";
	}
	else{
		$result2 = mysql_query("SELECT * FROM item");
	}
?>
<script type="text/javascript">
	$(function() {
		var i=0;
		while(i<9999){
		$("#radio"+i).buttonset();
		i++;
		}
	});

	$(document).ready(function(){ 
		$("#users").tablesorter( {sortList: [[0,0], [1,0]]} ); 
	}); 
</script>

<style>
	#warning{
		display:none;
	}
</style>

<div id="dialog" title="View Item"></div>
<div id="del_dialog" title="Confirm Delete"></div>
<div id="conf_del" title="Delete Item"></div>
<div id="users-contain" class="ui-widget">
	<div id="edit_dialog" title="Edit Item"></div>
	<div id="edit_true_dialog" title="Edit Success"></div>

	<div id="edit_dialog2" title="Edit Item"></div>
	<div id="edit_true_dialog2" title="Edit Success"></div>

	<div id="deposit_dialog" title="Deposit Item"></div>
	<div id="deposit_true_dialog" title="Deposit Success"></div>

	<div id="deposit_dialog2" title="Deposit Item"></div>
	<div id="deposit_true_dialog2" title="Deposit Success"></div>

	<div id="withdraw_dialog" title="Withdraw Item"></div>
	<div id="withdraw_true_dialog" title="Withdraw Success"></div>

	<div id="withdraw_dialog2" title="Withdraw Item"></div>
	<div id="withdraw_true_dialog2" title="Withdraw Success"></div>

	<div id="warning" title="WARNING"><h3 align="center">Please choose an item.</h3></div>

	<p><b>Instruction:</b> Click on the material # of your chosen item.</p>
	<br />
	<div id="center"><h2>List of Spare Parts and Supplies</h2></div>
	<table id="users" class="ui-widget ui-widget-content" align="center">
		<thead>
			<tr class="ui-widget-header ">
				<th>Material No.</th>
				<th>Decription</th>
				<th>Stock</th>
				<th>Machine</th>
				<th>View</th>
				<th>Deposit</th>
				<th>Withdraw</th>
			</tr>
		</thead>
		<tbody>
		<div class="demo">
			<?php 
				$i=0;
				while($rows2 = mysql_fetch_array($result2)){
					echo "<tr>" ;
					echo "<td> <div id='radio$i'><input type='radio' name='te' id='myInput$i' value='" . $rows2['matno'] . "' /><label for='myInput$i'>" . $rows2['matno'] . "</label></div></td>";
					echo "<td>" . $rows2['desc1'] . "</td>";
					echo "<td>" . $rows2['stock'] . "</td>";
					if ($rows2['type']=='1') {
						$id = $rows2['machine'];
						$query = mysql_query("SELECT * FROM machine WHERE id='$id'");
						$name = mysql_fetch_array($query);
						echo "<td>" . $name['name'] . "</td>";
					}
					else echo "<td>0</td>";
					echo "<td> <input type='submit' class='ui-state-default ui-corner-all' onclick='open1();' value='view'/></td>";
					echo "<td> <input type='button' class='ui-state-default ui-corner-all' onclick='deposit1();' value='deposit'/></td>";
					echo "<td> <input type='button' class='ui-state-default ui-corner-all' onclick='withdraw1();' value='withdraw'/> </td>";
					echo "</tr>" ;
					$i++;
				}
			?>
		</tbody>
	</table>
	<br />
</div>