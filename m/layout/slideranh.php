<?php
    $d->reset();
    $sql_slider = "select ten_$lang as ten,photo,link,mota_$lang as mota from table_slider ";
    $d->query($sql_slider);
    $result_slider=$d->result_array();

    $d->reset();
    $sql_img = "select ten_$lang as ten,tenkhongdau,mota_$lang as mota,thumb from #_about where hienthi=1 limit 0,1";
    $d->query($sql_img);
    $gt_home = $d->fetch_array();
    
?>
<script src="sliderengine/amazingslider.js"></script>
<link rel="stylesheet" type="text/css" href="sliderengine/amazingslider-1.css">
<script src="sliderengine/initslider-1.js"></script>

<!-- Insert to your webpage where you want to display the slider -->
<div id="amazingslider-wrapper-1" style="display:block;position:relative;max-width:100%;margin:0 auto;border-bottom:1px solid #fff;">
    <div id="amazingslider-1" style="display:block;position:relative;margin:0 auto;">
        <ul class="amazingslider-slides" style="display:none;">
            <?php
                if(!empty($result_slider)){
                    foreach($result_slider as $slider_item){
            ?>
                 <li>
                    <a href="<?=$slider_item['link']?>" target="_blank" title="<?=$slider_item['ten']?>"><img src="<?=_upload_hinhanh_l.$slider_item['photo']?>"  alt="<?=$slider_item['ten']?>"  title="<?=$slider_item['ten']?>"/></a>
                    
                </li>
            <?php   
                    }
                }
            
            ?>   
        </ul>
    </div>
  
</div>
<!-- End of body section HTML codes -->

