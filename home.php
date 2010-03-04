<?php
	include 'ajax/connection.php';
	include 'ajax/sessions.inc';
	
	if(!isset($_SESSION['username'])){
		echo "<script type = 'text/javascript'>
				alert('Please log in first.');
				</script>";
		echo "<script>document.location='logInReg.php'</script>";
	}
	else $result = mysql_query( "SELECT * FROM item ORDER by machine" );
?>
<html>
	<head>
		<title>Page Title</title>
		<link type="text/css" href="jquery-ui-1.8rc1.custom/development-bundle/demos/demos_class.css" rel="stylesheet" />		
		<script type="text/javascript" src="scripts/ajax.js"></script>
		<script type="text/javascript" src="scripts/dropdown.js">	</script>
		<script src="scripts/jquery.min.js" type="text/javascript"></script>
	</head>
	<body>
		<p><span id="bitPageTitle">List of Spare Parts & Supplies</span></p>&nbsp;
		<p><table id="insideFrameLimit" border="1">
				<thead>
					<tr>
						<th>Material No.</th>
						<th>Description</th>
						<th>Stock</th>
						<th>Machine</th>	
					</tr>
				</thead> 
			<tbody>
			<?php
				while ($data= mysql_fetch_array($result)){ 
			?>
				<tr id="<?php$data['id']?>">
					<td id="name_<?php$data['mat_no']?>">
						<ul class='jsddm'>
							<li><a href="#"><?php print $data['mat_no'];?></a>
								<ul>
									<li><a href="process/viewItem.php?id=<?php print $data['id']?>; ">View</a></li>
									<li onClick="deposit('<?php print $data['id']?>')"><a href="# ">Deposit</a></li>
									<li onClick="withdraw('<?php print $data['id']?>')"><a href="#">Withdraw</a></li>
								</ul>
							</li>
						</ul>
					</td>
					<td id="name_<?php$data['desc1']?>">
						<ul class='jsddm'>
							<li><a href="#"><?php print $data['desc1'];?></a>
								<ul>
									<li><a href="process/viewItem.php?id=<?php print $data['id']?>; ">View</a></li>
									<li onClick="deposit('<?php print $data['id']?>')"><a href='#'>Deposit</a></li>
									<li onClick="withdraw('<?php print $data['id']?>')"><a href='#'>Withdraw</a></li>
								</ul>
							</li>
						</ul>
					</td>

					<td id="name_<?php$data['stock']?>">
						<ul class='jsddm'>
							<li><?php print $data['stock'];?></li>
						</ul>
					</td>
					<td id="name_<?php$data['machine']?>">
						<ul class='jsddm'>
							<li><?php print $data['machine'];?></li>
						</ul>
					</td>
					<br/>
				</tr>	
				<?php } ?>
			</tbody>
		</table></p>
	</body>
</html> 
