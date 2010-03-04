function validateInput(input) {
	var result = true;
	for (var i = 0; i < input.length; i++) {
		if (input[i].className.search("required") >= 0) {
			if ((input[i].type == "text" || input[i].type == "password")  && input[i].value == "") {
				result = false;
				input[i].style.border = "1px solid red";
				input[i].style.backgroundColor = "#FFE891";
				input[i].title = "This information is required.";
			} else if (input[i].type == "text" && input[i].value != "") {
				if (input[i].className.search("number") > -1) {
					if (!/^[+\-]?\d+(\.\d+)?$/.test(input[i].value)) {
						result = false;
						input[i].style.border = "1px solid red";
						input[i].style.backgroundColor = "#FFE891";
						input[i].title = "This field must be a number.";
					} else {
						input[i].style.border = "1px solid #808080";
						input[i].style.backgroundColor = "";
					}
				} else {
					input[i].style.border = "1px solid #808080";
					input[i].style.backgroundColor = "";
				}
			}
			if (input[i].type == "checkbox" || input[i].type == "radio") {
				var selected = 0;
				var name = input[i].name;
				for (; name == input[i].name; i++) {
					if (input[i].checked) {
						selected++;
					}
				}
				i--;
				if (selected == 0) {
					input[i].parentNode.style.border = "1px solid red";
					input[i].parentNode.style.backgroundColor = "#FFE891";
					result = false;
				} else {
					input[i].parentNode.style.border = "none";
					input[i].parentNode.style.backgroundColor = "";
				}
			}
		}
	}
	
	return result;
}

function processRegister() {
	var result = true;
	var uname, pass1, pass2, emp, f, m, l, pos;
	var input = document.getElementsByTagName("input");
	result = validateInput(input);
	
	
	var uname = input[0].value;
		var pass1 = input[1].value;
		var pass2 = input[2].value;
		var emp = input[3].value;
		var f = input[4].value;
		var l = input[5].value;
		var m = input[6].value;
		var pos = input[7].value;
	
	if(input[0].value==""||uname.length<3||uname.length>20){
		alert ("Username Length Error");
		result = false;
		input[0].style.border = "1px solid red";
		input[0].style.backgroundColor = "#FFE891";
	
	}else if (input[1].value!=input[2].value){
		alert ("Password Mismatch");
		result = false;
		input[1].style.border = "1px solid red";
		input[1].style.backgroundColor = "#FFE891";
		input[2].style.border = "1px solid red";
		input[2].style.backgroundColor = "#FFE891";
	}else if(input[0].value==""||pass1.length<5||pass1.length>20){
		alert ("Password Length Error");
		result = false;
		input[1].style.border = "1px solid red";
		input[1].style.backgroundColor = "#FFE891";
	}else if(input[3].value==""||emp.length<11||emp.length>11){
		alert ("Employee Number Length Error");
		result = false;
		input[3].style.border = "1px solid red";
		input[3].style.backgroundColor = "#FFE891";
	}else if(input[4].value==""||f.length<3||f.length>30){
		alert ("First Name Length Error");
		result = false;
		input[4].style.border = "1px solid red";
		input[4].style.backgroundColor = "#FFE891";
	}else if(input[5].value==""||l.length<3||l.length>30){
		alert ("Last Name Length Error");
		result = false;
		input[5].style.border = "1px solid red";
		input[5].style.backgroundColor = "#FFE891";
	}else if(input[7].value==""||pos.length<3||uname.length>20){
		alert ("Position Length Error");
		result = false;
		input[7].style.border = "1px solid red";
		input[7].style.backgroundColor = "#FFE891";
	}
		
	if (result) {
		var uname = input[0].value;
		var pass1 = input[1].value;
		var pass2 = input[2].value;
		var emp = input[3].value;
		var f = input[4].value;
		var l = input[5].value;
		var m = input[6].value;
		var pos = input[7].value;
		window.location = "process/register.php?uname="+uname+"&pass1="+pass1+"&pass2="+pass2+"&emp="+emp+"&f="+f+"&m="+m+"&l="+l+"&pos="+pos;
	}
}

function processSearchAcct() {
	var result = true;
	var input = document.getElementsByTagName("input");
	result = validateInput(input);
	var username = input[0].value;
	if(result){
		window.location = "../process/searchAcct.php?username"+username;
	}		
}

function processEditAcct() {
	var result = true;
	var uname, pass1, pass2, emp, f, m, l, pos;
	var input = document.getElementsByTagName("input");
	result = validateInput(input);
	
	if (input[0].value!=input[1].value){
		alert ("Password Mismatch");
		result = false;
		input[1].style.border = "1px solid red";
		input[1].style.backgroundColor = "#FFE891";
		input[0].style.border = "1px solid red";
		input[0].style.backgroundColor = "#FFE891";
	}
	
	if (result) {
		var pass1 = input[0].value;
		var pass2 = input[1].value;
		var emp = input[2].value;
		var f = input[3].value;
		var l = input[4].value;
		var m = input[5].value;
		var pos = input[6].value;
		window.location = "process/editAcct.php?uname="+uname+"&pass1="+pass1+"&pass2="+pass2+"&emp="+emp+"&f="+f+"&m="+m+"&l="+l+"&pos="+pos;
	}
}

function processDeleteAcct() {

}

function processAddMachine() {
	var result = true;
	
	var input = document.getElementsByTagName("input");
	result = validateInput(input);
	
	if(result){
		for(var i = 0; i < input.length-3; i++){
			//alert(input[i].name + " vs "+input[input.length-3].value);
			if(input[i].value == input[input.length-3].value){
				alert("Duplicate value for Machine Name");
				result = false;
			}
		}
	}
	
	if (result) {
		var mach = input[input.length-3].value;
		window.location = "process/addMachine.php?mach="+mach;
	}
}

function processSearchMachine() {
	
}

function processEditMach() {

}

function processDeleteMach() {

}

function processAddItem(formObject) {
	var result = true;
	var itemType,mat_no,desc1,stock,bin,bun,cc,machine;
	var input = document.getElementsByTagName("input");
	var option = document.getElementsByTagName("option");
	result = validateInput(input);
	
	for(var i = 0; i <input.length-2; i++){
		if(input[i].type=="radio" && input[i].checked == true){
			itemType = input[i].value;
		}
	}
	
	for(var i =1; i < option.length; i++){
		if(option[i].selected == true){
			machine = option[i].value;
			break;
		}
	}
	
	mat_no = input[2].value;
	bin = input[3].value;
	desc1 = input[4].value;
	bun = input[5].value;
	stock = input[6].value;
	cc = input[7].value;
	
	if(itemType=="1"&&document.getElementById("mach").length<2){
		alert("Add Item Failed. No Machines Available.");
		result=false;
	}
	else if(itemType=="1"&&option[0].selected==true){
		alert("No Machine Selected.");
		result=false;
	}	
	
	if (result) {
		window.location.href = "process/addItem.php?itemType="+itemType+"&machine="+machine+"&mat_no="+mat_no+"&desc1="+desc1+"&stock="+stock+"&bin="+bin+"&bun="+bun+"&cc="+cc;
	}
}

function processSearchItem() {

}

function processEditItem() {
var result = true;
	var itemType,mat_no,desc1,stock,bin,bun,cc,machine;
	var input = document.getElementsByTagName("input");
	var option = document.getElementsByTagName("option");
	result = validateInput(input);
	
	for(var i = 0; i <input.length-2; i++){
		if(input[i].type=="radio" && input[i].checked == true){
			itemType = input[i].value;
		}
	}
	
	for(var i =1; i < option.length; i++){
		if(option[i].selected == true){
			machine = option[i].value;
			break;
		}
	}
	
	mat_no = input[2].value;
	bin = input[3].value;
	desc1 = input[4].value;
	bun = input[5].value;
	stock = input[6].value;
	cc = input[7].value;
	
	if (result) {
		window.location.href = "../process/editItem.php?itemType="+itemType+"&machine="+machine+"&mat_no="+mat_no+"&desc1="+desc1+"&stock="+stock+"&bin="+bin+"&bun="+bun+"&cc="+cc;
	}
}

function processDeleteItem() {

}

function enableButton(formObject) {
	var option = document.getElementsByTagName("option");
	
	for (var i=0; i<option.length; i++) {
		option[i].disabled = false;
	}
}

function disableButton(formObject) {
	var option = document.getElementsByTagName("option");
	
	for (var i=0; i<option.length; i++) {
		option[i].disabled = true;
	}
}

function deposit(aydi){
	var p=prompt("Enter amount:");
	var disp = parseInt(p);
	
	if(disp>0)
		window.location = "process/deposit.php?id="+aydi+"&am="+disp;
	else alert("invalid input!");
}

function withdraw(aydi){
	var p=prompt("Enter amount:");
	var disp = parseInt(p);
	
	if(disp>0)
		window.location = "process/withdraw.php?id="+aydi+"&am="+disp;
	else alert("invalid input!");
}