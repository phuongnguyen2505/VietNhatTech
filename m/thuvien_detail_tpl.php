<h1 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;"><?=$tintuc_detail[0]['ten']?></h1>
<h2 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;"><?=$tintuc_detail[0]['ten']?></h2>
<h3 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;"><?=$tintuc_detail[0]['ten']?></h3>
<h4 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;"><?=$tintuc_detail[0]['ten']?></h4>
<h5 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;"><?=$tintuc_detail[0]['ten']?></h5>
<h6 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;"><?=$tintuc_detail[0]['ten']?></h6>
<script type="text/javascript">
$(document).ready(function() {
  $( '.swipebox' ).swipebox();
});
</script>

<div class="ui-corner-all custom-corners">
  <div class="ui-bar ui-bar-a"><h3><?=$tintuc_detail[0]['ten']?></h3></div>
  <div class="ui-body ui-body-a">
       <div class="box-sp">
           <p class="sp-img">
               <a href='<?=_upload_tintuc_l.$tintuc_detail[0]['photo']?>' class="swipebox">
                 <img src='<?=_upload_tintuc_l.$tintuc_detail[0]['photo']?>' alt='<?=$tintuc_detail[0]['ten']?>' title='<?=$tintuc_detail[0]['ten']?>' />
               </a>
           </p>
       </div>
      
       <?php for($i=0;$i<count($row_hinhanhsp11);$i++) { ?>
       <div class="box-sp">
           <p class="sp-img">
               <a href='<?=_upload_product_l.$row_hinhanhsp11[$i]['photo']?>' class="swipebox">
                 <img src='<?=_upload_product_l.$row_hinhanhsp11[$i]['photo']?>' alt='<?=$row_hinhanhsp11[$i]['ten']?>' title='<?=$row_hinhanhsp11[$i]['ten']?>' />
               </a>
           </p>
       </div>
      
      <?php } ?> 
  </div>
</div>



<?php if(!empty($tintuc_khac)){?>
<div class="ui-corner-all custom-corners">
  <div class="ui-bar ui-bar-a"><h3>Album khác</h3></div>
  <div class="ui-body ui-body-a">

<?php foreach ($tintuc_khac as $key => $value) { ?> 
        <div class="box-sp">
            <p class="sp-img">
                <a href="thu-vien/<?=$value['tenkhongdau']?>-<?=$value['id']?>.html" title="<?=$value['ten']?>">
                    <img src="<?=_upload_tintuc_l.$value['thumb']?>" alt="<?=$value['ten']?>">
                </a>
            </p>
            <h3 class="sp-name">
                <a href="thu-vien/<?=$value['tenkhongdau']?>-<?=$value['id']?>.html" title="<?=$value['ten']?>"><?=$value['ten']?></a>
            </h3>
             
           
        </div>
        <?php if(( $key+1)%2 ==0) echo '<div class="clear"></div>'; } ?>       
    <div class="pagination"><?=$paging['paging']?></div>
  </div>
</div>
<?php }?>


