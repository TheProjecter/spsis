<?php  
	include "../ajax/connection.php";
	
	if(isset($_GET['delt'])){
		$temp = $_GET['delt'];
		$result = mysql_query("SELECT * FROM machine where id='$temp'");
		$rows = mysql_fetch_array($result);
	}

echo "<br /><div id='deleteDialog'>Are you sure you want to DELETE <a id='highlight'>" . $rows['name'] . "</a>?
	<br /><br /><small><b>Note: </b>Spare parts belonging to this machine will also be deleted.</small>";?>
<?php echo "<input type='hidden' id='dtrue' name='dtrue' value=" . $rows['id'] . ">";?>
<br />
<br />
<table id="usersDel">
	<tr>
		<td><input type='submit' id='aff' class='ui-state-default ui-corner-all' value='YES' onclick='conf6();'/></td>
		<td><a href=""><input type='button' class='ui-state-default ui-corner-all' value='NO' /></a></td>
	</tr>
</div>

