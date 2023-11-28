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
        <div class="clr"></div>
    </div>
</div>
<div class="row m-100">
    <div class="box_main mt-100">
        <?php
        // Function to check if the user is on a mobile device
        function isMobile()
        {
            return strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false;
        }

        if (count($tintuc) > 0): ?>
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
                                <?php
                                $content = $tintuc[$i]["ten"];
                                $words = explode(' ', $content);

                                // Adjust word limit based on screen width
                                $titleWordLimit = (in_array($item_class, array("second-items", "third-items", "fifth-items", "sixth-items")) || isMobile()) ? 8 : 10;
                                $limitedContent = implode(' ', array_slice($words, 0, $titleWordLimit)) . '...';

                                echo $limitedContent;
                                ?>
                            </a>
                        </div>
                        <div class="gr-mota">
                            <p>
                                <?php
                                $str = strip_tags($tintuc[$i]["mota"]);

                                // Adjust content limit based on screen width
                                $contentWordLimit = (in_array($item_class, array("second-items", "third-items", "fifth-items", "sixth-items")) || isMobile()) ? 100 : 250;
                                $strCut = substr($str, 0, $contentWordLimit);

                                $str = substr($strCut, 0, strrpos($strCut, " ")) . "...";
                                echo $str;
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
        <?php else: ?>
            <?php echo _tb2; ?>
        <?php endif; ?>
        <div class="clr"></div>
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
    </div>
    <?php
    function generate_link($tenkhongdau, $id)
    {
        return "tin-tuc/{$tenkhongdau}-{$id}.html";
    }
    ?>
</div>