function ajax_list(action,a1){
//CƠ QUAN	
		if(action=="set_calendar_doctor_list")
			{data="action="+action+"&a1="+a1;}
			
		else if(action=="set_calendar_list")
			{data="action="+action}	
			
		else if(action=="form_doctor_list")
			{data="action="+action}
		
		else if(action=="form_medicine_list")
			{data="action="+action}
			
		else if(action=="form_disease_list")
			{data="action="+action}
			
		else if(action=="customer_calendar_ok")
			{data="action="+action+"&a1="+a1;}
			
		else if(action=="customer_result")
			{data="action="+action+"&a1="+a1;}
			
		else if(action=="rewatch_result")
			{data="action="+action+"&a1="+a1;}
			
		else if(action=="history_list")
			{data="action="+action;}	
						
			$.ajax({
				url:"core/list.php",
				type:"post",
				data:data,
				async:true,
				success:function(kq){
					if(action=="doctor_list"){
						$("#set_calendar_list").html(kq);}
						
					if(action=="calendar")
						{$(".list").html(kq);}
						
					if(action=="form_doctor_list")
						{$("#doctor_list").html(kq);}
						
					if(action=="form_medicine_list")
						{$("#medicine_list").html(kq);}
						
					if(action=="form_disease_list")
						{$("#disease_list").html(kq);}
						
					if(action=="set_calendar_doctor_list")
						{$("#set_calendar_doctor_list").html(kq);}
						
					if(action=="set_calendar_list")
						{$("#set_calendar_list").html(kq);}
					
					if(action=="customer_calendar_ok")
						{$("#customer_calendar_list").html(kq);}
						
					if(action=="customer_result")
						{$("#customer_result_info").html(kq);}
						
					if(action=="rewatch_result")
						{$("#rewatch_info").html(kq);}
						
					if(action=="history_list")
						{$("#history_list").html(kq);}	
						
				}
			});
			
		}
