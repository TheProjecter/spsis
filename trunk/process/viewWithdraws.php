<?php	
	include '../ajax/connection.php';
	include '../ajax/sessions.inc';
	
	$result = mysql_query( "SELECT * FROM transaction where type=0" );
	
	if(isset($_SESSION['username'])){
?>		

<head>
	<script type="text/javascript" src="../scripts/ajax.js"></script>
	<link type="text/css" href="../jquery-ui-1.8rc1.custom/development-bundle/demos/demos_class.css" rel="stylesheet" />		
	<script src="../scripts/jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="../scripts/dropdown.js"></script>
</head>
<body>
	<p><span id="bitPageTitle">View Withdraws</span></p>
	&nbsp;
	<p><table id="insideFrameLimit" border="1">
		<thead>
			<tr>
				<th>Date</th>
				<th>Name</th>
				<th>Item Description</th>
				<th>Amount</th>				
			</tr>
		</thead> 
		<tbody>
		<?php
			while ($data= mysql_fetch_array($result)){ 
		?>
			<tr id="<?php$data['id']?>">
				<td id="name_<?php$data['date']?>"><?php print $data['date'];?></td>
				<td id="name_<?php print $data['name']?>">
					<?php
						print $data['first']." ";
						print $data['middle']." ";
						print $data['last']." ";
					?>
				</td>
				<td id="name_<?php print $data['item']?>">
					<?php						
						print $data['item'];
					?>
				</td>
				<td id="name_<?php print $data['amount']?>">
					<?php
						print $data['amount'];
					?>
				</td>
			<br />
			</tr>	
			<?php } ?>

		</tbody>
	</table></p>
</body>
<?php
	}
	else {
		echo "<script type = 'text/javascript'>
			alert('Please log in first.');
			</script>";
		echo "<script>document.location='../logInReg.php'</script>";
	}
?>