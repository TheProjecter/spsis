<?php
	include 'ajax/connection.php';
	include 'ajax/sessions.inc';

	if(!isset($_SESSION['username'])){
		echo "<script type = 'text/javascript'>
				alert('Please log in first.');
				</script>";
		echo "<script>document.location='logInReg.php'</script>";
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html lang="en">
	<head>
		<title>Spare Parts and Supplies Inventory System</title>	
		<link type="text/css" href="jquery-ui-1.8rc1.custom/development-bundle/themes/base/ui.all.css" rel="stylesheet" />
		<link type="text/css" href="jquery-ui-1.8rc1.custom/development-bundle/demos.css" rel="stylesheet" />
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
		<script type="text/javascript" src="jquery-ui-1.8rc1.custom/development-bundle/ui/jquery.effects.clip.js"></script>
		<script type="text/javascript" src="jquery-ui-1.8rc1.custom/development-bundle/ui/jquery.effects.highlight.js"></script>
		<script type="text/javascript" src="jquery-ui-1.8rc1.custom/development-bundle/ui/jquery.ui.button.js"></script>
		<script type="text/javascript" src="jquery-ui-1.8rc1.custom/development-bundle/build/yahoo-dom-event/yahoo-dom-event.js"></script>
		<script type="text/javascript" src="jquery-ui-1.8rc1.custom/development-bundle/build/animation/animation-min.js"></script>
		<script type="text/javascript" src="jquery-ui-1.8rc1.custom/development-bundle/build/datasource/datasource-min.js"></script>
		<script type="text/javascript" src="jquery-ui-1.8rc1.custom/development-bundle/build/autocomplete/autocomplete-min.js"></script>
		<link rel="stylesheet" type="text/css" href="jquery-ui-1.8rc1.custom/development-bundle/build/fonts/fonts-min.css" />
		<link rel="stylesheet" type="text/css" href="jquery-ui-1.8rc1.custom/development-bundle/build/autocomplete/assets/skins/sam/autocomplete.css" />	
		<script type="text/javascript" src="jquery-ui-1.8rc1.custom/js/jquery.tablesorter.min.js"></script>
		<script type="text/javascript" src="scripts/dialogs.js"></script>
		<script type="text/javascript" src="scripts/ajax.js"></script>
		<script type="text/javascript">
			$(function() {
				$("#tabs").tabs();
			});
		</script>	
		<style type="text/css">
			body { 
				font-size: 62.5%; 
				background-color: #1C2F3A; 
				font-family: "Trebuchet MS", "Helvetica", "Arial",  "Verdana", "sans-serif";
				position: relative;	
			}
			label, input { display:block; }
			h1 {font-size: 250%; color: white}
			input.text { margin-bottom:12px; width:95%; padding: .4em; }
			fieldset { padding:0; border:0; margin-top:25px; }
			div#users-contain { width: 100%; }
			table#usersDialog {margin: 5%; font-size: 110%; width:90%;}
			table#usersDialogW {font-size: 110%; width:100%; border-color: white}
			div#users-contain table { border-collapse: collapse;}
			div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left;}
			table tr th {font-size: 110%}
			table#users, table#userItem, table#userSupply {width:90%;}
			table#usersDel {width:80%; margin-left: 18%}
			table#usersThird, table#usersAcct, table#acctPend, table#usersW, table#usersD, table#usersT {width:75%}
			table#usersHalf {width:50%}
			table#half {margin-left: 5%; font-size: 110%; width: 50%}
			table#search {width: 40%}
			table#usersHalfs {width:50%}
			div#dialogSmall {margin: 0 65%}
			div#dialogSmaller {margin: 0 78%}
			div#deleteDialog {font-size: 110%}
			.ui-dialog .ui-state-error { padding: .3em; }
			.validateTips { border: 1px solid transparent; padding: 0.3em; }
			#welcome {color: white}
		</style>
	
	</head>
	<body>
		<div id="header">
			<table width="95%">
				<tr>
				<td><a href="http://www.analog.com/en/index.html"><img src="logo.jpg"></a></td>
				<td><h1 id="highlight2">Spare Parts and Supplies Inventory System (SPSIS)</h1></td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td align="right"><h3 id="welcome"><?php echo "Welcome <span id='highlight2'>" . $_SESSION['username']; ?></span></h3></td>
				</tr>
			</table>
		</div>
		<div id="tabs">
			<ul id='jsddm'>
				<li id="home"><a href="ajax/home.php">Home</a></li>
				<li id="acct"><a href="process/viewOwnProfile.php">Account</a>
					<ul>						
						<li id="viewMyAcct"><a href="process/viewOwnProfile.php">View My Account</a></li>
						<li><a href="process/logOut.php">Log Out</a></li>
					</ul>
				</li>
				<li id="mach"><a href="ajax/viewListOfMachines.php">View List of Machines</a>
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
						<li id="searchMach"><a href="ajax/searchMachine.php">Machine</a></li>
						<li id="searchSP"><a href="ajax/searchSparePart.php">Spare Part</a></li>
						<li id="searchSupply"><a href="ajax/searchSupplies.php">Other Supplies</a></li>
					</ul>
				</li>
				<li id="help"><a href="ajax/help.php">Help</a></li>
			</ul>
		</div>
	</body>
</html>