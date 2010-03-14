<?php
	include '../ajax/connection.php';
	include '../ajax/sessions.inc';
	
	if(isset($_SESSION['username'])){
		$criteria = $_POST['criteria'];
		$key = $_POST['keyword'];
		$query = "SELECT * FROM reg_user WHERE $criteria = '$key' and status = '1'";
		$result = mysql_query($query);
		$num = mysql_num_rows($result);
		if($num == 0){
			echo "<script type = 'text/javascript'>
				alert('No Results Found.');
				</script>";
			echo "<script>document.location='../mainForAdmin.php'</script>";
		}
		else{
			echo "<table border = '2' cellpadding = '5'>";
			echo "<th>Username</th>";
			while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
				echo "<tr>";
				echo '<td><a href="viewAcct.php?uname='.$row['username'].'">';
				echo "{$row['username']}</a></td>";
				echo "</tr>";
			}
			echo "</table>";
		}
	}
	else{
		echo "<script type = 'text/javascript'>
				alert('Please log in first.');
				</script>";
		echo "<script>document.location='../logInReg.php'</script>";	
	}
?>
<p>
	<?php echo $num?> results found. <br />
</p>