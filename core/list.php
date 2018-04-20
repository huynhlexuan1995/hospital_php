<?php
	session_start();
	
	switch($_POST["action"]){	
		
//LIST DOCTOR		
		case 'set_calendar_doctor_list':
			require('config.php');
			$name = addslashes($_POST['a1']);
			$r = mysqli_query($conn,"select * from account where name like '%$name%' and position >= '1'");
			while($d= mysqli_fetch_assoc($r)){	
		?>
			<div class="set_calendar_doctor_name" data-id="<?php echo $d["id"];?>" ><?php echo $d["name"];?></div>	
		<?php
			}
            mysqli_close($conn);		
		break;
		
		case 'form_doctor_list':?>
        	<table>
                <tr>
                    <th style="width:50px;">STT</th>
                    <th>Họ và tên</th>
                    <th>Chức vụ</th>
                    <th style="width:145px;">Thao tác</th>
                </tr>
        <?php
			require('/config.php');
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
			}?>
            </table>
            <?php
			mysqli_close($conn);
		break;
		
		case 'form_medicine_list':?>
        	 <table>
                <tr>
                    <th style="width:50px;">STT</th>
                    <th>Tên thuốc</th>
                    <th>Đơn giá</th>
                    <th>Đơn vị tính</th>
                    <th style="width:145px;">Thao tác</th>
                </tr>
                <?php 
                    include("config.php");
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
                ?>	
            </table>
            <?php
			mysqli_close($conn);
		break;
		
		case 'form_disease_list':?>
        	 <table>
                <tr>
                    <th style="width:50px;">STT</th>
                    <th>Tên thuốc</th>
                    <th>Phương pháp điều trị</th>
                    <th style="width:145px;">Thao tác</th>
                </tr>
                <?php 
                    include("config.php");
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
                ?>	
            </table>
            <?php
			mysqli_close($conn);
		break;
		
		case 'set_calendar_list':?>
        	 <table>
                <tr>
                    <th style="width:100px;">Ngày khám</th>
                    <th>Họ và tên</th>
                    <th>Chức vụ</th>
                    <th style="width:70px;">Thao tác</th>
                </tr>
                <?php 
                    include("config.php");
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
                    }
                    mysqli_close($conn);
                ?>	
            </table>
	<?php break;
	
	case 'customer_calendar_ok':?>
         <table style="width:calc(100% - 20px);">
            <tr>
                <th style="width:100px;">Ngày</th>
                <th>Bác sĩ</th>
                <?php 
                    if(isset($_SESSION["level"]) && $_SESSION["level"] < 1){
                ?>
                    <th style="width:220px;">Thao tác</th>
                <?php } ?>
                
            </tr>
            <?php
                require("config.php");
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
							if(isset($_SESSION["level"]) && $_SESSION["level"] < 1){	
						?>
							<td>
							<?php 
								$r_book = mysqli_query($conn,"select * from book where user='".$_SESSION["id"]."' and doctor='".$d_customer_calendar_doctor["id"]."' and date='".$d_customer_calendar["date"]."'");
								if(mysqli_num_rows($r_book)!=0){
							?>
								<div class="customer_calendar_delete" data-id="<?php echo $d_customer_calendar["id"];?>">Hủy lịch</div>
							 <?php
								}else{
							 ?>
								<div class="customer_calendar_ok" data-id="<?php echo $d_customer_calendar["id"];?>">Đặt lịch</div>
							 <?php } ?>                                 
							</td>
						<?php } ?>
                    </tr>	
            <?php }
            mysqli_close($conn);
            ?>
        </table>
	<?php break;
	
	case 'customer_result':
		$book = addslashes($_POST['a1']);	
			require("config.php");
			$r_book = mysqli_query($conn,"select * from book where id='$book'");
			$d_book = mysqli_fetch_assoc($r_book);
			$r_user = mysqli_query($conn,"select * from account where id='".$d_book["user"]."'");
			$d_user = mysqli_fetch_assoc($r_user);
			$r_doctor = mysqli_query($conn,"select * from account where id='".$d_book["doctor"]."'");
			$d_doctor = mysqli_fetch_assoc($r_doctor);
			?>
		<table style="border-collapse:collapse;width:calc(100% - 10px);margin:3px;">
        	<tr>
            	<td colspan="3" style="text-align:left;text-decoration:underline;padding:5px 0 5px 0;">Bệnh nhân:</td>
            </tr>
            <tr>
                <td colspan="3" style="font-family:thuong;text-align:left;padding:5px 0 5px 0;"><?php echo $d_user["name"];?></td>
            </tr>
            <tr>
            	<td colspan="3" style="text-align:left;text-decoration:underline;padding:5px 0 5px 0;">Ngày khám:</td>
            </tr>
            <tr>
                <td colspan="3" style="font-family:thuong;text-align:left;padding:5px 0 5px 0;">
					<?php
						$book_date = date_create($d_book["date"]);
						echo date_format($book_date,"d/m/Y");
					?>
                </td>
            </tr>
            	
		<?php $r_test = mysqli_query($conn,"select * from test where book='$book'");
			if(mysqli_num_rows($r_test)!=0){
				$d_test = mysqli_fetch_assoc($r_test);	
			?>
				<tr>
                	<td colspan="3" style="text-align:left;padding:5px 0 5px 0;text-decoration:underline;">Đề nghị bổ sung xét nghiệm:</td>
                </tr>
                <tr>
                	<td colspan="3" style="text-align:left;font-family:thuong;padding:5px 0 5px 0;"><?php echo $d_test["content"];?></td>
                </tr>	
	  <?php }?>
      <?php $r_result = mysqli_query($conn,"select * from result where book='$book'");
			if(mysqli_num_rows($r_result)!=0){
				$d_result = mysqli_fetch_assoc($r_result);	
			?>
				<tr>
                	<td colspan="3" style="text-align:left;padding:5px 0 5px 0;text-decoration:underline;">Chuẩn đoán bệnh:</td>
                </tr>
                <tr>
                	<td colspan="3" style="text-align:left;font-family:thuong;padding:5px 0 5px 0;">
						<?php 
							$r_disease = mysqli_query($conn,"select * from disease where id='".$d_result["disease"]."'");
							$d_disease = mysqli_fetch_assoc($r_disease);
                       		echo $d_disease["name"];
                        ?>
                    </td>
                </tr>
                	
	  <?php }?>
       <?php $r_medicine = mysqli_query($conn,"select * from medicine_suggest where book='$book'");
			if(mysqli_num_rows($r_medicine)!=0){
			$cost = 0;	
			?>
            	<tr>
                	<td colspan="2" style="text-align:left;padding:5px 0 5px 0;text-decoration:underline;">Đơn thuốc:</td>
                </tr>
                <tr>
                	<td style="border:1px solid #CCC;padding:5px 0 5px 0;">Tên thuốc:</td>
                    <td style="border:1px solid #CCC;padding:5px 0 5px 0;">Số lượng:</td>
                    <td style="border:1px solid #CCC;padding:5px 0 5px 0;">Đơn giá:</td>
                </tr>
			<?php while($d_medicine = mysqli_fetch_assoc($r_medicine)){
				?>
				<tr>
					<?php 
						$r_medicine_info = mysqli_query($conn,"select * from medicine where id='".$d_medicine["medicine"]."'");
						$d_medicine_info = mysqli_fetch_assoc($r_medicine_info);
					?>
                	<td style="border:1px solid #CCC;padding:5px 0 5px 0;font-family:thuong;">
						<?php echo $d_medicine_info["name"];?>	
                    </td>
                    <td style="border:1px solid #CCC;padding:5px 0 5px 0;font-family:thuong;">
						<?php echo $d_medicine["amount"];?>	
                    </td>
                    <td style="border:1px solid #CCC;padding:5px 0 5px 0;font-family:thuong;">
						<?php echo number_format($d_medicine_info["cost"])."đ";?>	
                    </td>
                </tr>	
	  	<?php	$cost = $cost + ($d_medicine_info["cost"] * $d_medicine["amount"]);
				} 
	  		}?>
            <tr>
            	<td style="border:1px solid #CCC;padding:5px 0 5px 0;">Tổng tiền:</td>
            	<td colspan="2" style="border:1px solid #CCC;padding:5px 0 5px 0;"><?php echo number_format($cost)."đ";?></td>
            </tr>
            <tr>
            	<td colspan="3" style="text-align:left;text-decoration:underline;padding:5px 0 5px 0;">Bác sĩ phụ trách:</td>
            </tr>
            <tr>
                <td colspan="3" style="font-family:thuong;text-align:left;padding:5px 0 5px 0;"><?php echo $d_doctor["name"];?></td>
            </tr>   
         </table>   
	<?php mysqli_close($conn);
	break;
	
	case 'rewatch_result':
		$book = addslashes($_POST['a1']);	
			require("config.php");
			$r_book = mysqli_query($conn,"select * from book where id='$book'");
			$d_book = mysqli_fetch_assoc($r_book);
			$r_user = mysqli_query($conn,"select * from account where id='".$d_book["user"]."'");
			$d_user = mysqli_fetch_assoc($r_user);
			$r_doctor = mysqli_query($conn,"select * from account where id='".$d_book["doctor"]."'");
			$d_doctor = mysqli_fetch_assoc($r_doctor);
			?>
		<table style="border-collapse:collapse;width:calc(100% - 10px);margin:3px;">
        	<tr>
            	<td colspan="3" style="text-align:left;text-decoration:underline;padding:5px 0 5px 0;">Bệnh nhân:</td>
            </tr>
            <tr>
                <td colspan="3" style="font-family:thuong;text-align:left;padding:5px 0 5px 0;"><?php echo $d_user["name"];?></td>
            </tr>
            <tr>
            	<td colspan="3" style="text-align:left;text-decoration:underline;padding:5px 0 5px 0;">Ngày khám:</td>
            </tr>
            <tr>
                <td colspan="3" style="font-family:thuong;text-align:left;padding:5px 0 5px 0;">
					<?php
						$book_date = date_create($d_book["date"]);
						echo date_format($book_date,"d/m/Y");
					?>
                </td>
            </tr>
            	
		<?php $r_test = mysqli_query($conn,"select * from test where book='$book'");
			if(mysqli_num_rows($r_test)!=0){
				$d_test = mysqli_fetch_assoc($r_test);	
			?>
				<tr>
                	<td colspan="3" style="text-align:left;padding:5px 0 5px 0;text-decoration:underline;">Đề nghị bổ sung xét nghiệm:</td>
                </tr>
                <tr>
                	<td colspan="3" style="text-align:left;font-family:thuong;padding:5px 0 5px 0;"><?php echo $d_test["content"];?></td>
                </tr>	
	  <?php }?>
      <?php $r_result = mysqli_query($conn,"select * from result where book='$book'");
			if(mysqli_num_rows($r_result)!=0){
				$d_result = mysqli_fetch_assoc($r_result);	
			?>
				<tr>
                	<td colspan="3" style="text-align:left;padding:5px 0 5px 0;text-decoration:underline;">Chuẩn đoán bệnh:</td>
                </tr>
                <tr>
                	<td colspan="3" style="text-align:left;font-family:thuong;padding:5px 0 5px 0;">
						<?php 
							$r_disease = mysqli_query($conn,"select * from disease where id='".$d_result["disease"]."'");
							$d_disease = mysqli_fetch_assoc($r_disease);
                       		echo $d_disease["name"];
                        ?>
                    </td>
                </tr>
                	
	  <?php }?>
       <?php $r_medicine = mysqli_query($conn,"select * from medicine_suggest where book='$book'");
			if(mysqli_num_rows($r_medicine)!=0){
			$cost = 0;	
			?>
            	<tr>
                	<td colspan="2" style="text-align:left;padding:5px 0 5px 0;text-decoration:underline;">Đơn thuốc:</td>
                </tr>
                <tr>
                	<td style="border:1px solid #CCC;padding:5px 0 5px 0;">Tên thuốc:</td>
                    <td style="border:1px solid #CCC;padding:5px 0 5px 0;">Số lượng:</td>
                    <td style="border:1px solid #CCC;padding:5px 0 5px 0;">Đơn giá:</td>
                </tr>
			<?php while($d_medicine = mysqli_fetch_assoc($r_medicine)){
				?>
				<tr>
					<?php 
						$r_medicine_info = mysqli_query($conn,"select * from medicine where id='".$d_medicine["medicine"]."'");
						$d_medicine_info = mysqli_fetch_assoc($r_medicine_info);
					?>
                	<td style="border:1px solid #CCC;padding:5px 0 5px 0;font-family:thuong;">
						<?php echo $d_medicine_info["name"];?>	
                    </td>
                    <td style="border:1px solid #CCC;padding:5px 0 5px 0;font-family:thuong;">
						<?php echo $d_medicine["amount"];?>	
                    </td>
                    <td style="border:1px solid #CCC;padding:5px 0 5px 0;font-family:thuong;">
						<?php echo number_format($d_medicine_info["cost"])."đ";?>	
                    </td>
                </tr>	
	  	<?php	$cost = $cost + ($d_medicine_info["cost"] * $d_medicine["amount"]);
				} 
	  		}?>
            <tr>
            	<td style="border:1px solid #CCC;padding:5px 0 5px 0;">Tổng tiền:</td>
            	<td colspan="2" style="border:1px solid #CCC;padding:5px 0 5px 0;"><?php echo number_format($cost)."đ";?></td>
            </tr>
            <tr>
            	<td colspan="3" style="text-align:left;text-decoration:underline;padding:5px 0 5px 0;">Bác sĩ phụ trách:</td>
            </tr>
            <tr>
                <td colspan="3" style="font-family:thuong;text-align:left;padding:5px 0 5px 0;"><?php echo $d_doctor["name"];?></td>
            </tr>   
         </table>   
	<?php mysqli_close($conn);
	break;
	
	case 'history_list':?>
         <table style="width:calc(100% - 20px);">
            <tr>
                <th style="width:100px;">Ngày</th>
                <th>Bệnh nhân</th>
                <th style="width:350px;">Thao tác</th>
            </tr>
            <?php
				require("config.php");
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
                                $r_test = mysqli_query($conn,"select * from test where book = '".$d_history["id"]."'");
                                if(mysqli_num_rows($r_test)==0){
                            ?>
                            <div class="doctor_test" data-id="<?php echo $d_history["id"];?>">Xét nghiệm</div>
                            <?php }?>
                            
                            <?php 
                                $r_result = mysqli_query($conn,"select * from result where book = '".$d_history["id"]."'");
                                if(mysqli_num_rows($r_result)==0){
                            ?>
                                <div class="doctor_result" data-id="<?php echo $d_history["id"];?>">Kết quả</div>
                            <?php }?>
                            
                            <?php 
                                $r_medicine_suggest = mysqli_query($conn,"select * from medicine_suggest where book = '".$d_history["id"]."'");
                                if(mysqli_num_rows($r_medicine_suggest)==0){
                            ?>
                                <div class="doctor_medicine" data-id="<?php echo $d_history["id"];?>">Đơn thuốc</div>
                            <?php }?>
                        </td>
                    </tr>	
            <?php }
            mysqli_close($conn);
            ?>
        </table>
	<?php break;
	
	}
?>