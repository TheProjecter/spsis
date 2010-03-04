<?php
	include 'connection.php';
	include 'sessions.inc';
	$uname = $_GET['username'];
	$query = "SELECT * FROM reg_user WHERE username='$uname' and status = '1'";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result, MYSQL_ASSOC);
?>
<html>
	<head>
		<script type="text/javascript" src="scripts/ajax.js"></script>
	</head>
	<?php echo '<form name = "form1" method = "post" action ="../process/deleteAcct.php">' ?>
		<input type = "hidden" name = "username" value = "<?php echo $row['username'] ?>" >
		<table border = '2' cellpadding = '5'>
			<tr>
				<td>Name</td> 
				<td><?php echo $row['first']. " ".$row['middle']." ".$row['last']?></td>
			</tr>
			<tr>
				<td>Employee Number</td>
				<td><?php echo $row['empno'] ?></td>
			</tr>
			<tr>
				<td>Position</td>
				<td><?php echo $row['position'] ?></td>
			</tr>
		<?php if($_SESSION['type']=='admin'){?>
			<tr>
				<td><input type= "submit" value = "DELETE" onclick= "return confirm('Are you sure you want to delete <?php echo $row['first']?>?')"></td>
				<td>
					&nbsp
				</td>
			</tr>
		<?php } ?>
	
		</table>
	<?php echo "</form>" ?>
</html>
