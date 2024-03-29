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
		<link type="text/css" href="jquery-ui-1.8rc1.custom/development-bundle/demos.css" rel="stylesheet" />
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
		<div id="accordion" align="center">
			<h3 align="left"><a href="#">Not a yet a user? Register here</a></h3>
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
							<td> <input type="text" maxlength="20" name="username" id="username" class="letter number underscore required" value=<?php echo "'".$_SESSION['un']."'";
							$_SESSION['un']="";
							?>></td>
							<td>
							<p id="msg"><?php echo $_SESSION['unmsg']; 
							$_SESSION['unmsg']="";
							?></p></td>
						</tr>
						<tr>
							<td>Password<label id="asterisk">**</label></td>
							<td> <input type="password" maxlength="20" name="pword" id="pword" class="letter number required" value=<?php echo "'".$_SESSION['pw1']."'";
							$_SESSION['pw1']="";
							?>></td>
							<td>
							<p id="msg"><?php echo $_SESSION['p1msg']; 
							$_SESSION['p1msg']="";
							?></p></td>
						</tr>
						<tr>
							
							<td>Re-type Password<label id="asterisk">**</label></td>
							<td> <input type="password" maxlength="20" name="pword2" id="pword2" class="letter number required" value=<?php echo "'".$_SESSION['pw2']."'";
							$_SESSION['pw2']="";
							?>></td>
							<td>
							<p id="msg"><?php echo $_SESSION['p2msg']; 
							$_SESSION['p2msg']="";
							?></p></td>
						</tr>
						<tr>
							<td>Employee Number<label id="asterisk">***</label></td>
							<td> <input type="text" maxlength="11" name="empno" id="empno" class="number required" value=<?php echo "'".$_SESSION['en']."'";
							$_SESSION['en']="";
							?>></td>
							<td>
							<p id="msg"><?php echo $_SESSION['enmsg']; 
							$_SESSION['enmsg']="";
							?></p></td>
						</tr>
						<tr>
							<td>First Name<label id="asterisk">*</label></td>
							<td> <input type="text" maxlength="30" name="first" id="first" class="letter required" value=<?php echo "'".$_SESSION['fn']."'";
							$_SESSION['fn']="";
							?>></td>
							<td>
							<p id="msg"><?php echo $_SESSION['fmsg']; 
							$_SESSION['fmsg']="";
							?></p></td>
						</tr>
						<tr>	
							<td>Last Name<label id="asterisk">*</label></td>
							<td><input type="text" maxlength="30" name="last" id="last" class="letter required" value=<?php echo "'".$_SESSION['ln']."'";
							$_SESSION['ln']="";
							?>></td>
							<td>
							<p id="msg"><?php echo $_SESSION['lmsg']; 
							$_SESSION['lmsg']="";
							?></p></td>
						</tr>
						<tr>
							<td>Middle Name</td>
							<td> <input type="text" maxlength="30" name="middle" id="middle" class="letter" value=<?php echo "'".$_SESSION['mn']."'";
							$_SESSION['mn']="";
							?>></td>
						</tr>
						<tr>
							<td>Position<label id="asterisk">*</label></td>
							<td> <input type="text" maxlength="20" name="pos" id="pos" class="letter required" value=<?php echo "'".$_SESSION['po']."'";
							$_SESSION['po']="";
							?>></td>
							<td>
							<p id="msg"><?php echo $_SESSION['pmsg']; 
							$_SESSION['pmsg']="";
							?></p></td>
						</tr>
					</table></p>
					<br />
					<p><table id="insideFrame">
						<tr>
							<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
							<td><input type="button" value="Register"
								onclick="javascript:registerUser(document.getElementById('formBit'))"></td>
						</tr>
					</table></p>
					<br /><br />
					<p>
						<table id="insideFrame">
							<tr id="note"><td><label id="asterisk">*</label> Must have a minimum length of three (3) characters.</td></tr>
							<tr id="note"><td><label id="asterisk">**</label> Must have a minimum length of five (5) characters.</td></tr>
							<tr id="note"><td><label id="asterisk">***</label> Must have a length of eleven (11) characters.</td></tr>
						</table>
					</p>
				</form>
			</div>
			<h3 align="left"><a href="#">Log in here</a></h3>
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