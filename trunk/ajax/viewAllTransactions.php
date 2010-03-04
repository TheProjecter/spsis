<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>
	<head>
		<title>Page Title</title>
		
	<script type="text/javascript" src="../scripts/ajax.js"></script>

		<link type="text/css" href="../jquery-ui-1.8rc1.custom/development-bundle/demos/demos_class.css" rel="stylesheet" />		
	</head>
	<body>
		<script src="../scripts/jquery.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="../scripts/dropdown.js">
	</script>

<?php
	include 'connection.php';
	
	$result = mysql_query( "SELECT * FROM transaction" );
	

?>
<table border=1 cellspacing=1>

<thead>
<tr>

<th>Date</th>
<th>Name</th>
<th>Item</th>
<th>Type</th>
<th>Amount</th>
		
</tr>
</thead> 

<tbody>
<?php

while ($data= mysql_fetch_array($result)){ 
?>
<tr id="<?php$data['id']?>">


<td id="name_<?php$data['date']?>">


<?php print $data['date'];?>

</td>


<td id="name_<?php print $data['name']?>">
<?php
print $data['first'];
print $data['middle'];
print $data['last'];
?>
</td>

<td id="name_<?php print $data['item']?>">

<?php
print $data['item'];
?>
</td>

<td id="name_<?php print $data['type']?>">

<?php
print $data['type'];
?>
</td>


<td id="name_<?php print $data['amount']?>">

<?php
print $data['amount'];
?>
</td>

	<br/>
	
</tr>	

<?php
	}?>

</tbody>
</table>


    
</body>
</html> 
