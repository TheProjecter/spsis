<?php  
	include "connection.php";
	
	if(isset($_GET['te'])){
		$temp = $_GET['te'];
		$result = mysql_query("SELECT * from item WHERE matno='$temp'");

		$rows = mysql_fetch_array($result);
		
		if ($rows['stock']==0) {
			echo "<h3>Can not withdraw on item <a id='highlight'>" . $rows['desc1'] . "</a>.</h3><h4>It has zero stock.</h4><br />";
			echo "<div id='dialogSmall'><a href='mainForAdmin.php'><input type='button' class='ui-state-default ui-corner-all' value='Back to List'></a></div>";
		}
		else {
?>
<table id="usersDialogW" class="ui-widget ui-widget-content">
	<tr><td colspan="2">
		<input type='hidden' name='stock_w' id='id_stock_w' value="<?php print $rows['stock'] ?>"/>
		ITEM: <a id="highlight"><?php print $rows['desc1'] ?></a></td></tr>
	<tr><td>AMOUNT<b id="asterisk">*</b></td>
		<td><input type='text' name='in_withdraw' id='id_withdraw' class="number required"><input type='hidden' name='item_w' id='id_item_w' value="<?php print $rows['matno']?>"></td>
	</tr>
	<tr><td></td><td><input type='submit' value='Withdraw' onclick='withdraw()'></td></tr>
	<tr><td><br/></td></tr>
	<tr id="note"><td colspan="2"><b id="asterisk">*</b>Must be a number and must be greater than zero(0) and less than <?php print $rows['stock']+1 ?></td></tr>
</table>

<?php 
	}
		}
?>