<script type="text/javascript" src="admin/media/scripts/my_script.js"></script>
<div class="banner">
    <div class="hero-banner">
        <div class="layer">
            <div class="right m-100">
                <article>
                    <section class="welcome">Welcome to Viet Nhat</section>
                    <section class="gr-banner w700">
                        <h1 class="hide-title">Contact</h1>
                        <h1 class="hero-title"><?php echo _contact?></h1>
                    </section>
                </article>
            </div>
        </div>
        <div class="clr"></div>
    </div>
</div>
<div class="contact row mt-100 m-100">
    <div class="col">
        <?php echo stripcslashes($company_contact['noidung'])?>
    </div>

    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyAL928AIsIDYz9oUb-ILO5LTe_7MQnVgDA">
    </script>
    <script type="text/javascript">
    var map;
    var infowindow;
    var marker = new Array();
    var old_id = 0;
    var infoWindowArray = new Array();
    var infowindow_array = new Array();

    function initialize() {
        var defaultLatLng = new google.maps.LatLng(<?php echo $row_setting['toado']?>);
        var myOptions = {
            zoom: 16,
            center: defaultLatLng,
            scrollwheel: false,
            mapTypeId: google.maps.MapTypeId.HYBRID
        };
        map = new google.maps.Map(document.getElementById("map_home"), myOptions);
        map.setCenter(defaultLatLng);
        var arrLatLng = new google.maps.LatLng(<?php echo $row_setting['toado']?>);
        infoWindowArray[7895] =
            '<div class="map_description"><div class="map_title"><?php echo $row_setting['ten_'.$lang]?></div><div><?php echo $row_setting['diachi_'.$lang]?></div></div>';
        loadMarker(arrLatLng, infoWindowArray[7895], 7895);

        moveToMaker(7895);
    }

    function loadMarker(myLocation, myInfoWindow, id) {
        marker[id] = new google.maps.Marker({
            position: myLocation,
            map: map,
            visible: true
        });
        var popup = myInfoWindow;
        infowindow_array[id] = new google.maps.InfoWindow({
            content: popup
        });
        google.maps.event.addListener(marker[id], 'mouseover', function() {
            if (id == old_id) return;
            if (old_id > 0) infowindow_array[old_id].close();
            infowindow_array[id].open(map, marker[id]);
            old_id = id;
        });
        google.maps.event.addListener(infowindow_array[id], 'closeclick', function() {
            old_id = 0;
        });
    }

    function moveToMaker(id) {
        var location = marker[id].position;
        map.setCenter(location);
        if (old_id > 0) infowindow_array[old_id].close();
        infowindow_array[id].open(map, marker[id]);
        old_id = id;
    }
    </script>
    <div class="map_ft">
        <div id="map_home"></div>
    </div>
</div>
