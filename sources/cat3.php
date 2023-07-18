<?php  if(!defined('_source')) die("Error");
if(isset($_GET['idc'])){
	
	
	$id =  addslashes($_GET['idc']);

	$sql="select tenkhongdau,ten_$lang as ten,id,id_list,id_cat,title_$lang as title,keywords_$lang as keywords ,description_$lang as description from #_".$table_select."_item where tenkhongdau='$id' limit 0,1 ";
	$d->query($sql);
	$loaitin=$d->result_array();
	$title_bar=$loaitin[0]['ten'].' - ';	
	$title_tcat=$loaitin[0]['ten'];
	
	$title_custom=$loaitin[0]['title'];
	$keywords_custom=$loaitin[0]['keywords'];
	$description_custom=$loaitin[0]['description'];
	// $sql_cap1="select ten,tenkhongdau,id from #_product_list where id='".$loaitin[0]['id_list']."'";
	// $d->query($sql_cap1);
	// $result_cat1=$d->fetch_array();
	
	// $sql_cap2="select ten,tenkhongdau,id from #_product_cat where id='".$loaitin[0]['id_cat']."'";
	// $d->query($sql_cap2);
	// $result_cat2=$d->fetch_array();
	
	$sql_tintuc = "select id,thumb,ten_$lang as ten,tenkhongdau,gia,mota_$lang as mota,photo,ngaytao,spbc from #_".$table_select." where hienthi=1 and id_item='".$loaitin[0]['id']."'";
	
	if(isset($_SESSION['filter'])){
		if($_SESSION['filter']==1) $sql_tintuc.=' order by gia';
		elseif($_SESSION['filter']==2) $sql_tintuc.=' order by gia desc';
		elseif($_SESSION['filter']==3) $sql_tintuc.=' order by ngaytao desc';
		else $sql_tintuc.=' order by stt,ngaytao desc';
	}else{ $sql_tintuc.=' order by stt,id desc';}
	$d->query($sql_tintuc);
	$product = $d->result_array();
	
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=getCurrentPageURL();	
	$maxR=15;
	$maxP=5;
	$paging=paging_home($product, $url, $curPage, $maxR, $maxP);
	$product=$paging['source'];	
}
?>