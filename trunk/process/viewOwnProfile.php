<?php
	include '../ajax/connection.php';
	include '../ajax/sessions.inc';
	
	if(isset($_SESSION['username'])){
		$uname = $_SESSION['username'];
		if($_SESSION['type']=='admin')
			$query = "SELECT * FROM admin WHERE username='$uname'";
		else
			$query = "SELECT * FROM reg_user WHERE username='$uname'";
		
		$result = mysql_query($query);
		$num = mysql_num_rows($result);
		
		while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
			$username = $row['username'];
			$password = $row['password'];
			$empno = $row['empno'];
			$first =  $row['first'];
			$middle =  $row['middle'];
			$last =  $row['last'];
			$position =  $row['position'];
		}
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
				password= $("#password"),
				retype= $("#retype"),
				allFields = $([]).add(first).add(middle).add(last).add(position).add(password).add(retype),
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
			
			function isEqual(o,n){
				if(o.val()!=n.val()){
					o.addClass('ui-state-error');
					n.addClass('ui-state-error');
					updateTips("Password Mismatch");
					return false;
				}
				return true;
			}
			
			$("#dialog-form").dialog({
				autoOpen: false,
				height: 400,
				width: 350,
				modal: true,
				buttons: {
					'Edit Account': function() {
						var bValid = true;
						allFields.removeClass('ui-state-error');
						bValid = bValid && checkLength(first,"First Name",3,30);
						bValid = bValid && checkLength(last,"Last Name",3,30);
						bValid = bValid && checkLength(position,"Position",3,20);
						bValid = bValid && checkLength(password,"Password",3,20);
						bValid = bValid && isEqual(password,retype);
						
						if (bValid) {
							var f = first.val();
							var m = middle.val();
							var l = last.val();
							var p = position.val();
							var pw = password.val();
							var url = "process/editAcct.php?first="+f+"&middle="+m+"&last="+l+"&position="+p+"&password="+pw;
							window.location = url;
							//$("#editAcctResult").load(url);
							//$(this).dialog('close');
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
	<p class="validateTips">* indicates required field.</p>
		<form name = "form1" action = "../process/editAcct.php" method="post">	
			<label for="password"><b>Password*</b></label>
			<input type="password" name ="password" id = "password" class="text ui-widget-content ui-corner-all" value =  "<?php echo $password ?>"/>
			<label for="retype"><b>Retype Password*</b></label>
			<input type="password" name ="retype" id = "retype" class="text ui-widget-content ui-corner-all" value =  "<?php echo $password ?>"/>
			<label for="first"><b>First Name*</b></label>
			<input type="text" name="first" id="first" class="text ui-widget-content ui-corner-all" value =  "<?php echo $first ?>"/>
			<label for="middle"><b>Middle Name</b></label>
			<input type="text" name="middle" id="middle" class="text ui-widget-content ui-corner-all" value =  "<?php echo $middle ?>"/>
			<label for="last"><b>Last Name*</b></label>
			<input type="text" name="last" id="last" class="text ui-widget-content ui-corner-all" value =  "<?php echo $last ?>"/>
			<label for="position"><b>Position*</b></label>
			<input type="text" name="position" id="position" class="text ui-widget-content ui-corner-all" value =  "<?php echo $position ?>"/>
		</form>
	</div>
		<p>
			<span id='bitPageTitle'>My Account</span>
		</p>
		<br />
			<p><table id='insideFrameHalf'>
			<?php
				
					echo "<tr>";
					echo"<td>Name</td><td>".$first." ".$middle." ".$last."</td>";
					echo"</tr>";
					echo"<tr>";
					echo"<td>Username</td><td>".$username."</td>";
					echo"</tr>";
					/*echo"<tr>";
					echo"<td>Password</td><td>".$password."</td>";
					echo"</tr>";*/
					echo"<tr>";
					echo"<td>Employee Number</td><td>".$empno."</td>";
					echo"</tr>";
					echo"<tr>";
					echo"<td>Position</td><td>".$position."</td>";
					echo"</tr>";
				
			?>
			</table>
			<br /><br />
			<p>
				<table id="insideFrameHalf">
					<tr><td><button id="edit-acct">Edit Account</button></td></tr>
				</table>
			</p>
			<div id="editAcctResult"></div>
	</div>
	</body>
	
</form>