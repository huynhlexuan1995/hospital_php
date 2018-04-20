<?php
	session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

<meta name="keywords" content="Hospital, ứng dụng Công Nghệ trong Bệnh Viên, Công nghệ khám chữa bệnh Online" />
<meta name="description" content="Hospital System Online,Khám chữa bệnh hiệu quả." />

<link rel="icon" type="image/png" href="icon/icon.png"/>

<link rel="stylesheet" type="text/css" href="core/css.css"/>
<link rel="stylesheet" type="text/css" href="core/css_r.css"/>
<script src="core/jquery.js"></script>
<script src="core/object.js"></script>
<script src="core/function.js"></script>
<script src="core/time.js"></script>
<script src="core/one.js"></script>
<script src="core/list.js"></script>
<title>ONLINE HOSPITAL</title>
</head>

<body>
<div id = "back_top" style="position:fixed;z-index:10;bottom:10px;right:10px;height:40px;width:40px;border:1px solid #CCC;background-image:url(icon/back_top.png);background-repeat:no-repeat;background-position:center;background-size:30px 30px;background-color:#FFF;display:none;cursor:pointer;"></div>
<div id="top">
    <div id="top_content">
        <a id="logo" href="index.php">
            <div id="brand">ONLINE HOSPITAL</div>
        </a>
        <div style="height:120px;display:inline-block;">
            <div id="hotline">027538114</div>
            <div id="menu_top">
                <div id="home" class="menu_top">HOME</div>                
                <?php 
					if(isset($_SESSION["level"])){
						require("core/config.php");
						$r_account = mysqli_query($conn,"select * from account where id='".$_SESSION["id"]."'");
						$d_account = mysqli_fetch_assoc($r_account);
						if($_SESSION["level"]!=0){?>
                        	<div class="menu_top">QUẢN TRỊ
								<div>
									<a id="open_doctor">Quản lý bác sĩ</a>
                                    <a id="open_set_calendar">Đặt lịch khám</a>
									<a id="open_medicine">Quản lý thuốc</a>
									<a id="open_disease">Quản lý bệnh</a>
									
								</div>
							</div>
							<a href="core/logout.php" class="menu_top">ĐĂNG XUẤT</a>
						<?php 
							}else if($_SESSION["level"]==0){
								if($d_account["position"]>0){?>
                                	<a id="open_history" class="menu_top">LỊCH SỬ KHÁM</a>
                         <?php }else{?>
                         			<a id="open_calendar" class="menu_top">LỊCH KHÁM</a>	
						<?php }?>             	
                        	<a href="core/logout.php" class="menu_top">ĐĂNG XUẤT</a>
                        <?php 
							}
							mysqli_close($conn);
					}else{?>
                        <div id="open_login" class="menu_top">ĐĂNG NHẬP</div>
                        <div id="open_register" class="menu_top">ĐĂNG KÝ</div>	
					<?php 						
					}
					?>
            </div>
        </div>
    </div>
</div>
<div id="wrapper">
    
    <div id="slider">
        <div>
            <div style="background-image:url(pic/301842.jpg);">
                <a class="advertisement">LUÔN ỨNG DỤNG CÔNG NGHỆ Y KHOA MỚI NHẤT</a>
            </div>
            <div style="background-image:url(pic/301858.jpg);">
                <a class="advertisement">KHÔNG NGỪNG NÂNG CAO NĂNG LỰC KHÁM CHỮA BỆNH</a>
            </div>
            <div style="background-image:url(pic/302157.jpg);">
                <a class="advertisement">KHÁM VÀ ĐIỀU TRỊ BẰNG PHƯƠNG PHÁP HIỆN ĐẠI</a>
            </div>
            <div style="background-image:url(pic/301876.jpg);">
                <a class="advertisement">KIÊN ĐỊNH LẬP TRƯỜNG "LƯƠNG Y NHƯ TỪ MẪU"</a>
            </div>
            <div style="background-image:url(pic/302317.jpg);">
                <a class="advertisement">TẤT CẢ VÌ SỨC KHỎE CỦA BẠN</a>
            </div>
        </div>
    </div>
    <div id="service">
        <div class="width_limit">
        	<div id="service_title">DỊCH VỤ CỦA CHÚNG TÔI</div>
			<div id="service_intro">"Đội ngũ các chuyên gia của chúng tôi luôn sẵn sàng phục vụ bạn, tư vấn cho các giải pháp tốt nhất, Bạn sẽ tìm thấy nơi chúng tôi sự tận tâm và chuyên nghiệp"</div>
        </div>
        <div class="width_limit" style="margin-top:60px;">
        	<div class="service_item" style="background-image:url(icon/calendar.png);">
            	<div class="service_name">Đặt lịch khám online</div>
            </div>
            <div class="service_item" style="background-image:url(icon/ambulance.png);">
            	<div class="service_name">Đưa đón tận nhà</div>
            </div>
            <div class="service_item" style="background-image:url(icon/physiotherapy.png);">
            	<div class="service_name">Vật lý trị liệu tại nhà</div>
            </div>
            <div class="service_item" style="background-image:url(icon/report.png);">
            	<div class="service_name">Hồ sơ bệnh án online</div>
            </div>
            <div class="service_item" style="background-image:url(icon/shopping.png);">
            	<div class="service_name">Giao thuốc tận nhà</div>
            </div>
        </div>
    </div>
    
    <div id="form_login" class="form">
    	<div class="form_img" style="background-image:url(pic/302012.jpg);">
       		<div style="max-width:350px;">
            	<div class="form_title">ĐĂNG NHẬP</div>
                <table>
                	<tr>
                    	<td><input id="login_name" type="text" placeholder="Username" style="width:100%;"/></td>
                    </tr>
                    <tr>
                    	<td><input id="login_pass" type="password" placeholder="Password" style="width:100%;"/></td>
                    </tr>
                    <tr>
                    	<td style="text-align:center;padding-top:20px;">
                        	<div id="login_ok" class="button" style="width:80px;">Xác nhận</div>                            
                           	<div class="form_close" style="width:80px;">Đóng</div>
                       </td>
                    </tr>
                    <tr>
                    	<td id="login_alert" class="form_alert"></td>
                    </tr>
                </table>
            </div> 
        </div>
    </div>
    
    <div id="form_register" class="form">
    	<div class="form_img" style="background-image:url(pic/39132767-hospital-wallpapers.jpg);">
       		<div style="max-width:350px;">
            	<div class="form_title">ĐĂNG KÝ</div>
                <table>
                	<tr>
                    	<td><input id="register_name" type="text" placeholder="Họ tên" style="width:100%;"/></td>
                    </tr>
                    
                    <tr>
                    	<td><input id="register_address" type="text" placeholder="Địa chỉ" style="width:100%;"/></td>
                    </tr>
                    <tr>
                    	<td><input id="register_bhxh" type="text" placeholder="Mã Bảo hiểm Xã hội" style="width:100%;"/></td>
                    </tr>
                    <tr>
                    	<td><input id="register_birth" type="text" placeholder="Ngày sinh (Tháng/Ngày/Năm)" onfocus="(this.type='date')" onfocusout="(this.type='type')" style="width:100%;"/></td>
                    </tr>
                     <tr>
                    	<td>
                        	<select id="register_gender" style="width:calc(100% + 5px);">
                        		<option value="0">Vui lòng chọn giới tính</option>
                                <option value="1">Nam</option>
                                <option value="2">Nữ</option>
                            </select>
                       	</td>
                    </tr>
                    
                    <tr>
                    	<td style="text-align:center;padding-top:20px;">
                        	<div id="register_ok" class="button" style="width:80px;">Xác nhận</div>
                            <div class="reload" style="width:80px;display:none;">Đăng nhập</div>
                           	<div class="form_close" style="width:80px;">Đóng</div>
                       </td>
                    </tr>
                    <tr>
                    	<td id="register_alert" class="form_alert"></td>
                    </tr>
                </table>
            </div> 
        </div>
    </div>
    
    <div id="form_doctor" class="form">
    	<div id="doctor_confirm" class="delete_confirm" style="width:300px;left:calc(50% - 160px);top:100px;">
        	<div class="delete_confirm_title">THÔNG BÁO</div>
            <div class="delete_confirm_info">Xác nhận xóa nhân viên này?</div>
            <div style="width:100%;text-align:center;">
            	<div id="doctor_confirm_ok" data-id="0" class="button">Xác nhận</div>
                <div id="doctor_confirm_close" class="button">Hủy</div>
            </div>
        </div>
    	<div class="form_img" style="background-image:url(pic/302638.jpg);">
       		<div>
            	<div class="form_title">QUẢN LÝ BÁC SĨ</div>
                <table style="max-width:350px;float:left;">
                	<tr>
                    	<td><input id="doctor_name" type="text" placeholder="Họ tên" style="width:100%;"/></td>
                    </tr>
                    
                    <tr>
                    	<td><input id="doctor_address" type="text" placeholder="Địa chỉ" style="width:100%;"/></td>
                    </tr>
                    <tr>
                    	<td><input id="doctor_phone" type="text" placeholder="Số điện thoại" style="width:100%;"/></td>
                    </tr>
                     <tr>
                    	<td>
                        	<select id="doctor_position" style="width:calc(100% + 5px);">
                        		<option value="0">Vui lòng chọn chức vụ</option>
                                <option value="1">Bác sĩ</option>
                                <option value="2">Y tá</option>
                            </select>
                       	</td>
                    </tr>
                    
                    <tr>
                    	<td style="text-align:center;padding-top:20px;">
                        	<div id="doctor_add_ok" class="button" style="width:70px;">Xác nhận</div>
                            <div id="doctor_edit_ok" class="button" style="width:70px;display:none;">Sửa</div>
                            <div id="doctor_clear" class="button" style="width:70px;display:none;">Clear</div>
                           	<div class="reload" style="width:70px;">Đóng</div>
                       </td>
                    </tr>
                    <tr>
                    	<td id="doctor_alert" class="form_alert"></td>
                    </tr>
                </table>
                <!--LIST-->
                <div id="doctor_list" class="list" style="width:calc(100% - 400px);height:400px;">
                    <table>
                        <tr>
                            <th style="width:50px;">STT</th>
                            <th>Họ và tên</th>
                            <th>Chức vụ</th>
                            <th style="width:145px;">Thao tác</th>
                        </tr>
                        <?php 
							include("core/config.php");
							$r_doctor = mysqli_query($conn,"select * from account where position >= '1' order by id");
							$stt = 1;
							while($d_doctor = mysqli_fetch_assoc($r_doctor)){
						?>
                                <tr>
                                    <td style="text-align:center;"><?php echo $stt;?></td>
                                    <td><?php echo $d_doctor["name"];?></td>
                                    <td><?php if($d_doctor["position"]==1){echo "Bác sĩ";}else{echo "Y tá";}?></td>
                                    <td style="text-align:center;">
                                        <div class="doctor_edit" data-id="<?php echo $d_doctor["id"];?>">Sửa</div>
                                        <div class="doctor_delete" data-id="<?php echo $d_doctor["id"];?>">Xóa</div>
                                    </td>
                                </tr>
                        <?php 
								$stt = $stt + 1;
							}
							mysqli_close($conn);
						?>	
                    </table>
                </div>
            </div> 
        </div>
    </div>
    
    <div id="form_set_calendar" class="form">
    	<div id="set_calendar_confirm" class="delete_confirm" style="width:300px;left:calc(50% - 160px);top:100px;">
        	<div class="delete_confirm_title">THÔNG BÁO</div>
            <div class="delete_confirm_info">Xác nhận xóa nhân viên này?</div>
            <div style="width:100%;text-align:center;">
            	<div id="set_calendar_confirm_ok" data-id="0" class="button">Xác nhận</div>
                <div id="set_calendar_confirm_close" class="button">Hủy</div>
            </div>
        </div>
    	<div class="form_img" style="background-image:url(pic/302638.jpg);">
       		<div>
            	<div class="form_title">QUẢN LÝ LỊCH KHÁM</div>
                <table style="max-width:350px;float:left;">
                	<tr>
                    	<td><input id="set_calendar_date" type="text" placeholder="Ngày khám (Tháng/Ngày/Năm)" onfocus="(this.type='date')" onfocusout="(this.type='type')" style="width:100%;"/></td>
                    </tr>
                    <tr>
                    	<td><input id="set_calendar_doctor" type="text" placeholder="Tên bác sĩ" data-id="0" style="width:100%;"/></td>
                    </tr>
                    <tr>
                    	<td><div id="set_calendar_doctor_list" class="form_list" style="width:100%;height:90px;"></div></td>
                    </tr>                    
                    <tr>
                    	<td style="text-align:center;padding-top:20px;">
                        	<div id="set_calendar_ok" data-id="0" class="button" style="width:70px;">Xác nhận</div>
                           	<div class="reload" style="width:70px;">Đóng</div>
                       </td>
                    </tr>
                    <tr>
                    	<td id="set_calendar_alert" class="form_alert"></td>
                    </tr>
                </table>
                <!--LIST-->
                <div id="set_calendar_list" class="list" style="width:calc(100% - 400px);height:400px;">
                    <table>
                        <tr>
                            <th style="width:100px;">Ngày khám</th>
                            <th>Họ và tên</th>
                            <th>Chức vụ</th>
                            <th style="width:70px;">Thao tác</th>
                        </tr>
                        <?php 
							include("core/config.php");
							$r_calendar = mysqli_query($conn,"select * from calendar order by date");
							while($d_calendar = mysqli_fetch_assoc($r_calendar)){
								$r_calendar_doctor = mysqli_query($conn,"select * from account where id='".$d_calendar["doctor"]."'");
								$d_calendar_doctor = mysqli_fetch_assoc($r_calendar_doctor);
						?>
                                <tr>
                                    <td style="text-align:center;">
										<?php 
											$caledar_date = date_create($d_calendar["date"]);
											echo date_format($caledar_date,"d-n-Y");
										?>
                                    </td>
                                    <td><?php echo $d_calendar_doctor["name"];?></td>
                                    <td><?php if($d_calendar_doctor["position"]==1){echo "Bác sĩ";}else{echo "Y tá";}?></td>
                                    <td style="text-align:center;">
                                        <div class="set_calendar_delete" data-id="<?php echo $d_calendar["id"];?>">Xóa</div>
                                    </td>
                                </tr>
                        <?php 
								$stt = $stt + 1;
							}
							mysqli_close($conn);
						?>	
                    </table>
                </div>
            </div> 
        </div>
    </div>
    
    <div id="form_medicine" class="form">
    	<div id="medicine_confirm" class="delete_confirm" style="width:300px;left:calc(50% - 160px);top:100px;">
        	<div class="delete_confirm_title">THÔNG BÁO</div>
            <div class="delete_confirm_info">Xác nhận xóa?</div>
            <div style="width:100%;text-align:center;">
            	<div id="medicine_confirm_ok" data-id="0" class="button">Xác nhận</div>
                <div id="medicine_confirm_close" class="button">Hủy</div>
            </div>
        </div>
    	<div class="form_img" style="background-image:url(pic/302638.jpg);">
       		<div>
            	<div class="form_title">QUẢN LÝ THUỐC</div>
                <table style="max-width:350px;float:left;">
                	<tr>
                    	<td><input id="medicine_name" type="text" placeholder="Tên thuốc" style="width:100%;"/></td>
                    </tr>
                    <tr>
                    	<td><input id="medicine_cost" type="number" placeholder="Đơn giá" style="width:100%;"/></td>
                    </tr>
                    <tr>
                    	<td><input id="medicine_unit" type="text" placeholder="Đơn vị tính" style="width:100%;"/></td>
                    </tr>                    
                    <tr>
                    	<td style="text-align:center;padding-top:20px;">
                        	<div id="medicine_add_ok" class="button" style="width:70px;">Xác nhận</div>
                            <div id="medicine_edit_ok" class="button" style="width:70px;display:none;">Sửa</div>
                            <div id="medicine_clear" class="button" style="width:70px;display:none;">Clear</div>
                           	<div class="reload" style="width:70px;">Đóng</div>
                       </td>
                    </tr>
                    <tr>
                    	<td id="medicine_alert" class="form_alert"></td>
                    </tr>
                </table>
                <!--LIST-->
                <div id="medicine_list" class="list" style="width:calc(100% - 400px);height:400px;">
                    <table>
                        <tr>
                            <th style="width:50px;">STT</th>
                            <th>Tên thuốc</th>
                            <th>Đơn giá</th>
                            <th>Đơn vị tính</th>
                            <th style="width:145px;">Thao tác</th>
                        </tr>
                        <?php 
							include("core/config.php");
							$r_medicine = mysqli_query($conn,"select * from medicine order by name");
							$stt = 1;
							while($d_medicine = mysqli_fetch_assoc($r_medicine)){
						?>
                                <tr>
                                    <td style="text-align:center;"><?php echo $stt;?></td>
                                    <td><?php echo $d_medicine["name"];?></td>
                                    <td><?php echo number_format($d_medicine["cost"]);?></td>
                                    <td><?php echo $d_medicine["unit"];?></td>
                                    <td style="text-align:center;">
                                        <div class="medicine_edit" data-id="<?php echo $d_medicine["id"];?>">Sửa</div>
                                        <div class="medicine_delete" data-id="<?php echo $d_medicine["id"];?>">Xóa</div>
                                    </td>
                                </tr>
                        <?php 
								$stt = $stt + 1;
							}
							mysqli_close($conn);
						?>	
                    </table>
                </div>
            </div> 
        </div>
    </div>
    
    <div id="form_disease" class="form">
    	<div id="disease_confirm" class="delete_confirm" style="width:300px;left:calc(50% - 160px);top:100px;">
        	<div class="delete_confirm_title">THÔNG BÁO</div>
            <div class="delete_confirm_info">Xác nhận xóa?</div>
            <div style="width:100%;text-align:center;">
            	<div id="disease_confirm_ok" data-id="0" class="button">Xác nhận</div>
                <div id="disease_confirm_close" class="button">Hủy</div>
            </div>
        </div>
    	<div class="form_img" style="background-image:url(pic/302638.jpg);">
       		<div>
            	<div class="form_title">QUẢN LÝ BỆNH</div>
                <table style="max-width:350px;float:left;">
                	<tr>
                    	<td><input id="disease_name" type="text" placeholder="Tên bệnh" style="width:100%;"/></td>
                    </tr>
                    <tr>
                    	<td><textarea id="disease_method" type="number" placeholder="Phương pháp điều trị" style="width:100%;height:100px;"></textarea>
                    </tr>                   
                    <tr>
                    	<td style="text-align:center;padding-top:20px;">
                        	<div id="disease_add_ok" class="button" style="width:70px;">Xác nhận</div>
                            <div id="disease_edit_ok" class="button" style="width:70px;display:none;">Sửa</div>
                            <div id="disease_clear" class="button" style="width:70px;display:none;">Clear</div>
                           	<div class="reload" style="width:70px;">Đóng</div>
                       </td>
                    </tr>
                    <tr>
                    	<td id="disease_alert" class="form_alert"></td>
                    </tr>
                </table>
                <!--LIST-->
                <div id="disease_list" class="list" style="width:calc(100% - 400px);height:400px;">
                    <table>
                        <tr>
                            <th style="width:50px;">STT</th>
                            <th>Tên thuốc</th>
                            <th>Đơn giá</th>
                            <th style="width:145px;">Thao tác</th>
                        </tr>
                        <?php 
							include("core/config.php");
							$r_disease = mysqli_query($conn,"select * from disease order by name");
							$stt = 1;
							while($d_disease = mysqli_fetch_assoc($r_disease)){
						?>
                                <tr>
                                    <td style="text-align:center;"><?php echo $stt;?></td>
                                    <td><?php echo $d_disease["name"];?></td>
                                    <td><?php echo $d_disease["method"];?></td>
                                    <td style="text-align:center;">
                                        <div class="disease_edit" data-id="<?php echo $d_disease["id"];?>">Sửa</div>
                                        <div class="disease_delete" data-id="<?php echo $d_disease["id"];?>">Xóa</div>
                                    </td>
                                </tr>
                        <?php 
								$stt = $stt + 1;
							}
							mysqli_close($conn);
						?>	
                    </table>
                </div>
            </div> 
        </div>
    </div>
    
</div>

<?php
	require("core/config.php");
	if(isset($_SESSION["id"]) && $_SESSION["level"]!=1){
		$r_user_type= mysqli_query($conn,"select * from account where id='".$_SESSION["id"]."'");
		$d_user_type= mysqli_fetch_assoc($r_user_type);
		if($d_user_type["position"]<1){
?>
<div id="customer_calendar" style="position:relative;text-align:center;background-image:url(pic/27048960-hospital-wallpapers.jpg);padding:20px 0 20px 0;">
	
    <div id="customer_calendar_confirm" class="delete_confirm" style="width:300px;left:calc(50% - 160px);top:100px;">
        <div class="delete_confirm_title">THÔNG BÁO</div>
        <div class="delete_confirm_info">Xác nhận hủy lịch hẹn?</div>
        <div style="width:100%;text-align:center;">
            <div id="customer_calenda_confirm_ok" data-id="0" class="button">Xác nhận</div>
            <div id="customer_calenda_confirm_close" class="button">Hủy</div>
        </div>
    </div>
    
    <div id="customer_result" style="width:400px;height:500px;left:calc(50% - 200px);top:20px;">
        <div id="customer_result_title" style="width:calc(100% + 2px);">KẾT QUẢ LẦN KHÁM</div>
        <div id="customer_result_info" style="width:100%;height:380px;border:1px solid #CCC;overflow-y:scroll;">
        
        </div>
        <div style="position:absolute;left:0px;bottom:10px;width:100%;text-align:center;">
            <div id="customer_result_close" class="button">Đóng</div>
        </div>
    </div>
    
    <div class="width_limit" style="height:550px;">
    	<div class="form_title" style="color:#FFF;">LỊCH KHÁM</div>
        <div id="customer_calendar_list" class="list" style="width:100%;border:1px solid#CCCCCC;height:460px;">
        	<table style="width:calc(100% - 20px);">
            	<tr>
                	<th style="width:100px;">Ngày</th>
                    <th>Bác sĩ</th>
                    <?php 
						if(isset($_SESSION["level"]) && $_SESSION["level"] < 1 && $d_user_type["position"]< 1 ){
					?>
                    	<th style="width:220px;">Thao tác</th>
                    <?php } ?>
                    
                </tr>
                <?php
					$r_customer_calendar = mysqli_query($conn,"select * from calendar order by date");
					while($d_customer_calendar = mysqli_fetch_assoc($r_customer_calendar)){
						$r_customer_calendar_doctor = mysqli_query($conn,"select * from account where id='".$d_customer_calendar["doctor"]."'");
						$d_customer_calendar_doctor = mysqli_fetch_assoc($r_customer_calendar_doctor); 	
					?>
						<tr>
                        	<td style="text-align:center;">
								<?php 
									$customer_calendar_date = date_create($d_customer_calendar["date"]);
									$customer_calendar_date = date_format($customer_calendar_date,"d/m/Y");
									echo $customer_calendar_date; 
								?>                                
                            </td>
                            <td><?php echo $d_customer_calendar_doctor["name"];?></td>
                            <?php 
								if(isset($_SESSION["level"]) && $_SESSION["level"] < 1 && $d_user_type["position"]< 1 ){	
							?>
								<td>
                                <?php 
								$r_book = mysqli_query($conn,"select * from book where user='".$_SESSION["id"]."' and doctor='".$d_customer_calendar_doctor["id"]."' and date='".$d_customer_calendar["date"]."'");	
								if(mysqli_num_rows($r_book)!=0){
									$d_book = mysqli_fetch_assoc($r_book);
									$flat = 0;
									
									$test_r = mysqli_query($conn,"select * from test where book='".$d_book["id"]."'");
									if(mysqli_num_rows($test_r)!=0){$flat = 1;}
									
									$result_r = mysqli_query($conn,"select * from result where book='".$d_book["id"]."'");
									if(mysqli_num_rows($result_r)!=0){$flat = 1;}
									
									$medicine_r = mysqli_query($conn,"select * from medicine_suggest where book='".$d_book["id"]."'");
									if(mysqli_num_rows($medicine_r)!=0){$flat = 1;}
									
									if($flat!=0){?>
										<div class="customer_calendar_detail" data-id="<?php echo $d_book["id"];?>">Xem kết quả</div>	
							  <?php }else{	
									?>
										<div class="customer_calendar_delete" data-id="<?php echo $d_customer_calendar["id"];?>">Hủy lịch</div>
									 <?php
							  		}
								}else{?>
									<div class="customer_calendar_ok" data-id="<?php echo $d_customer_calendar["id"];?>">Đặt lịch</div>
						  <?php } ?>                                 
                                </td>
							<?php } ?>
                            
                        </tr>	
				<?php }
				mysqli_close($conn);
				?>
            </table>
        </div>
    </div>
</div>

<?php 
	}else{
?>

<div id="history" style="position:relative;text-align:center;background-image:url(pic/27048960-hospital-wallpapers.jpg);padding:20px 0 20px 0;">
    <div id="history_test_form" class="sub_form">
    	<div class="form_title" style="color:#FFF;padding:50px 0 10px 0;">YÊU CẦU XÉT NGHIỆM</div>
        <table style="max-width:400px;margin-left:calc(50% - 200px);">
        	<tr>
            	<td><textarea id="test_content" type="text" placeholder="Nội dung yêu cầu xét nghiệm" style="width:100%;height:200px;"></textarea></td>
            </tr>
            <tr>
            	<td style="padding:20px 0  0 0;">
                	<div id="test_ok" data-id="0" class="button">Gửi</div>
                    <div id="test_close" class="button">Đóng</div>
                </td>
            </tr>
            <tr>
            	<td id="test_alert" class="form_alert">
                </td>
            </tr>
        </table>
    </div>
    
    <div id="history_result_form" class="sub_form">
    	<div class="form_title" style="color:#FFF;padding:50px 0 10px 0;">KẾT QUẢ KHÁM BỆNH</div>
        <table style="max-width:400px;margin-left:calc(50% - 200px);">
        	<tr>
            	<td>
                	<select id="result_disease" style="width:100%;">
                    	<option value="0">Vui lòng chọn bệnh</option>
                        <?php 
							require("core/config.php");
							$r_result = mysqli_query($conn,"select * from disease order by name");
							while($d_result = mysqli_fetch_assoc($r_result)){
						?>
                        		<option value="<?php echo $d_result["id"];?>"><?php echo $d_result["name"];?></option>
                        <?php
							}
						?>
                    </select>
                </td>
            </tr>
            <tr>
            	<td id="result_alert" class="form_alert">
                </td>
            </tr>
            <tr>
            	<td style="padding:20px 0  0 0;">
                	<div id="result_ok" data-id="0" class="button">Gửi</div>
                    <div id="result_close" class="button">Đóng</div>
                </td>
            </tr>
        </table>
    </div>
    
    <div id="history_medicine_form" class="sub_form">
    	<div class="form_title" style="color:#FFF;padding:50px 0 10px 0;">KÊ ĐƠN THUỐC</div>
        <table style="max-width:400px;margin-left:calc(50% - 200px);border:1px solid #FFF;">
        	<tr>
            	<th>
                	DANH SÁCH THUỐC
                </th>
            </tr>
        	<tr>
            	<td>
                	<div style="height:300px;width:100%;overflow-y:scroll;">
                    	<?php 
							require("core/config.php");
							$r_result_medicine = mysqli_query($conn,"select * from medicine order by name");
							while($d_result_medicine = mysqli_fetch_assoc($r_result_medicine)){
						?>
                        	<input class="history_medicine" type="text" placeholder="<?php echo $d_result_medicine["name"]." (".$d_result_medicine["unit"].")";?>" data-book="0" data-id="<?php echo $d_result_medicine["id"];?>" style="width:calc(100% - 10px);margin-top:2px;"/>
                        <?php }
							mysqli_close($conn);
						 ?>
                    </div>
                </td>
            </tr>
            <tr>
            	<td colspan="4" style="padding:10px 0  10px 0;text-align:center;">
                	<div id="history_medicine_ok" data-id="0" class="button">Xác nhận</div>
                    <div id="history_medicine_close" data-id="0" class="button">Đóng</div>
                </td>
            </tr>
        </table>
    </div>
    
    <div id="rewatch_result" style="width:400px;height:500px;left:calc(50% - 200px);top:20px;">
        <div id="rewatch_title" style="width:calc(100% + 2px);">KẾT QUẢ LẦN KHÁM</div>
        <div id="rewatch_info" style="width:100%;height:380px;border:1px solid #CCC;overflow-y:scroll;">
        
        </div>
        <div style="position:absolute;left:0px;bottom:10px;width:100%;text-align:center;">
            <div id="rewatch_close" class="button">Đóng</div>
        </div>
    </div>
    
    <div class="width_limit" style="height:550px;">
    	<div class="form_title" style="color:#FFF;">LỊCH SỬ KHÁM</div>
        <div id="history_list" class="list" style="width:100%;border:1px solid#CCCCCC;height:460px;">
        	<table style="width:calc(100% - 20px);">
            	<tr>
                	<th style="width:100px;">Ngày</th>
                    <th>Bệnh nhân</th>
                    <th style="width:auto;">Thao tác</th>
                </tr>
                <?php
					require("core/config.php");
					$r_history = mysqli_query($conn,"select * from book where doctor='".$_SESSION["id"]."' order by date");
					while($d_history = mysqli_fetch_assoc($r_history)){
						$r_customer = mysqli_query($conn,"select * from account where id='".$d_history["user"]."'");
						$d_customer = mysqli_fetch_assoc($r_customer); 
					?>
						<tr>
                        	<td style="text-align:center;">
								<?php 
									$d_customer_date = date_create($d_history["date"]);
									$d_customer_date = date_format($d_customer_date,"d/m/Y");
									echo $d_customer_date;
								?>                                
                            </td>
                            <td><?php echo $d_customer["name"];?></td>
                            <td>
                            	<?php
								$flat_resutl = 0; 
								
									$r_test = mysqli_query($conn,"select * from test where book = '".$d_history["id"]."'");
									if(mysqli_num_rows($r_test)==0){
									$flat_resutl = 1; 	
								?>
                            	<div class="doctor_test" data-id="<?php echo $d_history["id"];?>">Xét nghiệm</div>
                                <?php }?>
                                
                                <?php 
									$r_result = mysqli_query($conn,"select * from result where book = '".$d_history["id"]."'");
									if(mysqli_num_rows($r_result)==0){
									$flat_resutl = 1;
								?>
                            		<div class="doctor_result" data-id="<?php echo $d_history["id"];?>">Kết quả</div>
                                <?php }?>
                                
                                <?php 
									$r_medicine_suggest = mysqli_query($conn,"select * from medicine_suggest where book = '".$d_history["id"]."'");
									if(mysqli_num_rows($r_medicine_suggest)==0){
									$flat_resutl = 1;
								?>
                            		<div class="doctor_medicine" data-id="<?php echo $d_history["id"];?>">Đơn thuốc</div>
                                <?php }?>
 								<?php 
									if($flat_resutl = 1){?>
                                    <div class="doctor_rewatch_result" data-id="<?php echo $d_history["id"];?>">Kết quả</div>
                                <?php }?>                               
                            </td>
                        </tr>	
				<?php }
				mysqli_close($conn);
				?>
            </table>
        </div>
    </div>
</div>
<?php
	}
}?>


<div id="slogan">
    <div class="width_limit">
        <div>Y ĐỨC, TRÁCH NHIỆM, HIỆU QUẢ</div>
        <div>Là cam kết dịch vụ của chúng tôi</div>
        <div id="open_register2" class="button">Đăng ký ngay</div>
    </div>
</div>

<div id="hot_line">
    <div class="width_limit">
        <div class="hot_line">
            <div>Tư vấn dịch vụ</div>
            <div>19001060</div>
        </div>
        <div class="hot_line">
            <div>Phản ánh dịch vụ</div>
            <div>19001060</div>
        </div>
        <div class="hot_line">
            <div>Hotline 24/24</div>
            <div>19001060</div>
        </div>
    </div>
</div>

<div id="menu_bottom">
    <div class="width_limit" style="max-width:960px;">
        <div class="menu_bottom">
            <div id="menu_bottom_logo" style="background-image:url(icon/logo_blue.png);">
                <div>ONLINE HOSPITAL</div>
                <div>Y đức là giá trị cốt lõi.</div>
            </div>
        </div>
        <div id="menu_bottom_service" class="menu_bottom">
            <div style="padding:50px 0 10px 0;font-family:dam;">DỊCH VỤ</div>
            <div>Đặt lịch khám online</div>
            <div>Đưa đón tận nhà</div>
            <div>Vật lý trị liệu tại nhà</div>
            <div>Hồ sơ bệnh án online</div>
            <div>Giao thuốc tận nhà</div>
        </div>
        <div id="menu_bottom_company" class="menu_bottom">
            <div style="padding:50px 0 10px 0;font-family:dam;">CÔNG TY</div>
            <div>Thông tin</div>
            <div>Địa chỉ</div>
            <div>Hotline</div>
        </div>
    </div>
</div>

<div id="bottom">
    Design: Huynhlx
    </div>
</body>
</html>