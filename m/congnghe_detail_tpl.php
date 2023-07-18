<div id="left">
      <?php include _template."layout/left.php"; ?>
  </div>
  <!-- end left -->
  <div id="right">
        
      <div class="box_main">

      <div class="title_p "><h3 class="title">Thư viện tài liệu</h3></div>
      <div class="content">

           <h1 class="title_news"><?=$tintuc_detail[0]['ten']?> </h1>
           <div class="clr" style="height:0px; border-bottom:1px solid #cdcdcd;"></div> 
             <p class="small"><?=_ngaydang?> <span style="font-size:12px;">:<?=date('d-m-Y h:i:s A',$tintuc_detail[0]['ngaytao'])?> </span>- <?=_daxem?> <span style="font-size:12px;">:<?=$tintuc_detail[0]['luotxem']?></span></p><br />
             
            
                     <?=stripcslashes($tintuc_detail[0]['noidung'])?>
                     <br />
                      <span class='st_facebook_hcount' displayText='Facebook'></span>
                     <span class='st_twitter_hcount' displayText='Tweet'></span>
                     <span class='st_googleplus_hcount' displayText='Google +'></span>
                     <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
                     <script type="text/javascript">stLight.options({publisher: "5b2a972a-c743-4b89-8b81-78a6dba1ee67", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
                     
                    <div class="clr" style="height:0px; border-bottom:1px solid #cdcdcd; margin-top:20px;"></div> 
                    <?php if(!empty($tintuc_khac)){ ?>
                    <div class="othernews">
                     <h2><?=_baivietkhac?></h2>
                     <ul>
                     
                  <?php foreach($tintuc_khac as $tinkhac){
                      
                      ?>
                  <li><a href="thu-vien-tai-lieu/<?=$tinkhac['tenkhongdau']?>-<?=$tinkhac['id']?>.html" style="text-decoration:none;"><?=$tinkhac['ten']?></a> (<?=make_date($tinkhac['ngaytao'])?>)</li>
                  <?php } 
                      ?>
                       </ul>
            
               </div><br />
                <?php }?>              

      </div>  
      </div>
      <!-- end box_main -->


  </div> 
  <!-- end right -->

