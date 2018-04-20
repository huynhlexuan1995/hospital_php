function main_ajax(action,a1,a2,a3,a4,a5,a6,a7,a8,a9,a10){
//LOGIN
		switch (action) {
			
			case "login":
				data="action="+action+"&a1="+a1+"&a2="+a2;
			break;
				
			case "register_exist":
				data="action="+action+"&a1="+a1;
			break;
				
			case "register":
				data="action="+action+"&a1="+a1+"&a2="+a2+"&a3="+a3+"&a4="+a4+"&a5="+a5;
			break;
			
			case "doctor_exist":
				data="action="+action+"&a1="+a1+"&a2="+a2;
			break;
			
			case "doctor_add":
				data="action="+action+"&a1="+a1+"&a2="+a2+"&a3="+a3+"&a4="+a4;
			break;
			
			case "doctor_detail":
				data="action="+action+"&a1="+a1;
			break;
			
			case "doctor_edit_exist":
				data="action="+action+"&a1="+a1+"&a2="+a2+"&a3="+a3;
			break;
			
			case "doctor_edit":
				data="action="+action+"&a1="+a1+"&a2="+a2+"&a3="+a3+"&a4="+a4+"&a5="+a5;
			break;
			
			case "doctor_delete":
				data="action="+action+"&a1="+a1;
			break;
			
//MEDICINE			
			case "medicine_exist":
				data="action="+action+"&a1=";
			break;
			
			case "medicine_add":
				data="action="+action+"&a1="+a1+"&a2="+a2+"&a3="+a3;
			break;
			
			case "medicine_detail":
				data="action="+action+"&a1="+a1;
			break;
			
			case "medicine_edit_exist":
				data="action="+action+"&a1="+a1+"&a2="+a2;
			break;
			
			case "medicine_edit":
				data="action="+action+"&a1="+a1+"&a2="+a2+"&a3="+a3+"&a4="+a4;
			break;
			
			case "medicine_delete":
				data="action="+action+"&a1="+a1;
			break;

//disease			
			case "disease_exist":
				data="action="+action+"&a1=";
			break;
			
			case "disease_add":
				data="action="+action+"&a1="+a1+"&a2="+a2;
			break;
			
			case "disease_detail":
				data="action="+action+"&a1="+a1;
			break;
			
			case "disease_edit_exist":
				data="action="+action+"&a1="+a1+"&a2="+a2;
			break;
			
			case "disease_edit":
				data="action="+action+"&a1="+a1+"&a2="+a2+"&a3="+a3;
			break;
			
			case "disease_delete":
				data="action="+action+"&a1="+a1;
			break;
			
//SET CALENDAR			
			case "set_calendar":
				data="action="+action+"&a1="+a1+"&a2="+a2;
			break;
			case "set_calendar_delete":
				data="action="+action+"&a1="+a1;
			break;

//CUSTOMER_CALENDAR			
			case "customer_calendar_ok":
				data="action="+action+"&a1="+a1;
			break;
			
			case "customer_calendar_delete":
				data="action="+action+"&a1="+a1;
			break;

//RESULT
			case "send_test":
				data="action="+action+"&a1="+a1+"&a2="+a2;
			break;
			
			case "send_result":
				data="action="+action+"&a1="+a1+"&a2="+a2;
			break;
			
			case "send_medicine":
				data="action="+action+"&a1="+a1+"&a2="+a2+"&a3="+a3;
			break;
			
			case "send_medicine_delete":
				data="action="+action+"&a1="+a1;
			break;
			

		}		
			$.ajax({
				url:"core/one.php",
				type:"post",
				data:data,
				dataType:"json",
				async:true,
				success:function(kq){
					switch (action) {
						
						case "login":
							if(kq.state !=0){
								location.reload();
							}else{
								$("#login_alert").html("Sai tên đăng nhập hoặc password");
							}
						break;
						
						case "register_exist":
							if(kq.state !=0){
								$("#register_alert").html("Sổ Bảo hiểm này đã được đăng ký");
							}else{
								main_ajax("register",$("#register_name").val(),$("#register_birth").val(),$("#register_gender").val(),$("#register_address").val(),$("#register_bhxh").val());
							}
						break;
						
						case "register":
							$("#form_register .button").hide();
							$("#form_register .form_close").hide();
							$("#form_register .reload").fadeIn();
							if(kq.state !=0){
								$("#register_alert").html("Đăng ký thành công!<br/>Tài khoản của bạn là: "+ kq.account + ";<br/>Mật khẩu là: "+ kq.pass);
							}	
						break;
						
						case "doctor_exist":
							if(kq.state !=0){
								$("#doctor_alert").html("Bác sĩ này đã được tạo");
							}else{
								main_ajax("doctor_add",$("#doctor_name").val(),$("#doctor_address").val(),$("#doctor_phone").val(),$("#doctor_position").val());
							}	
						break;
						case "doctor_add":
							if(kq.state !=0){
								$("#doctor_alert").html("Tạo thành công!<br/>Tài khoản của nhân viên là: "+ kq.account + ";<br/>Mật khẩu là: "+ kq.pass);
							}
							ajax_list("form_doctor_list");	
						break;
						
						case "doctor_detail":
							$("#doctor_name").val(kq.name);
							$("#doctor_address").val(kq.address);	
							$("#doctor_phone").val(kq.phone);
							$("#doctor_position").val(kq.position);
							
							$("#doctor_edit_ok").attr("data-id",kq.id);
							$("#doctor_edit_ok").fadeIn();
							$("#doctor_add_ok").hide();
							$("#doctor_edit").fadeIn();
							$("#doctor_clear").fadeIn();
						break;
						
						case "doctor_edit_exist":
							if(kq.state !=0){
								$("#doctor_alert").html("Bác sĩ này đã được tạo");
							}else{
								main_ajax("doctor_edit",$("#doctor_name").val(),$("#doctor_address").val(),$("#doctor_phone").val(),$("#doctor_position").val(),kq.id);
							}	
						break;
						
						case "doctor_edit":
							if(kq.state !=0){
								$("#doctor_alert").html("Chỉnh sửa thành công.");
								$("#doctor_clear").trigger("click");
							}
							ajax_list("form_doctor_list");	
						break;
						
						case "doctor_delete":
							ajax_list("form_doctor_list");
							$("#doctor_confirm").fadeOut();	
						break;
						
//MEDICINE				
						case "medicine_exist":
							if(kq.state !=0){
								$("#medicine_alert").html("Đã tồn tại");
							}else{
								main_ajax("medicine_add",$("#medicine_name").val(),$("#medicine_cost").val(),$("#medicine_unit").val());
							}	
						break;
						case "medicine_add":
							if(kq.state !=0){
								$("#medicine_alert").html("Tạo dữ liệu thành công");
							}
							ajax_list("form_medicine_list");	
						break;
						
						case "medicine_detail":
							$("#medicine_name").val(kq.name);
							$("#medicine_cost").val(kq.cost);	
							$("#medicine_unit").val(kq.unit);
							
							$("#medicine_edit_ok").attr("data-id",kq.id);
							$("#medicine_edit_ok").fadeIn();
							$("#medicine_add_ok").hide();
							$("#medicine_edit").fadeIn();
							$("#medicine_clear").fadeIn();
						break;
						
						case "medicine_edit_exist":
							if(kq.state !=0){
								$("#medicine_alert").html("Tạo thành công");
							}else{
								main_ajax("medicine_edit",$("#medicine_name").val(),$("#medicine_cost").val(),$("#medicine_unit").val(),kq.id);
							}	
						break;
						
						case "medicine_edit":
							if(kq.state !=0){
								$("#medicine_alert").html("Chỉnh sửa thành công.");
								$("#medicine_clear").trigger("click");
							}
							ajax_list("form_medicine_list");	
						break;
						
						case "medicine_delete":
							ajax_list("form_medicine_list");
							$("#medicine_confirm").fadeOut();	
						break;

//DISEASE				
						case "disease_exist":
							if(kq.state !=0){
								$("#disease_alert").html("Đã tồn tại");
							}else{
								main_ajax("disease_add",$("#disease_name").val(),$("#disease_method").val());
							}	
						break;
						case "disease_add":
							if(kq.state !=0){
								$("#disease_alert").html("Tạo dữ liệu thành công");
							}
							ajax_list("form_disease_list");	
						break;
						
						case "disease_detail":
							$("#disease_name").val(kq.name);
							$("#disease_method").val(kq.method);
							
							$("#disease_edit_ok").attr("data-id",kq.id);
							$("#disease_edit_ok").fadeIn();
							$("#disease_add_ok").hide();
							$("#disease_edit").fadeIn();
							$("#disease_clear").fadeIn();
						break;
						
						case "disease_edit_exist":
							if(kq.state !=0){
								$("#disease_alert").html("Tạo thành công");
							}else{
								main_ajax("disease_edit",$("#disease_name").val(),$("#disease_method").val(),kq.id);
							}	
						break;
						
						case "disease_edit":
							if(kq.state !=0){
								$("#disease_alert").html("Chỉnh sửa thành công.");
								$("#disease_clear").trigger("click");
							}
							ajax_list("form_disease_list");	
						break;
						
						case "disease_delete":
							ajax_list("form_disease_list");
							$("#disease_confirm").fadeOut();	
						break;

//STE_CALENDAR						
						case "set_calendar":
							if(kq.state !=0){
								$("#set_calendar_alert").html("Xếp lịch thành công");
								ajax_list("set_calendar_list");
							}	
						break;
						
						case "set_calendar_delete":
							ajax_list("set_calendar_list");
							$("#set_calendar_confirm").fadeOut();	
						break;


//CUSTOMER_CALENDAR						
						case "customer_calendar_ok":
							ajax_list("customer_calendar_ok",kq.id);	
						break;
						
						case "customer_calendar_delete":
							ajax_list("customer_calendar_ok",kq.id);
							$("#customer_calendar_confirm").fadeOut();	
						break;
						
//RESULT						
						case "send_test":
							ajax_list("history_list");
							$("#history_test_form").fadeOut();	
						break;
						
						case "send_result":
							ajax_list("history_list");
							$("#history_result_form").fadeOut();	
						break;
					}							
				}
			});
			
		}