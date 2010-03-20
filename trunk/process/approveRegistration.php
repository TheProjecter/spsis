<?php
	include "../ajax/connection.php";
	include "../ajax/sessions.inc";

	if (isset($_SESSION['username'])) {
		$cnt = $_GET['cnt'];

		while ($cnt>=0) {
			$temp = $_GET['te'][$cnt];
			if ($_GET['act']==1) {
				mysql_query("UPDATE reg_user SET status=1 WHERE id=$temp");
			}
			else if ($_GET['act']==0) {
				mysql_query("DELETE FROM reg_user WHERE id=$temp");
			}
			$cnt--;
		}
		if ($_GET['act']==1) echo "<h4>Successfully approved account(s).</h4><br />";
		else echo "<h4>Successfully denied account(s).</h4><br />";
	}
	else {
		echo "<script type = 'text/javascript'>
				alert('Please log in first.');
				</script>";
		echo "<script>document.location='../logInReg.php'</script>";
	}
?>
