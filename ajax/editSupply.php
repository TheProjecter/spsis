<table id="usersDialog" class="ui-widget ui-widget-content">
<thead>
	
</thead>
<tbody>		
<?php 
	include "connection.php";
	
	$matno="";
	$desc1="";
	$stock=0;
	$bin="";
	$bun="";
	$cc="";
	$type=0;
	$machine="";
	
	if(isset($_GET['te'])){
		$temp = $_GET['te'];
		$result = mysql_query("SELECT * FROM item where matno='$temp'");

		$rows = mysql_fetch_array($result);
	}

	echo "<tr><td class='ui-widget-header '>Material No.</td><td>" . $rows['matno'] . "</td></tr>";
	echo "<tr><td class='ui-widget-header '>Description</td><td><input type='text' name='item_desc1' id='desc1_item' value='" . $rows['desc1'] . "'></td></tr>";
	echo "<tr><td class='ui-widget-header '>Stock</td><td><input type='text' name='item_stock' id='stock_item' value='" . $rows['stock'] . "'></td></tr>";
	echo "<tr><td class='ui-widget-header '>Bin</td><td><input type='text' name='item_bin' id='bin_item' value='" . $rows['bin'] . "'></td></tr>";
	echo "<tr><td class='ui-widget-header '>Bun</td><td><input type='text' name='item_bun' id='bun_item' value='" . $rows['bun'] . "'></td></tr>";
	echo "<tr><td class='ui-widget-header '>CC</td><td><input type='text' name='item_cc' id='cc_item' value='" . $rows['cc'] . "'></td></tr>";
	echo "<tr><td class='ui-widget-header '>Type</td><td><input type='text' name='item_type' id='type_item' value='" . $rows['type'] . "'></td></tr>";
	if ($rows['type']==1) {
		$id = $rows['machine'];
		$query = mysql_query("SELECT * FROM machine WHERE id='$id'");
		$name = mysql_fetch_array($query);		
		echo "<tr><td class='ui-widget-header '>Machine</td><td><input type='text' name='item_machine' id='machine_item' value='" . $name['name'] . "'></td></tr>";
	}
	else echo "<tr><td class='ui-widget-header '>Machine</td><td><input type='text' name='item_machine' id='machine_item' value='0'></td></tr>";
	
	

echo "</tbody>";
echo "</table>";
echo "<input type='hidden' name='item_edit1' id='edit1' value=" . $rows['matno'] . ">";
//echo "<input type='submit' value='edit' name='edit' onclick='editprocess(\"" . $rows['matno'] . "\",\"".$rows['desc1'] ."\",".$rows['stock'] .",\"". $rows['bin'] ."\",\"" . $rows['bun'] . "\",\"" . $rows['cc'] ."\"," . $rows['type'] .",\"" . $rows['machine'] ."\");' class='ui-state-default ui-corner-all' >";
echo "<div id='dialogSmaller'><input type='submit' value='Save' name='edit' onclick='editprocess();' class='ui-state-default ui-corner-all' ></div>";

?>