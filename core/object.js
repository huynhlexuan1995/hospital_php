$(document).ready(function(e) {
	$(window).scroll(function(){
		if($(this).scrollTop()>= 100){
			$("#back_top").fadeIn();	
		}else{
			$("#back_top").fadeOut();		
		}
	  });

	//$('html, body').animate({scrollTop:$('#form_login').position().top}, 'slow');
	$("#back_top").click(function(){
		$('html, body').animate({scrollTop:0}, 'slow');		
	})
	
	$("#home").click(function(){
		close_form();	
	})
	
	$(".form_close").click(function(){
		close_form();	
	})
	
	$(".reload").click(function(){
		location.reload();
	})
	
	$("#open_login").click(function(){
		open_form("login");	
	})
	
	$("#open_register").click(function(){
		open_form("register");	
	})
	
	$("#open_register2").click(function(){
		open_form("register");	
	})
	
	$("#open_doctor").click(function(){
		open_form("doctor");	
	})
	
	$("#open_set_calendar").click(function(){
		open_form("set_calendar");	
	})
	
	$("#open_medicine").click(function(){
		open_form("medicine");		
	})
	
	$("#open_disease").click(function(){
		open_form("disease");		
	})
	
	$("#open_calendar").click(function(){
		$('html, body').animate({scrollTop:$('#customer_calendar').position().top}, 'slow');		
	})
	
	$("#open_history").click(function(){
		$('html, body').animate({scrollTop:$('#history').position().top}, 'slow');		
	})
	

//LOGIN_USERNAME
	$("#login_name").keyup(function(){
		test_login_char("#login_name","#login_alert");		
	})
	
//LOGIN_PASSWORD
	$("#login_pass").keyup(function(){
		test_login_char("#login_pass","#login_alert");		
	})
	
//LOGIN	_OK
	$("#login_ok").click(function(){	
		a1 = $("#login_name").val();
		a2 = $("#login_pass").val();						
		if(a1 == "" || a2 == ""){
			nofi("Vui lòng nhập đầy đủ thông tin");
		}else{
			check1 = test_login("#login_name");
			check2 = test_login("#login_pass");
			if(check1 == 1 || check2 == 1 ){
				nofi("Vui lòng không nhập ký tự đặt biệt");
			}else{
				main_ajax("login",$("#login_name").val(),$("#login_pass").val());
			}
		}				
	})

//REGISTER
	$("#register_name").keyup(function(){
		test_symbol_char("#register_name","#register_alert");		
	})
	
	$("#register_address").keyup(function(){
		test_address_char("#register_address","#register_alert");		
	})
	
	$("#register_bhxh").keyup(function(){
		test_login_char("#register_bhxh","#register_alert");			
	})

	$("#register_ok").click(function(){	
		a1 = $("#register_name").val();
		a2 = $("#register_birth").val();
		a3 = $("#register_gender").val();
		a4 = $("#register_address").val();
		a5 = $("#register_bhxh").val();								
		if(a1 == "" || a2 == "" || a3 == 0 || a4 == "" || a5 == ""){
			nofi("Vui lòng nhập đầy đủ thông tin");
		}else{
			check1 = test_symbol("#register_name");
			check2 = test_address("#register_address");
			check3 = test_login("#register_bhxh");
			if(check1 == 1 || check2 == 1 || check3 == 1){
				nofi("Vui lòng không nhập ký tự đặt biệt");	
			}else{
				main_ajax("register_exist",$("#register_bhxh").val());
			}
		}				
	})
	
//DOCTOR
	$("#doctor_name").keyup(function(){
		test_symbol_char("#doctor_name","#doctor_alert");		
	})
	
	$("#doctor_address").keyup(function(){
		test_address_char("#doctor_address","#doctor_alert");		
	})
	
	$("#doctor_phone").keyup(function(){
		test_number_char("#doctor_phone","#doctor_alert");			
	})

	$("#doctor_add_ok").click(function(){
		$("#doctor_alert").html("");	
		a1 = $("#doctor_name").val();
		a2 = $("#doctor_address").val();
		a3 = $("#doctor_position").val();
		a4 = $("#doctor_phone").val();							
		if(a1 == "" || a2 == 0 || a3 == ""|| a4 == ""){
			$("#doctor_alert").html("Vui lòng nhập đầy đủ thông tin");
		}else{
			check1 = test_symbol("#doctor_name");
			check2 = test_address("#doctor_address");
			check3 = test_number("#doctor_phone");
			if(check1 == 1 || check2 == 1 || check3 == 1){
				$("#doctor_alert").html("Vui lòng không nhập ký tự đặt biệt");
			}else{
				main_ajax("doctor_exist",$("#doctor_name").val(),$("#doctor_phone").val());
			}
		}				
	})
	
	$("#doctor_edit_ok").click(function(){
		$("#doctor_alert").html("");		
		a1 = $("#doctor_name").val();
		a2 = $("#doctor_address").val();
		a3 = $("#doctor_position").val();
		a4 = $("#doctor_phone").val();
		a5 = $(this).attr("data-id");							
		if(a1 == "" || a2 == 0 || a3 == ""|| a4 == ""){
			$("#doctor_alert").html("Vui lòng nhập đầy đủ thông tin");
		}else{
			check1 = test_symbol("#doctor_name");
			check2 = test_address("#doctor_address");
			check3 = test_number("#doctor_phone");
			if(check1 == 1 || check2 == 1 || check3 == 1){
				$("#doctor_alert").html("Vui lòng không nhập ký tự đặt biệt");
			}else{
				main_ajax("doctor_edit_exist",$("#doctor_name").val(),$("#doctor_phone").val(),$(this).attr("data-id"));
			}
		}				
	})
	
	$("#doctor_clear").click(function(){
		$("#doctor_edit_ok").attr("data-id",0);
		$("#doctor_edit_ok").hide();
		$("#doctor_clear").hide();
		$("#doctor_add_ok").fadeIn();
		
		$("#form_doctor input").val("");	
		$("#form_doctor select").val(0);		
	})
	
	$("#doctor_list").delegate(".doctor_edit","click",function(){
		$("#doctor_alert").html("");	
		main_ajax("doctor_detail",$(this).attr("data-id"));	
	})
	
	$("#doctor_list").delegate(".doctor_delete","click",function(){
		$("#doctor_confirm").fadeIn();
		$("#doctor_confirm_ok").attr("data-id",$(this).attr("data-id"));
	})
	
	$("#doctor_confirm_ok").click(function(){
		main_ajax("doctor_delete",$(this).attr("data-id"));
	})
	
	$("#doctor_confirm_close").click(function(){
		$("#doctor_confirm").fadeOut();
	})

//medicine
	$("#medicine_name").keyup(function(){
		test_symbol_char("#medicine_name","#medicine_alert");		
	})
	
	$("#medicine_cost").keyup(function(){
		test_number_char("#medicine_cost","#medicine_alert");			
	})
	
	$("#medicine_unit").keyup(function(){
		test_symbol_char("#medicine_unit","#medicine_alert");		
	})
	
	

	$("#medicine_add_ok").click(function(){
		$("#medicine_alert").html("");	
		a1 = $("#medicine_name").val();
		a2 = $("#medicine_cost").val();
		a3 = $("#medicine_unit").val();							
		if(a1 == "" || a2 == "" || a3 == ""){
			$("#medicine_alert").html("Vui lòng nhập đầy đủ thông tin");
		}else{
			check1 = test_symbol("#medicine_name");
			check2 = test_number("#medicine_cost");
			check3 = test_symbol("#medicine_unit");
			if(check1 == 1 || check2 == 1 || check3 == 1){
				$("#medicine_alert").html("Vui lòng không nhập ký tự đặt biệt");
			}else{
				main_ajax("medicine_exist",$("#medicine_name").val());
			}
		}				
	})
	
	$("#medicine_edit_ok").click(function(){
		$("#medicine_alert").html("");		
		a1 = $("#medicine_name").val();
		a2 = $("#medicine_cost").val();
		a3 = $("#medicine_unit").val();
		a4 = $(this).attr("data-id");							
		if(a1 == "" || a2 == "" || a3 == ""){
			$("#medicine_alert").html("Vui lòng nhập đầy đủ thông tin");
		}else{
			check1 = test_symbol("#medicine_name");
			check2 = test_number("#medicine_cost");
			check3 = test_symbol("#medicine_unit");
			if(check1 == 1 || check2 == 1 || check3 == 1){
				$("#medicine_alert").html("Vui lòng không nhập ký tự đặt biệt");
			}else{
				main_ajax("medicine_edit_exist",$("#medicine_name").val(),$(this).attr("data-id"));
			}
		}				
	})
	
	$("#medicine_clear").click(function(){
		$("#medicine_edit_ok").attr("data-id",0);
		$("#medicine_edit_ok").hide();
		$("#medicine_clear").hide();
		$("#medicine_add_ok").fadeIn();
		
		$("#form_medicine input").val("");		
	})
	
	$("#medicine_list").delegate(".medicine_edit","click",function(){
		$("#medicine_alert").html("");	
		main_ajax("medicine_detail",$(this).attr("data-id"));	
	})
	
	$("#medicine_list").delegate(".medicine_delete","click",function(){
		$("#medicine_confirm").fadeIn();
		$("#medicine_confirm_ok").attr("data-id",$(this).attr("data-id"));
	})
	
	$("#medicine_confirm_ok").click(function(){
		main_ajax("medicine_delete",$(this).attr("data-id"));
	})
	
	$("#medicine_confirm_close").click(function(){
		$("#medicine_confirm").fadeOut();
	})
	
//DISEASE
	$("#disease_name").keyup(function(){
		test_symbol_char("#disease_name","#disease_alert");		
	})
	
	$("#disease_method").keyup(function(){
		test_symbol_char("#disease_method","#disease_alert");			
	})
	
	$("#disease_add_ok").click(function(){
		$("#disease_alert").html("");	
		a1 = $("#disease_name").val();
		a2 = $("#disease_method").val();							
		if(a1 == "" || a2 == ""){
			$("#disease_alert").html("Vui lòng nhập đầy đủ thông tin");
		}else{
			check1 = test_symbol("#disease_name");
			check2 = test_symbol("#disease_method");
			if(check1 == 1 || check2 == 1){
				$("#disease_alert").html("Vui lòng không nhập ký tự đặt biệt");
			}else{
				main_ajax("disease_exist",$("#disease_name").val());
			}
		}				
	})
	
	$("#disease_edit_ok").click(function(){
		$("#disease_alert").html("");		
		a1 = $("#disease_name").val();
		a2 = $("#disease_method").val();
		a3 = $(this).attr("data-id");							
		if(a1 == "" || a2 == ""){
			$("#disease_alert").html("Vui lòng nhập đầy đủ thông tin");
		}else{
			check1 = test_symbol("#disease_name");
			check2 = test_symbol("#disease_method");
			if(check1 == 1 || check2 == 1){
				$("#disease_alert").html("Vui lòng không nhập ký tự đặt biệt");
			}else{
				main_ajax("disease_edit_exist",$("#disease_name").val(),$(this).attr("data-id"));
			}
		}				
	})
	
	$("#disease_clear").click(function(){
		$("#disease_edit_ok").attr("data-id",0);
		$("#disease_edit_ok").hide();
		$("#disease_clear").hide();
		$("#disease_add_ok").fadeIn();
		
		$("#form_disease input").val("");		
	})
	
	$("#disease_list").delegate(".disease_edit","click",function(){
		$("#disease_alert").html("");	
		main_ajax("disease_detail",$(this).attr("data-id"));	
	})
	
	$("#disease_list").delegate(".disease_delete","click",function(){
		$("#disease_confirm").fadeIn();
		$("#disease_confirm_ok").attr("data-id",$(this).attr("data-id"));
	})
	
	$("#disease_confirm_ok").click(function(){
		main_ajax("disease_delete",$(this).attr("data-id"));
	})
	
	$("#disease_confirm_close").click(function(){
		$("#disease_confirm").fadeOut();
	})
	
//SET CALENDAR
	$("#set_calendar_doctor").keyup(function(){
		check1 = test_symbol("#set_calendar_doctor");
		if(check1 == 1){
			$("#set_calendar_alert").html("Vui lòng không nhập ký tự đặt biệt.");
		}else{
			ajax_list("set_calendar_doctor_list",$(this).val());
		}
	})
	
	$("#set_calendar_doctor_list").delegate(".set_calendar_doctor_name","click",function(){
		$("#set_calendar_doctor").val($(this).html());
		$("#set_calendar_doctor_list").html("");	
		$("#set_calendar_ok").attr("data-id",$(this).attr("data-id"));	
	})
	
	$("#set_calendar_ok").click(function(){
		if($(this).attr("data-id")!=0){
			a1 = $(this).attr("data-id");
			a2 = $("#set_calendar_date").val()						
			if(a1 == "" || a2 == 0){
				$("#set_calendar_alert").html("Vui lòng nhập đầy đủ thông tin");
			}else{
				main_ajax("set_calendar",a1,a2);
			}
		}else{
			$("#set_calendar_alert").html("Vui lòng chọn bác sĩ/y tá");	
		}
						
	})
	
	$("#set_calendar_list").delegate(".set_calendar_delete","click",function(){	
		$("#set_calendar_confirm_ok").attr("data-id",$(this).attr("data-id"));
		$("#set_calendar_confirm").fadeIn();	
	})
	
	$("#set_calendar_confirm_ok").click(function(){
		main_ajax("set_calendar_delete",$(this).attr("data-id"));
	})
	
	$("#set_calendar_confirm_close").click(function(){
		$("#set_calendar_confirm").fadeOut();
	})
	
//CUSTOMER_CALENDAR
	$("#customer_calendar_list").delegate(".customer_calendar_ok","click",function(){	
		main_ajax("customer_calendar_ok",$(this).attr("data-id"));	
	})
	
	$("#customer_calendar_list").delegate(".customer_calendar_delete","click",function(){	
		$("#customer_calenda_confirm_ok").attr("data-id",$(this).attr("data-id"));
		$("#customer_calendar_confirm").fadeIn();	
	})
	
	$("#customer_calenda_confirm_ok").click(function(){
		main_ajax("customer_calendar_delete",$(this).attr("data-id"));	
	})
	
	$("#customer_calendar_list").delegate(".customer_calendar_detail","click",function(){
		ajax_list("customer_result",$(this).attr("data-id"));
		$("#customer_result").fadeIn();	
	})
	
	$("#customer_result_close").click(function(){
		$("#customer_result").fadeOut();	
	})
	
	$("#history_list").delegate(".doctor_rewatch_result","click",function(){
		ajax_list("rewatch_result",$(this).attr("data-id"));
		$("#rewatch_result").fadeIn();	
	})
	
	$("#rewatch_close").click(function(){
		$("#rewatch_result").fadeOut();	
	})
	
//RESULT
	//TEST	
	$("#history_list").delegate(".doctor_test","click",function(){
		$("#test_ok").attr("data-id",$(this).attr("data-id"));
		$("#history_test_form").fadeIn();
	})
	
	$("#test_content").keyup(function(){
		test_symbol_char("#test_content","#test_alert");		
	})
	
	$("#test_close").click(function(){
		$("#history_test_form").fadeOut();	
	})
	
	$("#test_ok").click(function(){
		$("#test_alert").html("");	
		a1 = $("#test_content").val();							
		if(a1 == ""){
			$("#doctor_alert").html("Vui lòng nhập đầy đủ thông tin");
		}else{
			check1 = test_symbol("#test_content");
			if(check1 == 1){
				$("#doctor_alert").html("Vui lòng không nhập ký tự đặt biệt");
			}else{
				main_ajax("send_test",$("#test_content").val(),$(this).attr("data-id"));
			}
		}				
	})
	
	//RESULT
	$("#history_list").delegate(".doctor_result","click",function(){
		$("#result_ok").attr("data-id",$(this).attr("data-id"));
		$("#history_result_form").fadeIn();
	})
	
	$("#result_close").click(function(){
		$("#history_result_form").fadeOut();	
	})
	
	$("#result_ok").click(function(){
		$("#result_alert").html("");	
		a1 = $("#result_disease").val();							
		if(a1 == 0){
			$("#result_alert").html("Vui lòng nhập đầy đủ thông tin");
		}else{
			main_ajax("send_result",$("#result_disease").val(),$(this).attr("data-id"));
		}				
	})
	
	//MEDICINE
	$("#history_list").delegate(".doctor_medicine","click",function(){
		$(".history_medicine").attr("data-book",$(this).attr("data-id"));
		$("#history_medicine_close").attr("data-id",$(this).attr("data-id"));
		$("#history_medicine_form").fadeIn();
	})
	
	$(".history_medicine").keyup(function(){
		main_ajax("send_medicine",$(this).val(),$(this).attr("data-id"),$(this).attr("data-book"));	
	})
	
	$("#history_medicine_close").click(function(){
		$("#history_medicine_form").fadeOut();
		main_ajax("send_medicine_delete",$(this).attr("data-id"));	
	})
	
	$("#history_medicine_ok").click(function(){							
		$("#history_medicine_form").fadeOut();	
		ajax_list("history_list");		
	})
	
});
