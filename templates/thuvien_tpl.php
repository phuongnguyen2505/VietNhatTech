<h1 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;">
    <?php echo $row_setting['title_' . $lang] ?>
</h1>
<h2 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;">
    <?php echo $row_setting['title_' . $lang] ?>
</h2>
<h3 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;">
    <?php echo $row_setting['title_' . $lang] ?>
</h3>
<h4 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;">
    <?php echo $row_setting['title_' . $lang] ?>
</h4>
<h5 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;">
    <?php echo $row_setting['title_' . $lang] ?>
</h5>
<h6 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;">
    <?php echo $row_setting['title_' . $lang] ?>
</h6>
<div class="banner banner-s">
    <div class="hero-banner">
        <div class="layer">
            <div class="right m-100">
                <article>
                    <section class="welcome">Welcome to Viet Nhat</section>
                    <section class="gr-banner w700">
                        <h1 class="hero-title <?php echo $title_tcat ?>">
                            <?php echo $title_tcat ?>
                        </h1>
                    </section>
                </article>
            </div>
        </div>
    </div>
</div>
<div class="row m-100">
    <div class="box_main service mt-100">
        <?php
        if (count($tintuc) > 0) {
            $class_names = array("first-items", "second-items", "third-items", "fourth-items", "fifth-items", "sixth-items");
            for ($i = 0, $count_tintuc = count($tintuc); $i < $count_tintuc; $i++) {
                $item_class = isset($class_names[$i]) ? $class_names[$i] : '';
                ?>
                <div class="box-service <?php echo $item_class; ?>">
                    <div class="<?php echo $item_class; ?>">
                        <img class="service-img" src="<?php echo _upload_dichvu_l, $tintuc[$i]['thumb'] ?>" alt="">
                        <div class="title-service">
                            <a href="dich-vu/<?php echo $tintuc[$i]['tenkhongdau'] ?>-<?php echo $tintuc[$i]['id'] ?>.html">
                                <p>
                                    <?php echo $tintuc[$i]['ten'] ?>
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
            <?php
        } else
            echo '<p>Nội dung đang cập nhật, bạn vui lòng xem các chuyên mục khác.</p>';
        ?>
        <?php
        if (count($tintuc) > 0) {
            for ($i = 0, $count_tintuc = count($tintuc); $i < $count_tintuc; $i++) {
                ?>
                <div class="service-mb">
                    <img class="service_img-mb" src="<?php echo _upload_dichvu_l, $tintuc[$i]['thumb'] ?>" alt="">
                    <div class="title-service-mb">
                        <a href="dich-vu/<?php echo $tintuc[$i]['tenkhongdau'] ?>-<?php echo $tintuc[$i]['id'] ?>.html">
                            <p>
                                <?php echo $tintuc[$i]['ten'] ?>
                            </p>
                        </a>
                    </div>
                </div>
                <?php
            }
            ?>
            <?php
        } else
            echo '<p>Nội dung đang cập nhật, bạn vui lòng xem các chuyên mục khác.</p>'; ?>
    </div>
</div>
<div class="phantrang">
    <?php
    $paging_html = str_replace("First", "<<", $paging['paging']);
    $paging_html = str_replace("Prev", "<", $paging_html);
    $paging_html = str_replace("Next", ">", $paging_html);
    $paging_html = str_replace("Last", ">>", $paging_html);
    ?>
    <?php if (isset($paging['paging'])) {
        echo $paging_html;
    } else {
        echo _nodata;
    } ?>
</div>


<style>
    .hero-title {
        letter-spacing: 0.3em !important;
    }
</style>