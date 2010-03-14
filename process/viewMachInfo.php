
		<div class="del_dialog" title="View Spare Part"></div>
	<table id="users" class="ui-widget ui-widget-content">
		<thead>
			
		</thead>
		<tbody>		
		<?php 
			include "../ajax/connection.php";
			include "../ajax/sessions.inc";
			//alert($result);
			if(isset($_GET['te'])){
				$temp = $_GET['te'];
				$result = mysql_query("SELECT * FROM item WHERE machine='$temp'");		
				echo "<tr><td class='ui-widget-header '>Machine Name</td><td>" . $_GET['te'] . "</td></tr>";
				echo "<tr><td class='ui-widget-header '>Spare Part</td><td></td></tr>";
				
				while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
					echo "<tr><td>" . $row['matno'] . "</td></tr>";
				}
			}
			else {
				echo "<script type = 'text/javascript'>
						alert('Please log in first.');
						</script>";
					echo "<script>document.location='../logInReg.php'</script>";
			}
			
		?>
		</tbody>
	</table>