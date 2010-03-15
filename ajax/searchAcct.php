<?php
	include "connection.php";
	include "sessions.inc";
	
	if(!isset($_SESSION['username'])) {
		echo "<script type = 'text/javascript'>
				alert('Please log in first.');
				</script>";
		echo "<script>document.location='logInReg.php'</script>";
	}
?>						
		<form name='f1' action='ajax/searchAcct.php' method='POST'>
		<label for="acct1">Search</label>
		<div id="myAutoComplete">
			<input id="acct1" type="text" name="tet" />
			<div id="myContainer"></div>
		</div>
			<input type="submit" value="search" onclick='a_result();return false'/>
		</form>
		<div id='users-contain' class='ui-widget'>
		<div id="searchResultsForAcct"></div>
		<div id="dialog4" title="View Account"></div>
		<div id="del_dialog4" title="Confirm Delete"></div>
		<div id="conf_del4" title="Delete Account"></div>
		
				<script type="text/javascript">
				function a_result(){
					$('#searchResultsForAcct').load('process/resultSearchAcct.php?tet='+$('#acct1').val());
				}
				</script>
		
		<!--search corner-->
		<script type="text/javascript" src="assets/js/query.php"></script>
			<script type="text/javascript">
				YAHOO.example.BasicLocal = function() {
					
					var oDS = new YAHOO.util.LocalDataSource(YAHOO.example.Data.arrayMat);
					// Optional to define fields for single-dimensional array
					oDS.responseSchema = {fields : ["state"]};
					
					// Instantiate the AutoComplete
					var oAC = new YAHOO.widget.AutoComplete("acct1", "myContainer", oDS);
					oAC.prehighlightClassName = "yui-ac-prehighlight";
					oAC.useShadow = true;
					
					return {
						oDS: oDS,
						oAC: oAC
					};
				}();
			</script>
		<!--end-->