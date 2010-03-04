<?php

	function chkr($crnt){
		$link = mysql_connect('localhost', 'root', '');		
		mysql_select_db('spsis', $link);
		
		$result_chk = mysql_query("SELECT * FROM item");
		$count_chk = 0;
		$count_chk = mysql_num_rows($result_chk);
		
		while($rows_chk = mysql_fetch_array($result_chk)){
			echo "-".$crnt."-";
			if($count_chk==mysql_num_rows($result_chk)){
					echo "\"" . $rows_chk['mat_no'] . "\", \"" . $rows_chk['desc1'] . "\", \"" . $rows_chk['machine'] . "\", ";
			}
		
			else if($count_chk<2){
			
				if($crnt==$rows_chk['machine']){
					echo "\"" . $rows_chk['mat_no'] . "\", \"" . $rows_chk['desc1'] . "\" ";
				}
				else{
					echo "\"" . $rows_chk['mat_no'] . "\", \"" . $rows_chk['desc1'] . "\", \"" . $rows_chk['machine'] . "\" ";
				}
			}
			
			else{
				if($crnt==$rows_chk['machine']){
					echo "\"" . $rows_chk['mat_no'] . "\", \"" . $rows_chk['desc1'] . "\", ";
				}
				else{
					echo "\"" . $rows_chk['mat_no'] . "\", \"" . $rows_chk['desc1'] . "\", \"" . $rows_chk['machine'] . "\", ";
				}
			}
			$count_chk--;
		}
		
		
	}
	
	
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
				//while($rows = mysql_fetch_array($result)){
				$crnt = $rows['machine'];
						chkr($crnt);
				//}
			echo "] ";
			echo "}; ";

	}
?>

