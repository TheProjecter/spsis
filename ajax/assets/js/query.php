<?php
	include "../../sessions.inc";
	
	if(!isset($_SESSION['username']))
		echo "document.location='../../../logIn.html'";	
	else{
		include "../../connection.php";
		$result = mysql_query("SELECT mat_no, desc1 FROM item");
		$count = 0;
		$count = mysql_num_rows($result);
		$result_b = mysql_query("SELECT DISTINCT machine FROM item");
		$count_b = 0;
		$count_b = mysql_num_rows($result_b);

			echo "YAHOO.example.Data = { ";
			echo "arrayMat: [ ";
				while($rows = mysql_fetch_array($result)){
						echo "\"" . $rows['mat_no'] . "\", \"" . $rows['desc1'] . "\",  ";
					$count--;
				}
				while($rows_b = mysql_fetch_array($result_b)){
					if($count_b<2){
						echo "\"" . $rows_b['machine'] . "\" ";
					}else{
						echo "\"" . $rows_b['machine'] . "\", ";
					}
					$count_b--;
		}
			echo "] ";
			echo "}; ";

	}
?>