<h1 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;"><?=$row_setting['title_'.$lang]?></h1>
<h2 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;"><?=$row_setting['title_'.$lang]?></h2>
<h3 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;"><?=$row_setting['title_'.$lang]?></h3>
<h4 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;"><?=$row_setting['title_'.$lang]?></h4>
<h5 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;"><?=$row_setting['title_'.$lang]?></h5>
<h6 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;"><?=$row_setting['title_'.$lang]?></h6>
<div class="ui-corner-all custom-corners">
  <div class="ui-bar ui-bar-a"><h3><?=$title_tcat?></h3></div>
  <div class="ui-body ui-body-a">
    <?php for($i=1; $i<=count($tintuc);$i++) {?>
    <div class="box-sp">
      <p class="sp-img">
        <a href="thu-vien/<?=$tintuc[$i-1]['tenkhongdau']?>-<?=$tintuc[$i-1]['id']?>.html" title="<?=$tintuc[$i-1]['ten']?>">
          <img src="<?=_upload_tintuc_l.$tintuc[$i-1]['thumb']?>" alt="<?=$tintuc[$i-1]['ten']?>">
        </a>
      </p>
      <h3 class="sp-name">
        <a href="thu-vien/<?=$tintuc[$i-1]['tenkhongdau']?>-<?=$tintuc[$i-1]['id']?>.html" title="<?=$tintuc[$i-1]['ten']?>"><?=$tintuc[$i-1]['ten']?></a>
      </h3>
       
    </div>
    <?php if($i%2 ==0) echo '<div class="clear"></div>'; } ?> 
    <div class="pagination"><?=$paging['paging']?></div>
  </div>
</div>

