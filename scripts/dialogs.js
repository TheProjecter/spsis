/*
	increase the default animation speed to exaggerate the effect
*/
$.fx.speeds._default = 1000;
var open="";
var del="";
var conf="";
var open_s="";
var del_s="";
var conf_s="";

var edit_open="";
var edit_open_s="";

var deposit_text="";
var deposit_texts="";
var withdraw_text="";
var withdraw_texts="";

var matno="";
var desc1="";
var stock=0;
var bin="";
var bun="";
var cc="";
var type=0;
var machine="";

var amount=0;
var item=""
var amount_w=0;
var item_w=""
var stock_w=0;

var acctName="";
var machName="";
var machName_s="";
var acctName_s="";

var editMach="";
var editMach_s="";
var machId;
var pendAcct = [];

/*
	for item view in home.php
*/
function open1(){
	$('#dialog').html("");
	var i=0;
		while($('#myInput'+i).val()!=undefined){
			if($('#myInput'+i).is(':checked')){
				open =$('#myInput'+i).val();
			}
			i++;
		}
		
		if(open==''){
			$("#warning").dialog({
				modal: true,
				buttons: {
					Ok: function() {
						$(this).dialog('close');
					}
				}
			});
		}
		else{
			$('#dialog').dialog({
				autoOpen: false,
				show: 'explode',
				hide: 'highlight'
			});
			$('#dialog').dialog('open');
			$('#dialog').load("process/viewItem.php?te="+open);
		}
		return false;
}

/*
	for item deletion in home.php
*/
function del1(){
	$('#del_dialog').html("");
		del =$('#delt').val();
		//alert(text2);
		$('#del_dialog').dialog({
		autoOpen: false,
		show: 'highlight',
		hide: 'highlight'
	});
		$('#del_dialog').dialog('open');
		$('#del_dialog').load("scripts/processDeleteItem.php?delt="+del);
		return false;
}

/*
	for item deletion in home.php
*/
function conf1(){
	$('#conf_del').html("");
		conf =$('#dtrue').val();
		//alert(text3);
		$('#conf_del').dialog({
		autoOpen: false,
		show: 'highlight',
		hide: 'highlight'
	});
		$('#conf_del').dialog('open');
		$('#conf_del').load("process/deleteItem.php?dtrue="+conf);
		return false;
}

/*
	for item editing in home.php
*/
function edit1(){
	$('#edit_dialog').html("");
	edit_open =$('#delt').val();
	$('#edit_dialog').dialog({
		autoOpen: false,
		show: 'highlight',
		hide: 'highlight'
	});
	$('#edit_dialog').dialog('open');
	$('#edit_dialog').load("ajax/editItem.php?te="+edit_open);
	
	return false;
}

/*
	for item deposit in home.php
*/
function deposit1(){
	$('#deposit_dialog').html("");
	var i=0;
		while($('#myInput'+i).val()!=undefined){
			if($('#myInput'+i).is(':checked')){
				deposit_text =$('#myInput'+i).val();
			}
			i++;
		}
		
		if(deposit_text==''){
			$("#warning").dialog({
				buttons: {
					Ok: function() {
						$(this).dialog('close');
					}
				}
			});
		}
		else{
		$('#deposit_dialog').dialog({
			autoOpen: false,
			show: 'explode',
			hide: 'highlight'
		});
		$('#deposit_dialog').dialog('open');
		$('#deposit_dialog').load("ajax/deposit.php?te="+deposit_text);
		}
		return false;
}

/*
	for item withdraw in home.php
*/
function withdraw1(){
	$('#withdraw_dialog').html("");
	var i=0;
		while($('#myInput'+i).val()!=undefined){
			if($('#myInput'+i).is(':checked')){
				withdraw_text =$('#myInput'+i).val();
			}
			i++;
		}
		
		if(withdraw_text==''){
			//alert('no choice');
			$("#warning").dialog({
				modal: true,
				buttons: {
					Ok: function() {
						$(this).dialog('close');
					}
				}
			});
		}
		else{
		//alert(text);
		$('#withdraw_dialog').dialog({
			autoOpen: false,
			show: 'explode',
			hide: 'highlight'
		});
		$('#withdraw_dialog').dialog('open');
		$('#withdraw_dialog').load("ajax/withdraw.php?te="+withdraw_text);
		}
		return false;
}


function editprocess(){
	$('#edit_true_dialog').html("");
	
		var i=0;
			while($('#opt'+i).val()!=undefined){
				if($('#opt'+i).is(':selected')){
					option =$('#opt'+i).val();
				}
				i++;
			}
	
		matno =$('#edit1').val();
		desc1 =$('#desc1_item').val();
		bin =$('#bin_item').val();
		bun =$('#bun_item').val();
		cc =$('#cc_item').val();
		//type =$('#type_item').val();
		//machine =$('#machine_item').val();
		
		$('#edit_true_dialog').dialog({
		autoOpen: false,
		show: 'highlight',
		hide: 'highlight'
	});
		$('#edit_true_dialog').dialog('open');
		$('#edit_true_dialog').load("process/editItem.php?item_edit1="+matno+"&item_desc1="+desc1+"&item_bin="+bin+"&item_bun="+bun+"&item_cc="+cc+"&item_machine="+option);
		return false;
}

function depositprocess(){
	$('#deposit_true_dialog').html("");
		amount =$('#id_deposit').val();
		item =$('#id_item').val();
		
		if(amount<=0){
			$("#invalid").dialog({
				buttons: {
					Ok: function() {
						$(this).dialog('close');
					}
				}
			});
		}
		else{
		
		$('#deposit_true_dialog').dialog({
		autoOpen: false,
		show: 'highlight',
		hide: 'highlight'
	});
		$('#deposit_true_dialog').dialog('open');
		$('#deposit_true_dialog').load("process/deposit.php?in_item="+item+"&in_deposit="+amount);
		}
		return false;
}

function withdrawprocess(){
	$('#withdraw_true_dialog').html("");
		amount_w =$('#id_withdraw').val();
		item_w =$('#id_item_w').val();
		stock_w =$('#id_stock_w').val();
		
		if(amount_w > stock_w || amount_w <=0){
			$("#invalid").dialog({
				buttons: {
					Ok: function() {
						$(this).dialog('close');
					}
				}
			});
		}
		else{
		
		$('#withdraw_true_dialog').dialog({
		autoOpen: false,
		show: 'highlight',
		hide: 'highlight'
	});
		$('#withdraw_true_dialog').dialog('open');
		$('#withdraw_true_dialog').load("process/withdraw.php?item_w="+item_w+"&in_withdraw="+amount_w);
		}
		return false;
}

function open2(){
	$('#dialog2').html("");
	var i=0;
		while($('#myInputs'+i).val()!=undefined){
			if($('#myInputs'+i).is(':checked')){
				open_s =$('#myInputs'+i).val();
			}
			i++;
		}
		if(open_s==''){
			$("#warning").dialog({
				modal: true,
				buttons: {
					Ok: function() {
						$(this).dialog('close');
					}
				}
			});
		}
		else{
		$('#dialog2').dialog({
		autoOpen: false,
		show: 'explode',
		hide: 'highlight'
	});
		$('#dialog2').dialog('open');
		$('#dialog2').load("process/viewItem2.php?te="+open_s);
		}
		return false;
}

function del2(){
	$('#del_dialog2').html("");
		del_s =$('#delt2').val();
		$('#del_dialog2').dialog({
		autoOpen: false,
		show: 'highlight',
		hide: 'highlight'
	});
		$('#del_dialog2').dialog('open');
		$('#del_dialog2').load("scripts/processDeleteItem2.php?delt="+del_s);
		return false;
}

function conf2(){
	$('#conf_del2').html("");
		conf_s =$('#dtrue').val();
		//alert(text3);
		$('#conf_del2').dialog({
		autoOpen: false,
		show: 'highlight',
		hide: 'highlight'
	});
		$('#conf_del2').dialog('open');
		$('#conf_del2').load("process/deleteItem.php?dtrue="+conf_s);
		return false;
}

function edit2(){
	$('#edit_dialog2').html("");
	edit_open_s =$('#delt2').val();
		$('#edit_dialog2').dialog({
			autoOpen: false,
			show: 'highlight',
			hide: 'highlight'
		});
		$('#edit_dialog2').dialog('open');
		$('#edit_dialog2').load("ajax/editItem.php?te="+edit_open_s);
		
		return false;
}

function deposit2(){
	$('#deposit_dialog2').html("");
	var i=0;
		while($('#myInputs'+i).val()!=undefined){
			if($('#myInputs'+i).is(':checked')){
				deposit_texts =$('#myInputs'+i).val();
			}
			i++;
		}
		
		if(deposit_texts==''){
			$("#warning").dialog({
				modal: true,
				buttons: {
					Ok: function() {
						$(this).dialog('close');
					}
				}
			});
		}
		else{
		$('#deposit_dialog2').dialog({
			autoOpen: false,
			show: 'explode',
			hide: 'highlight'
		});
		$('#deposit_dialog2').dialog('open');
		$('#deposit_dialog2').load("ajax/deposit.php?te="+deposit_texts);
		}
		return false;
}

function withdraw2(){
	$('#withdraw_dialog2').html("");
	var i=0;
		while($('#myInputs'+i).val()!=undefined){
			if($('#myInputs'+i).is(':checked')){
				withdraw_texts =$('#myInputs'+i).val();
			}
			i++;
		}
		
		if(withdraw_texts==''){
			$("#warning").dialog({
				modal: true,
				buttons: {
					Ok: function() {
						$(this).dialog('close');
					}
				}
			});
		}
		else{
		$('#withdraw_dialog2').dialog({
			autoOpen: false,
			show: 'explode',
			hide: 'highlight'
		});
		$('#withdraw_dialog2').dialog('open');
		$('#withdraw_dialog2').load("ajax/withdraw.php?te="+withdraw_texts);
		}
		return false;
}

/*
	for view of account from
	the list of accounts
*/
function open3(){
	$('#dialog3').html("");
	var i=0;
		while($('#myInputa'+i).val()!=undefined){
			if($('#myInputa'+i).is(':checked')){
				acctName =$('#myInputa'+i).val();
			}
			i++;
		}
		if(acctName==''){
			$("#warningAcct").dialog({
			modal: true,
			buttons: {
				Ok: function() {
					$(this).dialog('close');
				}
			}
			});
		}
		else{
		$('#dialog3').dialog({
		autoOpen: false,
		show: 'explode',
		hide: 'highlight'
	});
		$('#dialog3').dialog('open');
		$('#dialog3').load("process/viewAcct.php?te="+acctName);
		}
		return false;
}

/*
	for account deletion 
	from list of accounts
*/
function del3(){
	$('#del_dialog3').html("");
		del =$('#deltAcct').val();
		$('#del_dialog3').dialog({
		autoOpen: false,
		show: 'highlight',
		hide: 'highlight'
	});
		$('#del_dialog3').dialog('open');
		$('#del_dialog3').load("scripts/processDeleteAcct.php?delt="+del);
		return false;
}

/*
	for account deletion
	from list of accounts
*/
function conf3(){
	$('#conf_del3').html("");
		conf =$('#dtrue').val();
		$('#conf_del3').dialog({
		autoOpen: false,
		show: 'highlight',
		hide: 'highlight',
		modal: true,
		buttons: {
			Ok: function() {
				$(this).dialog('close');
			}
		}
	});
		$('#conf_del3').dialog('open');
		$('#conf_del3').load("process/deleteAcct.php?dtrue="+conf);
		return false;
}

/*
	view of account
	from search
*/
function open4(){
	$('#dialog4').html("");
	var i=0;
		while($('#myInputas'+i).val()!=undefined){
			if($('#myInputas'+i).is(':checked')){
				acctName_s =$('#myInputas'+i).val();
			}
			i++;
		}
		if(acctName_s==''){
			$("#warningAcct").dialog({
			modal: true,
			buttons: {
				Ok: function() {
					$(this).dialog('close');
				}
			}
			});
		}
		else{
			$('#dialog4').dialog({
			autoOpen: false,
			show: 'explode',
			hide: 'highlight'
		});
			$('#dialog4').dialog('open');
			$('#dialog4').load("process/viewAcct2.php?te="+acctName_s);
			}
	return false;
}

/*
	for account deletion 
	from search
*/
function del4(){
	$('#del_dialog4').html("");
		del =$('#deltAccts').val();
		$('#del_dialog4').dialog({
		autoOpen: false,
		show: 'highlight',
		hide: 'highlight'
	});
		$('#del_dialog4').dialog('open');
		$('#del_dialog4').load("scripts/processDeleteAcct2.php?delt="+del);
		return false;
}

/*
	for account deletion
	from search
*/
function conf4(){
	$('#conf_del4').html("");
		conf =$('#dtrue').val();
		$('#conf_del4').dialog({
		autoOpen: false,
		show: 'highlight',
		hide: 'highlight',
		modal: true,
		buttons: {
			Ok: function() {
				$(this).dialog('close');
			}
		}
	});
		$('#conf_del4').dialog('open');
		$('#conf_del4').load("process/deleteAcct.php?dtrue="+conf);
		return false;
}

/*
	view of machine
	from the list
*/
function open5(){
	$('#dialog5').html("");
	var i=0;
		while($('#myInputm'+i).val()!=undefined){
			if($('#myInputm'+i).is(':checked')){
				machName =$('#myInputm'+i).val();
			}
			i++;
		}
		if(machName==''){
			$("#warningMach").dialog({
			modal: true,
			buttons: {
				Ok: function() {
					$(this).dialog('close');
				}
			}
			});
		}
		else{
		$('#dialog5').dialog({
		autoOpen: false,
		show: 'explode',
		hide: 'highlight'
	});
		$('#dialog5').dialog('open');
		$('#dialog5').load("process/viewMachine.php?mach="+machName);
		}
		return false;
}

/*
	view of edit from the list
	of machines
*/
function edit3(){
	$('#edit_dialog3').html("");
	editMach =$('#deltMach').val();
		$('#edit_dialog3').dialog({
			autoOpen: false,
			show: 'highlight',
			hide: 'highlight'
		});
		$('#edit_dialog3').dialog('open');
		$('#edit_dialog3').load("ajax/editMach.php?te="+editMach);
		
		return false;
}

/*
	edit machine name
	from the list
*/
function editMachProcess(){
	$('#edit_true_dialog3').html("");
		editMach =$('#machName_edit1').val();
		machId = $('#mach_edit').val();
		$('#edit_true_dialog3').dialog({
		autoOpen: false,
		show: 'highlight',
		hide: 'highlight'
		});
		$('#edit_true_dialog3').dialog('open');
		$('#edit_true_dialog3').load("process/editMachine.php?mach="+editMach+"&te="+machId);
		return false;
}

/*
	for machine deletion 
	from list
*/
function del5(){
	$('#del_dialog5').html("");
		del =$('#deltMach').val();
		//alert(text2);
		$('#del_dialog5').dialog({
		autoOpen: false,
		show: 'highlight',
		hide: 'highlight'
	});
		$('#del_dialog5').dialog('open');
		$('#del_dialog5').load("scripts/processDeleteMach.php?delt="+del);
		return false;
}

/*
	for machine deletion
	from list
*/
function conf5(){
	$('#conf_del5').html("");
		conf =$('#dtrue').val();
		$('#conf_del5').dialog({
		autoOpen: false,
		show: 'highlight',
		hide: 'highlight',
		modal: true,
		buttons: {
			Ok: function() {
				$(this).dialog('close');
			}
		}
	});
		$('#conf_del5').dialog('open');
		$('#conf_del5').load("process/deleteMachine.php?dtrue="+conf);
		return false;
}

/*
	view of machine
	from search
*/
function open6(){
	$('#dialog6').html("");
	var i=0;
		while($('#myInputms'+i).val()!=undefined){
			if($('#myInputms'+i).is(':checked')){
				machName_s =$('#myInputms'+i).val();
			}
			i++;
		}
		if(machName_s==''){
			$("#warningMach").dialog({
			modal: true,
			buttons: {
				Ok: function() {
					$(this).dialog('close');
				}
			}
			});
		}
		else{
		$('#dialog6').dialog({
		autoOpen: false,
		show: 'explode',
		hide: 'highlight'
	});
		$('#dialog6').dialog('open');
		$('#dialog6').load("process/viewMachine2.php?mach="+machName_s);
		}
		return false;
}

/*
	for machine deletion 
	from search
*/
function del6(){
	$('#del_dialog6').html("");
		del =$('#deltMachs').val();
		$('#del_dialog6').dialog({
		autoOpen: false,
		show: 'highlight',
		hide: 'highlight'
	});
		$('#del_dialog6').dialog('open');
		$('#del_dialog6').load("scripts/processDeleteMach2.php?delt="+del);
		return false;
}

/*
	for machine deletion
	from search
*/
function conf6(){
	$('#conf_del6').html("");
		conf =$('#dtrue').val();
		$('#conf_del6').dialog({
		autoOpen: false,
		show: 'highlight',
		hide: 'highlight',
		modal: true,
		buttons: {
			Ok: function() {
				$(this).dialog('close');
			}
		}
	});
		$('#conf_del5').dialog('open');
		$('#conf_del5').load("process/deleteMachine.php?dtrue="+conf);
		return false;
}

/*
	view of edit from
	search
*/
function edit4(){
	$('#edit_dialog4').html("");
	editMach_s =$('#deltMachs').val();
		$('#edit_dialog4').dialog({
			autoOpen: false,
			show: 'highlight',
			hide: 'highlight'
		});
		$('#edit_dialog4').dialog('open');
		$('#edit_dialog4').load("ajax/editMach.php?te="+editMach_s);
		
		return false;
}

/*
	view of supply
	from search
*/
function open7(){
	$('#dialog7').html("");
	var i=0;
		while($('#myInputsp'+i).val()!=undefined){
			if($('#myInputsp'+i).is(':checked')){
				open_s =$('#myInputsp'+i).val();
			}
			i++;
		}
		if(open_s==''){
			$("#warningSupply").dialog({
				modal: true,
				buttons: {
					Ok: function() {
						$(this).dialog('close');
					}
				}
			});
		}
		else{
		$('#dialog7').dialog({
		autoOpen: false,
		show: 'explode',
		hide: 'highlight'
	});
		$('#dialog7').dialog('open');
		$('#dialog7').load("process/viewSupply.php?te="+open_s);
		}
		return false;
}

function edit5(){
	$('#edit_dialog2').html("");
	edit_open_s =$('#delt3').val();
		$('#edit_dialog2').dialog({
			autoOpen: false,
			show: 'highlight',
			hide: 'highlight'
		});
		$('#edit_dialog2').dialog('open');
		$('#edit_dialog2').load("ajax/editSupply.php?te="+edit_open_s);
		
		return false;
}

/*
	delete of supply
	from search
*/
function del7(){
	$('#del_dialog7').html("");
		del_s =$('#delt3').val();
		$('#del_dialog7').dialog({
		autoOpen: false,
		show: 'highlight',
		hide: 'highlight'
	});
		$('#del_dialog7').dialog('open');
		$('#del_dialog7').load("scripts/processDeleteSupply.php?delt="+del_s);
		return false;
}

function conf7(){
	$('#conf_del7').html("");
		conf_s =$('#dtrue').val();
		$('#conf_del7').dialog({
		autoOpen: false,
		show: 'highlight',
		hide: 'highlight'
	});
		$('#conf_del7').dialog('open');
		$('#conf_del7').load("process/deleteItem.php?dtrue="+conf_s);
		return false;
}

function deposit3(){
	$('#deposit_dialog3').html("");
	var i=0;
		while($('#myInputsp'+i).val()!=undefined){
			if($('#myInputsp'+i).is(':checked')){
				deposit_texts =$('#myInputsp'+i).val();
			}
			i++;
		}
		
		if(deposit_texts==''){
			$("#warningSupply").dialog({
				modal: true,
				buttons: {
					Ok: function() {
						$(this).dialog('close');
					}
				}
			});
		}
		else{
		$('#deposit_dialog3').dialog({
			autoOpen: false,
			show: 'explode',
			hide: 'highlight'
		});
		$('#deposit_dialog3').dialog('open');
		$('#deposit_dialog3').load("ajax/deposit.php?te="+deposit_texts);
		}
		return false;
}

function withdraw3(){
	$('#withdraw_dialog3').html("");
	var i=0;
		while($('#myInputsp'+i).val()!=undefined){
			if($('#myInputsp'+i).is(':checked')){
				withdraw_texts =$('#myInputsp'+i).val();
			}
			i++;
		}
		
		if(withdraw_texts==''){
			$("#warningSupply").dialog({
				modal: true,
				buttons: {
					Ok: function() {
						$(this).dialog('close');
					}
				}
			});
		}
		else{
		$('#withdraw_dialog3').dialog({
			autoOpen: false,
			show: 'explode',
			hide: 'highlight'
		});
		$('#withdraw_dialog3').dialog('open');
		$('#withdraw_dialog3').load("ajax/withdraw.php?te="+withdraw_texts);
		}
		return false;
}

/*
	for view of pendings accounts
	from the list
*/
function open8(){
	$('#dialog8').html("");
	var i=0;
		while($('#myInputp'+i).val()!=undefined){
			if($('#myInputp'+i).is(':checked')){
				acctName =$('#myInputp'+i).val();
			}
			i++;
		}
		if(acctName==''){
			$("#warningAcct").dialog({
			modal: true,
			buttons: {
				Ok: function() {
					$(this).dialog('close');
				}
			}
			});
		}
		else{
		$('#dialog8').dialog({
		autoOpen: false,
		show: 'explode',
		hide: 'highlight'
	});
		$('#dialog8').dialog('open');
		$('#dialog8').load("process/viewPendingAcct.php?te="+acctName);
		}
		return false;
}

function approve(){
	$('#approveSuccess').html("");
	var i=0;counter=0;
		while($('#acct'+i).val()!=undefined){
			if($('#acct'+i).is(':checked')){
				pendAcct[counter] =$('#acct'+i).val();
				counter++;
			}
			i++;
		}
		if(counter==0){
			$("#warningAcct").dialog({
			modal: true,
			buttons: {
				Ok: function() {
					$(this).dialog('close');
				}
			}
			});
		}
		else{
		$('#approveSuccess').dialog({
		autoOpen: false,
		show: 'explode',
		hide: 'highlight',
		buttons: {
				Ok: function() {
					$(this).dialog('close');
				}
			}
		});
		$('#approveSuccess').dialog('open');
		$('#approveSuccess').load("process/approveRegistration.php?te="+pendAcct+"&act=1&cnt="+counter);
		}
		return false;
}

function deny(){
	$('#approveSuccess').html("");
	var i=0;counter=0;
		while($('#acct'+i).val()!=undefined){
			if($('#acct'+i).is(':checked')){
				pendAcct[counter] =$('#acct'+i).val();
				counter++;
			}
			i++;
		}
		if(counter==0){
			$("#warningAcct").dialog({
			modal: true,
			buttons: {
				Ok: function() {
					$(this).dialog('close');
				}
			}
			});
		}
		else{
		$('#approveSuccess').dialog({
		autoOpen: false,
		show: 'explode',
		hide: 'highlight',
		buttons: {
				Ok: function() {
					$(this).dialog('close');
				}
			}
		});
		$('#approveSuccess').dialog('open');
		$('#approveSuccess').load("process/approveRegistration.php?te="+pendAcct+"&act=0&cnt="+counter);
		}
		return false;
}
