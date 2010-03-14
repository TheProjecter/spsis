<?php session_start(); ?>
<html lang="en">
	<head>
		<title>SPSIS Log In Page</title>
		<link type="text/css" href="jquery-ui-1.8rc1.custom/development-bundle/themes/base/ui.all.css" rel="stylesheet" />
		<script type="text/javascript" src="jquery-ui-1.8rc1.custom/development-bundle/jquery-1.4.1.js"></script>
		<script type="text/javascript" src="jquery-ui-1.8rc1.custom/development-bundle/ui/jquery.ui.core.js"></script>
		<script type="text/javascript" src="jquery-ui-1.8rc1.custom/development-bundle/ui/jquery.ui.widget.js"></script>
		<script type="text/javascript" src="jquery-ui-1.8rc1.custom/development-bundle/ui/jquery.ui.accordion.js"></script>
		<script type="text/javascript" src="jquery-ui-1.8rc1.custom/development-bundle/ui/jquery.ui.tabs.js"></script>
		<link type="text/css" href="jquery-ui-1.8rc1.custom/development-bundle/demos/demos.css" rel="stylesheet" />
		<script type="text/javascript" src="scripts/ajax.js"></script>
		<script type="text/javascript">
		$(function() {
			$("#accordion").accordion({
				collapsible: true
			});
		});
		</script>
	</head>
	<body>

		<div id="accordion">
			<h3><a href="#">Not a yet a user? Register here</a></h3>
			<div>
				<p id="msg">
				<?php echo $_SESSION['msg']; 
					$_SESSION['msg']="";
				?></p>
				<form id="formBit" method="post">
					<p><table id="insideFrame">
						<tr>
							<td><h1>REGISTER</h1></td>
						</tr>
						<tr>
							<td>Username<label id="asterisk">*</label></td>
							<td> <input type="text" name="username" id="username" class="required"></td>
							<td>Password<label id="asterisk">**</label></td>
							<td> <input type="password" name="pword" id="pword" class="required"></td>
						</tr>
						<tr>
							<td></td><td></td>
							<td>Re-type Password</td>
							<td> <input type="password" name="pword2" id="pword2" class="required"></td>
						</tr>
						<tr>
							<td>Employee Number</td>
							<td> <input type="text" name="empno" id="empno" class="required"></td>
						</tr>
						<tr>
							<td>First Name<label id="asterisk">*</label></td>
							<td> <input type="text" name="first" id="first" class="required"></td>
							<td>Last Name<label id="asterisk">*</label></td>
							<td><input type="text" name="last" id="last" class="required"></td>
						</tr>
						<tr>
							<td>Middle Name<label id="asterisk">*</label></td>
							<td> <input type="text" name="middle" id="middle"></td>
							<td>Position</td>
							<td> <input type="text" name="pos" id="pos" class="required"></td>
						</tr>
					</table></p>
					<br />
					<p><table id="insideFrame">
						<tr>
							<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
							<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
							<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
							<td><input type="button" value="Register"
								onclick="javascript:registerUser(document.getElementById('formBit'))"></td>
						</tr>
					</table></p>
					<br /><br />
					<p>
						<table id="insideFrame">
							<tr id="note"><td><label id="asterisk">*</label> Must have a minimum length of three (3) characters.</td></tr>
							<tr id="note"><td><label id="asterisk">**</label> Must have a minimum length of five (5) characters.</td></tr>
						</table>
					</p>
				</form>
			</div>
			<h3><a href="#">Log in here</a></h3>
			<div>
				<form name="formBit" action="process/logIn.php" method="post">
					<p><table id="insideFrame">
						<tr>
							<td><h1>LOG IN</h1></td>
						</tr>
						<tr>
							<td>User Type</td>
							<td>
								<select name="type" id="type" class="required">
									<option value="admin">Administrator</option>
									<option value="reg_user">Regular User</option>
								</select>
							</td>
						</tr>
						<tr><td><br/></td></tr>
						<tr><td>Username</td><td> <input type="text" name="username" id="username"></td></tr>
						<tr><td>Password </td><td><input type="password" name="password" id="password"></td></tr>
						<tr>
							<td></td>
							<td id="msg">
								<?php echo $_SESSION['mssg']; 
									$_SESSION['mssg']="";
								?>
							</td>
						</tr>
					</table></p>
					<br />
					<p><table id="insideFrame">
						<tr>
							<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
							<td><input type="submit" name="login" value="Log In"></td>
						</tr>
					</table></p>
				</form>
			</div>
		</div>
	</body>
</html>