<?php

$d->reset();
$sql_dmsp = "select ten_$lang as ten,tenkhongdau,id,thumb,photo from #_product_list where hienthi =1  order by stt,id desc";
$d->query($sql_dmsp);
$dmsp = $d->result_array();

$d->reset();
$sql_dmsp = "select ten_$lang as ten,tenkhongdau,id,thumb,photo from #_product_kitz_list where hienthi =1  order by stt,id desc";
$d->query($sql_dmsp);
$dmsp_kitz = $d->result_array();

$d->reset();
$sql_dmsp = "select ten_$lang as ten,tenkhongdau,id,thumb,photo from #_product_other_list where hienthi =1  order by stt,id desc";
$d->query($sql_dmsp);
$dmsp_other = $d->result_array();
?>

<?php
$d->reset();
if ($lang == "en") {
    $sql_banner_giua = "select photo from #_photo where com='banner_top_en'  limit 0,1";
} else {
    $sql_banner_giua = "select photo from #_photo where com='banner_top'  limit 0,1";
}
$d->query($sql_banner_giua);
$row_banner_giua = $d->fetch_array();
?>

<div id="menu_top" class="nav">
    <div class="inner-menu-top">
        <div id="myslidemenu" class="jqueryslidemenu">
            <div class="logo" id="logo">
                <a href="./"><img class="img-logo" src="./images/logo.png" alt=""></a>
            </div>
            <ul id="nav">
                <li class="vach_menu">
                    <a href="./" class="<?php if ($source == "index") {echo "menu_active";
} ?> "><?php echo _home ?>
                    </a>
                </li>
                <li class="vach_menu">
                    <a href="gioi-thieu/gioi-thieu-2.html" class="<?php if ($com == "gioi-thieu") {echo "menu_active";
} ?> "><?php echo _about ?>
                    </a>
                </li>
                <li class="vach_menu">
                    <a style="cursor: default" class="
                <?php
                if (isset($title_tcat)) {
                    $menu_active = false;
                
                    foreach ($dmsp_other as $item) {
                        if ($title_tcat == $item['ten']) {
                            $menu_active = true;
                            break;
                        } else {
                        }
                    }
                
                    if ($menu_active) {
                        echo "menu_active";
                    } else {
                    }
                }
                ?>
                <?php 
                if ($com == "san-pham" || $com == "ingersoll-rand" || $com == "tim-kiem") {
                    echo " menu_active";
                } ?>"><?php echo _sanpham ?></a>
                    <ul id="inner-menu">
                        <li>
                            <a href="san-pham.html" class="<?php 
                            if($com == ("san-pham")) {echo ""; 
                            } ?>">
                                <?php echo _product ?>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo changeTitle(_product1) ?>.html" class="<?php 
                            if($com == ("ingersoll-rand")) {echo ""; 
                            } ?>"><?php echo _product1 ?>
                            </a>
                        </li>
                        <?php 
                        if (!empty($dmsp_other)) {
                            echo "";
                            foreach ($dmsp_other as $dmsp_item) {;?>
                        <li>
                            <a href="san-pham-khac/<?php echo $dmsp_item["tenkhongdau"] ?>/"
                                title="<?php echo $dmsp_item["ten"] ?>" class="<?php
                                if($com == $dmsp_item["tenkhongdau"]) {
                                    echo "";
                                }
                                ?>
                            "><?php echo $dmsp_item["ten"] ?>
                            </a>
                        </li>
                        <?php if (!empty($dmsp1)) {
                                        echo "<ul>";
                                    foreach ($dmsp1 as $dmsp1_item) { ?>
                        <li>
                            <a href="san-pham-khac/<?php echo $dmsp_item["tenkhongdau"] ?>/<?php echo $dmsp1_item["tenkhongdau"] ?>/"
                                title="<?php echo $dmsp1_item["ten"] ?>" class="
                                                <?php if ($com == changeTitle(_tenkhongdau)) {echo "menu-inner-active";
                                                } ?>">
                                <?php echo $dmsp1_item["ten"] ?>
                            </a>
                        </li>
                        <?php if (!empty($dmsp2)) {echo "<ul>";foreach ($dmsp2 as $dmsp2_item) { ?>
                        <li>
                            <a href="san-pham-khac/<?php echo $dmsp_item["tenkhongdau"] ?>/<?php echo $dmsp1_item["tenkhongdau"] ?>/
                                                    <?php echo $dmsp2_item["tenkhongdau"] ?>/"
                                title="<?php echo $dmsp2_item["ten"] ?>"><?php echo $dmsp2_item["ten"] ?>
                            </a>
                        </li>
                        <?php }echo "</ul>";
                                        } ?>
                    </ul>
                </li>
                <?php }
                                        echo "";
                                } 
                                ?>
                <?php 
                            }echo "";
                        } ?>
            </ul>
            </li>

            <li class="vach_menu"> <a href="dich-vu.html" class="<?php if ($com == "dich-vu") {echo "menu_active";
} ?>"><?php echo _service ?></a>
                <?php if (!empty($dmta)) {
                    echo "<ul>";
                    foreach ($dmta as $dmsp_item) { ?>
            <li><a href="thuc-an/<?php echo $dmsp_item[
                    "tenkhongdau"
                  ] ?>/" title="<?php echo $dmsp_item["ten"] ?>"><?php echo $dmsp_item["ten"] ?></a>
                <?php
                        $d->reset();
                        $sql_dmsp = "select ten_$lang as ten,tenkhongdau,id from #_dichvu_cat where hienthi=1 and id_list=$dmsp_item[id] order by stt asc,id desc";
                        $d->query($sql_dmsp);
                        $dmsp1 = $d->result_array();
                        if (!empty($dmsp1)) {
                            echo "<ul>";
                            foreach ($dmsp1 as $dmsp1_item) { ?>
            <li><a href="thuc-an/<?php echo $dmsp_item["tenkhongdau"] ?>/<?php echo $dmsp1_item["tenkhongdau"] ?>/"
                    title="<?php echo $dmsp1_item["ten"] ?>"><?php echo $dmsp1_item["ten"] ?></a></li>
            <?php }echo "</ul>";
                        }?>
            </li>
            <?php }  echo "</ul>";
                } ?>
            </li>
            <li class="vach_menu"><a href="tin-tuc.html" class="<?php if ($com == "tin-tuc") {echo "menu_active";
} ?> "><?php echo _tintuc ?></a></li>
            <li class="vach_menu">
                <?php
                $d->reset();
                $sql_tintuc = "select ten_$lang as ten,tenkhongdau,mota_$lang as mota,thumb,id,ngaytao,luotxem,file from #_news where hienthi=1 and loaitin='cong-nghe' order by stt,ngaytao desc";
                $d->query($sql_tintuc);
                $tintucE = $d->result_array();
                ?>
                <a href="download/<?php echo $tintucE[0]['tenkhongdau']?>-<?php echo $tintucE[0]['id']?>.html" class="<?php if ($com == "download") { echo "menu_active";
} ?> ">ESA
                </a>
            </li>
            <?php if (!empty($dmdv)) {
                echo "<ul>";
                foreach ($dmdv as $dmsp_item) { ?>
            <li><a href="dich-vu/<?php echo $dmsp_item["tenkhongdau"] ?>/"
                    title="<?php echo $dmsp_item["ten"] ?>"><?php echo $dmsp_item["ten"] ?></a></li>

            <?php }
                echo "</ul>";
            } ?>
            </li>
            <li class="vach_menu">
                <?php
                $d->reset();
                $sql_tintuc = "select ten_$lang as ten,tenkhongdau,mota_$lang as mota,thumb,id,ngaytao,luotxem,file from #_news where hienthi=1 and loaitin='solar' order by stt,ngaytao desc";
                $d->query($sql_tintuc);
                $tintucS = $d->result_array();
                ?>
                <a href="solar/<?php echo $tintucS[0]['tenkhongdau']?>-<?php echo $tintucS[0]['id']?>.html" class="<?php if ($com == "solar") {echo "menu_active";
} ?> ">SOLAR
                </a>
            </li>

            <li class="vach_menu"><a href="lien-he.html" class="<?php if ($com == "lien-he") {echo "menu_active";
} ?> "><?php echo _contact ?>
                </a>
            </li>
            </ul>
            <div class="search-btn-better">
                <?php require _template . "layout/search.php"; ?>
            </div>
        </div>


    </div>

</div>
<section class="call-button" title="1900 63 35 64">
    <a class="calling" href="tel:1900633564">
        <i><img src="./images/calling.svg" alt=""></i>
        <div class="show-tel">1900 63 35 64</div>
    </a>
</section>
<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>
<script>
// $(function() {
//     $('.calling').hover(function() {
//         $('.show-tel').css('display', 'block');
//     }, function() {
//         // on mouseout, reset the background colour
//         $('.show-tel').css('display', 'none');
//     });
// });
(function($) {
    "use strict";
    $(document).ready(function() {
        "use strict";

        //Scroll back to top

        var progressPath = document.querySelector('.progress-wrap path');
        var pathLength = progressPath.getTotalLength();
        progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
        progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
        progressPath.style.strokeDashoffset = pathLength;
        progressPath.getBoundingClientRect();
        progressPath.style.transition = progressPath.style.WebkitTransition =
            'stroke-dashoffset 10ms linear';
        var updateProgress = function() {
            var scroll = $(window).scrollTop();
            var height = $(document).height() - $(window).height();
            var progress = pathLength - (scroll * pathLength / height);
            progressPath.style.strokeDashoffset = progress;
        }
        updateProgress();
        $(window).scroll(updateProgress);
        var offset = 100;
        var duration = 550;
        jQuery(window).on('scroll', function() {
            if (jQuery(this).scrollTop() > offset) {
                jQuery('.progress-wrap').addClass('active-progress');
            } else {
                jQuery('.progress-wrap').removeClass('active-progress');
            }
        });
        jQuery('.progress-wrap').on('click', function(event) {
            event.preventDefault();
            jQuery('html, body').animate({
                scrollTop: 0
            }, duration);
            return false;
        })


    });

})(jQuery);
</script>
<style>
.search-btn-better {
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
}

.nav {
    width: 100vw;
    height: 70px;
}

.img-logo {
    width: 128px;
    height: 50px;
}

.vach_menu {
    font-size: 16px !important;
}
</style>