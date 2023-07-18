<h1 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;">
    <?php echo $row_setting['title_'.$lang]?></h1>
<h2 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;">
    <?php echo $row_setting['title_'.$lang]?></h2>
<h3 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;">
    <?php echo $row_setting['title_'.$lang]?></h3>
<h4 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;">
    <?php echo $row_setting['title_'.$lang]?></h4>
<h5 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;">
    <?php echo $row_setting['title_'.$lang]?></h5>
<h6 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;">
    <?php echo $row_setting['title_'.$lang]?></h6>
<div class="banner">
    <div class="hero-banner">
        <div class="layer">
            <div class="right m-100">
                <article>
                    <section class="welcome">Welcome to Viet Nhat</section>
                    <section class="gr-banner w700">
                        <h1 class="hide-title">services</h1>
                        <h1 class="hero-title <?php echo $title_tcat ?>">
                            <?php echo $title_tcat ?>
                        </h1>
                    </section>
                </article>
            </div>
        </div>
        <div class="clr"></div>
    </div>
</div>
<div class="row m-100">
    <div class="box_main mt-100">
        <div class="row">
            <div class="card-service">
                <img class="service-img" id="test" src="<?php echo _upload_dichvu_l,$tintuc[0]['thumb']?>" alt="">
                <div class="title-service">
                    <a href="dich-vu/<?php echo $tintuc[0]['tenkhongdau']?>-<?php echo $tintuc[0]['id']?>.html">
                        <p><?php echo $tintuc[0]['ten']?></p>
                    </a>
                </div>
            </div>
            <div class="right-service">
                <div class="r-service-items">
                    <img class="service-img" src="<?php echo _upload_dichvu_l,$tintuc[1]['thumb']?>" alt="">
                    <div class="title-service">
                        <a href="dich-vu/<?php echo $tintuc[1]['tenkhongdau']?>-<?php echo $tintuc[1]['id']?>.html">
                            <p><?php echo $tintuc[1]['ten']?></p>
                        </a>
                    </div>
                </div>
                <div class="r-service-items">
                    <img class="service-img" src="<?php echo _upload_dichvu_l,$tintuc[2]['thumb']?>" alt="">
                    <div class="title-service">
                        <a href="dich-vu/<?php echo $tintuc[2]['tenkhongdau']?>-<?php echo $tintuc[2]['id']?>.html">
                            <p><?php echo $tintuc[2]['ten']?></p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-service">
            <div class="b-service-items">
                <img class="service-img" src="<?php echo _upload_dichvu_l,$tintuc[3]['thumb']?>" alt="" height="600">
                <div class="title-service">
                    <a href="dich-vu/<?php echo $tintuc[3]['tenkhongdau']?>-<?php echo $tintuc[3]['id']?>.html">
                        <p><?php echo $tintuc[3]['ten']?></p>
                    </a>
                </div>
            </div>
            <div class="b-service-items">
                <img class="service-img" src="<?php echo _upload_dichvu_l,$tintuc[4]['thumb']?>" alt="" height="600">
                <div class="title-service">
                    <a href="dich-vu/<?php echo $tintuc[4]['tenkhongdau']?>-<?php echo $tintuc[4]['id']?>.html">
                        <p><?php echo $tintuc[4]['ten']?></p>
                    </a>
                </div>
            </div>
        </div>


        <!-- <?php
        if(count($tintuc)>0) {
            for($i=0,$count_tintuc=count($tintuc);$i<$count_tintuc;$i++){
                $str='';
                if(($i+1)%2==0) { $str='style="margin-right:0px;"';
                } else {
                    $str='style="margin-right:20px;"';
                }
              
                ?>
        <div class="box_news" <?php echo $str?>>
            <div class="image_boder"><a
                    href="dich-vu/<?php echo $tintuc[$i]['tenkhongdau']?>-<?php echo $tintuc[$i]['id']?>.html"><img
                        src="<?php echo _upload_dichvu_l,$tintuc[$i]['thumb']?>"
                        alt="<?php echo $tintuc[$i]['ten']?>" /></a></div>

            <div class="mota_tt">
                <div class="ten_tt">
                    <h2> <a
                            href="dich-vu/<?php echo $tintuc[$i]['tenkhongdau']?>-<?php echo $tintuc[$i]['id']?>.html"><?php echo $tintuc[$i]['ten']?></a>
                    </h2>
                </div>
                <?php
                              $str = $tintuc[$i]['mota'];
                              $str = strip_tags($str);
                              $strCut = substr($str, 0, 250);
                              $str = substr($strCut, 0, strrpos($strCut, ' ')).'...';
                              echo $str;
                ?>

            </div>
            <a href="dich-vu/<?php echo $tintuc[$i]['tenkhongdau']?>-<?php echo $tintuc[$i]['id']?>.html"
                class="xemthem"><?php echo _xemtiep?>
                >></a>
            <div class="clr"></div>
        </div>

                <?php
                if(($i+1)%2==0) { echo '<div class="clr"></div> ';
                }
            }
                      
            ?>

            <?php 
        }else { echo '<p>Nội dung đang cập nhật, bạn vui lòng xem các chuyên mục khác.</p>';
        }  ?> -->
        <div class="clr"></div>
        <div class="phantrang"><?php echo $paging['paging']?></div>
    </div>
</div>

<style>
.hero-title {
    letter-spacing: 0.3em !important;
}
</style>
