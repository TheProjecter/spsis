<?php
	include "connection.php";
	include "sessions.inc";
	
	if(!isset($_SESSION['username'])) {
		echo "<script type = 'text/javascript'>
				alert('Please log in first.');
				</script>";
		echo "<script>document.location='../logInReg.php'</script>";
	}
?>						
		<form name='f1' action='ajax/searchSparePart.php' method='POST'>
		<table id="search">
			<tr>
				<td for="spare1"><h4>Search for Spare Part</h4></td>
				<td><input id="spare1" type="text" name="tet" /></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" value="Search" onclick='s_result();return false'/></td>
			</tr>
		</table>	
		</form>
		<div id='users-contain' class='ui-widget'>
		<div id="searchresults"></div>
		<div id="dialog2" title="View Spare Part"></div>
		<div id="del_dialog2" title="Confirm Delete"></div>
		<div id="conf_del2" title="Delete Spare Part"></div>
		
				<script type="text/javascript">
				function s_result(){
					var search = $('#spare1').val();
					search = search.replace(/ /g, "%20");
					$('#searchresults').load('process/resultSearchItem.php?tet='+search);
				}
				</script>