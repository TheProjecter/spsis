<?php
	include 'connection.php';
	include 'sessions.inc';
	
	if(isset($_SESSION['username'])){
		$uname = $_SESSION['username'];
		if($_SESSION['type']=='admin')
			$query = "SELECT * FROM admin WHERE username='$uname'";
		else
			$query = "SELECT * FROM reg_user WHERE username='$uname'";
		
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
<html>
	<head>
		<title>Spare Parts and Supplies Inventory System</title>
		<link type="text/css" href="jquery-ui-1.8rc1.custom/development-bundle/themes/base/ui.all.css" rel="stylesheet" />
		<script type="text/javascript" src="jquery-ui-1.8rc1.custom/development-bundle/jquery-1.4.1.js"></script>
		<script type="text/javascript" src="jquery-ui-1.8rc1.custom/development-bundle/external/jquery.bgiframe-2.1.1.js"></script>
		<script type="text/javascript" src="jquery-ui-1.8rc1.custom/development-bundle/ui/jquery.ui.core.js"></script>
		<script type="text/javascript" src="jquery-ui-1.8rc1.custom/development-bundle/ui/jquery.ui.widget.js"></script>
		<script type="text/javascript" src="jquery-ui-1.8rc1.custom/development-bundle/ui/jquery.ui.mouse.js"></script>
		<script type="text/javascript" src="jquery-ui-1.8rc1.custom/development-bundle/ui/jquery.ui.button.js"></script>
		<script type="text/javascript" src="jquery-ui-1.8rc1.custom/development-bundle/ui/jquery.ui.draggable.js"></script>
		<script type="text/javascript" src="jquery-ui-1.8rc1.custom/development-bundle/ui/jquery.ui.position.js"></script>
		<script type="text/javascript" src="jquery-ui-1.8rc1.custom/development-bundle/ui/jquery.ui.resizable.js"></script>
		<script type="text/javascript" src="jquery-ui-1.8rc1.custom/development-bundle/ui/jquery.ui.dialog.js"></script>
		<script type="text/javascript" src="jquery-ui-1.8rc1.custom/development-bundle/ui/jquery.effects.core.js"></script>
		<link type="text/css" href="jquery-ui-1.8rc1.custom/development-bundle/demos/demos.css" rel="stylesheet" />
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
		<script type="text/javascript">
		$(function() {
			// a workaround for a flaw in the demo system (http://dev.jqueryui.com/ticket/4375), ignore!
			$("#dialog").dialog("destroy");
			
			var first= $("#first"),
				middle= $("#middle"),
				last= $("#last"),
				position= $("#position"),
				allFields = $([]).add(first).add(middle).add(last).add(position),
				tips = $(".validateTips");

			function updateTips(t) {
				tips
					.text(t)
					.addClass('ui-state-highlight');
				setTimeout(function() {
					tips.removeClass('ui-state-highlight', 1500);
				}, 500);
			}

			function checkLength(o,n,min,max) {

				if ( o.val().length > max || o.val().length < min ) {
					o.addClass('ui-state-error');
					updateTips("Length of " + n + " must be between "+min+" and "+max+".");
					return false;
				} else {
					return true;
				}

			}
			
			$("#dialog-form").dialog({
				autoOpen: false,
				height: 300,
				width: 350,
				modal: true,
				buttons: {
					'Edit Account': function() {
						var bValid = true;
						allFields.removeClass('ui-state-error');

						bValid = bValid && checkLength(first,"First Name",1,30);
						//bValid = bValid && checkLength(middle,"middle",1,30);
						bValid = bValid && checkLength(last,"Last Name",1,30);
						bValid = bValid && checkLength(position,"Position",1,20);

						/*bValid = bValid && checkRegexp(name,/^[a-z]([0-9a-z_])+$/i,"Username may consist of a-z, 0-9, underscores, begin with a letter.");
						// From jquery.validate.js (by joern), contributed by Scott Gonzalez: http://projects.scottsplayground.com/email_address_validation/
						bValid = bValid && checkRegexp(name,/^[a-z]([0-9a-z_])/i,"Username may consist of a-z, 0-9, underscores, begin with a letter.");
						bValid = bValid && checkRegexp(password,/^([0-9a-zA-Z])+$/,"Password field only allow : a-z 0-9");
						bValid = bValid && checkRegexp(empno,/^([0-9])/,"Password field only allow : a-z 0-9");
						bValid = bValid && checkRegexp(pos,/^([a-zA-Z])/,"Password field only allow : a-z");
						*/
						if (bValid) {
							var f = first.val();
							var m = middle.val();
							var l = last.val();
							var p = position.val();
							var url = "process/editAcct.php?first="+f+"&middle="+m+"&last="+l+"&position="+p;
							window.location = url;
						}
					},
					Cancel: function() {
						$(this).dialog('close');
					}
				},
				close: function() {
					allFields.val('').removeClass('ui-state-error');
				}
			});

			$("#edit-acct")
				.button()
				.click(function() {
					$("#dialog-form").dialog('open');
				});
		});
		</script>
	</head>
	<body>
	<div class = "demo">
	<div id = "dialog-form" title = "Edit Account">
	<p class="validateTips">All form fields are required.</p>
		<form name = "form1" action = "../process/editAcct.php" method="post">	
			<label for="first">First Name</label>
			<input type="text" name="first" id="first" class="text ui-widget-content ui-corner-all" />
			<label for="middle">Middle Name</label>
			<input type="text" name="middle" id="middle" class="text ui-widget-content ui-corner-all" />
			<label for="last">Last Name</label>
			<input type="text" name="last" id="last" class="text ui-widget-content ui-corner-all" />
			<label for="position">Position</label>
			<input type="text" name="position" id="position" class="text ui-widget-content ui-corner-all" />
		</form>
	</div>
		<p>
			<span id='bitPageTitle'>My Account</span>
		</p>
		<br />
			<p><table id='insideFrameHalf'>
			<?php
				while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
					echo "<tr>";
					echo"<td>Name</td><td> {$row['first']} {$row['middle']} {$row['last']}</td>";
					echo"</tr>";
					echo"<tr>";
					echo"<td>Username</td><td> {$row['username']}</td>";
					echo"</tr>";
					echo"<tr>";
					echo"<td>Password</td><td> {$row['password']}</td>";
					echo"</tr>";
					echo"<tr>";
					echo"<td>Employee Number</td><td> {$row['empno']}</td>";
					echo"</tr>";
					echo"<tr>";
					echo"<td>Position</td><td> {$row['position']}</td>";
					echo"</tr>";
				}
			?>
			</table>
			<br /><br />
			<p>
				<table id="insideFrameHalf">
					<tr><td><button id="edit-acct">Edit Account</button></td></tr>
				</table>
			</p>
	</div>
	</body>
	
</form>