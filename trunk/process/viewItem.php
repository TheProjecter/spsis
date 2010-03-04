<html>
<head>
	<script type="text/javascript" src="../scripts/ajax.js"></script>

	<link type="text/css" href="../jquery-ui-1.8rc1.custom/development-bundle/demos/demos_class.css" rel="stylesheet" />
		
	<script src="../scripts/jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="../scripts/dropdown.js"></script>
</head>
<body>
<?php
		$idValue= $_GET['id']; 


		include '../ajax/connection.php';

		$result = mysql_query( "SELECT * FROM item where id=$idValue " );

		$data= mysql_fetch_array($result);
?>
<form name = "formBit" action = "../ajax/editItem.php" method = "post">
<table border="1">
<thead>
<tr>
<th>
Material Number
</th>

<th>
Description
</th>

<th>Stock
</th>

<th>Bin
</th>

<th>Bun
</th>

<th>Cost Center
</th>

<th>Type
</th>

<th>Machine
</th>
</tr>
</thead>
<tbody>
<tr>
	<td>
	
		
<ul class='jsddm'>

	<li><a href="#"><?php print $data['mat_no'];?></a>
		<?php echo "<input type = 'hidden' name ='{$data[mat_no]}' value = '{$data[mat_no]}'>";?>
		

	</li>
</ul>
</td>
<td><ul class='jsddm'>

	<li><a href="#"><?php print $data['desc1'];?></a>
	

	</li>
</ul></td>

<td><ul class='jsddm'>

	<li><a href="#"><?php print $data['stock'];?></a>
		

	</li>
</ul></td>
<td><ul class='jsddm'>

	<li><a href="#"><?php print $data['bin'];?></a>
		
	

	</li>
</ul></td>
<td><ul class='jsddm'>

	<li><a href="#"><?php print $data['bun'];?></a>
		
	

	</li>
</ul></td>
<td><ul class='jsddm'>

	<li><a href="#"><?php print $data['cc'];?></a>
		
	

	</li>
</ul></td>
<td><ul class='jsddm'>
	<li><a href="#"><?php print $data['type'];?></a>
		

	</li>
</ul></td>
<td><ul class='jsddm'>

	<li><a href="#"><?php print $data['machine'];?></a>
		
	

	</li>
</ul></td>
</tr>
</tbody>
</table>
	<input type = "submit" value = "EDIT">
</form>
</body>
</html>
