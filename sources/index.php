<?php  if(!defined('_source')) { die("Error");
       }


    $d->reset();
    $sql_img = "select ten_$lang as ten,tenkhongdau,id,thumb,mota_$lang as mota,file from #_product where hienthi=1 and noibat>0 order by stt asc";
    $d->query($sql_img);
    $spnb = $d->result_array();
    
    $d->reset();
    $sql_img = "select ten_$lang as ten,tenkhongdau,id,thumb,mota_$lang as mota,file from #_product_kitz where hienthi=1 and noibat>0 order by stt asc";
    $d->query($sql_img);
    $spnb2 = $d->result_array();

    $d->reset();
    $sql_tintuc = "select ten_$lang as ten,tenkhongdau,mota_$lang as mota,thumb,photo,id,ngaytao,luotxem from #_news where hienthi=1 and loaitin='tin-tuc' order by stt,ngaytao desc";
    $d->query($sql_tintuc);
    $tintuc = $d->result_array();

    
?>
