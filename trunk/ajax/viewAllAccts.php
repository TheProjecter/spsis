<?php
	include 'connection.php';
	include 'sessions.inc';
	
	if(isset($_SESSION['username'])){
		$query = "SELECT * FROM reg_user where status = '1' ORDER BY id ASC";
		$result = mysql_query($query);
		$num=mysql_num_rows($result);
		echo "<form name='formBit' method='post'>";
		echo "<p><table id='insideFrameHalf'>";
		if($num > 0){
			echo "<p><span id='bitPageTitle'>List Of Accounts</span></p><br />";
			echo "<tr><td>Username</td><td>Name</td></tr>";
			while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
				echo "<tr><td><a href='ajax/viewAcct.php?username={$row['username']}'>{$row['username']}</a></td><td>{$row['first']} {$row['middle']} {$row['last']}</td></tr>";
			}
		echo "</table></p></form>";
		}
		else{
			echo "<script type = 'text/javascript'>
				alert('No Users Yet!');
				</script>";
			echo "<script>document.location='mainForAdmin.php'</script>";
		}
	}
	else{
		echo "<script type = 'text/javascript'>
				alert('Please log in first.');
				</script>";
		echo "<script>document.location='../logInReg.php'</script>";
	}
?>
