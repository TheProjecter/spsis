<?php 
	include 'connection.php';
	include 'sessions.inc';
	
	if(!isset($_SESSION['username'])){
		echo "<script type = 'text/javascript'>
				alert('Please log in first.');
				</script>";
		echo "<script>document.location='../logInReg.php'</script>";
	}
?>

<p><span id="bitPageTitle">Edit My Account</span></p>
&nbsp;
<form name="formBit" method="post">
	<br />
	<?php echo $_SESSION['notice'];
		$_SESSION['notice']="";
	?>
	<p><table id="insideFrame">
		<tr>
			<td>Username</td>
			<td> <?php echo $_SESSION['username'] ?></td>
			<td>Password</td>
			<td> <input type="password" name="pword" id="pword" class="required"></td>
		</tr>
		<tr>
			<td></td><td></td>
			<td>Re-type Password</td>
			<td> <input type="password" name="pword2" id="pword2" class="required"></td>
		</tr>
		<tr>
			<td>Employee #</td>
			<td> <input type="text" name="empno" id="empno" class="required"></td>
		</tr>
		<tr>
			<td>First Name</td>
			<td> <input type="text" name="first" id="first" class="required"></td>
			<td>Last Name</td>
			<td><input type="text" name="last" id="last" class="required"></td>
		</tr>
		<tr>
			<td>Middle Name</td>
			<td> <input type="text" name="middle" id="middle"></td>
			<td>Position</td>
			<td> <input type="text" name="pos" id="pos" class="required"></td>
		</tr>
	</table></p>
	<br />
	<p><table id="insideFrame">
		<tr>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td><input type="button" value="Save"
				onclick="javascript:processEditAcct(document.getElementById('formBit'))"></td>
		</tr>
	</table></p>
</form>