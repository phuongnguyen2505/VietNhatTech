<h1 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;"><?php echo $tintuc_detail[0]['ten']?>
</h1>
<h2 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;"><?php echo $tintuc_detail[0]['ten']?>
</h2>
<h3 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;"><?php echo $tintuc_detail[0]['ten']?>
</h3>
<h4 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;"><?php echo $tintuc_detail[0]['ten']?>
</h4>
<h5 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;"><?php echo $tintuc_detail[0]['ten']?>
</h5>
<h6 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;"><?php echo $tintuc_detail[0]['ten']?>
</h6>
<div class="news-banner">
    <div class="layer-news">
        <h1 class="title_news"><?php echo $tintuc_detail[0]['ten']?></h1>
        <!-- <p>CÔNG TY TNHH KỸ THUẬT QUỐC TẾ VIỆT NHẬT</p> -->
    </div>
</div>
<div class="row m-100 mt-100">
    <div class="box_main">
        <div class="content">
            <!-- <p class="small"><?php echo _ngaydang?>: <?php echo date('d-m-Y h:i:s A', $tintuc_detail[0]['ngaytao'])?> -
                <?php echo _daxem?>:
                <?php echo $tintuc_detail[0]['luotxem']?></p><br /> -->
            <!-- <div class="addthis_toolbox addthis_default_style addthis_32x32_style">
                <a class="addthis_button_facebook"></a>
                <a class="addthis_button_twitter"></a>
                <a class="addthis_button_google_plusone_share"></a>
                <a class="addthis_button_compact"></a><a class="addthis_counter addthis_bubble_style"></a>
            </div><br />
            <script type="text/javascript">
            var addthis_config = {
                "data_track_addressbar": false
            };
            </script>
            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-532af17c2b82b082">
            </script> -->

            <div class="service">
                <?php echo stripcslashes($tintuc_detail[0]['noidung'])?>

            </div>

            <!-- <div class="clr" style="height:0px; border-bottom:1px solid #dfdfdf; margin-top:20px;"></div> -->
            <!-- <div class="othernews">
                <h2><?php echo _baivietkhac?></h2>
                <ul>

                    <?php foreach($tintuc_khac as $tinkhac){
                
                        ?>
                    <li><a href="dich-vu/<?php echo $tinkhac['tenkhongdau']?>-<?php echo $tinkhac['id']?>.html"
                            style="text-decoration:none;"><?php echo $tinkhac['ten']?></a> (<?php echo make_date($tinkhac['ngaytao'])?>)
                    </li>
                    <?php }
                    ?>
                </ul>

            </div><br /> -->


        </div>
    </div>
    <!-- end box_main -->
</div>