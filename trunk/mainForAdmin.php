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

<html lang="en">
	<head>
		<title>Spare Parts and Supplies Inventory System</title>
		<link type="text/css" href="jquery-ui-1.8rc1.custom/development-bundle/themes/base/ui.all.css" rel="stylesheet" />
		<link type="text/css" href="jquery-ui-1.8rc1.custom/development-bundle/demos/demos.css" rel="stylesheet" />
		<script type="text/javascript" src="jquery-ui-1.8rc1.custom/development-bundle/jquery-1.4.1.js"></script>
		<script type="text/javascript" src="jquery-ui-1.8rc1.custom/development-bundle/menus.js"></script>
		<script type="text/javascript" src="jquery-ui-1.8rc1.custom/development-bundle/ui/jquery.ui.core.js"></script>
		<script type="text/javascript" src="jquery-ui-1.8rc1.custom/development-bundle/ui/jquery.ui.widget.js"></script>
		<script type="text/javascript" src="jquery-ui-1.8rc1.custom/development-bundle/ui/jquery.ui.tabs.js"></script>
		<script type="text/javascript">
			$(function() {
				$("#tabs").tabs();
			});			
		</script>
	</head>
	<body>
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
				<li><a href="home.php">Home</a></li>
				<li><a href="ajax/viewAcct.php">Account</a>
					<ul>						
						<li><a href="ajax/editAcct.php">Edit My Account</a></li>
						<li><a href="ajax/viewOwnProfile.php">View My Account</a></li>
						<li><a href="ajax/viewAllAccts.php">View All Accounts</a></li>
						<li><a href="ajax/searchAcct.php">Search Account</a></li>
						<li><a href="ajax/viewPendingUsers.php">View Pending Users</a></li>
						<li><a href="process/logOut.php">Log Out</a></li>
					</ul>
				</li>
				<li><a href="ajax/addItem.php">Items</a>
					<ul>
						<li><a href="ajax/addItem.php">Add Spare Part/Supply</a></li>
						<li><a href="ajax/addMachine.php">Add Machine</a></li>
						<li><a href="ajax/viewListOfMachines.php">View List of Machines</a></li>
					</ul>
				</li>
				<li id="report"><a href="ajax/machineSpareParts.php">Reports</a>
					<ul>
						<li id="machSP"><a href="ajax/machineSpareParts.php">Machine Spare Parts</a></li>
						<li id="deposit"><a href="ajax/viewDeposits.php">Deposits</a></li>
						<li id="withdraw"><a href="ajax/viewWithdraws.php">Withdraws</a></li>
						<li id="allTrans"><a href="ajax/viewAllTransactions.php">All Transactions</a></li>
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
				<li><a href="ajax/help.html">Help</a></li>
			</ul>
		</div>
	</body>
</html>