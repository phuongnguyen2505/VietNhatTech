<?php
	
	$d->reset();
	$sql = "select ten_$lang as ten,tenkhongdau,id,thumb,mota_$lang as mota from #_news where hienthi=1 and loaitin='tin-tuc' and tinnoibat>0 order by stt asc,id desc";
	$d->query($sql);
	$news = $d->result_array();
	
   
    // $d->reset();
    // $sql_video = "select url,id,ten_$lang as ten from #_video where hienthi=1 order by stt asc ";
    // $d->query($sql_video);
    // $video = $d->result_array();
	
  
?>
<div class="quangcao1">
 
      <img src="<?=_upload_hinhanh_l.$row_banner_giua['photo']?>" alt="<?=$row_setting['ten_'.$lang]?>" />
 
</div>
<script type="text/javascript">
$(document).ready(function(){
  $('.slider_sanpham').bxSlider({
    slideWidth: 230,
    minSlides: 1,
    maxSlides: 5,
    moveSlides: 1,
    slideMargin: 15,
  pager: false, 
  auto: true
  });
});
</script>
<div class="ui-corner-all custom-corners">
  <div class="ui-bar ui-bar-a"><h3>Tin tức</h3></div>
  <div class="ui-body ui-body-a">
    <div class="slider_sanpham">
    <?php for($i=1; $i<=count($news);$i++) {?>
    <div class="slide">
      <div class="box-sp">
        <p class="sp-img">
          <a href="tin-tuc/<?=$news[$i-1]['tenkhongdau']?>-<?=$news[$i-1]['id']?>" title="<?=$news[$i-1]['ten']?>">
            <img src="<?=_upload_tintuc_l.$news[$i-1]['thumb']?>" alt="<?=$news[$i-1]['ten']?>">
          </a>
        </p>
       
       
        <p class="sp-desc">
            <?=$news[$i-1]['mota']?>
        </p>
        
      </div>
    </div>
    <?php } ?> 
    </div>
  </div>
</div>



<div class="ui-corner-all custom-corners">
  <div class="ui-bar ui-bar-a"><h3>Fanpage</h3></div>
  <div class="ui-body ui-body-a">
      <div id="fb-root"></div>
          <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v1.0";
          fjs.parentNode.insertBefore(js, fjs);
          }(document, 'script', 'facebook-jssdk'));
          </script>


          <div class="fanpage embed-responsive embed-responsive-4by3">
               <div class="fb-like-box" data-href="<?=$row_setting['facebook']?> " 
                  data-width="100%" data-height="260" data-colorscheme="light" data-show-faces="true" 
                  data-header="true" data-stream="true" data-show-border="false">
              </div> 
          </div>
  </div>
</div>


 <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript">
    var map;
    var infowindow;
    var marker= new Array();
    var old_id= 0;
    var infoWindowArray= new Array();
    var infowindow_array= new Array();function initialize(){
        var defaultLatLng = new google.maps.LatLng(<?=$row_setting['toado']?>);
        var myOptions= {
            zoom: 16,
            center: defaultLatLng,
            scrollwheel : false,
            mapTypeId: google.maps.MapTypeId.ROADMAP
         };
         map = new google.maps.Map(document.getElementById("map_home"), myOptions);map.setCenter(defaultLatLng);              
        var arrLatLng = new google.maps.LatLng(<?=$row_setting['toado']?>);
        infoWindowArray[7895] = '<div class="map_description"><div class="map_title"><?=$row_setting['ten_'.$lang]?></div><div><?=$row_setting['diachi_'.$lang]?></div></div>';
        loadMarker(arrLatLng, infoWindowArray[7895], 7895);
        
        moveToMaker(7895);}function loadMarker(myLocation, myInfoWindow, id){marker[id] = new google.maps.Marker({position: myLocation, map: map, visible:true});
        var popup = myInfoWindow;infowindow_array[id] = new google.maps.InfoWindow({ content: popup});google.maps.event.addListener(marker[id], 'mouseover', function() {if (id == old_id) return;if (old_id > 0) infowindow_array[old_id].close();infowindow_array[id].open(map, marker[id]);old_id = id;});google.maps.event.addListener(infowindow_array[id], 'closeclick', function() {old_id = 0;});}function moveToMaker(id){var location = marker[id].position;map.setCenter(location);if (old_id > 0) infowindow_array[old_id].close();infowindow_array[id].open(map, marker[id]);old_id = id;}</script>
   
<div id="map_home"></div>
<div class="clr"></div>
