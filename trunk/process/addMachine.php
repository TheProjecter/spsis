<?php
	include '../ajax/connection.php';
	include '../ajax/sessions.inc';
	$result = mysql_query("INSERT INTO machine VALUES(NULL, '$_GET[mach]')");
	$ref = $_SERVER['HTTP_REFERER'];
	//header( 'refresh: 0; url='.$ref);
	if($result){
		echo "Successfully Added";
	}

?>