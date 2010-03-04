<?php
	include 'connection.php';
	include 'sessions.inc';
	
	if(!isset($_SESSION['username']))
		echo "<script>document.location='../logInReg.php'</script>";
		
	else{
		$result3 = mysql_query("SELECT * FROM item where mat_no='{$_REQUEST['delt']}'");
		$rows3 = mysql_fetch_array($result3);
	}
?>

<html>
<head>
<title><?php echo $rows3['desc1'] ?></title>
	<link type="text/css" href="../../themes/base/ui.all.css" rel="stylesheet" />
	<script type="text/javascript" src="../../jquery-1.4.1.js"></script>
	<script type="text/javascript" src="../../external/jquery.bgiframe-2.1.1.js"></script>
	<script type="text/javascript" src="../../ui/jquery.ui.core.js"></script>
	<script type="text/javascript" src="../../ui/jquery.ui.widget.js"></script>
	<script type="text/javascript" src="../../ui/jquery.ui.mouse.js"></script>
	<script type="text/javascript" src="../../ui/jquery.ui.button.js"></script>
	<script type="text/javascript" src="../../ui/jquery.ui.draggable.js"></script>
	<script type="text/javascript" src="../../ui/jquery.ui.position.js"></script>
	<script type="text/javascript" src="../../ui/jquery.ui.resizable.js"></script>
	<script type="text/javascript" src="../../ui/jquery.ui.dialog.js"></script>
	<script type="text/javascript" src="../../ui/jquery.effects.core.js"></script>
	<link type="text/css" href="../demos.css" rel="stylesheet" />
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

<head>

<body>

<!--<script type="text/javascript" src="assets/js/confirm.php"></script>-->

<form name="view" method="POST">
Spare part: <?php echo $rows3['desc1'] ?>

<div id="users-contain" class="ui-widget">
<table id="users" class="ui-widget ui-widget-content">
		<thead>
			<tr class="ui-widget-header ">
				<th>ID</th>
				<th>Material No.</th>
				<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Decription&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
				<th>Stock</th>
				<th>&nbsp;&nbsp;&nbsp;&nbsp;Bin&nbsp;&nbsp;&nbsp;&nbsp;</th>
				<th>Bun</th>
				<th>Cc</th>
				<th>Type</th>
				<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Machine&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
			</tr>
		</thead>
		<tbody>
		<?php 
			
			echo "<tr>" ;
				echo "<td>" . $rows3['id'] . "</td>";
				echo "<td>" . $rows3['mat_no'] . "</td>";
				echo "<td>" . $rows3['desc1'] . "</td>";
				echo "<td>" . $rows3['stock'] . "</td>";
				echo "<td>" . $rows3['bin'] . "</td>";
				echo "<td>" . $rows3['bun'] . "</td>";
				echo "<td>" . $rows3['cc'] . "</td>";
				echo "<td>" . $rows3['type'] . "</td>";
				echo "<td>" . $rows3['machine'] . "</td>";
			echo "</tr>" ;

		?>
			
		</tbody>
	</table>
	</div>
	
	<?php
	
	if($rows3['stock'] != 0){
				echo "<script>document.location='new_delete_notice_fail.html'</script>";
			}else{
				echo "<script>function show_confirm(){</script>";
				echo "<script>var r=confirm('Are You Sure You want to Delete?');</script>";
				echo "<script>if (r==true){</script>";
					//mysql_query("DELETE FROM item where mat_no='{$rows3['mat_no']}'");
					echo "<script>document.location='new_delete_notice.html'</script>";
				echo "<script>}else{</script>";
				echo "<script>document.location='integrate_list_to_dialog.php'</script>";
			echo "<script>}</script>";
		echo "<script>}</script>";
			}
	?>
</form>
</body>
</html>