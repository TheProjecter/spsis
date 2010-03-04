<?php
	function check_auth($username,$password,$type){
		if($type == admin)
			$query = "SELECT * FROM admin WHERE username='$username'";
		else
			$query = "SELECT * FROM reg_user WHERE username='$username'";
		$result = mysql_query($query);
		while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
			if($password == $row['password'])
				return true;
			return false;
		}		
	}
?>
<?php
	include '../ajax/connection.php';
	include '../ajax/sessions.inc';

	if (isset($_REQUEST['login']) && ($_REQUEST['login'] == 'Log In') &&($uid= check_auth($_REQUEST['username'], $_REQUEST['password'], $_REQUEST['type']))){
		$_SESSION['username'] = $_REQUEST['username'];
		$_SESSION['type'] = $_REQUEST['type'];
		if($_REQUEST['type']=='admin')
			header('Location: ../mainForAdmin.php');
		else
			header('Location: ../mainForRegUser.php');
	}
	else {
		$_SESSION['mssg']="Incorrect username/password";
		header('Location: ../logInReg.php');
	}
?>