<h1 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;"><?=$row_setting['title_'.$lang]?></h1>
<h2 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;"><?=$row_setting['title_'.$lang]?></h2>
<h3 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;"><?=$row_setting['title_'.$lang]?></h3>
<h4 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;"><?=$row_setting['title_'.$lang]?></h4>
<h5 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;"><?=$row_setting['title_'.$lang]?></h5>
<h6 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;"><?=$row_setting['title_'.$lang]?></h6>
<div id="left"><?php include "layout/left.php";?></div><!-- end #left -->
<div id="center">
    <div class="box_main" >
        <div class="title_p "><h3 class="title"><?=$title_tcat?></h3></div>
            <?php
               if(count($tintuc)>0){
               for($i=0,$count_tintuc=count($tintuc);$i<$count_tintuc;$i++){
                $str='';
                if(($i+1)%2==0) $str='style="margin-right:0px;"';
                else
                  $str='style="margin-right:20px;"';
              
            ?>
                <div class="box_news" <?=$str?> >
                      <div class="image_boder"><a href="ky-thuat/<?=$tintuc[$i]['tenkhongdau']?>-<?=$tintuc[$i]['id']?>.html"><img src="<?=_upload_tintuc_l,$tintuc[$i]['thumb']?>" alt="<?=$tintuc[$i]['ten']?>" /></a></div>
                      
                        <div class="mota_tt">
                        <div class="ten_tt"><h2> <a href="ky-thuat/<?=$tintuc[$i]['tenkhongdau']?>-<?=$tintuc[$i]['id']?>.html"><?=$tintuc[$i]['ten']?></a></h2></div>
                        <?php
                              $str = $tintuc[$i]['mota'];
                              $str = strip_tags($str);
                              $strCut = substr($str, 0, 250);
                              $str = substr($strCut, 0, strrpos($strCut, ' ')).'...';
                              echo $str;
                          ?> 

                         </div>
                         <a href="ky-thuat/<?=$tintuc[$i]['tenkhongdau']?>-<?=$tintuc[$i]['id']?>.html" class="xemthem">Xem tiếp >></a>
                        <div class="clr"></div>        
                    </div>
                            
                    <?php
                        if(($i+1)%2==0) echo '<div class="clr"></div> ';
                     }
                      
                      ?>
                      
                    <?php 
                     }else echo '<p>Nội dung đang cập nhật, bạn vui lòng xem các chuyên mục khác.</p>';  ?>  
                      <div class="clr"></div>                                   
                      <div class="phantrang" ><?=$paging['paging']?></div>
    </div>
</div>
<!-- end #center -->
<div id="right"><?php include "layout/right.php";?></div><!-- end #right -->

