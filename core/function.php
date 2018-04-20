<?php	
	function unicode_convert($str)
	{
  	    if(!$str) return false;
  	    $unicode = array(

        		'a'=>array('á','à','ả','ã','ạ','ă','ắ','ặ','ằ','ẳ','ẵ','â','ấ','ầ','ẩ','ẫ','ậ'),

  	            'A'=>array('Á','À','Ả','Ã','Ạ','Ă','Ắ','Ặ','Ằ','Ẳ','Ẵ','Â','Ấ','Ầ','Ẩ','Ẫ','Ậ'),

  	            'd'=>array('đ'),

  	            'D'=>array('Đ'),

  	            'e'=>array('é','è','ẻ','ẽ','ẹ','ê','ế','ề','ể','ễ','ệ'),

  	            'E'=>array('É','È','Ẻ','Ẽ','Ẹ','Ê','Ế','Ề','Ể','Ễ','Ệ'),

  	            'i'=>array('í','ì','ỉ','ĩ','ị'),

  	            'I'=>array('Í','Ì','Ỉ','Ĩ','Ị'),

  	            'o'=>array('ó','ò','ỏ','õ','ọ','ô','ố','ồ','ổ','ỗ','ộ','ơ','ớ','ờ','ở','ỡ','ợ'),

  	            '0'=>array('Ó','Ò','Ỏ','Õ','Ọ','Ô','Ố','Ồ','Ổ','Ỗ','Ộ','Ơ','Ớ','Ờ','Ở','Ỡ','Ợ'),

  	            'u'=>array('ú','ù','ủ','ũ','ụ','ư','ứ','ừ','ử','ữ','ự'),

  	            'U'=>array('Ú','Ù','Ủ','Ũ','Ụ','Ư','Ứ','Ừ','Ử','Ữ','Ự'),

  	            'y'=>array('ý','ỳ','ỷ','ỹ','ỵ'),

  	            'Y'=>array('Ý','Ỳ','Ỷ','Ỹ','Ỵ'),

  	            '-'=>array(' ','&quot;','.','?',':'),

				''=>array('(',')',',')

  	        );
  	        foreach($unicode as $nonUnicode=>$uni){
  	        	foreach($uni as $value)
            	$str = str_replace($value,$nonUnicode,$str);
  	        }
    	return $str;
}
	
function sodu($val){	
	require('config.php');
	$nap = 0;
	$rut = 0;
	$chuyen = 0;
	$nhan = 0;
	$pay = 0;	
	
	$nap_r= mysqli_query($conn,"select * from trade where user2 ='".$val."' and type = 'N'");
	if(mysqli_num_rows($nap_r)>0){
		while($nap_d = mysqli_fetch_assoc($nap_r)){$nap = $nap + $nap_d["value"];}
	}
	
	$rut_r= mysqli_query($conn,"select * from trade where user1 ='".$val."' and type = 'R'");
	if(mysqli_num_rows($rut_r)>0){	
		while($rut_d = mysqli_fetch_assoc($rut_r)){$rut = $rut + $rut_d["value"];}
	}
	
	
	$pay_r= mysqli_query($conn,"select * from trade where user1 ='".$val."' and type = 'P'");
	if(mysqli_num_rows($pay_r)>0){
		while($pay_d = mysqli_fetch_assoc($pay_r)){$pay = $pay + $pay_d["value"];}
	}
	
	$chuyen_r= mysqli_query($conn,"select * from trade where user1 ='".$val."' and type = 'C'");
	if(mysqli_num_rows($chuyen_r)>0){	
	while($chuyen_d = mysqli_fetch_assoc($chuyen_r)){$chuyen = $chuyen + $chuyen_d["value"];}
	}
	
	mysqli_close($conn);
	$so_du =  ($nap + $nhan) - ($rut + $chuyen + $pay);
	return $so_du;
}		

?>