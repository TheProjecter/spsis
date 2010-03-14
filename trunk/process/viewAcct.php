
	<div class="del_dialog" title="View List of Accounts"></div>
	<table id="users" class="ui-widget ui-widget-content">
		<thead>
			
		</thead>
		<tbody>		
		<?php 
			include "../ajax/connection.php";
			if(isset($_GET['te'])){
				$temp = $_GET['te'];
				$result = mysql_query("SELECT * FROM reg_user WHERE username='$temp' and status = '1'");		
				$rows = mysql_fetch_array($result);
				
				echo "<tr><td class='ui-widget-header '>Username</td><td>" . $rows['username'] . "</td></tr>";
				echo "<tr><td class='ui-widget-header '>First Name</td><td>" . $rows['first'] . "</td></tr>";
				echo "<tr><td class='ui-widget-header '>Middle Name</td><td>" . $rows['middle'] . "</td></tr>";
				echo "<tr><td class='ui-widget-header '>Last Name</td><td>" . $rows['last'] . "</td></tr>";
				echo "<tr><td class='ui-widget-header '>Position</td><td>" . $rows['position'] . "</td></tr>";
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
