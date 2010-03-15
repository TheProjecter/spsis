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
	<tr><td>
		<input type='hidden' name='stock_w' id='id_stock_w' value="<?php print $rows['stock'] ?>"/>
		ITEM: <b><?php print $rows['desc1'] ?></b></td></tr>
	<tr><td>AMOUNT<b id="asterisk">*</b></td>
		<td><input type='text' name='in_withdraw' id='id_withdraw' class="number required"><input type='hidden' name='item_w' id='id_item_w' value="<?php print $rows['matno']?>"></td>
	</tr>
	<tr><td></td><td><input type='submit' value='Withdraw' onclick='withdraw()'></td></tr>
	<tr><td><br/></td></tr>
	<tr id="note"><td colspan="2"><b id="asterisk">*</b>Must be a number and must be greater than zero(0) and less than <?php print $rows['stock']+1 ?></td></tr>
</table>

