

<div id="fb-root"></div>
<script type="text/javascript">(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1&appId=625910880774979";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script type="text/javascript">
$(document).ready(function() {
  $( '.swipebox' ).swipebox();
  
  $('.slider-product-thumb').bxSlider({
    slideWidth: 120,
    minSlides: 1,
    maxSlides: 10,
    moveSlides: 1,
    slideMargin: 10,
    pager: false
  });
  
  
  $('div.slide').each(function(){
    
    $(this).hover(function(){
      $('div.slide').find('*').removeClass('active');
      $(this).find('*').addClass('active');
      var id_photo = $(this).find('p').attr('value');
      $('div.product-img-large').find('img').removeClass('active');
      $('div.product-img-large').find('img.photo-'+id_photo).addClass('active')
    });
  });
  
  $('#productTab a').click(function(e){
    e.stopImmediatePropagation();
    var value = $(this).attr('href');
    var idContent = value.replace('#','');
    $('#productTab a').removeClass('ui-btn-active');
    $(this).addClass('ui-btn-active');
    $('div#productTabContent .tab-pane').css({display: 'none'});
    $('div#productTabContent #'+idContent).css({display: 'block'});
    return false;
  });
  
});
</script>

<div class="ui-corner-all custom-corners">
  <div class="ui-bar ui-bar-a"><h3>Chi tiết sản phẩm</h3></div>
  <div class="ui-body ui-body-a">
    <div id="product-images">
        
      <div class="product-img-large">
        <a href="http://<?=$config_url.'/'._upload_product_l.$row_detail[0]['photo']?>" class="swipebox" target="_blank" ><img src="http://<?=$config_url.'/'._upload_product_l.$row_detail[0]['thumb']?>" alt="<?=$row_detail[0]['ten']?>" title="<?=$row_detail[0]['ten']?>" class="active photo-0" /></a>
        <?php for($i=1, $count = count($row_hinhanhsp11); $i<=$count; $i++){ ?>
        <a href="http://<?=$config_url.'/'._upload_product_l.$row_hinhanhsp11[$i-1]['photo']?>" class="swipebox" target="_blank" ><img src="http://<?=$config_url.'/'._upload_product_l.$row_hinhanhsp11[$i-1]['photo']?>" alt="<?=$row_detail[0]['ten']?>" title="<?=$row_detail[0]['ten']?>" class="photo-<?=$i?>" /></a>
        <?php } ?>
      </div>

      <div class="product-img-thumb">
        <div class="slider-product-thumb">
          <div class="slide">
            <p class="active transitionAll" value="0" ><img class="transitionAll" src="http://<?=$config_url.'/'._upload_product_l.$row_detail[0]['photo']?>" alt="<?=$row_detail[0]['ten']?>" title="<?=$row_detail[0]['ten']?>" /></p>
          </div>
          <?php for($i=1, $count = count($row_hinhanhsp11); $i<=$count; $i++){ ?>
          <div class="slide">
            <p class="transitionAll" value="<?=$i?>"><img class="transitionAll" src="http://<?=$config_url.'/'._upload_product_l.$row_hinhanhsp11[$i-1]['photo']?>" alt="<?=$row_detail[0]['ten']?>" title="<?=$row_detail[0]['ten']?>"/></p>
          </div>
          <?php } ?>
          
        </div>
      </div>
    </div>
    <div id="product-content">
      <div class="attr-content">
        <h1><?=$row_detail[0]['ten']?></h1>
      </div>
      <div class="attr-content">
        <p class="attr-left">Giá</p><p class="attr-right" style="color: #f00;">: <?php  if($row_detail[0]['gia']>0){echo "Liên hệ";}else{echo $row_detail[0]['gia'];} ?> </p>
      </div>
      <div class="attr-content">
        <p class="attr-left">Mã sản phẩm</p><p class="attr-right" style="color: #f00;">: <?=$row_detail[0]['masp']?> </p>
      </div>
      <div class="attr-content">
        <?=$row_detail[0]['mota']?>
      </div>
      
      <div class="attr-content">
        <?php $url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>
        <p class="attr-left">Chia sẻ qua:</p>
        <p class="attr-right">
          <a class="tooltip_a share-icon share-facebook" target="_blank" href="http://www.facebook.com/sharer.php?u=<?=$url?>" title="Facebook"></a>
          <a class="tooltip_a share-icon share-zing" target="_blank" href="http://link.apps.zing.vn/share?u=<?=$url?>" title="Zing me"></a>
          <a class="tooltip_a share-icon share-twitter" target="_blank" href="http://twitter.com/share?url=<?=$url?>&amp;text=<?=$row_detail[0]["ten"]?>" title="Twitter"></a>
          <a class="tooltip_a share-icon share-googleplus" target="_blank" href="https://plus.google.com/share?url=<?=$url?>" title="Google Plus"></a>
          <a class="tooltip_a share-icon share-linkedin" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?=$url?>" title="LinkedIn"></a>
          <a class="tooltip_a share-icon share-email" target="_blank" href="mailto:?Subject=<?=_share?><?=$row_detail[0]["ten"]?>&amp;Body=<?=$row_detail[0]["ten"]?><?=$url?>" title="Email"></a>
        </p>
      </div>
    </div>
    <div id="tabs">
      <div data-role="navbar" id="productTab">
        <ul>
          <li><a href="#tab-1" class="ui-btn-active">Thông tin chi tiết</a></li>
        
          <li><a href="#tab-3">Bình luận facebook</a></li>
        </ul>
      </div>
      <div id="productTabContent" class="tab-content">
        <div id="tab-1" class="tab-pane" style="display:block" >
          <?=stripcslashes($row_detail[0]['noidung'])?>
        </div>

        <div id="tab-3" class="tab-pane" >
          
            <div class="fb-comments" data-href="<?=getCurrentPageURL()?>" data-width="100%" data-numposts="50" data-colorscheme="light"></div>
          
        </div>
      </div>  
  
    </div><!--end tabs -->
    <div class="clear"></div>
  </div>
</div>



<?php if($sanpham_khac){ ?>
<div class="ui-corner-all custom-corners">
  <div class="ui-bar ui-bar-a"><h3>Sản phẩm cùng loại</h3></div>
  <div class="ui-body ui-body-a">
    
    <?php foreach($sanpham_khac as $k=>$product_item){?>
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
    <div class="pagination"><?=$paging['paging']?></div>
  </div>
</div>
<?php } ?>
   
   
