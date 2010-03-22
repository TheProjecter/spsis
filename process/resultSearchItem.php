<?php
	include "../ajax/connection.php";
	include "../ajax/sessions.inc";
	
	if(!isset($_SESSION['username'])) {
		echo "<script type = 'text/javascript'>
				alert('Please log in first.');
				</script>";
		echo "<script>document.location='logInReg.php'</script>";
	}
?>	
<script type="text/javascript">
	$(function() {
	var i=0;
	while(i<9999){
	$("#radios"+i).buttonset();
	i++;
	}
	});
	$(document).ready(function(){ 
		$("#userSupply").tablesorter( {sortList: [[0,0], [1,0]]} ); 
	}); 
</script>

<?php
if(isset($_REQUEST['tet'])){
	$temp = $_REQUEST['tet'];
	$result = mysql_query("SELECT * FROM item where (matno like '%$temp%' or desc1 like '%$temp%' or machine like '%$temp%') AND type=1");

	if(mysql_num_rows($result)==0){
		echo"<h2>NO RESULTS WERE FOUND!</h2>";
	}
	else{
		echo "<br /><p><b>Instruction: </b>Click on the material # of your chosen item</p>";
		echo "<div id='center'><h2>Search Result/s for '" . $temp . "'</h2></div>";
		echo "<div id='users-contain' class='ui-widget' align='center'>";
			echo "<table id='userSupply' class='ui-widget ui-widget-content'>";
				echo "<thead>";
					echo "<tr class='ui-widget-header'>";
						echo "<th>Material No.</th>";
						echo "<th>Decription</th>";
						echo "<th>Stock</th>";
						echo "<th>Machine</th>";
						echo "<th>View</th>";
						echo "<th>Deposit</th>";
						echo "<th>Withdraw</th>";
					echo "</tr>";
				echo "</thead>";
				echo "<tbody>";
				echo "<div class='demo'>";
					$i=0;
					while($rows2 = mysql_fetch_array($result)){
						echo "<tr>" ;
						echo "<td> <div id='radios$i'> <input type='radio' name='te' id='myInputs$i' value='" . $rows2['matno'] . "' /><label for='myInputs$i'>" . $rows2['matno'] . "</label></div></td>";
						echo "<td>" . $rows2['desc1'] . "</td>";
						echo "<input type='hidden' id='stki$i' value='" . $rows2['stock'] . "' />";
						echo "<td>" . $rows2['stock'] . "</td>";
						
						$id = $rows2['machine'];
						$query = mysql_query("SELECT * FROM machine WHERE id='$id'");
						$name = mysql_fetch_array($query);
						echo "<td>" . $name['name'] . "</td>";
							
						echo "<td> <input type='submit' class='ui-state-default ui-corner-all' onclick='open2();' value='view'/></td>";
						echo "<td> <input type='button' class='ui-state-default ui-corner-all' onclick='deposit2();' value='deposit'/></td>";
						echo "<td> <input type='button' class='ui-state-default ui-corner-all' onclick='withdraw2();' value='withdraw'/> </td>";
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