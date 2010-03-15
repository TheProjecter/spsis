<?php  
	include "connection.php";
	$idValue = $_GET['id']; 
	$amount= $_GET['am'];
			if(isset($_GET['te'])){
				$temp = $_GET['te'];
				$result = mysql_query("SELECT * from item WHERE matno='$temp' or desc1='$temp' or machine='$temp'");
		
				$rows = mysql_fetch_array($result);
			}
	
	echo "<input type='hidden' name='stock_w' id='id_stock_w' value='" . $rows['stock'] . "'>";
	echo "Withdraw for '" .$rows['desc1']."'<br>";
	echo "Enter Amount: <input type='text' name='in_withdraw' id='id_withdraw' ><input type='hidden' name='item_w' id='id_item_w' value='" . $rows['matno'] . "'>";
	echo "(Must neither be less than '1' nor exceed '". $rows['stock'] ."')";
	echo "<input type='submit' value='Withdraw' onclick='withdrawprocess();'>";
	

?>