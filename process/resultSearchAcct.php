<?php
	include "../ajax/connection.php";
	include "../ajax/sessions.inc";
	
	if(!isset($_SESSION['username'])) {
		echo "<script type = 'text/javascript'>
				alert('Please log in first.');
				</script>";
		echo "<script>document.location='logInReg.php'</script>";
	}
	else {
?>	
<script type="text/javascript">
	$(function() {
	var i=0;
	while(i<9999){
	$("#radioas"+i).buttonset();
	i++;
	}
	});
	
	$(document).ready(function(){ 
		$("#usersAcct").tablesorter( {sortList: [[0,0], [1,0]]} ); 
	}); 
</script>
<style>
	#warningAcct{
		display:none;
	}
</style>
<div id="warningAcct" title="WARNING"><h3 align="center">Please choose an account.</h3></div>

<?php
		$temp = $_REQUEST['tet'];
		$temp = addslashes($temp);
		$result = mysql_query("SELECT * FROM reg_user WHERE (username LIKE '%$temp%' OR first LIKE '%$temp%' OR middle LIKE '%$temp%' OR last LIKE '%$temp%' OR position LIKE '%$temp%') AND status=1");

		if(mysql_num_rows($result)==0){
			echo"<h2 align='center'>NO MATCH FOUND!</h2>";
		}
		else{
			echo "<br /><p><b>Instruction: </b>Click on the username of your chosen account</p>";
			echo "<div id='center'><h2>Search Result/s for '" . $temp . "'</h2></div>";
			echo "<div id='users-contain' class='ui-widget' align='center'>";
				echo "<table id='usersAcct' class='ui-widget ui-widget-content'>";
					echo "<thead>";
						echo "<tr class='ui-widget-header'>";
							echo "<th>Username</th>";
							echo "<th>Name</th>";
							echo "<th>View</th>";
						echo "</tr>";
					echo "</thead>";
					echo "<tbody>";
					echo "<div class='demo'>";
						$i=0;
						while($rows2 = mysql_fetch_array($result)){
							echo "<tr>" ;
							echo "<td> <div id='radioas$i'><input type='radio' name='te' id='myInputas$i' value='" . $rows2['username'] . "' /><label for='myInputas$i'>" . $rows2['username'] . "</label></div></td>";
							echo "<td>" . $rows2['last'] . ", " . $rows2['first'] . " " . $rows2['middle']. "</td>";
							echo "<td> <input type='submit' class='ui-state-default ui-corner-all' onclick='open4();' value='view'/></td>";
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