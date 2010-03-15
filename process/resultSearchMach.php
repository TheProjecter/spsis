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
	$("#radio3"+i).buttonset();
	i++;
	}
	});
</script>

<?php
if(isset($_REQUEST['tet'])){
	$temp = $_REQUEST['tet'];
	$result = mysql_query("SELECT * FROM machine where name like '%$temp%'");

	if(mysql_num_rows($result)==0){
		echo"<h2>NO RESULTS WERE FOUND!</h2>";
	}
	else{
		echo "<p>Click on the name of your chosen machine</p>";
		echo "<div id='center'><h2>Search Result/s for '" . $temp . "'</h2></div>";
		echo "<div id='users-contain' class='ui-widget'>";
			echo "<table id='users' class='ui-widget ui-widget-content'>";
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
						echo "<td> <div id='radio3$i'><input type='radio' name='mach' id='myInputs3$i' value='" . $rows2['name'] . "' /><label for='myInputs3$i'>" . $rows2['name'] . "</label></div></td>";
						echo "<td> <input type='submit' class='ui-state-default ui-corner-all' onclick='open5();' value='view'/></td>";
						echo "</tr>" ;
						$i++;
					}
				echo "</div>";
				echo "</tbody>";
			echo "</table>";
			echo "</div>";
	}
}
?>