<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>
<head><title>Page Title</title>
<script type="text/javascript" src="/path/to/jquery-latest.js"></script> 
<script type="text/javascript" src="/path/to/jquery.tablesorter.js"></script> 
<script type="text/javascript">
$(document).ready(function() 
    { 
        $("#item_table").tablesorter(); 
    } 
); 
    
</script>
</head>
<body>

<style type="text/css">

#jsddm
{	margin: 0;
	padding: 0}

	#jsddm li
	{	float: left;
		list-style: none;
		font: 12px Tahoma, Arial}

	#jsddm li a
	{	display: block;
		background: #324143;
		padding: 5px 12px;
		text-decoration: none;
		border-right: 1px solid white;
		width: 70px;
		color: #EAFFED;
		white-space: nowrap}

	#jsddm li a:hover
	{	background: #24313C}
		
		#jsddm li ul
		{	margin: 0;
			padding: 0;
			position: absolute;
			visibility: hidden;
			border-top: 1px solid white}
		
			#jsddm li ul li
			{	float: none;
				display: inline}
			
			#jsddm li ul li a
			{	width: auto;
				background: #A9C251;
				color: #24313C}
			
			#jsddm li ul li a:hover
			{	background: #8EA344}
</style>

<script src="jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="mo.js">

</script>

<?php

$database="spsis"; 

mysql_connect("localhost", "mentak"); 

@mysql_select_db($database) or die( "Unable to select database"); 

$result = mysql_query( "SELECT * FROM item" );

print "<table border=1>\n";

print "<thead>\n";
print "<tr>\n"; 
print "<th>Id</th>\n"; 
print "<th>Material No.</th>"; 
print "<th>Description</th>"; 
print "<th>Stock</th>"; 
print "<th>Bin</th>";
print "<th>Bun</th>";
print "<th>Cost Center</th>";
print "<th>Type</th>";
print "<th>Machine</th>";
	
print "</tr>";
print "</thead>"; 



print "</table>";
print "<ul id='jsddm'>";

while ($get_info = mysql_fetch_row($result)){ 


foreach ($get_info as $field) {




	print"<li><a href='#'>$field</a>";
		print "<ul>";
			print "<li><a href='view.php'>View</a></li>";
			print "<li><a href='#'>Deposit</a></li>";
			print "<li><a href='#'>Withdraw</a></li>";
		print "</ul>";
	print "</li>";
	


	
	}	print "<br/>";	
//print "\t<td>$field</td>\n";
print "<br/>";	
}


print "</ul>";


?>

    
</body>
</html> 
