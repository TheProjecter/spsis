<?php 
	include '../ajax/connection.php';
	include '../ajax/sessions.inc';
	
	if(!isset($_SESSION['username'])) {
		echo "<script type = 'text/javascript'>
				alert('Please log in first.');
				</script>";
		echo "<script>document.location='../logInReg.php'</script>";
	}
	else{
		$result2 = mysql_query("SELECT * FROM machine ORDER BY name ASC");
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
			
			
		<!--<form name="profile" method="post" action="../mainForAdmin.php">-->
	
			<div id="dialog4" title="View Machine Spare Parts"></div>
			<!--<div id="del_dialog" title="Confirm Delete"></div>-->
			<!--<div id="conf_del" title="Delete Spare Part"></div>-->
			<div id="users-contain" class="ui-widget">
			
			<div id='center'><h2>List of Machines</h2></div>
			<table id="users" class="ui-widget ui-widget-content">
				<thead>
					<tr class="ui-widget-header ">
						<th>Machine Name</th>
						<th>View</th>
					</tr>
				</thead>
				<tbody>
				<div class="demo">
				
				<?php 
					$i=0;
					while($rows2 = mysql_fetch_array($result2)){
						echo "<tr>" ;
						echo "<td> <div id='radio3$i'><input type='radio' name='mach' id='myInput3$i' value='" . $rows2['name'] . "' /><label for='myInput3$i'>" . $rows2['name'] . "</label></div></td>";
						echo "<td> <input type='submit' class='ui-state-default ui-corner-all' onclick='open4();' value='view'/></td>";
						echo "</tr>" ;
						$i++;
					}
				?>
				</div>
				</tbody>
			</table>