<?php  if(!defined('_source')) { die("Error");
       }
            
if(isset($_GET['keyword'])) {
    $tukhoa =  $_GET['keyword'];
    $type_search =  $_GET['type_search'];
    $tukhoa = trim(strip_tags($tukhoa));        
    if (get_magic_quotes_gpc()==false) {
        $tukhoa = mysql_real_escape_string($tukhoa);                
    }                                
    $title_tcat=_kq_timkiem;
            
            
            
    $sql = "select file,id_list,ten_$lang as ten,gia,id,tenkhongdau,thumb,photo,mota_$lang as mota,masp from #_".$table_select." where ((ten_$lang LIKE '%$tukhoa%') or (masp LIKE '%$tukhoa%')) and  hienthi=1   order by stt asc, id desc";
    $d->query($sql);
    $product = $d->result_array();
    $curPage = isset($_GET['p']) ? $_GET['p'] : 1;
    $url=getCurrentPageURL();
    $maxR=10;
    $maxP=6;
    $paging=paging_home($product, $url, $curPage, $maxR, $maxP);
    $product_search=$paging['source'];
            
}                                    
?>
