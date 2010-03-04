YAHOO.example.Data = {

arrayStates: [
    
	'<?php
		session_start();  
		if(!isset($_SESSION[''user'']))
			echo '<script>document.location="new_home.html"</script>';
		
		else{
	
			$link = mysql_connect("localhost", "root", " ");		
			mysql_select_db("spsis", $link);
		
			$result = mysql_query("SELECT * FROM reg_user where username=''{$_SESSION[''user'']}''");
			$rows = mysql_fetch_array($result);
			$result2 = mysql_query("SELECT * FROM item");
		}
	?>'
]

};
