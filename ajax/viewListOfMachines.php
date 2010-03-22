<?php 
	include 'connection.php';
	include 'sessions.inc';
	
	if(!isset($_SESSION['username'])) {
		echo "<script type = 'text/javascript'>
				alert('Please log in first.');
				</script>";
		echo "<script>document.location='../logInReg.php'</script>";
	}
	else{
		$result2 = mysql_query("SELECT * FROM machine ORDER BY name ASC");
?>
<script type="text/javascript">
	$(function() {
		var i=0;
		while(i<9999){
		$("#radiom"+i).buttonset();
		i++;
		}
	});
	$(document).ready(function(){ 
		$("#usersHalf").tablesorter( {sortList: [[0,0], [1,0]]} ); 
	}); 
</script>
<style>
	#warningMach{
		display:none;
	}
</style>

<div id="dialog5" title="View Machine Spare Parts"></div>
<div id="del_dialog5" title="Confirm Delete"></div>
<div id="conf_del5" title="Delete Machine"></div>
<div id="edit_dialog3" title="Edit Machine Name"></div>
<div id="edit_true_dialog3" title="Edit Success"></div>
<div id="users-contain" class="ui-widget">

	<div id="warningMach" title="WARNING"><h3 align="center">Please choose a machine.</h3></div>
	<p><b>Instruction: </b>Click on the name of your chosen machine.</p>
	<br />
	<div id='center'><h2>List of Machines</h2></div>
	
	<table id="usersHalf" class="ui-widget ui-widget-content" align="center">
		<thead>
			<tr class="ui-widget-header ">
				<th>Machine Name</th>
				<th>View</th>
			</tr>
		</thead>
		<tbody>
		<div class="demo">
		
		<?php 
			$i=0;
			while($rows2 = mysql_fetch_array($result2)){
				echo "<tr>" ;
				echo "<td> <div id='radiom$i'><input type='radio' name='mach' id='myInputm$i' value='" . $rows2['id'] . "' /><label for='myInputm$i'>" . $rows2['name'] . "</label></div></td>";
				echo "<td> <input type='submit' class='ui-state-default ui-corner-all' onclick='open5();' value='view'/></td>";
				echo "</tr>";
				$i++;
			}
		?>
		</div>
		</tbody>
		</table>
		</div>
		<br />
<?php } ?>