<?php 
	include "../ajax/connection.php";
	include "../ajax/sessions.inc";

	if(isset($_SESSION['username'])){
		$result = mysql_query("SELECT * FROM reg_user WHERE status=0");
?>

	<body>
		<p><span id="bitPageTitle">Pending Users</span></p>
		&nbsp;
		<p>
		<?php
			echo $_SESSION['mess'];
			$_SESSION['mess']="";		
		?>
		</p>
		<form name="form1" action="process/approve.php" method="post">
			<?php
				echo "<p><table id='insideFrame'>
				<tr>
				<td></td>
				<td>Username</td>
				<td>Name</td>
				</tr>";

				while($row = mysql_fetch_array($result)){
					echo "<tr>";
					echo "<td><input type='checkbox' name='row[]' id='row".$row["id"]."' value='".$row["id"]."'></td>";
					echo "<td>".$row["username"]."</td>";
					echo "<td>".$row["last"].", ".$row["first"]." ".$row["middle"]."</td></tr>";
				}
			?>
			</table></p>
			<p><table>
				<tr>
					<td><input type='submit' value='Approve' name='app' id='app'></td>
					<td><input type='submit' value='Deny' name='den' id='den'></td>
				</tr>
			</table></p>
			<br />
		</form>
	</body>
<?php }
	else {
		echo "<script type = 'text/javascript'>
			alert('Please log in first.');
			</script>";
		echo "<script>document.location='../logInReg.php'</script>";
	}
 ?>