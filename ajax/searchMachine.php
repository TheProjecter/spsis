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
		<form name='f1' action='ajax/searchMachine.php' method='POST'>
		<label for="mach1">Search</label>
		<div id="myAutoComplete">
			<input id="mach1" type="text" name="tet" />
			<div id="myContainer"></div>
		</div>
			<input type="submit" value="search" onclick='mach_result();return false'/>
		</form>
		<div id='users-contain' class='ui-widget'>
		<div id="searchresults"></div>
		<div id="dialog5" title="View Machine"></div>
		
				<script type="text/javascript">
				function mach_result(){
					$('#searchresults').load('process/resultSearchMach.php?tet='+$('#mach1').val());
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
					var oAC = new YAHOO.widget.AutoComplete("mach1", "myContainer", oDS);
					oAC.prehighlightClassName = "yui-ac-prehighlight";
					oAC.useShadow = true;
					
					return {
						oDS: oDS,
						oAC: oAC
					};
				}();
			</script>
		<!--end-->