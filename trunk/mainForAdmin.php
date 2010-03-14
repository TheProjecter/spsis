<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
	<head>
		<title>Spare Parts and Supplies Inventory System</title>
		
		<!--<link type="text/css" href="jquery-ui-1.8rc1.custom/development-bundle/demos/demos_class.css" rel="stylesheet" />		
		<script type="text/javascript" src="scripts/ajax.js"></script>
		<script type="text/javascript" src="scripts/dropdown.js">	</script>
		<script src="scripts/jquery.min.js" type="text/javascript"></script>-->
		
	
		<link type="text/css" href="jquery-ui-1.8rc1.custom/development-bundle/themes/base/ui.all.css" rel="stylesheet" />
		<link type="text/css" href="jquery-ui-1.8rc1.custom/development-bundle/demos/demos.css" rel="stylesheet" />
		<script type="text/javascript" src="jquery-ui-1.8rc1.custom/development-bundle/jquery-1.4.1.js"></script>
		<script type="text/javascript" src="jquery-ui-1.8rc1.custom/development-bundle/menus.js"></script>
		<script type="text/javascript" src="jquery-ui-1.8rc1.custom/development-bundle/external/jquery.bgiframe-2.1.1.js"></script>
		<script type="text/javascript" src="jquery-ui-1.8rc1.custom/development-bundle/ui/jquery.ui.core.js"></script>
		<script type="text/javascript" src="jquery-ui-1.8rc1.custom/development-bundle/ui/jquery.ui.widget.js"></script>
		<script type="text/javascript" src="jquery-ui-1.8rc1.custom/development-bundle/ui/jquery.ui.mouse.js"></script>
		<script type="text/javascript" src="jquery-ui-1.8rc1.custom/development-bundle/ui/jquery.ui.tabs.js"></script>
		<script type="text/javascript" src="jquery-ui-1.8rc1.custom/development-bundle/ui/jquery.ui.draggable.js"></script>
		<script type="text/javascript" src="jquery-ui-1.8rc1.custom/development-bundle/ui/jquery.ui.position.js"></script>
		<script type="text/javascript" src="jquery-ui-1.8rc1.custom/development-bundle/ui/jquery.ui.resizable.js"></script>
		<script type="text/javascript" src="jquery-ui-1.8rc1.custom/development-bundle/ui/jquery.ui.dialog.js"></script>
		<script type="text/javascript" src="jquery-ui-1.8rc1.custom/development-bundle/ui/jquery.effects.core.js"></script>
		<script type="text/javascript" src="jquery-ui-1.8rc1.custom/development-bundle/ui/jquery.effects.explode.js"></script>
		<script type="text/javascript" src="jquery-ui-1.8rc1.custom/development-bundle/ui/jquery.effects.highlight.js"></script>
		<script type="text/javascript" src="jquery-ui-1.8rc1.custom/development-bundle/ui/jquery.ui.button.js"></script>
		
		<script type="text/javascript" src="jquery-ui-1.8rc1.custom/development-bundle/build/yahoo-dom-event/yahoo-dom-event.js"></script>
		<script type="text/javascript" src="jquery-ui-1.8rc1.custom/development-bundle/build/animation/animation-min.js"></script>
		<script type="text/javascript" src="jquery-ui-1.8rc1.custom/development-bundle/build/datasource/datasource-min.js"></script>
		<script type="text/javascript" src="jquery-ui-1.8rc1.custom/development-bundle/build/autocomplete/autocomplete-min.js"></script>
		<link rel="stylesheet" type="text/css" href="jquery-ui-1.8rc1.custom/development-bundle/build/fonts/fonts-min.css" />
		<link rel="stylesheet" type="text/css" href="jquery-ui-1.8rc1.custom/development-bundle/build/autocomplete/assets/skins/sam/autocomplete.css" />
		
	`<!--for seacrh-->
		<!--<script type="text/javascript" src="ajax/assets/js/query.php"></script>-->
	<!--for seacrh-->	
		
		<script type="text/javascript">
			$(function() {
				$("#tabs").tabs();
			});
		</script>	
		<style type="text/css">
		body { font-size: 62.5%; }
		label, input { display:block; }
		input.text { margin-bottom:12px; width:95%; padding: .4em; }
		fieldset { padding:0; border:0; margin-top:25px; }
		h1 { font-size: 1.2em; margin: .6em 0; }
		div#users-contain { width: 350px; margin: 20px 0; }
		div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
		div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
		.ui-dialog .ui-state-error { padding: .3em; }
		.validateTips { border: 1px solid transparent; padding: 0.3em; }
	</style>
	
	<!--search corner-->
	<style type="text/css">
	
			#myAutoComplete {
				width:15em; /* set width here or else widget will expand to fit its container */
				padding-bottom:2em;
			}
		</style>
		
		<!--end-->
	
		<script type="text/javascript">
	// increase the default animation speed to exaggerate the effect
	$.fx.speeds._default = 1000;
	var text="";
	var text2="";
	var text3="";
	var texts="";
	var texts2="";
	var texts3="";
	var acctName="";
	var machName="";
	
	function open1(){
		//alert($('#dialog').html());
		$('#dialog').html("");
		var i=0;
			while($('#myInput'+i).val()!=undefined){
				if($('#myInput'+i).is(':checked')){
					text =$('#myInput'+i).val();
				}
				i++;
			}
			
			if(text==''){
				alert('no spare part selected');
			}
			else{
			//alert(text);
			$('#dialog').dialog({
				autoOpen: false,
				show: 'explode',
				hide: 'highlight'
			});
			$('#dialog').dialog('open');
			$('#dialog').load("process/viewItem.php?te="+text);
			}
			return false;
	}

	function del1(){
		$('#del_dialog').html("");
			text2 =$('#delt').val();
			//alert(text2);
			$('#del_dialog').dialog({
			autoOpen: false,
			show: 'highlight',
			hide: 'highlight'
		});
			$('#del_dialog').dialog('open');
			$('#del_dialog').load("scripts/processDeleteItem.php?delt="+text2);
			return false;
	}
	function conf1(){
		$('#conf_del').html("");
			text3 =$('#dtrue').val();
			//alert(text3);
			$('#conf_del').dialog({
			autoOpen: false,
			show: 'highlight',
			hide: 'highlight'
		});
			$('#conf_del').dialog('open');
			$('#conf_del').load("process/deleteItem.php?dtrue="+text3);
			return false;
	}
	
	//newnewnewnewnewnew
	
	function open2(){
		//alert($('#dialog').html());
		$('#dialog2').html("");
		var i=0;
			while($('#myInputs'+i).val()!=undefined){
				
				if($('#myInputs'+i).is(':checked')){
					texts =$('#myInputs'+i).val();
				}
				i++;
			}
			if(texts==''){
				alert('no spare part selected');
			}
			else{
			//alert(texts);
			$('#dialog2').dialog({
			autoOpen: false,
			show: 'explode',
			hide: 'highlight'
		});
			$('#dialog2').dialog('open');
			$('#dialog2').load("process/viewItem2.php?te="+texts);
			}
			return false;
	}

	function del2(){
		$('#del_dialog2').html("");
			texts2 =$('#delt').val();
			//alert(text2);
			$('#del_dialog2').dialog({
			autoOpen: false,
			show: 'highlight',
			hide: 'highlight'
		});
			$('#del_dialog2').dialog('open');
			$('#del_dialog2').load("scripts/processDeleteItem2.php?delt="+texts2);
			return false;
	}
	function conf2(){
		$('#conf_del2').html("");
			texts3 =$('#dtrue').val();
			//alert(text3);
			$('#conf_del2').dialog({
			autoOpen: false,
			show: 'highlight',
			hide: 'highlight'
		});
			$('#conf_del2').dialog('open');
			$('#conf_del2').load("process/deleteItem.php?dtrue="+texts3);
			return false;
	}
	
	function open3(){
		//alert($('#dialog').html());
		$('#dialog3').html("");
		var i=0;
			while($('#myInput2'+i).val()!=undefined){
				
				if($('#myInput2'+i).is(':checked')){
					acctName =$('#myInput2'+i).val();
				}
				i++;
			}
			if(acctName==''){
				alert('no account selected');
			}
			else{
			$('#dialog3').dialog({
			autoOpen: false,
			show: 'explode',
			hide: 'highlight'
		});
			$('#dialog3').dialog('open');
			$('#dialog3').load("process/viewAcct.php?te="+acctName);
			}
			return false;
	}
	
	function open3(){
		//alert($('#dialog').html());
		$('#dialog3').html("");
		var i=0;
			while($('#myInput2'+i).val()!=undefined){
				
				if($('#myInput2'+i).is(':checked')){
					acctName =$('#myInput2'+i).val();
				}
				i++;
			}
			if(acctName==''){
				alert('no account selected');
			}
			else{
			$('#dialog3').dialog({
			autoOpen: false,
			show: 'explode',
			hide: 'highlight'
		});
			$('#dialog3').dialog('open');
			$('#dialog3').load("process/viewAcct.php?te="+acctName);
			}
			return false;
	}

	</script>	
	</head>
	
	
	<body>
		<script type="text/javascript" src="scripts/ajax.js"></script>
		<script type="text/javascript" src="scripts/dropdown.js"></script>
		
		
		
		
		<div id="header">
			<table>
				<tr>
				<td><a href="http://www.analog.com/en/index.html"><img src="logo.gif"></a></td>
				<td>&nbsp;&nbsp;</td>
				<td><h1>Spare Parts and Supplies Inventory System (SPSIS)</h1></td>
				</tr>
			</table>
		</div>
		<div id="tabs">
			
			<ul id='jsddm'>
				<li id="home"><a href="ajax/home.php">Home</a></li>
				<li id="acct"><a href="ajax/viewAcct.php">Account</a>
					<ul>						
						<li id="viewMyAcct"><a href="process/viewOwnProfile.php">View My Account</a></li>
						<li id="viewAllAcct"><a href="process/viewListOfAccts.php">View All Accounts</a></li>
						<li id="searchAcct"><a href="ajax/searchAcct.php">Search Account</a></li>
						<li id="viewPending"><a href="process/viewPendingUsers.php">View Pending Users</a></li>
					</ul>
				</li>
				<li id="mach"><a href="ajax/addMachine.php">Machine</a>
					<ul>
						<li id="addMach"><a href="ajax/addMachine.php">Add Machine</a></li>
						<li id="listMach"><a href="process/viewListOfMachines.php">List of Machines</a></li>
					</ul>
				</li>
				<li id="item"><a href="ajax/addItem.php">Spare Part/Supply</a>
					<ul>
						<li id="addItem"><a href="ajax/addItem.php">Add Item</a></li>
					</ul>
				</li>
				<li id="report"><a href="ajax/machineSpareParts.php">Reports</a>
					<ul>
						<li id="deposit"><a href="process/viewDeposits.php">Deposits</a></li>
						<li id="withdraw"><a href="process/viewWithdraws.php">Withdraws</a></li>
						<li id="allTrans"><a href="process/viewAllTransactions.php">All Transactions</a></li>
					</ul>
				</li>
				<li id="search"><a href="ajax/searchAcct.php">Search</a>
					<ul>
						<li id="searchAcct"><a href="ajax/searchAcct.php">User Account</a></li>
						<li id="searchSP"><a href="ajax/searchSparePart.php">Spare Part</a></li>
					</ul>
				</li>
				<li id="logout"><a href="logOut.php">Log Out</a></li>
			</ul>
		</div>
	</body>
</html>