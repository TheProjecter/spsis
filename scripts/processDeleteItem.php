<?php  
		if(isset($_GET['delt'])){
		$link = mysql_connect('localhost', 'mentak', 'mentak');		
		mysql_select_db('spsis', $link);
		$temp = $_GET['delt'];
		$result = mysql_query("SELECT * FROM item where matno='$temp' or desc1='$temp'");
		
		$rows = mysql_fetch_array($result);
	}
			
		

echo "Are you sure you want to DELETE Spare part: " . $rows['desc1'] . " ?";?>
<?php echo "<input type='hidden' id='dtrue' name='dtrue' value=" . $rows['desc1'] . ">"; ?>
<input type='submit' id='aff' class='ui-state-default ui-corner-all' value='YES' onclick='conf1();'/>
<a href=""><input type='button' class='ui-state-default ui-corner-all' value='NO' /></a>

