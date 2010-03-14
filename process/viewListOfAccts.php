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
		</script>
		
		
	<!--<form name="profile" method="post" action="../mainForAdmin.php">-->

		<div id="dialog3" title="View Account"></div>
		<div id="del_dialog3" title="Confirm Delete"></div>
		
		<div id='center'><h2>List of Accounts</h2></div>
		<table id="users" class="ui-widget ui-widget-content">
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
					echo "<td> <div id='radio2$i'><input type='radio' name='te' id='myInput2$i' value='" . $rows2['username'] . "' /><label for='myInput2$i'>" . $rows2['username'] . "</label></div></td>";
					echo "<td>" . $rows2['last'] . ", " . $rows2['first'] . " " . $rows2['middle']. "</td>";
					echo "<td> <input type='submit' class='ui-state-default ui-corner-all' onclick='open3();' value='view'/></td>";
					echo "</tr>" ;
					$i++;
				}
			?>
			
			</div>
			</tbody>
		</table>
