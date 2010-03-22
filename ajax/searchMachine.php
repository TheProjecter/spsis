<?php
	include "connection.php";
	include "sessions.inc";
	
	if(!isset($_SESSION['username'])) {
		echo "<script type = 'text/javascript'>
				alert('Please log in first.');
				</script>";
		echo "<script>document.location='../logInReg.php'</script>";
	}
	else {
?>						
		<form name='f1' action='ajax/searchMachine.php' method='POST'>
		<table id="search">
			<tr>
				<td for="mach1"><h4>Search for Machine</h4></td>
				<td><input id="mach1" type="text" name="tet" /></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" value="Search" onclick='mach_result();return false'/></td>
			</tr>
		</table>			
		</form>
		<div id='users-contain' class='ui-widget'>
			<div id="searchMachResults"></div>
			<div id="dialog6" title="View Machine Spare Parts"></div>
			<div id="del_dialog6" title="Confirm Delete"></div>
			<div id="conf_del6" title="Delete Machine"></div>
			<div id="edit_dialog4" title="Edit Machine Name"></div>
			<div id="edit_true_dialog3" title="Edit Success"></div>
			
				<script type="text/javascript">
				function mach_result(){
					var search = $('#mach1').val();
					search = search.replace(/ /g, "%20");
					$('#searchMachResults').load('process/resultSearchMach.php?tet='+search);
				}
				</script>
		</div>
<?php } ?>