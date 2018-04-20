//disease			
		case 'disease_add':
			$name = addslashes($_POST['a1']);
			$cost = addslashes($_POST['a2']);
			$unit = addslashes($_POST['a3']);	
			require('../core/config.php');				
			mysqli_query($conn,"insert into disease(name,cost,unit)values ('$name','$cost','$unit')");
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
			$cost = addslashes($_POST['a2']);
			$unit = addslashes($_POST['a3']);
			$id = addslashes($_POST['a4']);
			
			require('../core/config.php');
			mysqli_query($conn,"update disease set
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
					"cost"=>$data["cost"],
					"unit"=>$data["unit"],
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