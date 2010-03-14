<?php 
	include 'connection.php';
	include 'sessions.inc';
	
	if(!isset($_SESSION['username'])) {
		echo "<script type = 'text/javascript'>
				alert('Please log in first.');
				</script>";
		echo "<script>document.location='logInReg.php'</script>";
	}
	else{
		$result2 = mysql_query("SELECT * FROM item");
	}
?>

			<script type="text/javascript">
			$(function() {
				var i=0;
				while(i<9999){
				$("#radio"+i).buttonset();
				i++;
				}
			});
			</script>
			
			
		<!--<form name="profile" method="post" action="../mainForAdmin.php">-->

			<div id="dialog" title="View Spare Part"></div>
			<div id="del_dialog" title="Confirm Delete"></div>
			<div id="conf_del" title="Delete Spare Part"></div>
			<div id="users-contain" class="ui-widget">
			<p>Click on the material # of your chosen Spare Part</p>
			<div id='center'><h2>List of Spare Parts</h2></div>
			<table id="users" class="ui-widget ui-widget-content">
				<thead>
					<tr class="ui-widget-header ">
						<th>Material No.</th>
						<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Decription&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
						<th>Stock</th>
						<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Machine&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
						<th>View</th>
						<th>Deposit</th>
						<th>Withraw</th>
					</tr>
				</thead>
				<tbody>
				<div class="demo">
				
				<?php 
					$i=0;
					while($rows2 = mysql_fetch_array($result2)){
						echo "<tr>" ;
						echo "<td> <div id='radio$i'><input type='radio' name='te' id='myInput$i' value='" . $rows2['matno'] . "' /><label for='myInput$i'>" . $rows2['matno'] . "</label></div></td>";
						echo "<td>" . $rows2['desc1'] . "</td>";
						echo "<td>" . $rows2['stock'] . "</td>";
						echo "<td>" . $rows2['machine'] . "</td>";
						echo "<td> <input type='submit' class='ui-state-default ui-corner-all' onclick='open1();' value='view'/></td>";
						echo "<td> <input type='button' class='ui-state-default ui-corner-all' onclick='deposit(" . $rows2['id'] . ");' value='deposit'/></td>";
						echo "<td> <input type='button' class='ui-state-default ui-corner-all' onclick='withdraw(" . $rows2['id'] . ");' value='withdraw'/> </td>";
						echo "</tr>" ;
						$i++;
					}
				?>
				
				</div>
				</tbody>
			</table>
			</div>
