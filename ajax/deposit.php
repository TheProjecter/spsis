<?php 
	include "connection.php";
	$idValue = $_GET['id']; 
	$amount= $_GET['am'];
	if(isset($_GET['te'])){
		$temp = $_GET['te'];
		$result = mysql_query("SELECT * from item WHERE matno='$temp' or desc1='$temp' or machine='$temp'");

		$rows = mysql_fetch_array($result);
	}
?>
<table id="usersDialogW" class="ui-widget ui-widget-content">
	<tr><td>ITEM: <b><?php print $rows['desc1'] ?></b></td></tr>
	<tr><td>AMOUNT<b id="asterisk">*</b></td>
		<td><input type='text' name='in_deposit' id='id_deposit' class="number required"><input type='hidden' name='in_item' id='id_item' value="<?php print $rows['matno']?>"></td>
	</tr>
	<tr><td></td><td><input type='submit' value='Deposit' onclick='deposit()'></td></tr>
	<tr><td><br/></td></tr>
	<tr id="note"><td colspan="2"><b id="asterisk">*</b>Must be a number and must be greater than zero(0)</td></tr>
</table>