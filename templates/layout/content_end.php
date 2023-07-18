<?php
	
	$d->reset();
  $sql = "select ten_$lang as ten,tenkhongdau,id,thumb,mota_$lang as mota,photo from #_news where hienthi=1 and loaitin='tin-tuc' and tinnoibat>0 order by stt asc limit 0,9";
  $d->query($sql);
  $news = $d->result_array();

  
?>

    <div class="quangcao1">
     
          <img src="<?=_upload_hinhanh_l.$row_banner_giua['photo']?>" alt="<?=$row_setting['ten_'.$lang]?>" />
     
    </div>

<!-- end content_end -->
<div class="maxwidth box_new">
    <div class="news_tt"><h3>Tin tức mới</h3></div>  
    
        <?php
          if(!empty($news)){
            foreach ($news as $k => $value) {
              $str='';
              if(($k+1)%2!=0) $str='style="float:right"';
        ?>
          <div class="box_tt" <?=$str?>>
              <div class="tt_img">
                  <a href="tin-tuc/<?=$value['tenkhongdau']?>-<?=$value['id']?>.html"><img src="timthumb.php?src=<?=_upload_tintuc_l.$value['photo']?>&w=160&h=160&q=100&zc=1" alt="<?=$value['ten']?>"></a>
              </div>
              <h3><a href="tin-tuc/<?=$value['tenkhongdau']?>-<?=$value['id']?>.html"><?=$value['ten']?></a></h3>
              <div class="tt_desc"><?=$value['mota']?></div>
              
              <div class="clr"></div>
          </div>
        <?php
            if(($k+1)%2==0) echo '<div class="clr"></div>';
            }
          }
         ?>
        <div class="clr"></div>
        
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