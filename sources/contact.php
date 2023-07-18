<?php if(!defined('_source')) die("Error");
		// $title_bar .= "Liên hệ - ";
		if(!empty($_POST)){
			include_once _lib."C_email.php";
			$data['ten'] = $_POST['ten'];
			$data['diachi'] = $_POST['diachi'];
			$data['dienthoai'] = $_POST['dienthoai'];
			$data['email'] = $_POST['email'];
			$data['tieude'] = $_POST['tieude1'];
			$data['noidung'] = $_POST['noidung'];
			$data['noidung'] = $_POST['noidung'];			
			$data['ngaytao'] = time();
			
			
			$subject = "Thư liên hệ từ ".$row_setting['title'];
			$body = '<table>';
			$body .= '
				<tr>
					<th colspan="2">&nbsp;</th>
				</tr>
				<tr>
					<th colspan="2">Thư liên hệ từ website '.$row_setting['website'].'</th>
				</tr>
				<tr>
					<th colspan="2">&nbsp;</th>
				</tr>
				<tr>
					<th>Họ tên :</th><td>'.$_POST['ten'].'</td>
				</tr>
				<tr>
					<th>Địa chỉ :</th><td>'.$_POST['diachi'].'</td>
				</tr>
				<tr>
					<th>Điện thoại :</th><td>'.$_POST['dienthoai'].'</td>
				</tr>
				<tr>
					<th>Email :</th><td>'.$_POST['email'].'</td>
				</tr>
				
				<tr>
					<th>Tiêu đề :</th><td>'.$_POST['tieude1'].'</td>
				</tr>
				<tr>
					<th>Nội dung :</th><td>'.$_POST['noidung'].'</td>
				</tr>';
			$body .= '</table>';
			
			include_once "phpmailer/class.phpmailer.php";
//Khởi tạo đối tượng
$mail = new PHPMailer();
//Thiet lap thong tin nguoi gui va email nguoi gui
$mail->IsSMTP(); // Gọi đến class xử lý SMTP
$mail->SMTPAuth   = true;                  // Sử dụng đăng nhập vào account
$mail->Host       = "120.72.119.1";     // Thiết lập thông tin của SMPT
$mail->Username   = 'noreply@vietnhat-tech.com'; // SMTP account username
$mail->Password   = '123456';            // SMTP account password
$mail->SetFrom('noreply@vietnhat-tech.com',$row_setting['ten']);

//Thiết lập thông tin người nhận
$mail->AddAddress($row_setting['email'],$row_setting['ten']);

//Thiết lập email nhận email hồi đáp
//nếu người nhận nhấn nút Reply
$mail->AddReplyTo($row_setting['email'],$row_setting['ten']);

/*=====================================
 * THIET LAP NOI DUNG EMAIL
 *=====================================*/

//Thiết lập tiêu đề
$mail->Subject    = "Thông tin liên hệ";

//Thiết lập định dạng font chữ
$mail->CharSet = "utf-8";

$mail->AltBody = "To view the message, please use an HTML compatible email viewer!";

//Thiết lập nội dung chính của email
$mail->MsgHTML($body);

if(!$mail->Send()) {
 			 transfer( "Có lỗi xảy ra!","index.html");
} else {
			 
			transfer("Gửi liên hệ thành công!<br/>", "index.html");	
}	
		}
				$d->reset();
			$sql_contact = "select noidung_$lang as noidung from #_lienhe ";
			$d->query($sql_contact);
			$company_contact = $d->fetch_array();
	
?>