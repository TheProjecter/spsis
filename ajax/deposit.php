<?php 
	include "connection.php";
	$idValue = $_GET['id']; 
	$amount= $_GET['am'];
			if(isset($_GET['te'])){
				$temp = $_GET['te'];
				$result = mysql_query("SELECT * from item WHERE matno='$temp' or desc1='$temp' or machine='$temp'");
		
				$rows = mysql_fetch_array($result);
			}
	
	echo "Deposit on item: '" .$rows['desc1']."'<br>";
	echo "Enter Amount: <input type='text' name='in_deposit' id='id_deposit' ><input type='hidden' name='in_item' id='id_item' value='" . $rows['matno'] . "'>";
	echo "Must be greater than zero(0)";
	echo "<input type='submit' value='Deposit' onclick='depositprocess();'>";
?>