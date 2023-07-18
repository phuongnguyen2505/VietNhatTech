<?php
	// $d->reset();
	// $sql_doitac="select photo,mota,id,ten_$lang as ten from #_doitac where hienthi =1 order by stt,id desc";
	// $d->query($sql_doitac);
	// $result_doitac=$d->result_array();
    $d->reset();
    $sql_doitac="select photo,thumb,id,ten_$lang as ten from #_hinhanh where hienthi =1 order by stt asc";
    $d->query($sql_doitac);
    $result_doitac=$d->result_array(); 
?>
<div id="doitac">
    <div class="tt_doitac"><h2>CÔNG TRÌNH ĐÃ THỰC HIỆN</h2></div>
         <div class="ma-brand-slider-contain"> 
             <div class="ma-brand-slider">          
             <ul id ="ma-brandpro-slider" class="brand-slider">
                 <?php
                         if(!empty($result_doitac)){
                             foreach($result_doitac as $k=>$product_item){
                     ?>
                     <li>
                       <div class="right_item" <?=$str?> >
                        <div class="img">
                          <div class="img_wrap"> 
                              <a href="<?=_upload_thuvienanh_l.$product_item['photo']?>" class="fancybox" rel="group">
                                <img src="<?=_upload_thuvienanh_l.$product_item['thumb']?>" alt="<?=$product_item['ten']?>"/>
                              </a>
                          </div> 
                        </div>
                        
                        <h3><a><?=$product_item['ten']?></a> </h3>
              
                    </div> 
                     </li>
                     <?php  
                             
                             }
                         }
                     ?>
                                
             </ul>
                     <script type="text/javascript">
                                 function mycarousel_initCallback_439(carousel) {
                                     // Pause autoscrolling if the user moves with the cursor over the clip.
                                     carousel.clip.hover(function() {
                                         carousel.stopAuto();
                                     }, function() {
                                         carousel.startAuto();
                                     });
                                 };
                                 $(document).ready(function() {
                                     $('#ma-brandpro-slider').jcarousel({
                                         initCallback: mycarousel_initCallback_439,
                                         auto: 3,
                                         wrap: 'circular',
                                         animation: 1000,
                                        // buttonPrevHTML:null,
                                        //buttonNextHTML:null,
                                        
                                         scroll: 1                    
                                     });
                                 });
                             </script>
                       <div class="clr"></div>
                 </div>     
         </div>                  
</div>