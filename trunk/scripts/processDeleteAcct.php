<?php  
		if(isset($_GET['delt'])){
		$link = mysql_connect('localhost', 'mentak', 'mentak');		
		mysql_select_db('spsis', $link);
		$temp = $_GET['delt'];
		$result = mysql_query("SELECT * FROM reg_user where username='$temp'");
		
		$rows = mysql_fetch_array($result);
	}
			
		

echo "Are you sure you want to DELETE Account: " . $rows['username'] . " ?";?>
<?php echo "<input type='hidden' id='dtrue' name='dtrue' value=" . $rows['username'] . ">"; ?>
<input type='submit' id='aff' class='ui-state-default ui-corner-all' value='YES' onclick='conf3();'/>
<a href=""><input type='button' class='ui-state-default ui-corner-all' value='NO' /></a>
