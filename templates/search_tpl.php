<div id="left"><?php include "layout/left.php";?></div><!-- end #left -->
<div id="center">
      <div class="box_main">
        
           <div class="title_p "><h3 class="title"><?=$title_tcat?></h3></div>
           
                 <?php
              if(!empty($product_search)){
                echo '<p style="color:red; font-style:italic;margin-top:20px; text-align:center">Tìm thấy '.count($product).' kết quả với từ khóa"'.$tukhoa.'"</p>';
                foreach($product_search as $k=>$product_item){
                  $str='';
                  if(($k+1)%3==0) $str='style="margin-right:0px !important;"';
            ?>
              <div class="right_item" <?=$str?> >
                  
                  <div class="img">
                    <div class="img_wrap"> 
                        <a href="san-pham/<?=$product_item['tenkhongdau']?>-<?=$product_item['id']?>.html">
                          <img src="<?=_upload_product_l.$product_item['thumb']?>" alt="<?=$product_item['ten']?>"/>
                        </a>
                    </div> 
                  </div>
                  <h3><a href="san-pham/<?=$product_item['tenkhongdau']?>-<?=$product_item['id']?>.html"><?=$product_item['ten']?></a> </h3>
              
                 
                  <div class="clr"></div>
              </div>                   
            <?php
                if(($k+1)%3==0) echo '<div class="clr"></div>';
                }
              }else
              echo '<p style="color:red; font-style:italic;margin-top:20px; text-align:center">'._kq_timkiem_tb.'</p>';
            ?>
                     <div class="clr"></div>
             <div class="phantrang" ><?=$paging['paging']?></div>
            <div class="clr"></div>
    </div>  
</div>
<!-- end #center -->
<div id="right"><?php include "layout/right.php";?></div><!-- end #right -->

