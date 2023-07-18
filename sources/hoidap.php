<?php  if(!defined('_source')) die("Error");

	$d->reset();
	$sql_cauhoi = "select id,ten,tieude_$lang as tieude,noidung_$lang as noidung,traloi_$lang as traloi,ngaytao  from #_comment where hienthi=1 order by id desc";
	$d->query($sql_cauhoi);	
	$rows_cauhoi=$d->result_array();
		
		$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
		$url=getCurrentPageURL();
		$maxR=10;
		$maxP=5;
		$paging=paging($rows_cauhoi, $url, $curPage, $maxR, $maxP);
		$tintuc=$paging['source'];
	
	if(!empty($_POST)){						
			$data['ten'] = $_POST['ten'];
		
			// $data['email'] = $_POST['email'];
			$data['tieude_vi'] = $_POST['tieude1'];
			$data['noidung_vi'] = $_POST['noidung'];
			$data['ngaytao'] = time();			
					
		$d->setTable('comment');
		if($d->insert($data))
			transfer("Thông tin câu hỏi đã được gửi", "hoi-dap.html");
		else
			transfer("Có lỗi xảy ra, vui lòng thử lại", "hoi-dap.html");
		}
		

?>