<?php 
	include 'connection.php';
	include 'sessions.inc';
	
	if(!isset($_SESSION['username'])){
		echo "<script type = 'text/javascript'>
				alert('Please log in first.');
				</script>";
		echo "<script>document.location='../logInReg.php'</script>";
	}
	else {
?>
<table id="usersDialog" class="ui-widget ui-widget-content">
	<thead>
		
	</thead>
	<tbody>

<?php 
	if(isset($_GET['te'])){
		$uname = $_SESSION['username'];
		if($_SESSION['type']=='admin')
			$query = "SELECT * FROM admin WHERE username='$uname'";
		else
			$query = "SELECT * FROM reg_user WHERE username='$uname'";
		$rows = mysql_fetch_array($query);
		echo "<tr><td class='ui-widget-header '>Username</td><td><input type='text' maxlength='20' name='username' id='username' class='letter number underscore required' value='" . $rows['username'] . "'/></td></tr>";
		echo "<tr><td class='ui-widget-header '>Password</td><td><input type='password' maxlength='20' name='pass1' id='pass1' value='" . $rows['password'] . "' class='letter number required'></td></tr>";
		echo "<tr><td class='ui-widget-header '>Password</td><td><input type='password' maxlength='20' name='pass2' id='pass2' value='" . $rows['password'] . "' class='letter number required'></td></tr>";
		echo "<tr><td class='ui-widget-header '>Employee Number</td><td><input type='text' maxlength='11' name='empno' id='empno' value='" . $rows['empno'] . "' class='number required'></td></tr>";
		echo "<tr><td class='ui-widget-header '>First Name</td><td><input type='text' maxlength='30' name='fname' id='fname' value='" . $rows['first'] . "' class='letter required'></td></tr>";
		echo "<tr><td class='ui-widget-header '>Middle Name</td><td><input type='text' maxlength='30' name='mname' id='mname' value='" . $rows['middle'] . "' class='letter'></td></tr>";
		echo "<tr><td class='ui-widget-header '>Last Name</td><td><input type='text' maxlength='30' name='lname' id='lname' value='" . $rows['last'] . "' class='letter required'></td></tr>";
		echo "<tr><td class='ui-widget-header '>Position</td><td><input type='text' maxlength='20' name='pos' id='pos' value='" . $rows['position'] . "' class='letter required'></td></tr>";
		echo "<input type='hidden' id='prim' value='" . $rows['id'] . "'>";
	}

} ?>