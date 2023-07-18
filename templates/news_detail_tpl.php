<div class="news-banner">
    <div class="layer-news">
        <h1 class="title_news"><?php echo $tintuc_detail[0]['ten']?></h1>
        <!-- <p>CÔNG TY TNHH KỸ THUẬT QUỐC TẾ VIỆT NHẬT</p> -->
    </div>
</div>
<div class="row m-100 newsDetail">
    <div class="box_main news-details">
        <div class="content">
            <p class="small"><?php echo _ngaydang?> <span
                    style="font-size:12px;">:<?php echo date('d-m-Y h:i:s A', $tintuc_detail[0]['ngaytao'])?>
                </span>-
                <?php echo _daxem?> <span style="font-size:12px;">:<?php echo $tintuc_detail[0]['luotxem']?></span></p>
            <!-- <span class='st_facebook_hcount' displayText='Facebook'></span>
            <span class='st_twitter_hcount' displayText='Tweet'></span>
            <span class='st_googleplus_hcount' displayText='Google +'></span> -->
            <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
            <script type="text/javascript">
            stLight.options({
                publisher: "5b2a972a-c743-4b89-8b81-78a6dba1ee67",
                doNotHash: false,
                doNotCopy: false,
                hashAddressBar: false
            });
            </script>
            <br />
            <?php echo stripcslashes($tintuc_detail[0]['noidung'])?>
            <div class="news-contact">
                <h2>Hãy liên hệ với chúng tôi khi bạn có nhu cầu/cần hỗ trợ nhé.</h2>
                <div class="news-email news-row">
                    <img src="images/email.svg" alt="">
                    <p>: v@vietnhat-tech.com</p>
                </div>
                <div class="news-call news-row">
                    <img src="images/call.svg" alt="">
                    <p>: 1900 63 35 64</p>
                </div>
                <div class="news-website news-row">
                    <img src="images/website.svg" alt="">
                    <p>: vietnhat-tech.com</p>
                </div>
                <div class="news-website news-row">
                    <img src="images/website.svg" alt="">
                    <p>: 724.vn</p>
                </div>
            </div>
            <div class="clr" style="height:0px; border-bottom:1px solid #dfdfdf; margin-top:20px;"></div>
            <div class="othernews">
                <div class="orther-gr">
                    <h2><span class="v-line"></span>tin tức khác</h2>
                    <a href="tin-tuc.html">Xem tất cả</a>
                </div>
                <ul>
                    <?php foreach($tintuc_khac as $tinkhac){
                        ?>
                    <li>
                        <a href="tin-tuc/<?php echo $tinkhac['tenkhongdau']?>-<?php echo $tinkhac['id']?>.html"
                            style="text-decoration:none;">
                            <?php echo $tinkhac['ten']?>
                        </a>
                        <span class="v-line-b"></span>
                        <?php echo date('d/m/Y', $tinkhac['ngaytao'])?>
                    </li>
                    <?php }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <!-- end box_main -->
    <div class="newest-news">
        <div class="newest-gr">
            <h2><span class="v-line"></span>tin tức mới</h2>
            <a href="tin-tuc.html">Xem tất cả</a>
        </div>
        <?php
            $d->reset();
            $sql_tintuc = "select ten_$lang as ten,tenkhongdau,mota_$lang as mota,thumb,photo,id,ngaytao,luotxem from #_news where hienthi=1 and loaitin='tin-tuc' order by stt,ngaytao desc";
            $d->query($sql_tintuc);
            $tintuc = $d->result_array();
        ?>
        <?php
        if(!empty($tintuc)) {
            for($i = 0; $i <= 4; $i++) {
                ?>
        <div class="gr-newest-news">
            <div class="newest-img">
                <a href="tin-tuc/<?php echo $tintuc[$i]['tenkhongdau']?>-<?php echo $tintuc[$i]['id']?>.html">
                    <img src="<?php echo _upload_tintuc_l.$tintuc[$i]['thumb']?>" alt="">
                </a>
            </div>
            <div class="r-newest">
                <a href="tin-tuc/<?php echo $tintuc[$i]['tenkhongdau']?>-<?php echo $tintuc[$i]['id']?>.html">
                    <?php echo $tintuc[$i]['ten']?>
                </a>
                <p><?php echo date('d/m/Y', $tintuc[$i]['ngaytao'])?></p>
            </div>
        </div>
                <?php
            }
        }
        ?>
    </div>
</div>
