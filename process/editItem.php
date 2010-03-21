<?php   
	if(isset($_GET['item_edit1'])){
		$link = mysql_connect('localhost', 'root', '');		
		mysql_select_db('spsis', $link);
		$temp = $_GET['item_edit1'];
		$desc1 = $_GET['item_desc1'];
		$bin = $_GET['item_bin'];
		$bun = $_GET['item_bun'];
		$cc = $_GET['item_cc'];
		$machine = $_GET['item_machine'];
	
		mysql_query("UPDATE item SET desc1='$desc1', bin='$bin', bun='$bun', cc='$cc', machine='$machine' WHERE matno='$temp'");

		echo "<h2>ITEM was UPDATED</h2>";
		echo "<a href='mainForAdmin.php'><input type='button' value='Back to List' class='ui-state-default ui-corner-all'></a>";
	}
	else{
		echo "<h2>!</h2>";
	}
?>


