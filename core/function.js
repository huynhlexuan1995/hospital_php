var open_form =  function(x){
	$("#wrapper > *").slideUp();
	$(".form").hide();
	$("#form_" + x).slideDown();
	x = $("#form_" + x).offset().top
	$('html, body').animate({scrollTop:x}, 'slow');
}

var close_form =  function(x){
	$("#wrapper > *").slideDown();
	$(".form").slideUp();
	$(".form input").val("");
	$(".form textarea").val("");
	$(".form input").attr("data-id",0);
	$(".form select").val(0);
	$(".form").hide();
	$(".form_alert").html("");
}

var nofi =  function(x){
	$(".form_alert").html(x);	
}

var test_symbol_char = function(tsc_input1,tsc_input2){
	var specialChars = "<>@!#$%^&*()_+[]{}?:;|'\"\\.,-'/~`=" + '"';
	tsc_var1 = $(tsc_input1).val();
	tsc_var2 = 0;
	for(i = 0; i < specialChars.length;i++){
		if(tsc_var1.indexOf(specialChars[i]) > -1){
			tsc_var2 = 1;
		}
	}
	if(tsc_var2!=0){
		$(tsc_input2).html("Dữ liệu nhập không hợp lệ");
	}else{
		$(tsc_input2).html("");	
	}
}

var test_symbol = function(ts_input1){
	var specialChars = "<>@!#$%^&*()_+[]{}?:;|'\"\\.,-'/~`=" + '"';
	ts_var1 = $(ts_input1).val();
	ts_var2 = 0;
	for(i = 0; i < specialChars.length;i++){
		if(ts_var1.indexOf(specialChars[i]) > -1){
			ts_var2 = 1;
		}
	}
	return ts_var2;
}

var test_address_char = function(tac_input1,tac_input2){
	var specialChars = "<>@!#$%^&*()_+[]{}?:;|'\"\\.'~`=" + '"';
	tac_var1 = $(tac_input1).val();
	tac_var2 = 0;
	for(i = 0; i < specialChars.length;i++){
		if(tac_var1.indexOf(specialChars[i]) > -1){
			tac_var2 = 1;
		}
	}
	if(tac_var2!=0){
		$(tac_input2).html("Dữ liệu nhập không hợp lệ");
	}else{
		$(tac_input2).html("");	
	}
}

var test_address = function(ta_input1){
	var specialChars = "<>@!#$%^&*()_+[]{}?:;|'\"\\.,-'/~`=" + '"';
	ta_var1 = $(ta_input1).val();
	ta_var2 = 0;
	for(i = 0; i < specialChars.length;i++){
		if(ta_var1.indexOf(specialChars[i]) > -1){
			ta_var2 = 1;
		}
	}
	return ta_var2;
}

var test_attach = function(string){
	var specialChars = "<>@!#$%^*()+[]{}|'\"\\,-'~`" + '"';
	a = $(string).val();
	b = 0;
	for(i = 0; i < specialChars.length;i++){
		if(a.indexOf(specialChars[i]) > -1){
			b = 1;
		}
	}
	return b;
}

var test_address = function(string){
	var specialChars = "<>@!#$%^&*()_+[]{}?:;|'\"\\.'~`=" + '"';
	a = $(string).val();
	b = 0;
	for(i = 0; i < specialChars.length;i++){
		if(a.indexOf(specialChars[i]) > -1){
			b = 1;
		}
	}
	return b;
}

var test_bank = function(string){
	var specialChars = "<>@!#$%^&*()_+[]{}?:;|'\"\\.,'/~`=" + '"';
	a = $(string).val();
	b = 0;
	for(i = 0; i < specialChars.length;i++){
		if(a.indexOf(specialChars[i]) > -1){
			b = 1;
		}
	}
	return b;
}

var check_youtube = function(string){
	var specialChars = "<>@!#$%^*()+[]{};|'\"\\,'~`" + '"';
	a = $(string).val();
	b = 0;
	for(i = 0; i < specialChars.length;i++){
		if(a.indexOf(specialChars[i]) > -1){
			b = 1;
		}
	}
	return b;
}

var test_login_char = function(tlc_input1,tlc_input2){
	tlc_var1 = $(tlc_input1).val();
	tlc_var2 = 0;
	if(/^[a-zA-Z0-9]*$/.test(tlc_var1) == false) {
		tlc_var2 = 1;		
	}
	
	if(tlc_var2!=0){
		$(tlc_input2).html("Dữ liệu nhập không hợp lệ");
	}else{
		$(tlc_input2).html("");	
	}
}

var test_login = function(tl_input1){
	tl_var1 = $(tl_input1).val();
	tl_var2 = 0;
	if(/^[a-zA-Z0-9]*$/.test(tl_var1) == false) {
		tl_var2 = 1;		
	}
	return (tl_var2);
}

var test_number_char = function(tnc_input1,tnc_input2){
	tnc_var1 = $(tnc_input1).val();
	tnc_var2 = 0;
	if(/^[0-9]*$/.test(tnc_var1) == false) {
		tnc_var2 = 1;		
	}
	
	if(tnc_var2!=0){
		$(tnc_input2).html("Dữ liệu nhập không hợp lệ");
	}else{
		$(tnc_input2).html("");	
	}
}

var test_number = function(tn_input1){
	tn_var1 = $(tn_input1).val();
	tn_var2 = 0;
	if(/^[0-9]*$/.test(tn_var1) == false) {
		tn_var2 = 1;		
	}
	return (tn_var2);
}

var test_mail = function(string){
	a = $(string).val();
	b = 0;
	var specialChars = "<>!#$%^&*()[]{}?:;|'\"\\,'/~`=" + '"';
	var specialChars2 = "@.";
	for(i = 0; i < specialChars.length;i++){
		if(a.indexOf(specialChars[i]) > -1){
			b = 1;
		}else{
			b = 0;	
		}
	}
	for(i = 0; i < specialChars2.length;i++){
		if(a.indexOf(specialChars2[i]) > -1){
			b = 0;
		}else{
			b = 1;
		}
	}
	return b;
}