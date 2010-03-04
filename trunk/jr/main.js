function verify_login(){
var x=parent.document.getElementById('username');
var y=parent.document.getElementById('pass');
var z="juna Currently Logged-in";
if(x.value=='Juna'&&y.value=='juna'){
		alert('Log in Successful');
		parent.document.getElementById('spane').innerHTML=z;
}
else alert('Wrong Username or Password');
}

