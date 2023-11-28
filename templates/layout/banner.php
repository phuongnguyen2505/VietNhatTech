<?php
$d->reset();
if ($lang == "en") {
    $sql_banner_giua = "select photo from #_photo where com='banner_top_en'  limit 0,1";
} else {
    $sql_banner_giua = "select photo from #_photo where com='banner_top'  limit 0,1";
}
$d->query($sql_banner_giua);
$row_banner_giua = $d->fetch_array();

// $d->reset();
// $sql_banner_giua = "select photo from #_photo where com='ft'  limit 0,1";
// $d->query($sql_banner_giua);
// $logo = $d->fetch_array();

$d->reset();
$sql = "select ten,id,url,image from #_mxh where hienthi=1 and noibat=0 order by id asc";
$d->query($sql);
$mxh = $d->result_array();
?>


<div class="banner">
    <div class="hero-banner">
        <div class="layer">
            <div class="right m-100">
                <section class="hero-welcome">
                    <div class="welcome">Welcome to Viet Nhat</div>
                    <div class="title-banner w700">
                        <h1 class="first-title hero-title">Service & Solution</h1>
                    </div>
                    <section>
                        <div class="des">
                            <p>
                                <?php echo _bannerdes ?>
                            </p>
                        </div>
                        <div class="btn-more">
                            <a href="gioi-thieu/gioi-thieu-2.html">
                                <button class="learn-more">
                                    <span class="circle" aria-hidden="true">
                                        <span class="icon arrow"></span>
                                    </span>
                                    <span class="button-text">
                                        <?php echo _more ?>
                                    </span>
                                </button>
                                <button class="learn-more-mobile">
                                    <span class="button-text">
                                        <?php echo _more ?>
                                    </span>
                                </button>
                            </a>
                        </div>
                    </section>
                </section>
            </div>
        </div>
    </div>
</div>
<style>
    .hero-banner {
        background: url(<?php echo _upload_hinhanh_l . $row_banner_giua["photo"]; ?>) no-repeat;
    }
</style>