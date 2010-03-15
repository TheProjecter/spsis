<?php 
	include 'connection.php';
	include 'sessions.inc';

	if(!isset($_SESSION['username'])) {
		echo "<script type = 'text/javascript'>
				alert('Please log in first.');
				</script>";
		echo "<script>document.location='../logInReg.php'</script>";
	}
	else{
		$result2 = mysql_query("SELECT * FROM reg_user where status = '1' ORDER BY id ASC");
		echo mysql_error();
	}
?>
<script type="text/javascript">
	$(function() {
		var i=0;
		while(i<9999){
		$("#radio2"+i).buttonset();
		i++;
		}
	});
	
	$(document).ready(function(){ 
		$("#usersThird").tablesorter( {sortList: [[0,0], [1,0]]} ); 
	}); 
</script>

<style>
	#warningAcct{
		display:none;
	}
</style>

<div id="dialog3" title="View Account"></div>
<div id="del_dialog3" title="Confirm Delete"></div>
<div id="conf_del3" title="Delete Item"></div>
<div id="users-contain" class="ui-widget">
	<div id="warningAcct" title="WARNING"><h3 align="center">Please choose an account.</h3></div>

	<p><b>Instruction: </b>Click on the username of your chosen account</p>
	<br />
	<div id='center'><h2>List of Accounts</h2></div>
	<table id="usersThird" class="ui-widget ui-widget-content" align="center">
		<thead>
			<tr class="ui-widget-header ">
				<th>Username</th>
				<th>Name</th>
				<th>View</th>
			</tr>
		</thead>
		<tbody>
		<div class="demo">
		
		<?php 
			$i=0;
			while($rows2 = mysql_fetch_array($result2)){
				echo "<tr>" ;
				echo "<td> <div id='radio2$i'><input type='radio' name='te' id='myInputa$i' value='" . $rows2['username'] . "' /><label for='myInputa$i'>" . $rows2['username'] . "</label></div></td>";
				echo "<td>" . $rows2['last'] . ", " . $rows2['first'] . " " . $rows2['middle']. "</td>";
				echo "<td> <input type='submit' class='ui-state-default ui-corner-all' onclick='open3();' value='view'/></td>";
				echo "</tr>" ;
				$i++;
			}
		?>
		</tbody>
	</table>
	<br />
</div>