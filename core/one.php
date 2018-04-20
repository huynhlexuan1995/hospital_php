<?php
	session_start();
	include("function.php");
	switch($_POST["action"]){		
	
		case 'login':
			$bhxh = addslashes($_POST['a1']);
			$password = md5(md5(addslashes($_POST['a2'])));				
			require('../core/config.php');
			$result = mysqli_query($conn,"select * from account where bhxh ='$bhxh' AND password ='$password'");			
			if(mysqli_num_rows($result)==1){
				$data = mysqli_fetch_assoc($result);
				$_SESSION['id'] = $data['id']; 
				$_SESSION['level'] = $data['level'];
				echo json_encode(
						array(
						"state"=>'1'
						)
					);					
			}else{
				echo json_encode(
						array(
						"state"=>'0'
						)
					);	
			}				
		mysqli_close($conn);
		break;
		
		case 'register':
			$name = addslashes($_POST['a1']);
			$birth = addslashes($_POST['a2']);
			$gender = addslashes($_POST['a3']);
			$address = addslashes($_POST['a4']);
			$bhxh = addslashes($_POST['a5']);
			
			$date = date_create($_POST['a2']);
			$pass = date_format($date,"d-m-Y");
			$pass_string = str_replace("-","",$pass);
			$pass = md5(md5($pass_string));	
			require('../core/config.php');				
			mysqli_query($conn,"insert into account(name,birth,gender,address,bhxh,password,level)values ('$name','$birth','$gender','$address','$bhxh','$pass','0')");
	
			$result2 = mysqli_query($conn,"select * from account where bhxh ='$bhxh' AND password ='$pass'");
			$data2 = mysqli_fetch_assoc($result2);
			$_SESSION['id'] = $data2['id']; 
			$_SESSION['level'] = $data2['level'];
				echo json_encode(
					array(
					"state"=>'1',
					"account"=>$bhxh,
					"pass"=>$pass_string
					)
				);
			
		mysqli_close($conn);		
		break;
		
		case 'register_exist':
			$a1 = addslashes($_POST['a1']);				
			require('../core/config.php');
				$result = mysqli_query($conn,"select * from account where bhxh = '".$a1."'");
				$data = mysqli_fetch_assoc($result);
				if(mysqli_num_rows($result) == 0){
						echo json_encode(
							array(
							"state"=>'0'
							)
						);						
														
				}else if(mysqli_num_rows($result) != 0){
						echo json_encode(
							array(
							"state"=>'1'
							)
						);					
				}
		mysqli_close($conn);	
		break;


//DOCTOR			
		case 'doctor_add':
			$name = addslashes($_POST['a1']);
			$namek = unicode_convert($name);
			$account_part1_begin = strrpos($namek,"-") + 1;
			$account_part1_end = strlen($namek);
			$account_part1 = substr($namek,$account_part1_begin,$account_part1_end);
			
			$phone = addslashes($_POST['a3']);
			$account_part2_end = strlen($phone);
			$account_part2_begin = $account_part2_end - 4;
			$account_part2 = substr($phone,$account_part2_begin,$account_part2_end);
						
			$address = addslashes($_POST['a2']);
			$position = addslashes($_POST['a4']);
			
			$account = $account_part1.$account_part2;
			$pass = md5(md5(addslashes($_POST['a3'])));	
			require('../core/config.php');				
			mysqli_query($conn,"insert into account(name,phone,address,position,bhxh,password,level)values ('$name','$phone','$address','$position','$account','$pass','0')");
				echo json_encode(
					array(
					"state"=>'1',
					"account"=>$account,
					"pass"=>$phone,
					"name"=>$name,
					"namek"=>$namek,
					"account_part1_begin"=>$account_part1_begin,
					"account_part1_end"=>$account_part1_end,
					"account_part1"=>$account_part1
					)
				);
			
		mysqli_close($conn);		
		break;
	
		case 'doctor_exist':
			$name = addslashes($_POST['a1']);
			$phone = addslashes($_POST['a2']);				
			require('../core/config.php');
				$result = mysqli_query($conn,"select * from account where name = '".$name."' and phone='".$phone."'");
				$data = mysqli_fetch_assoc($result);
				if(mysqli_num_rows($result) == 0){
						echo json_encode(
							array(
							"state"=>'0'
							)
						);						
														
				}else if(mysqli_num_rows($result) != 0){
						echo json_encode(
							array(
							"state"=>'1'
							)
						);					
				}
		mysqli_close($conn);	
		break;
		
		case 'doctor_edit':
			$name = addslashes($_POST['a1']);									
			$address = addslashes($_POST['a2']);
			$phone = addslashes($_POST['a3']);
			$position = addslashes($_POST['a4']);
			$id = addslashes($_POST['a5']);
			
			require('../core/config.php');
			mysqli_query($conn,"update account set
				name='".$name."',
				address='".$address."',
				phone='".$phone."',
				position='".$position."'
				where id='".$id."'");
				echo json_encode(
					array(
					"state"=>'1'
					)
				);
			
		mysqli_close($conn);		
		break;
	
		case 'doctor_edit_exist':
			$name = addslashes($_POST['a1']);
			$phone = addslashes($_POST['a2']);	
			$id = addslashes($_POST['a3']);			
			require('../core/config.php');
				$result = mysqli_query($conn,"select * from account where name = '".$name."' and phone='".$phone."' and id!='".$id."'");
				$data = mysqli_fetch_assoc($result);
				if(mysqli_num_rows($result) == 0){
						echo json_encode(
							array(
							"state"=>'0',
							"id"=>$id
							)
						);						
														
				}else if(mysqli_num_rows($result) != 0){
						echo json_encode(
							array(
							"state"=>'1'
							)
						);					
				}
		mysqli_close($conn);	
		break;
	
		case 'doctor_detail':
			$id = addslashes($_POST['a1']);				
			require('../core/config.php');
				$result = mysqli_query($conn,"select * from account where id = '".$id."'");
				$data = mysqli_fetch_assoc($result);
				echo json_encode(
					array(
					"state"=>'0',
					"name"=>$data["name"],
					"address"=>$data["address"],
					"phone"=>$data["phone"],
					"position"=>$data["position"],
					"id"=>$id
					)
				);						
		mysqli_close($conn);	
		break;
		
		case 'doctor_delete':
			$id = addslashes($_POST['a1']);				
			require('../core/config.php');
				mysqli_query($conn,"delete from account where id = '".$id."'");
				mysqli_query($conn,"delete from calendar where doctor = '".$id."'");
				mysqli_query($conn,"delete from book where doctor = '".$id."'");
				echo json_encode(
					array(
					"state"=>'1'
					)
				);						
		mysqli_close($conn);	
		break;
		
//medicine			
		case 'medicine_add':
			$name = addslashes($_POST['a1']);
			$cost = addslashes($_POST['a2']);
			$unit = addslashes($_POST['a3']);	
			require('../core/config.php');				
			mysqli_query($conn,"insert into medicine(name,cost,unit)values ('$name','$cost','$unit')");
				echo json_encode(
					array(
					"state"=>'1'
					)
				);
			
		mysqli_close($conn);		
		break;
	
		case 'medicine_exist':
			$name = addslashes($_POST['a1']);			
			require('../core/config.php');
				$result = mysqli_query($conn,"select * from medicine where name = '".$name."'");
				$data = mysqli_fetch_assoc($result);
				if(mysqli_num_rows($result) == 0){
						echo json_encode(
							array(
							"state"=>'0'
							)
						);						
														
				}else if(mysqli_num_rows($result) != 0){
						echo json_encode(
							array(
							"state"=>'1'
							)
						);					
				}
		mysqli_close($conn);	
		break;
		
		case 'medicine_edit':
			$name = addslashes($_POST['a1']);									
			$cost = addslashes($_POST['a2']);
			$unit = addslashes($_POST['a3']);
			$id = addslashes($_POST['a4']);
			
			require('../core/config.php');
			mysqli_query($conn,"update medicine set
				name='".$name."',
				cost='".$cost."',
				unit='".$unit."'
				where id='".$id."'");
				echo json_encode(
					array(
					"state"=>'1'
					)
				);
			
		mysqli_close($conn);		
		break;
	
		case 'medicine_edit_exist':
			$name = addslashes($_POST['a1']);	
			$id = addslashes($_POST['a2']);			
			require('../core/config.php');
				$result = mysqli_query($conn,"select * from medicine where name = '".$name."' and id!='".$id."'");
				$data = mysqli_fetch_assoc($result);
				if(mysqli_num_rows($result) == 0){
						echo json_encode(
							array(
							"state"=>'0',
							"id"=>$id
							)
						);						
														
				}else if(mysqli_num_rows($result) != 0){
						echo json_encode(
							array(
							"state"=>'1'
							)
						);					
				}
		mysqli_close($conn);	
		break;
	
		case 'medicine_detail':
			$id = addslashes($_POST['a1']);				
			require('../core/config.php');
				$result = mysqli_query($conn,"select * from medicine where id = '".$id."'");
				$data = mysqli_fetch_assoc($result);
				echo json_encode(
					array(
					"state"=>'0',
					"name"=>$data["name"],
					"cost"=>$data["cost"],
					"unit"=>$data["unit"],
					"id"=>$id
					)
				);						
		mysqli_close($conn);	
		break;
		
		case 'medicine_delete':
			$id = addslashes($_POST['a1']);				
			require('../core/config.php');
				mysqli_query($conn,"delete from medicine where id = '".$id."'");
				echo json_encode(
					array(
					"state"=>'1'
					)
				);						
		mysqli_close($conn);	
		break;

//disease			
		case 'disease_add':
			$name = addslashes($_POST['a1']);
			$method = addslashes($_POST['a2']);	
			require('../core/config.php');				
			mysqli_query($conn,"insert into disease(name,method)values ('$name','$method')");
				echo json_encode(
					array(
					"state"=>'1'
					)
				);
			
		mysqli_close($conn);		
		break;
	
		case 'disease_exist':
			$name = addslashes($_POST['a1']);			
			require('../core/config.php');
				$result = mysqli_query($conn,"select * from disease where name = '".$name."'");
				$data = mysqli_fetch_assoc($result);
				if(mysqli_num_rows($result) == 0){
						echo json_encode(
							array(
							"state"=>'0'
							)
						);						
														
				}else if(mysqli_num_rows($result) != 0){
						echo json_encode(
							array(
							"state"=>'1'
							)
						);					
				}
		mysqli_close($conn);	
		break;
		
		case 'disease_edit':
			$name = addslashes($_POST['a1']);									
			$method = addslashes($_POST['a2']);
			$id = addslashes($_POST['a3']);
			
			require('../core/config.php');
			mysqli_query($conn,"update disease set
				name='".$name."',
				method='".$method."'
				where id='".$id."'");
				echo json_encode(
					array(
					"state"=>'1'
					)
				);
			
		mysqli_close($conn);		
		break;
	
		case 'disease_edit_exist':
			$name = addslashes($_POST['a1']);	
			$id = addslashes($_POST['a2']);			
			require('../core/config.php');
				$result = mysqli_query($conn,"select * from disease where name = '".$name."' and id!='".$id."'");
				$data = mysqli_fetch_assoc($result);
				if(mysqli_num_rows($result) == 0){
						echo json_encode(
							array(
							"state"=>'0',
							"id"=>$id
							)
						);						
														
				}else if(mysqli_num_rows($result) != 0){
						echo json_encode(
							array(
							"state"=>'1'
							)
						);					
				}
		mysqli_close($conn);	
		break;
	
		case 'disease_detail':
			$id = addslashes($_POST['a1']);				
			require('../core/config.php');
				$result = mysqli_query($conn,"select * from disease where id = '".$id."'");
				$data = mysqli_fetch_assoc($result);
				echo json_encode(
					array(
					"state"=>'0',
					"name"=>$data["name"],
					"method"=>$data["method"],
					"id"=>$id
					)
				);						
		mysqli_close($conn);	
		break;
		
		case 'disease_delete':
			$id = addslashes($_POST['a1']);				
			require('../core/config.php');
				mysqli_query($conn,"delete from disease where id = '".$id."'");
				echo json_encode(
					array(
					"state"=>'1'
					)
				);						
		mysqli_close($conn);	
		break;
		
		case 'set_calendar':
			$doctor = addslashes($_POST['a1']);
			$date = addslashes($_POST['a2']);
			require('../core/config.php');
				$result = mysqli_query($conn,"select * from calendar where doctor = '".$doctor."' and date='".$date."'");
				if(mysqli_num_rows($result) == 0){
					mysqli_query($conn,"insert into calendar(doctor,date)values ('$doctor','$date')");	
						echo json_encode(
							array(
							"state"=>'1'
							)
						);						
														
				}
		mysqli_close($conn);	
		break;
		
		case 'set_calendar_delete':
			$id = addslashes($_POST['a1']);
			require('../core/config.php');
				$result = mysqli_query($conn,"delete from calendar where id = '".$id."'");
					echo json_encode(
						array(
						"state"=>'1'
						)
					);	
		mysqli_close($conn);	
		break;

//CUSTOMER_CALENDR	
		case 'customer_calendar_ok':
			$id = addslashes($_POST['a1']);
			$user = $_SESSION["id"];				
			require('config.php');
			$r_calendar = mysqli_query($conn,"select * from calendar where id='$id'");
			$d_calendar = mysqli_fetch_assoc($r_calendar);			
			$result = mysqli_query($conn,"select * from book where id='$id' and doctor='".$d_calendar["doctor"]."' and date='".$d_calendar["date"]."'");
			
				if(mysqli_num_rows($result) == 0){
					mysqli_query($conn,"insert into book(user,doctor,date)values ('$user','".$d_calendar["doctor"]."','".$d_calendar["date"]."')");	
					echo json_encode(
						array(
						"state"=>'1',
						"id"=>$user
						)
					);						
														
				}
		mysqli_close($conn);	
		break;

		case 'customer_calendar_delete':
			$id = addslashes($_POST['a1']);
			$user = $_SESSION["id"];
			
			require('config.php');
			$r_calendar = mysqli_query($conn,"select * from calendar where id='$id'");
			$d_calendar = mysqli_fetch_assoc($r_calendar);			
				mysqli_query($conn,"delete from book where user='$user' and doctor = '".$d_calendar["doctor"]."' and date='".$d_calendar["date"]."'");
				echo json_encode(
					array(
					"state"=>'1',
					"id"=>$user
					)
				);
		mysqli_close($conn);	
		break;

//RESULT		
		case 'send_test':
			$content = addslashes($_POST['a1']);
			$book = addslashes($_POST['a2']);
			
			require('config.php');			
				mysqli_query($conn,"insert into test(book,content)values ('$book','$content')");
				echo json_encode(
					array(
					"state"=>'1'
					)
				);
		mysqli_close($conn);	
		break;
		
		case 'send_result':
			$disease = addslashes($_POST['a1']);
			$book = addslashes($_POST['a2']);
			
			require('config.php');			
				mysqli_query($conn,"insert into result(book,disease)values ('$book','$disease')");
				echo json_encode(
					array(
					"state"=>'1'
					)
				);
		mysqli_close($conn);	
		break;
		
		case 'send_medicine':
			$amount = addslashes($_POST['a1']);
			$id = addslashes($_POST['a2']);
			$book = addslashes($_POST['a3']);
			if($amount != NULL){
				require('config.php');
				$r = mysqli_query($conn,"select * from medicine_suggest where medicine='$id' and book='$book'");
				if(mysqli_num_rows($r)!=0){
					$d = mysqli_fetch_assoc($r);
					mysqli_query($conn,"update medicine_suggest set
					amount='".$amount."'
					where id='".$d["id"]."'");
				}else{
					mysqli_query($conn,"insert into medicine_suggest(book,medicine,amount)values ('$book','$id','$amount')");	
				}
			}else{
				require('config.php');
				mysqli_query($conn,"delete from medicine_suggest where book='$book' and medicine='$id'");	
			}
		mysqli_close($conn);	
		break;
		
		case 'send_medicine_delete':
			$book = addslashes($_POST['a1']);
			require('config.php');
			$r = mysqli_query($conn,"delete from medicine_suggest where book='$book'");
			
		mysqli_close($conn);	
		break;		
					
	}
?>