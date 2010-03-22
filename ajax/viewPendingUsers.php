<?php 
	include 'connection.php';
	include 'sessions.inc';
	
	if(isset($_SESSION['username'])) {
		$result = mysql_query("SELECT * FROM reg_user WHERE status=0");
?>
<script type="text/javascript">
	$(function() {
		var i=0;
		while(i<9999){
		$("#radiop"+i).buttonset();
		i++;
		}
	});

	$(document).ready(function(){ 
		$("#acctPend").tablesorter( {sortList: [[0,0], [1,0]]} ); 
	});
</script>

<style>
	#warningAcct{
		display:none;
	}
</style>

<div id="dialog8" title="View Account"></div>
<div id="users-contain" class="ui-widget">
	<div id="approveSuccess" title="Approve Success"></div>
	<div id="denySuccess" title="Deny Success"></div>
	<div id="warningAcct" title="WARNING"><h3 align="center">Please choose an account.</h3></div>
	<p><b>Instruction: </b>Mark corresponding check box of account(s) you want to approve/deny.</p>
	<br />
	<div id='center'><h2>Pending Users</h2></div>
	<table id="acctPend" class="ui-widget ui-widget-content" align="center">
		<thead>
			<tr class="ui-widget-header ">
				<th></th>
				<th>Username</th>
				<th>Name</th>
				<th>Position</th>
				<th>View</th>
			</tr>
		</thead>
		<tbody>
		<div class="demo">
		
		<?php 
			$i=0;
			while($row = mysql_fetch_array($result)){
				echo "<tr>" ;
				echo "<td><input type='checkbox' name='tet' id='acct$i' value='" . $row['id'] . "'></td>";
				echo "<td> <div id='radiop$i'><input type='radio' name='te' id='myInputp$i' value='" . $row['username'] . "' /><label for='myInputp$i'>" . $row['username'] . "</label></div></td>";
				echo "<td>" . $row['last'] . ", " . $row['first'] . " " . $row['middle']. "</td>";
				echo "<td>" . $row['position'] . "</td>";
				echo "<td> <input type='submit' class='ui-state-default ui-corner-all' onclick='open8();' value='view'/></td>";
				echo "</tr>" ;
				$i++;
			}
		?>
		</tbody>
	</table>
	<br />
	<br />
	<table align="center">
		<tr>
			<td><input type="submit" class="ui-state-default ui-corner-all" onclick="approve();" value='Approve'/></td>
			<td><input type="submit" class="ui-state-default ui-corner-all" onclick="deny();" value='Deny'/></td>
		</tr>
	</table>
	<br />
</div>
<?php } 
	else {
		echo "<script type = 'text/javascript'>
				alert('Please log in first.');
				</script>";
		echo "<script>document.location='../logInReg.php'</script>";
	}
?>