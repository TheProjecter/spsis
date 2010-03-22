<?php    
	include "../ajax/connection.php";
	include "../ajax/sessions.inc";

	if(isset($_GET['in_item'])){
		$amount = $_GET['in_deposit'];
		$temp = $_GET['in_item'];
		
		$user=$_SESSION['username'];
		if($_SESSION['type']=='admin'){
			$result = mysql_query( "SELECT * FROM admin where username='$user'");
		}
		else{
			$result = mysql_query( "SELECT * FROM reg_user where username='$user'");
		}

		$data= mysql_fetch_array($result);
		$f=$data['first'];
		$m=$data['middle'];
		$l=$data['last'];
		
		mysql_query("UPDATE item SET stock=stock+$amount WHERE matno='$temp'");
		mysql_query("INSERT INTO transaction (id,date,first,middle,last,item,type,amount) values (NULL,SYSDATE(),'$f','$m','$l','$temp',1,$amount)");
		echo "<h3>Successfully deposited " .$amount. " stock(s) on item <a id='highlight'>" .$temp . "</a>!</h3><br />";
	}
	else{
		echo "<h2>!</h2>";
	}
?>


