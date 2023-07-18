
<div class="box_main margin15">

<div class="title_p "><h3 class="title"><?=_chitiet.' '._tuyendung?></h3></div>
<div class="content">

     <h1 class="title_news"><?=$tintuc_detail[0]['ten']?> </h1>
     <div class="clr" style="height:0px; border-bottom:1px solid #0680C5;"></div> 
       <p class="small">Đăng lúc: <?=date('d-m-Y h:i:s A',$tintuc_detail[0]['ngaytao'])?> - Đã xem: <?=$tintuc_detail[0]['luotxem']?></p><br />
       <div class="addthis_toolbox addthis_default_style addthis_32x32_style">
                <a class="addthis_button_facebook"></a>
                <a class="addthis_button_twitter"></a>
                <a class="addthis_button_google_plusone_share"></a>
                <a class="addthis_button_compact"></a><a class="addthis_counter addthis_bubble_style"></a>
                </div><br />
                <script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>
                        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-532af17c2b82b082"></script>
               <?=$tintuc_detail[0]['noidung']?>
              <div class="clr" style="height:0px; border-bottom:1px solid #0680C5; margin-top:20px;"></div> 
              <div class="othernews">
               <h2><?=_baivietkhac?></h2>
               <ul>
               
            <?php foreach($tintuc_khac as $tinkhac){
                
                ?>
            <li><a href="tuyen-dung/<?=$tinkhac['tenkhongdau']?>-<?=$tinkhac['id']?>.html" style="text-decoration:none;"><?=$tinkhac['ten']?></a> (<?=make_date($tinkhac['ngaytao'])?>)</li>
            <?php }
                ?>
                 </ul>
      
         </div><br />
                        

</div>  
</div>
<!-- end box_main -->

