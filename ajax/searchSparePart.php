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
		<label for="spare1">Search</label>
		<div id="myAutoComplete">
			<input id="spare1" type="text" name="tet" />
			<div id="myContainer"></div>
		</div>
			<input type="submit" value="search" onclick='s_result();return false'/>
		</form>
		<div id='users-contain' class='ui-widget'>
		<div id="searchresults"></div>
		<div id="dialog2" title="View Spare Part"></div>
		<div id="del_dialog2" title="Confirm Delete"></div>
		<div id="conf_del2" title="Delete Spare Part"></div>
		
				<script type="text/javascript">
				function s_result(){
					$('#searchresults').load('process/resultSearchItem.php?tet='+$('#spare1').val());
				}
				</script>