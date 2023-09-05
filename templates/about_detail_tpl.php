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

<div class="banner">
    <div class="hero-banner">
        <div class="layer">
            <div class="right m-100">
                <article>
                    <section class="welcome">Welcome to Viet Nhat</section>
                    <section class="gr-banner w700">
                        <h1 class="hide-title">about us</h1>
                        <h1 class="hero-title" <?php echo $title_bar?>><?php echo _aboutus?></h1>
                    </section>
                </article>
            </div>
        </div>
        <div class="clr"></div>
    </div>
</div>
<!-- end #left -->
<div class="row m-100 mt-100">
    <div class="box_main">
        <div class="content">
            <div class="about-vn">
                <?php echo stripcslashes($tintuc_detail[0]["noidung"]) ?>
            </div>
            <!-- <br />
            <span class='st_facebook_hcount' displayText='Facebook'></span>
            <span class='st_twitter_hcount' displayText='Tweet'></span>
            <span class='st_googleplus_hcount' displayText='Google +'></span>
            <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
            <script type="text/javascript">
            stLight.options({
                publisher: "5b2a972a-c743-4b89-8b81-78a6dba1ee67",
                doNotHash: false,
                doNotCopy: false,
                hashAddressBar: false
            });
            </script> -->

        </div>
    </div>
</div>
<style type="text/css">
/* .banner {
    display: none;
} */

.hero-banner {
    background: url(<?php echo _upload_hinhanh_l.$row_banner_giua["photo"] ?>) no-repeat;
    flex: 1;
    aspect-ratio: 16/9;
    background-size: 100% 100%;
}
</style>
