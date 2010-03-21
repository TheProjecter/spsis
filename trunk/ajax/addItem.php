<?php
	include 'connection.php';
	include 'sessions.inc';
	
	if(isset($_SESSION['username'])){
		$query = "SELECT name FROM machine";
		$result = mysql_query($query);
		$num = mysql_num_rows($result);
	}
	else {
		echo "<script type = 'text/javascript'>
				alert('Please log in first.');
				</script>";
		echo "<script>document.location='../logInReg.php'</script>";
	}
?>
<p><span id="bitPageTitle">Add Spare Part/Supply</span></p>
&nbsp;
<form id="formBit" onreset="return confirm('Are you sure you want to clear the content of the page?')"
	method="post">
	<p><div name="main">
		<table id="insideFrame">
			<tr>
				<td>Item Type</td>
				<td  colspan="2">
					<input type="radio" id="itemType" name="itemType" value="1" class="required" 
					onclick="javascript:enableButton(document.getElementById('formBit'))"/>Spare Part
				</td>
			</tr>
			<tr>
				<td></td>
				<td  colspan="2">
					<input type="radio" id="itemType" name="itemType" value="0" class="required"
					onclick="javascript:disableButton(document.getElementById('formBit'))"/>Supply
				</td>
			</tr>
			<tr>
				<td>Machine</td>
				<td>
					<select name="mach" id="machineName">
						<option value=""></option>
						<?php
							while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
								echo "<option value='" . $row['name'] . "'>";
								echo $row['name'] . "</option>";
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Material No.</td>
				<td><input type="text" maxlength="10" id="matno" name="matno" class="letter number required"/></td>
				<td>Bin</td>
				<td><input type="text" maxlength="10" id="bin" name="bin" class="letter number dash required"/></td>
			</tr>
			<tr>
				<td>Description</td>
				<td><input type="text" maxlength="50" id="desc1" name="desc1" class="required"/></td>
				<td>Bundle</td>
				<td><input type="text" maxlength="10" id="bun" name="bun" class="letter required"/></td>
			</tr>
			<tr>
				<td>Stock</td>
				<td><input type="text" maxlength="11" id="stock" name="stock" class="number required"/></td>
				<td>Cost center</td>
				<td><input type="text" maxlength="10" id="cc" name="cc" class="letter"/></td>
			</tr>
		</table>
	</div></p>
	<br /><br />
	<p>
		<table id="insideFrame">
			<tr>
				<td><input type="reset" /></td>
				<td>&nbsp;</td>
				<td><input type="button" value="Submit" 
					onclick="javascript:processAddItem(document.getElementById('formBit'))"/></td>
			</tr>
		</table>
	</p>
</form>
<script type="text/javascript" src="scripts/ajax.js"></script>