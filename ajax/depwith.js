
function deposit(aydi){
var p=prompt("Enter amount:");
var disp = parseInt(p);

open("d.php?id="+aydi+"&am="+disp);


}

function withdraw(aydi){
var p=prompt("Enter amount:");
var disp = parseInt(p);

open("w.php?id="+aydi+"&am="+disp);}