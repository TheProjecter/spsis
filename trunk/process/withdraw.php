<?php
	include '../ajax/sessions.inc';
	include '../ajax/connection.php'; 
	$idValue= $_GET['id']; 
	$amount= $_GET['am']; 
			
	if(isset($_SESSION['username'])){
		$user=$_SESSION['username'];
		$st = mysql_query( "SELECT * from item WHERE id=$idValue");
		
		if($_SESSION['type']=='admin'){
			$result = mysql_query( "SELECT * FROM admin where username='$user'");
		}
		else{
			$result = mysql_query( "SELECT * FROM reg_user where username='$user'");
		}

		$data= mysql_fetch_array($result);
		$s=mysql_fetch_array($st);
		$f=$data['first'];
		$m=$data['middle'];
		$l=$data['last'];
		$item=$s['desc1'];
		
		if(($s['stock'])>=$amount){
			mysql_query("INSERT INTO transaction (id,date,first,middle,last,item,type,amount) values (NULL,SYSDATE(),'$f','$m','$l','$item',0,$amount)");
			echo mysql_error();
			$result = mysql_query( "UPDATE item SET stock = stock-$amount WHERE id=$idValue");		
		}
		else{
			echo "<script>alert('Invalid input!');</script>";
		}
		
		if($_SESSION['type']=='admin'){
			echo "<script>document.location='../mainForAdmin.php'</script>";
		}
		else{
			echo "<script>document.location='../mainForRegUser.php'</script>";
		}
	}
	else {
		echo "<script type = 'text/javascript'>
				alert('Please log in first.');
				</script>";
		echo "<script>document.location='../logInReg.php'</script>";
	}
?>