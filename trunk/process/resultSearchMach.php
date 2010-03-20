<?php
	include "../ajax/connection.php";
	include "../ajax/sessions.inc";
	
	if(!isset($_SESSION['username'])) {
		echo "<script type = 'text/javascript'>
				alert('Please log in first.');
				</script>";
		echo "<script>document.location='../logInReg.php'</script>";
	}
?>	
<script type="text/javascript">
	$(function() {
	var i=0;
	while(i<9999){
	$("#radioms"+i).buttonset();
	i++;
	}
	});
	$(document).ready(function(){ 
		$("#usersHalfs").tablesorter( {sortList: [[0,0], [1,0]]} ); 
	}); 
</script>
<style>
	#warningMach{
		display:none;
	}
</style>
<div id="warningMach" title="WARNING"><h3 align="center">Please choose a machine.</h3></div>

<?php
if(isset($_REQUEST['tet'])){
	$temp = $_REQUEST['tet'];
	$result = mysql_query("SELECT * FROM machine where name like '%$temp%'");

	if(mysql_num_rows($result)==0){
		echo"<h2>NO RESULTS WERE FOUND!</h2>";
	}
	else{
		echo "<br /><p><b>Instruction: </b>Click on the name of your chosen machine</p>";
		echo "<div id='center'><h2>Search Result/s for '" . $temp . "'</h2></div>";
		echo "<div id='users-contain' class='ui-widget' align='center'>";
			echo "<table id='usersHalfs' class='ui-widget ui-widget-content'>";
				echo "<thead>";
					echo "<tr class='ui-widget-header'>";
						echo "<th>Machine Name</th>";
						echo "<th>View</th>";
					echo "</tr>";
				echo "</thead>";
				echo "<tbody>";
				echo "<div class='demo'>";
					$i=0;
					while($rows2 = mysql_fetch_array($result)){
						echo "<tr>" ;
						echo "<td> <div id='radioms$i'><input type='radio' name='mach' id='myInputms$i' value='" . $rows2['id'] . "' /><label for='myInputms$i'>" . $rows2['name'] . "</label></div></td>";
						echo "<td> <input type='submit' class='ui-state-default ui-corner-all' onclick='open6();' value='view'/></td>";
						echo "</tr>" ;
						$i++;
					}
				echo "</div>";
				echo "</tbody>";
			echo "</table>";
			echo "</div><br />";
	}
}
?>