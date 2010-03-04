<?php
	
?>
<span id="bitPageTitle">Add Spare Part/Supply</span>
<form id="formBit" onreset="return confirm('Are you sure you want to clear the content of the page?')">
	<p>
		<table width="100%">
			<tr>
				<td>Item Type</td>
				<td>
					<select name="itemType" id="itemType" class="required">
						<option value="Select">Select</option>
						<option value="SparePart">Spare Part</option>
						<option value="Supply">Supply</option>
					</select>
				</td>
			</tr>
			<!--Lalabas dapat na choices ay yung mga machines available na sa database-->
			<tr>
				<td>Machine</td>
			</tr>
			<tr>
				<td>Material No.</td>
				<td><input type="text" name="matno" class="required"/></td>
				<td>Bin</td>
				<td><input type="text" name="bin" class="required"/></td>
			</tr>
			<tr>
				<td>Description</td>
				<td><input type="text" name="desc" class="required"/></td>
				<td>Bundle</td>
				<td><input type="text" name="bun" class="required"/></td>
			</tr>
			<tr>
				<td>Stock</td>
				<td><input type="text" name="stock" class="number required"/></td>
				<td>Cost center</td>
				<td><input type="text" name="cc" class="required"/></td>
			</tr>
		</table>
	</p>
	<br /><br />
	<p>
		<table width="50%">
			<tr>
				<td><input type="reset" /></td>
				<td>&nbsp;</td>
				<td><input type="button" value="Submit" 
					onclick="javascript:addItemSubmit(document.getElementById('formBit'))"/></td>
			</tr>
		</table>
	</p>
</form>
<script type="text/javascript" src="scripts/ajax.js"></script> 