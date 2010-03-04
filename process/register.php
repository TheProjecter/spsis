<?php session_start();
	$con = mysql_connect("localhost","mentak","mentak","spsis");
	if (!$con) {
		die('Could not connect: ' . mysql_error());
	}

	mysql_select_db("spsis", $con);

	$result = mysql_query("INSERT INTO reg_user VALUES (NULL, '$_GET[uname]', '$_GET[pass1]', '$_GET[emp]', '$_GET[f]', '$_GET[m]', '$_GET[l]', '$_GET[pos]',0)");
	
	if ($result) {
		$_SESSION['msg']= "REGISTRATION SUCCESSFUL";
	}
	else {
		$_SESSION['msg']= "REGISTRATION FAILED";
		
		echo mysql_error();
	}
	mysql_close($con);

	header('Location: ../logInReg.php');
	
	
?>
