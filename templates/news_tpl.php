<div class="banner">
    <div class="hero-banner">
        <div class="layer">
            <div class="right m-100">
                <article>
                    <section class="welcome">Welcome to Viet Nhat</section>
                    <section class="gr-banner w700">
                        <h1 class="hide-title">News</h1>
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
        <?php if (count($tintuc) > 0) : ?>
        <?php
            $class_names = array("first-items", "second-items", "third-items", "fourth-items", "fifth-items", "sixth-items");
            for ($i = 0, $count_tintuc = count($tintuc); $i < $count_tintuc; $i++):
                $item_class = isset($class_names[$i]) ? $class_names[$i] : '';
                ?>
        <div class="box_news <?php echo $item_class; ?>">
            <div class="image_boder">
                <a href="<?php echo generate_link($tintuc[$i]["tenkhongdau"], $tintuc[$i]["id"]); ?>">
                    <img src="<?php echo _upload_tintuc_l . $tintuc[$i]["photo"]; ?>"
                        alt="<?php echo $tintuc[$i]["ten"]; ?>" />
                </a>
            </div>
            <div class="mota_tt">
                <div class="ten_tt">
                    <a href="<?php echo generate_link($tintuc[$i]["tenkhongdau"], $tintuc[$i]["id"]); ?>">
                        <?php echo $tintuc[$i]["ten"]; ?>
                    </a>
                </div>
                <span class="test"></span>
                <div class="gr-mota">
                    <p>
                        <?php
                            $str = strip_tags($tintuc[$i]["mota"]);
                            $strCut = substr($str, 0, 250);
                            $str = substr($strCut, 0, strrpos($strCut, " ")) . "...";
                            echo $str;
                        ?>
                    </p>
                    <a href="<?php echo generate_link($tintuc[$i]["tenkhongdau"], $tintuc[$i]["id"]); ?>"
                        class="effect effect-1">Xem thêm</a>
                </div>
            </div>
        </div>
        <?php endfor; ?>
        <?php else: ?>
        <?php echo _tb2; ?>
        <?php endif; ?>
        <div class="clr"></div>
        <div class="phantrang"><?php echo $paging["paging"]; ?></div>
    </div>

    <?php
    function generate_link($tenkhongdau, $id)
    {
        return "tin-tuc/{$tenkhongdau}-{$id}.html";
    }
    ?>
</div>