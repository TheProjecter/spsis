<?php
	session_start();  
	if(!isset($_SESSION['user']))
		echo "<script>document.location='new_home.html'</script>";
		
	else{
	
		$link = mysql_connect('localhost', 'root', '');		
		mysql_select_db('spsis', $link);
		
		$result = mysql_query("SELECT * FROM item");
		$count = 0;
		$count = mysql_num_rows($result);

			//echo "<script language='JavaScript'> <br />";
			echo "YAHOO.example.Data = { <br />";
			echo "arrayStates: [ <br />";
				while($rows = mysql_fetch_array($result)){
					
					if($count<2){
						echo "\"" . $rows['desc'] . "\" <br />";
					}else{
						echo "\"" . $rows['desc'] . "\", <br />";
					}
					$count--;
		}
			echo "] <br />";
			echo "}; <br />";
			//echo "</script>";
	}
?>

