<script type="text/javascript">
	$(function() {
		$("#radiot0").buttonset();
		$("#radiot1").buttonset();
	});

	$(document).ready(function(){ 
		$("#users").tablesorter( {sortList: [[0,0], [1,0]]} ); 
	}); 
</script>


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
		$result = mysql_query("SELECT * FROM item where matno='$temp' or desc1='$temp' or machine='$temp'");

		$rows = mysql_fetch_array($result);
		$c_machine = mysql_query("SELECT * FROM machine ");
		$n_machine = mysql_num_rows($c_machine);
		$n=0;
	
		if($rows['type']==1){
			$type="Spare Part";
		}
		else if($rows['type']==0){
			$type="Supply";
		}
		else{
			$type="Invalid type";
		}
	}
	echo "<tr><td class='ui-widget-header '>Material No.</td><td>" . $rows['matno'] . "</td></tr>";
	echo "<tr><td class='ui-widget-header '>Description</td><td><input type='text' name='item_desc1' id='desc1_item' value='" . $rows['desc1'] . "'></td></tr>";
	echo "<tr><td class='ui-widget-header '>Stock</td><td>" . $rows['stock'] . "</td></tr>";
	echo "<tr><td class='ui-widget-header '>Bin</td><td><input type='text' name='item_bin' id='bin_item' value='" . $rows['bin'] . "'></td></tr>";
	echo "<tr><td class='ui-widget-header '>Bun</td><td><input type='text' name='item_bun' id='bun_item' value='" . $rows['bun'] . "'></td></tr>";
	echo "<tr><td class='ui-widget-header '>CC</td><td><input type='text' name='item_cc' id='cc_item' value='" . $rows['cc'] . "'></td></tr>";
	echo "<tr><td class='ui-widget-header '>Type</td><td>" . $type . "</td></tr>";
	echo "<tr><td class='ui-widget-header '>Machine</td><td>
			
				<select>";
				while($rows_machine=mysql_fetch_array($c_machine)){
					echo "<option id='opt$n' value='".$rows_machine['id']."'>".$rows_machine['name']."</option>";
				  $n++;
				  }
				echo "</select>";	
			echo "</td></tr>";

echo "</tbody>";
echo "</table>";
echo "<input type='hidden' name='item_edit1' id='edit1' value=" . $rows['matno'] . ">";
echo "<div id='dialogSmaller'><input type='submit' value='Save' name='edit' onclick='editprocess();' class='ui-state-default ui-corner-all' ></div>";

?>
