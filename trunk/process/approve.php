<?php
	include "../ajax/connection.php";
	include "../ajax/sessions.inc";

	if (isset ($_REQUEST["row"])) {
		$selected = $_REQUEST["row"];
		foreach ($selected as $s) {
			if($_REQUEST["app"]){
				//echo "$s approve <br/>";
				mysql_query("UPDATE reg_user SET status=1 WHERE id=$s");
				$_SESSION['mess']="Approve Complete";
				if ($_SESSION['type']=='admin')
					header('Location: ../mainForAdmin.php');
				else header('Location: ../mainForRegUser.php');
			}
			else if ($_REQUEST["den"]) {
				//echo "$s deny <br/>";
				mysql_query("DELETE FROM reg_user WHERE id=$s");
				$_SESSION['mess']="Deny Complete";
				if ($_SESSION['type']=='admin')
					header('Location: ../mainForAdmin.php');
				else header('Location: ../mainForRegUser.php');
			}
		}
	}

?>
