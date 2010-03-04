

<html>
<head>
<script type="text/javascript" src="main.js">
</script>

<link rel="stylesheet" type="text/css" href="main.css"/>
</head>
<body onload="change_iframe('try1.php')">

<script src="jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="mo.js">

</script>
<script type="text/javascript">

function change_iframe(source){
parent.document.getElementById('iframeone').src=source;
}
</script>
<center>

<table>
<tr>
<td>
<ul id='jsddm'>
<li><a href='main.php'>Home</a>
</li>
	<li><a href='#'>View</a>
	<ul>
			<li onclick='view.php'><a href='#' >User</a></li>
			<li><a href='#' onclick='view.php'>Supply</a></li>
			<li><a href='#' onclick='try1.php'>Spare Parts</a></li>
		</ul>
	</li>
	<li><a href='#'>Search</a>
		<ul>
			<li onClick="change_iframe('register.html')"><a href='#'>User</a></li>
			<li><a href='#' onClick='change_iframe(register.html)'>Supply</a></li>
<li><a href='#' onClick="change_iframe('view.php')">Spare Parts</a></li>
		
	</ul>
	</li><li><a href='#'>Menu1</a>
		<ul>
			<li onClick="change_iframe('view.php')"><a href='#'>User</a></li>
			<li><a href='#'>Supply</a></li>
			<li><a href='#'>Spare Parts</a></li>
	</ul>
	</li>
	<li><a href='#'>Menu2</a>
		<ul>
			<li><a href='#'>User</a></li>
			<li><a href='#'>Supply</a></li>
			<li><a href='#'>Spare Parts</a></li>
		</ul>
	</li>
		<li><a href='#'>Logout</a>
		
	</li>
</ul>
</td>

</tr>

</table>
<table border=10>
<tr>
	<td width="150"><img src="bb.jpg" width="150" height="10" ><center /><br /><br />
			<span id="spane"><font color="blue">Username:</br>
			<input type="text" size="18" id="username"/><br />
			Password:</font>
			<input type="password" size="18" id="pass"> <br />
			<input type="submit" value="Login" onclick="verify_login()"/>
	
			<input type="button" value="Register" onclick="change_iframe('register.html')" /></span><br /><br />
			<img src="bb.jpg" width="150" height="10" >
			<br/> 
			</td>
		
    <td ><iframe id="iframeone" frameborder="0"  src='try1.php' height="490" width="900">
  	</td>
	

	
</tr>
</table>
</body>

</html>