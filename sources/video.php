
<?php  if(!defined('_source')) die("Error");
if(isset($_GET['id'])){
	#tin tuc chi tiet
	$id =  addslashes($_GET['id']);

	// $sql_lanxem = "UPDATE #_video SET luotxem=luotxem+1  WHERE id ='".$id."'";
	// $d->query($sql_lanxem);
			
	$sql = "select ten_$lang as ten,url from #_video where hienthi=1 and id='".$id."'";
	$d->query($sql);
	$tintuc_detail = $d->result_array();
	$title_bar=$tintuc_detail[0]['ten'].' - ';
	
	#các tin cu hon
	$sql_khac = "select ten_$lang as ten,url,tenkhongdau,id from #_news where hienthi=1 and id <'".$id."'  order by stt,ngaytao desc limit 0,12";
	$d->query($sql_khac);
	$tintuc_khac = $d->result_array();
}
else{
	$title_bar='Video clip - ';		
	$title_tcat='Video clip';		
	$sql_tintuc = "select ten_$lang as ten,url,image,tenkhongdau,id from #_video where hienthi=1  order by stt,ngaytao desc";
	$d->query($sql_tintuc);
	$tintuc = $d->result_array();
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=getCurrentPageURL();
	$maxR=13;
	$maxP=5;
	$paging=paging_home($tintuc, $url, $curPage, $maxR, $maxP);
	$tintuc=$paging['source'];

}
?>	