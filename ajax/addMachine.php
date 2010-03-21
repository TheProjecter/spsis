<?php
	include 'connection.php';
	include 'sessions.inc';
	
	if(isset($_SESSION['username'])) {
		$result = mysql_query("SELECT name FROM machine");
		$i = 0;
		while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
			echo "<input type = 'hidden' name ='{$row[name]}' id = 'temp".$i."' value = '{$row[name]}'>";
			$i++;
		}
	}
	else {
		echo "<script type = 'text/javascript'>
				alert('Please log in first.');
				</script>";
		echo "<script>document.location='../logInReg.php'</script>";
	}
?>

<p>
	<span id="bitPageTitle">Add Machine</span>
</p>
&nbsp;
<form id="formBit" onreset="return confirm('Are you sure you want to clear the content of the page?')" method="post">
	<p>
		<table id="insideFrame">
			<tr>
				<td>Machine Name</td>
				<td><input type="text" maxlength="30" name="mach" id = "mach1" class="letter number dash space required"/></td>
			</tr>
		</table>
	</p>
	<br /><br />
	<p>
		<table id="insideFrame">
			<tr>
				<td><input type="reset" id="reset"/></td>
				<td><input type="button" value="Submit"  onclick="javascript:processAddMachine(document.getElementById('formBit'))"/></td>
			</tr>
		</table>
	</p>
</form>
<script type="text/javascript" src="scripts/ajax.js"></script>	