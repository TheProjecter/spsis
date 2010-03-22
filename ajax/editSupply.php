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
	$type="";
	$machine="";
	
	if(isset($_GET['te'])){
		$temp = $_GET['te'];
		$result = mysql_query("SELECT * FROM item where matno='$temp'");

		$rows = mysql_fetch_array($result);
	}
	if ($rows['type']==1) $type="Spare Part";
	else $type="Supply";
	
	echo "<tr><td class='ui-widget-header '>Material No.</td><td>" . $rows['matno'] . "</td></tr>";
	echo "<tr><td class='ui-widget-header '>Description</td><td><input type='text' maxlength='50' name='item_desc1' id='desc1_item' value='" . $rows['desc1'] . "' class='required'></td></tr>";
	echo "<tr><td class='ui-widget-header '>Stock</td><td>" . $rows['stock'] . "</td></tr>";
	echo "<tr><td class='ui-widget-header '>Bin</td><td><input type='text' maxlength='10' name='item_bin' id='bin_item' value='" . $rows['bin'] . "' class='letter number dash required'></td></tr>";
	echo "<tr><td class='ui-widget-header '>Bundle</td><td><input type='text' maxlength='10' name='item_bun' id='bun_item' value='" . $rows['bun'] . "' class='letter required'></td></tr>";
	echo "<tr><td class='ui-widget-header '>Cost Center</td><td><input type='text' maxlength='10' name='item_cc' id='cc_item' value='" . $rows['cc'] . "' class='letter'></td></tr>";
	echo "<tr><td class='ui-widget-header '>Type</td><td>" . $type . "</td></tr>";
	

echo "</tbody>";
echo "</table>";
echo "<input type='hidden' name='item_edit1' id='edit1' value=" . $rows['matno'] . ">";
?>
