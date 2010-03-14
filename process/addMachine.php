<?php
	include '../ajax/connection.php';
	include '../ajax/sessions.inc';
	$result = mysql_query("INSERT INTO machine VALUES(NULL, '$_GET[mach]')");
	$ref = $_SERVER['HTTP_REFERER'];
	
	
	//header( 'refresh: 1; url='.$ref);

?>