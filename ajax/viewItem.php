<html>
	<head>
	<link type="text/css" href="../jquery-ui-1.8rc1.custom/development-bundle/themes/base/ui.all.css" rel="stylesheet" />
	<script type="text/javascript" src="../jquery-ui-1.8rc1.custom/development-bundle/jquery-1.4.1.js"></script>
	<script type="text/javascript" src="../jquery-ui-1.8rc1.custom/development-bundle/external/jquery.bgiframe-2.1.1.js"></script>
	<script type="text/javascript" src="../jquery-ui-1.8rc1.custom/development-bundle/ui/jquery.ui.core.js"></script>
	<script type="text/javascript" src="../jquery-ui-1.8rc1.custom/development-bundle/ui/jquery.ui.widget.js"></script>
	<script type="text/javascript" src="../jquery-ui-1.8rc1.custom/development-bundle/ui/jquery.ui.mouse.js"></script>
	<script type="text/javascript" src="../jquery-ui-1.8rc1.custom/development-bundle/ui/jquery.ui.draggable.js"></script>
	<script type="text/javascript" src="../jquery-ui-1.8rc1.custom/development-bundle/ui/jquery.ui.position.js"></script>
	<script type="text/javascript" src="../jquery-ui-1.8rc1.custom/development-bundle/ui/jquery.ui.resizable.js"></script>
	<script type="text/javascript" src="../jquery-ui-1.8rc1.custom/development-bundle/ui/jquery.ui.dialog.js"></script>
	<script type="text/javascript" src="../jquery-ui-1.8rc1.custom/development-bundle/ui/jquery.effects.core.js"></script>
	<script type="text/javascript" src="../jquery-ui-1.8rc1.custom/development-bundle/ui/jquery.effects.explode.js"></script>
	<script type="text/javascript" src="../jquery-ui-1.8rc1.custom/development-bundle/ui/jquery.effects.highlight.js"></script>
	<link type="text/css" href="../jquery-ui-1.8rc1.custom/development-bundle/demos/demos.css" rel="stylesheet" />
	<script type="text/javascript">
	// increase the default animation speed to exaggerate the effect
	$.fx.speeds._default = 1000;
	$(function() {
		$('.del_dialog').dialog({
			autoOpen: false,
			show: 'explode',
			hide: 'highlight'
		});
		
		$('.deleter').click(function() {
			$('.del_dialog').dialog('open');
			return false;
		});
	});
	</script>
	
	<style type="text/css">
		body { font-size: 62.5%; }
		label, input { display:block; }
		input.text { margin-bottom:12px; width:95%; padding: .4em; }
		fieldset { padding:0; border:0; margin-top:25px; }
		h1 { font-size: 1.2em; margin: .6em 0; }
		div#users-contain { width: 350px; margin: 20px 0; }
		div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
		div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
		.ui-dialog .ui-state-error { padding: .3em; }
		.validateTips { border: 1px solid transparent; padding: 0.3em; }
		
	</style>
	
	</head>
	<form name='delete' action='deleteItem.php' method='post'>
		<div class="del_dialog" title="View Spare Part"></div>
	<table id="users" class="ui-widget ui-widget-content">
		<thead>
			
		</thead>
		<tbody>		
		<?php 
			include "connection.php";
			if(isset($_GET['te'])){
				$temp = $_GET['te'];
				$result = mysql_query("SELECT * FROM item where mat_no='$temp' or desc1='$temp' or machine='$temp'");
		
				$rows = mysql_fetch_array($result);
			}
		
			echo "<tr><td class='ui-widget-header '>ID</td><td>" . $rows['id'] . "</td></tr>";
			echo "<tr><td class='ui-widget-header '>Material No.</td><td>" . $rows['mat_no'] . "</td></tr>";
			echo "<tr><td class='ui-widget-header '>Description</td><td>" . $rows['desc1'] . "</td></tr>";
			echo "<tr><td class='ui-widget-header '>Stock</td><td>" . $rows['stock'] . "</td></tr>";
			echo "<tr><td class='ui-widget-header '>Bin</td><td>" . $rows['bin'] . "</td></tr>";
			echo "<tr><td class='ui-widget-header '>Bun</td><td>" . $rows['bun'] . "</td></tr>";
			echo "<tr><td class='ui-widget-header '>CC</td><td>" . $rows['cc'] . "</td></tr>";
			echo "<tr><td class='ui-widget-header '>Type</td><td>" . $rows['type'] . "</td></tr>";
			echo "<tr><td class='ui-widget-header '>Machine</td><td>" . $rows['machine'] . "</td></tr>";
			echo "<tr><td class='ui-widget-header '>Checker</td><td><input type='text' name='delt' id='delt' value=" . $rows['mat_no'] . " /></td></tr>";
			echo "<tr><td class='ui-widget-header '>Buttons</td><td><input type='submit' value='delete' name='delete' class='deleter' /></td></tr>";			
		?>
		</tbody>
	</table>
	</form>
</html>