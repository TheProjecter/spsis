<?php 
	include "connection.php";
	include "sessions.inc";
	
	if (isset($_SESSION['username'])) {
		$temp = $_GET['te'];
		$result = mysql_query("SELECT * from item WHERE matno='$temp'");

		$rows = mysql_fetch_array($result);
?>
	<table id="usersDialogW" class="ui-widget ui-widget-content">
		<tr><td colspan="2">ITEM: <b><?php print $rows['desc1'] ?></b></td></tr>
		<tr><td>AMOUNT<b id="asterisk">*</b></td>
			<td><input type='text' name='in_deposit' id='id_deposit' class="number required"><input type='hidden' name='in_item' id='id_item' value="<?php print $rows['matno']?>"></td>
		</tr>
		<tr><td></td><td><input type='submit' value='Deposit' onclick='deposit()'></td></tr>
		<tr><td><br/></td></tr>
		<tr id="note"><td colspan="2"><b id="asterisk">*</b>Must be a number and must be greater than zero(0)</td></tr>
	</table>
<?php
	}
	else {
		echo "<script type = 'text/javascript'>
				alert('Please log in first.');
				</script>";
		echo "<script>document.location='../logInReg.php'</script>";
	}
?>
