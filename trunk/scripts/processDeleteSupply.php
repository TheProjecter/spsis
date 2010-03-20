<?php   
	if(isset($_GET['delt'])){
		$link = mysql_connect('localhost', 'mentak', 'mentak');		
		mysql_select_db('spsis', $link);
		$temp = $_GET['delt'];
		$result = mysql_query("SELECT * FROM item where matno='$temp'");
		
		$rows = mysql_fetch_array($result);
	}
			
		
echo "<br /><div id='deleteDialog'>Are you sure you want to DELETE <b>" . $rows['matno'] . "</b>?";?>
<?php echo "<input type='hidden' id='dtrue' name='dtrue' value=" . $rows['desc1'] . ">"; ?>
<br />
<br />
<table id="usersDel">
	<tr>
		<td><input type='submit' id='aff' class='ui-state-default ui-corner-all' value='YES' onclick='conf7();'/></td>
		<td><a href=""><input type='button' class='ui-state-default ui-corner-all' value='NO' /></a></td>
	</tr>
</div>
