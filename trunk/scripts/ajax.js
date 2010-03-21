function validateInput(input) {
	var result = true;
	for (var i = 0; i < input.length; i++) {
		if (input[i].className.search("required") >= 0) {
			if ((input[i].type == "text" || input[i].type == "password")  && input[i].value == "") {
				result = false;
				input[i].style.border = "1px solid red";
				input[i].style.backgroundColor = "#FFE891";
				input[i].title = "This information is required.";
			}
			else if (input[i].type == "text" && input[i].value != "") {
				if (input[i].className.search("letter number dash space") > -1) {
						if (!/^([0-9a-z- ])+$/i.test(input[i].value)) {
								result = false;
								input[i].style.border = "1px solid red";
								input[i].style.backgroundColor = "#FFE891";
								input[i].title = "This field must contain letters, numbers, spaces and dashes only.";
						} else {
								input[i].style.border = "1px solid #808080";
								input[i].style.backgroundColor = "";
						}
				} else if (input[i].className.search("letter number underscore") > -1) {
						if (!/^([0-9a-z_])+$/i.test(input[i].value)) {
								result = false;
								input[i].style.border = "1px solid red";
								input[i].style.backgroundColor = "#FFE891";
								input[i].title = "This field must contain letters, numbers, and underscores only.";
						} else {
								input[i].style.border = "1px solid #808080";
								input[i].style.backgroundColor = "";
						}
				} else if (input[i].className.search("letter number dash") > -1) {
						if (!/^([0-9a-z-])+$/i.test(input[i].value)) {
								result = false;
								input[i].style.border = "1px solid red";
								input[i].style.backgroundColor = "#FFE891";
								input[i].title = "This field must contain letters, numbers, and dashes only.";
						} else {
								input[i].style.border = "1px solid #808080";
								input[i].style.backgroundColor = "";
						}
				} else if (input[i].className.search("letter number") > -1) {
						if (!/^([0-9a-z])+$/i.test(input[i].value)) {
								result = false;
								input[i].style.border = "1px solid red";
								input[i].style.backgroundColor = "#FFE891";
								input[i].title = "This field must contain letters and numbers only.";
						} else {
								input[i].style.border = "1px solid #808080";
								input[i].style.backgroundColor = "";
						}
				} else if (input[i].className.search("number") > -1) {
						if (!/^[+\-]?\d+(\.\d+)?$/.test(input[i].value)) {
								result = false;
								input[i].style.border = "1px solid red";
								input[i].style.backgroundColor = "#FFE891";
								input[i].title = "This field must be a number.";
						} else {
								input[i].style.border = "1px solid #808080";
								input[i].style.backgroundColor = "";
						}
				} else if (input[i].className.search("letter") > -1) {
						if (!/^[a-z]([a-z])+$/i.test(input[i].value)) {
								result = false;
								input[i].style.border = "1px solid red";
								input[i].style.backgroundColor = "#FFE891";
								input[i].title = "This field must contain letters only.";
						} else {
								input[i].style.border = "1px solid #808080";
								input[i].style.backgroundColor = "";
						}
				}
				else {
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
		else if (input[i].type == "text" && input[i].value != "") {
				if (input[i].className.search("letter number dash") > -1) {
						if (!/^([0-9a-z-])+$/i.test(input[i].value)) {
								result = false;
								input[i].style.border = "1px solid red";
								input[i].style.backgroundColor = "#FFE891";
								input[i].title = "This field must contain letters, numbers, and dashes only.";
						} else {
								input[i].style.border = "1px solid #808080";
								input[i].style.backgroundColor = "";
						}
				} else if (input[i].className.search("letter number") > -1) {
						if (!/^([0-9a-z])+$/i.test(input[i].value)) {
								result = false;
								input[i].style.border = "1px solid red";
								input[i].style.backgroundColor = "#FFE891";
								input[i].title = "This field must contain letters and numbers only.";
						} else {
								input[i].style.border = "1px solid #808080";
								input[i].style.backgroundColor = "";
						}
				}else if (input[i].className.search("number") > -1) {
						if (!/^[+\-]?\d+(\.\d+)?$/.test(input[i].value)) {
								result = false;
								input[i].style.border = "1px solid red";
								input[i].style.backgroundColor = "#FFE891";
								input[i].title = "This field must be a number.";
						} else {
								input[i].style.border = "1px solid #808080";
								input[i].style.backgroundColor = "";
						}
				} else if (input[i].className.search("letter") > -1) {
						if (!/^[a-z]([a-z])+$/i.test(input[i].value)) {
								result = false;
								input[i].style.border = "1px solid red";
								input[i].style.backgroundColor = "#FFE891";
								input[i].title = "This field must contain letters only.";
						} else {
								input[i].style.border = "1px solid #808080";
								input[i].style.backgroundColor = "";
						}
				}
		}
	}
   
	return result;
}

function registerUser() {
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


function processAddMachine() {
        var result = true;
        var input = document.getElementsByTagName("input");
        var i = 0;
        var mach = $('#mach1').val();
        result = validateInput(input);
       
        while($('#temp'+i).val()!=undefined){
                if(mach == $('#temp'+i).val()){
                        alert("Duplicate Name for Machine Name");
                        result = false;
                        break;
                }
                i++;
        }
        if (result) {
                window.location = "process/addMachine.php?mach="+mach;
        }
        else
                return false;
}

function processAddItem(formObject) {

	var result = true;
	var itemType,mat_no,desc1,stock,bin,bun,cc,machine="";
	var input = document.getElementsByTagName("input");
	var option = document.getElementsByTagName("option");
	result = validateInput(input);
	
	for(var i = 0; i <input.length-2; i++){
		if(input[i].type=="radio" && input[i].checked == true){
			itemType = input[i].value;
		}
	}
	
	if (itemType==1) {
		for(var i =1; i < option.length; i++){
			if(option[i].selected == true){
				machine = option[i].value;
				break;
			}
		}
		
		if (machine=="") {
			result=false;
			document.getElementById("machineName").style.border = "1px solid red";
			document.getElementById("machineName").style.backgroundColor = "#FFE891";
			document.getElementById("machineName").title = "This field must be a number.";
		}
		else {
			document.getElementById("machineName").style.border = "1px solid #808080";
			document.getElementById("machineName").style.backgroundColor = "";
		}
	}
	
	mat_no = document.getElementById("matno").value;
	bin = document.getElementById("bin").value;
	desc1 = document.getElementById("desc1").value;
	bun = document.getElementById("bun").value;
	stock = document.getElementById("stock").value;
	cc = document.getElementById("cc").value;
	var j = 0;
	while($('#temp'+j).val()!=undefined){
        if(mat_no == $('#temp'+j).val()){
			alert("Duplicate Entry for Material Number");
			result = false;
			break;
		}
		j++;
	}
	if (result) {
		window.location.href = "process/addItem.php?itemType="+itemType+"&machine="+machine+"&mat_no="+mat_no+"&desc1="+desc1+"&stock="+stock+"&bin="+bin+"&bun="+bun+"&cc="+cc;
	}
	else{
		return false;
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
	
	if (result) {
		editprocess();
	}
}

function processEditMachine() {
	var result = true;
	
	var input = document.getElementsByTagName("input");
	result = validateInput(input);
	
	if (result) {
		editMachProcess();
	}
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

function deposit(){
	var result = true;
	var input = document.getElementsByTagName("input");
	result = validateInput(input);
	var inputStock = document.getElementById("id_deposit").value;
	if (inputStock==0) {
			result = false;
			document.getElementById("id_deposit").style.border = "1px solid red";
			document.getElementById("id_deposit").style.backgroundColor = "#FFE891";
	}
   
	if(result) {
		depositprocess();
	}
}

function withdraw(){
        var result = true;
        var input = document.getElementsByTagName("input");
        result = validateInput(input);
        var inputStock = document.getElementById("id_withdraw").value;
        if ((inputStock > document.getElementById("id_stock_w").value) || (inputStock==0)) {
                result = false;
                document.getElementById("id_withdraw").style.border = "1px solid red";
                document.getElementById("id_withdraw").style.backgroundColor = "#FFE891";
        }
       
        if(result) {
                withdrawprocess();
        }
}
