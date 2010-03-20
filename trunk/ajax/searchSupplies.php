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
<form name='f1' action='ajax/searchSupplies.php' method='POST'>
<label for="supply1">Search</label>
<div id="myAutoComplete">
	<input id="supply1" type="text" name="tet" />
	<div id="myContainer"></div>
</div>
	<input type="submit" value="search" onclick='sup_result();return false'/>
</form>

<div id='users-contain' class='ui-widget'>
	<div id="searchSupplyResults"></div>
	<div id="dialog7" title="View Supply"></div>
	<div id="del_dialog7" title="Confirm Delete"></div>
	<div id="conf_del7" title="Delete Supply"></div>
	<div id="deposit_dialog3" title="Deposit Item"></div>
	<div id="deposit_true_dialog3" title="Deposit Success"></div>
	<div id="withdraw_dialog3" title="Withdraw Item"></div>
	<div id="withdraw_true_dialog3" title="Withdraw Success"></div>
	
			<script type="text/javascript">
			function sup_result(){
				$('#searchSupplyResults').load('process/resultSearchSupply.php?tet='+$('#supply1').val());
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
				var oAC = new YAHOO.widget.AutoComplete("spare1", "myContainer", oDS);
				oAC.prehighlightClassName = "yui-ac-prehighlight";
				oAC.useShadow = true;
				
				return {
					oDS: oDS,
					oAC: oAC
				};
			}();
		</script>
	<!--end-->
</div>