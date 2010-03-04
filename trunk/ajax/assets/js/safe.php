<?php
	
	session_start(); 

	if(!isset($_SESSION['user']))
		echo "document.location='new_home.html'";
		
	else{
	
		$link = mysql_connect('localhost', 'root', '');		
		mysql_select_db('spsis', $link);
		
		$result = mysql_query("SELECT * FROM item");
		$count = 0;
		$count = mysql_num_rows($result);

			echo "YAHOO.example.Data = { ";
			echo "arrayMat: [ ";
				while($rows = mysql_fetch_array($result)){
					
					if($count<2){
						echo "\"" . $rows['mat_no'] . "\", \"" . $rows['desc1'] . "\", \"" . $rows['machine'] . "\" ";
						//echo "[\"" . $rows['desc'] . "\", \"" . $rows['mat_no'] . "\"]";
					}else{
						echo "\"" . $rows['mat_no'] . "\", \"" . $rows['desc1'] . "\", \"" . $rows['machine'] . "\", ";
						//echo "[\"" . $rows['desc'] . "\", \"" . $rows['mat_no'] . "\"],";
					}
					$count--;
		}
			echo "] ";
			echo "}; ";

	}
?>

