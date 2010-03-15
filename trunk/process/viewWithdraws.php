<?php	
	include '../ajax/connection.php';
	include '../ajax/sessions.inc';
		
	if(isset($_SESSION['username'])){
		$result = mysql_query( "SELECT * FROM transaction where type=0" );
?>		

<script type="text/javascript">
	$(document).ready(function(){ 
		$("#usersW").tablesorter( {sortList: [[0,0], [1,0]]} ); 
	}); 
</script>

<div id="users-contain" class="ui-widget">
	<div id='center'><h2>List of Withdraws</h2></div>
	<table id="usersW" class="ui-widget ui-widget-content" align="center">
		<thead>
			<tr class="ui-widget-header ">
				<th>Date</th>
				<th>Name</th>
				<th>Item</th>
				<th>Amount</th>
			</tr>
		</thead>
		<tbody>
		<div class="demo">
			<?php 
				$i=0;
				while($data = mysql_fetch_array($result)){
					echo "<tr>" ;
					echo "<td>" . $data['date'] . "</td>";
					echo "<td>" . $data['last'] . ", " . $data['first'] .  " " . $data['middle'] . "</td>";
					echo "<td>" . $data['item'] . "</td>";
					echo "<td>" . $data['amount'] . "</td>";
					echo "</tr>" ;
					$i++;
				}
			?>
		</tbody>
	</table>
	<br />
</div>
<?php
	}
	else {
		echo "<script type = 'text/javascript'>
			alert('Please log in first.');
			</script>";
		echo "<script>document.location='../logInReg.php'</script>";
	}
?>