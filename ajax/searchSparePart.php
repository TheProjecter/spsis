<?php
	include "connection.php";
	include "sessions.inc";
	
	if(!isset($_SESSION['username'])) {
		echo "<script type = 'text/javascript'>
				alert('Please log in first.');
				</script>";
		echo "<script>document.location='logInReg.php'</script>";
	}
	else{		
		$result = mysql_query("SELECT * FROM item");
		$rows = mysql_fetch_array($result);
	}
?>

<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<title>Search Spare Part</title>
		<style type="text/css">
			/*margin and padding on body element
			  can introduce errors in determining
			  element position and are not recommended;
			  we turn them off as a foundation for YUI
			  CSS treatments. */
			body {
				margin:0;
				padding:0;
			}
		</style>
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
		<link rel="stylesheet" type="text/css" href="../jquery-ui-1.8rc1.custom/development-bundle/build/fonts/fonts-min.css" />
		<link rel="stylesheet" type="text/css" href="../jquery-ui-1.8rc1.custom/development-bundle/build/autocomplete/assets/skins/sam/autocomplete.css" />
		<script type="text/javascript" src="../jquery-ui-1.8rc1.custom/development-bundle/build/yahoo-dom-event/yahoo-dom-event.js"></script>
		<script type="text/javascript" src="../jquery-ui-1.8rc1.custom/development-bundle/build/animation/animation-min.js"></script>
		<script type="text/javascript" src="../jquery-ui-1.8rc1.custom/development-bundle/build/datasource/datasource-min.js"></script>
		<script type="text/javascript" src="../jquery-ui-1.8rc1.custom/development-bundle/build/autocomplete/autocomplete-min.js"></script>

		<style type="text/css">
			#myAutoComplete {
				width:15em; /* set width here or else widget will expand to fit its container */
				padding-bottom:2em;
			}
		</style>
	</head>

	<body class="yui-skin-sam">
		<form name="new_search" action="viewItem.php" method="post">
		<label for="myInput">Search</label>
		<div id="myAutoComplete">
			
			<input id="myInput" type="text" name="te" />
			<div id="myContainer"></div>
		</div>
			<input type="submit" value="search" />
		<script type="text/javascript" src="ajax/assets/js/query.php"></script>
		<script type="text/javascript">
			YAHOO.example.BasicLocal = function() {
				
				var oDS = new YAHOO.util.LocalDataSource(YAHOO.example.Data.arrayMat);
				// Optional to define fields for single-dimensional array
				oDS.responseSchema = {fields : ["state"]};
				
				// Instantiate the AutoComplete
				var oAC = new YAHOO.widget.AutoComplete("myInput", "myContainer", oDS);
				oAC.prehighlightClassName = "yui-ac-prehighlight";
				oAC.useShadow = true;
				
				return {
					oDS: oDS,
					oAC: oAC
				};
			}();
		</script>
		</form>
	</body>
</html>