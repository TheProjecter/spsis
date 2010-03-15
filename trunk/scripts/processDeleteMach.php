<?php  
	include "../ajax/connection.php";
	
	if(isset($_GET['delt'])){
		$temp = $_GET['delt'];
		$result = mysql_query("SELECT * FROM machine where id='$temp'");
		$rows = mysql_fetch_array($result);
	}

echo "Are you sure you want to DELETE Account: " . $rows['name'] . " ?
	<br />Note: Spare parts belonging to this machine will also be deleted.";?>
<?php echo "<input type='hidden' id='dtrue' name='dtrue' value=" . $rows['id'] . ">"; ?>
<input type='submit' id='aff' class='ui-state-default ui-corner-all' value='YES' onclick='conf5();'/>
<a href=""><input type='button' class='ui-state-default ui-corner-all' value='NO' /></a>

