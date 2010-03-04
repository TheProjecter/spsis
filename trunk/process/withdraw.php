<?php
	include '../ajax/connection.php'; 
	$idValue= $_GET['id']; 
	$amount= $_GET['am']; 
			
	$st = mysql_query( "SELECT stock from item WHERE id=$idValue");
	if($st>$amount){
		$result = mysql_query( "UPDATE item SET stock = stock-$amount WHERE id=$idValue");
		header('Location:../mainForAdmin.php');
	}
	else{
		print "<script>alert('Invalid input!');</script>";
		if ($_SESSION['type']=='admin')
			echo "<script>document.location='../mainForAdmin.php'</script>";
		else echo "<script>document.location='../mainForRegUser.php'</script>";
	}
?>