<?php 

	include '../ajax/connection.php';
	include '../ajax/sessions.inc';
	
	$_SESSION['un']=$_GET[uname];
	$_SESSION['pw1']=$_GET[pass1];
	$_SESSION['pw2']=$_GET[pass2];
	$_SESSION['en']=$_GET[emp];
	$_SESSION['fn']=$_GET[f];
	$_SESSION['mn']=$_GET[m];
	$_SESSION['ln']=$_GET[l];
	$_SESSION['po']=$_GET[pos];
	//$result = mysql_query("SELECT * FROM reg_user");
	
	$result2 = mysql_query("SELECT * FROM reg_user WHERE empno LIKE '$_GET[emp]'");
	$result = mysql_query("SELECT * FROM reg_user WHERE username LIKE '$_GET[uname]'");
	$ok=1;
	
	if(strlen($_GET[uname])<3||strlen($_GET[uname])>20){
		$ok=0;
		$_SESSION['unmsg']= "Username length invalid<br>";
			header('Location: ../logInReg.php');
			
	}
	if(strlen($_GET[pass1])<5||strlen($_GET[pass1])>20){
		$ok=0;
		$_SESSION['p1msg']= "Password length invalid<br>";
			header('Location: ../logInReg.php');
	}
	if(strlen($_GET[pass2])<3||strlen($_GET[pass2])>20){
		$ok=0;
		$_SESSION['p2msg']= "Re-enter password length invalid<br>";
			header('Location: ../logInReg.php');
	}
	if(strlen($_GET[emp])<11||strlen($_GET[emp])>11){
		$ok=0;
		$_SESSION['enmsg']= "Employee number length invalid<br>";
			header('Location: ../logInReg.php');
	}
	if(strlen($_GET[f])<3||strlen($_GET[f])>30){
		$ok=0;
		$_SESSION['fmsg']= "First name length invalid<br>";
			header('Location: ../logInReg.php');
	}
	if(strlen($_GET[l])<3||strlen($_GET[l])>30){
		$ok=0;
		$_SESSION['lmsg']= "Lastname length invalid<br>";
			header('Location: ../logInReg.php');
	}
	if(strlen($_GET[pos])<3||strlen($_GET[pos])>20){
		$ok=0;
		$_SESSION['pmsg']= "Position length invalid<br>";
			header('Location: ../logInReg.php');
	}
	if($_GET[pass1]!=$_GET[pass2]){
		$ok=0;
		$_SESSION['msg']= "Password Mismatch";
			header('Location: ../logInReg.php');
	}
	
	if($ok==1){
	if(mysql_fetch_array($result)!=null){
		if(mysql_fetch_array($result2)!=null){
			$_SESSION['msg']= "Username  and Employee number already exists";
			header('Location: ../logInReg.php');
		}else{
			$_SESSION['msg']= "Username already exists";
			header('Location: ../logInReg.php');
		}
	}
	else if(mysql_fetch_array($result2)!=null){
		
		$_SESSION['msg']= "Employee number already exists";
		header('Location: ../logInReg.php');
	}
		
	else{
	$result = mysql_query("INSERT INTO reg_user VALUES (NULL, '$_GET[uname]', '$_GET[pass1]', '$_GET[emp]', '$_GET[f]', '$_GET[m]', '$_GET[l]', '$_GET[pos]',0)");
	$_SESSION['un']="";
	$_SESSION['pw1']="";
	$_SESSION['pw2']="";
	$_SESSION['en']="";
	$_SESSION['fn']="";
	$_SESSION['mn']="";
	$_SESSION['ln']="";
	$_SESSION['po']="";
	if ($result) {
		$_SESSION['msg']= "REGISTRATION SUCCESSFUL";
	}
	else {
		$_SESSION['msg']= "REGISTRATION FAILED";
		
		echo mysql_error();
	}
	
	}}
	mysql_close($con);
	
	header('Location: ../logInReg.php');
	
	
?>
