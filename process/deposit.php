<?php
	include '../ajax/connection.php';
	include '../ajax/sessions.inc';
	$idValue = $_GET['id']; 
	$amount= $_GET['am']; 
	
	$result = mysql_query( "UPDATE item SET stock=stock+$amount WHERE id=$idValue");
	
	if ($_SESSION['type']=='admin')
			header('Location:../mainForAdmin.php');
	else header('Location:../mainForRegUser.php');
	
?>



