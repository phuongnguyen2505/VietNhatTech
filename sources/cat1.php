<?php  if(!defined('_source')) die("Error");
if(isset($_GET['idc'])){
	

	
	$id =  addslashes($_GET['idc']);
	$sql="select title_$lang as title,keywords_$lang as keywords ,description_$lang as description,tenkhongdau,ten_$lang as ten,id,ngaytao,mota_$lang as mota from #_".$table_select."_list where tenkhongdau='$id' limit 0,1 ";			
	$d->query($sql);
	$loaitin=$d->result_array();
	
	$title_bar=$loaitin[0]['ten'].' - ';	
	$title_tcat=$loaitin[0]['ten'];
	
	$title_custom=$loaitin[0]['title'];
	$keywords_custom=$loaitin[0]['keywords'];
	$description_custom=$loaitin[0]['description'];
	
	
		$sql = "select id_list,file,ten_$lang as ten,gia,id,tenkhongdau,thumb,photo,masp,spbc,mota_$lang as mota,ngaytao,tags_$lang as tags from #_".$table_select." where hienthi =1 and id_list='".$loaitin[0]['id']."'  order by stt asc,id desc";
		$d->query($sql);
		$product = $d->result_array();
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	//echo $sql.'--'.$_GET['type'];
	$url=getCurrentPageURL();	
	$maxR=10;
	$maxP=6;
	$paging=paging_home($product, $url, $curPage, $maxR, $maxP);
	$product=$paging['source'];	
}
?>