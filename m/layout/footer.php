<?php


    $d->reset();
    $sql = "select noidung_$lang as noidung from #_footer ";
    $d->query($sql);
    $footer = $d->fetch_array();

    $d->reset();
    $sql = "select ten,id,url,image from #_mxh where hienthi=1 order by id asc";
    $d->query($sql);
    $mxh1 = $d->result_array();
?>
<div data-role="footer" id="footer">
    <div class="footer_title company"><h2><?=$row_setting['ten_'.$lang]?></h2> </div>
       <?=stripcslashes($footer['noidung'])?>
    <br/>
    <div class="thongke">
        
        <?php if(!empty($mxh1)){
            foreach ($mxh1 as $key => $value) {
        ?>
             <a href="<?=$value['url']?>" target="_blank"><img class="transi_1s" src="<?=_upload_hinhanh_l.$value['image']?>" alt="<?=$value['ten']?>" title="<?=$value['ten']?>" /></a>
        
        <?php
            }
        }
       ?>
        <div class="clr"></div>
    </div>
    <div class="taikhoan"><img src="images/taikhoan.png" alt="tài khoản"></div>
    <p><span>Đang online: </span>  <b><?=$count_user_online?> - </b> <span>Thống kê ngày: </span> <b><?=$today_visitors?></b> - <span>Tổng truy cập: </span><b><?=$all_visitors?></b> </p>

    <div class="copy"><?=$row_setting['fax']?></div>
    
</div>



