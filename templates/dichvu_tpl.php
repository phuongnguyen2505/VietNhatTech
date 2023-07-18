<h1 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;"><?=$row_setting['title_'.$lang]?></h1>
<h2 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;"><?=$row_setting['title_'.$lang]?></h2>
<h3 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;"><?=$row_setting['title_'.$lang]?></h3>
<h4 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;"><?=$row_setting['title_'.$lang]?></h4>
<h5 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;"><?=$row_setting['title_'.$lang]?></h5>
<h6 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;"><?=$row_setting['title_'.$lang]?></h6>
<div id="left"><?php include "layout/left.php";?></div><!-- end #left -->
<div id="right1">
    <div class="box_main">
        <div class="title_p ">
            <h3 class="title"><?=$title_tcat?></h3>
        </div>

        <?php
                if(!empty($tintuc)){
                
                  foreach($tintuc as $k=>$product_item){
                    $str='';
                    if(($k+1)%3==0) $str='style="margin-right:0px !important;"';
              ?>
        <div class="right_item" <?=$str?>>

            <div class="img">
                <div class="img_wrap">
                    <a href="thuc-an/<?=$product_item['tenkhongdau']?>-<?=$product_item['id']?>.html">
                        <img src="<?=_upload_dichvu_l.$product_item['thumb']?>" alt="<?=$product_item['ten']?>" />
                    </a>
                </div>
            </div>
            <h3><a
                    href="thuc-an/<?=$product_item['tenkhongdau']?>-<?=$product_item['id']?>.html"><?=$product_item['ten']?></a>
            </h3>
            <div class="clr"></div>
        </div>
        <?php 
                  if(($k+1)%3==0) echo '<div class="clr"></div>';
                  }
                  
                }
            ?>

        <div class="clr"></div>

    </div>

    <div class="clr"></div>
    <div class="phantrang"><?=$paging['paging']?></div>
</div>