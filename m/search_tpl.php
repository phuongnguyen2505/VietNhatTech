<div class="ui-corner-all custom-corners">
  <div class="ui-bar ui-bar-a"><h3><?=$title_tcat?></h3></div>
  <div class="ui-body ui-body-a">
    <?php foreach($product_search as $k=>$product_item){?>
    <div class="box-sp">
      <p class="sp-img">
        <a href="san-pham/<?=$product_item['tenkhongdau']?>-<?=$product_item['id']?>.html" title="<?=$product_item['ten']?>">
          <img src="<?=_upload_product_l.$product_item['thumb']?>" alt="<?=$product_item['ten']?>">
        </a>
      </p>
      <h3 class="sp-name">
        <a href="san-pham/<?=$product_item['tenkhongdau']?>-<?=$product_item['id']?>.html" title="<?=$product_item['ten']?>"><?=$product_item['ten']?></a>
      </h3>
      <p class="sp-price"><b><?php if($product_item['gia']==0) echo _contact; else echo number_format ($product_item['gia'],0,",",".")." Đ";?></b></p>
      <p class="sp-buy">
        
        <a href="lien-he.html" title="<?=$value1['ten']?>">MUA HÀNG</a>
      </p> 
    </div>
    <?php if(($key+1)%2 ==0) echo '<div class="clear"></div>'; } ?> 
       <?php
              if(empty($product_search))
               
              echo '<p style="color:red; font-style:italic;margin-top:20px; text-align:center">'._kq_timkiem_tb.'</p>';
            ?>
    <div class="pagination"><?=$paging['paging']?></div>
  </div>
</div>

