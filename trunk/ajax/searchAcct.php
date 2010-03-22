<?php
	include "connection.php";
	include "sessions.inc";
	
	if(!isset($_SESSION['username'])) {
		echo "<script type = 'text/javascript'>
				alert('Please log in first.');
				</script>";
		echo "<script>document.location='logInReg.php'</script>";
	}
	else {
?>						
<form name='f1' action='ajax/searchAcct.php' method='POST'>

<table id="search">
	<tr>
		<td for="acct1"><h4>Search for Account</h4></td>
		<td><input id="acct1" type="text" name="tet" /></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" value="Search" onclick='a_result();return false'/></td>
	</tr>
</table>
</form>
<div id='users-contain' class='ui-widget'>
<div id="searchResultsForAcct"></div>
<div id="dialog4" title="View Account"></div>
<div id="del_dialog4" title="Confirm Delete"></div>
<div id="conf_del4" title="Delete Account"></div>

		<script type="text/javascript">
		function a_result(){
			var search = $('#acct1').val();
			search = search.replace(/ /g, "%20");
			$('#searchResultsForAcct').load('process/resultSearchAcct.php?tet='+search);
		}
		</script>
<?php } ?>