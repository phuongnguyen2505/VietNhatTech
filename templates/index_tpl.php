<div id="banner">
    <?php require _template . "layout/banner.php"; ?>
</div>
<!--banner-->
<div class="f-brand m-100">
    <div class="title-brand">
        <h1 class="main-title"><?php echo _fbrand?><p>&nbsp;<?php echo _fbrand2?></p>
        </h1>
        <h1 class="hidden-title">FAMOUS BRAND</h1>
    </div>
    <div class="s-brand">
        <div class="row">
            <div class="brand-item">
                <a href="./san-pham.html" class="hover-img yoshi">
                    <figure>
                        <img src="./upload/hinhanh/yoshitake.png" alt="yoshitake">
                    </figure>
                </a>
            </div>
            <div class="brand-item">
                <a href="./ingersoll-rand.html" class="hover-img">
                    <figure>
                        <img src="./upload/hinhanh/ir.png" alt="ingersoll rand">
                    </figure>
                </a>
            </div>
        </div>
        <div class="row">
            <!-- <div class="brand-item">
                <a href="./san-pham-khac/piscojapan/" class="hover-img">
                    <figure>
                        <img src="./upload/hinhanh/pisco.png" alt="">
                    </figure>
                </a>
            </div> -->
            <div class="brand-item">
                <a href="./san-pham-khac/omronjapan/" class="hover-img">
                    <figure>
                        <img src="./upload/hinhanh/omron.png" alt="omron">
                    </figure>
                </a>
            </div>
            <div class="brand-item">
                <a href="./san-pham-khac/kawakijapan/" class="hover-img">
                    <figure>
                        <img src="./upload/hinhanh/kawaki.png" alt="kawaki">
                    </figure>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="brand-item">
                <a href="download/<?php echo $tintucE[0][
                  "tenkhongdau"
                ]; ?>-<?php echo $tintucE[0]["id"]; ?>.html" class="<?php if (
  $com == "download"
) {
  echo "menu_active";
} ?> hover-img">
                    <figure>
                        <img src="./upload/hinhanh/esa.png" alt="Trung tâm tiết kiệm năng lượng ESA">
                    </figure>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="news">
    <div class="title-brand">
        <h1 class="main-title"><?php echo _news?><p>&nbsp;<?php echo _new?></p>
        </h1>
        <h1 class="hidden-title">News</h1>
    </div>
    <div class="gr-news m-100">
        <article class="news-item">
            <div class="layer"></div>
            <h3 class="news-title">
                <?php echo $tintuc[0]["ten"]; ?>
            </h3>
            <a href="tin-tuc/<?php echo $tintuc[0][
              "tenkhongdau"
            ]; ?>-<?php echo $tintuc[0]["id"]; ?>.html" type="button" class="btn-news">
                <?php echo _more ?>
                <i><img src="./images/arrow-right.svg" alt=""></i>
            </a>
            <img class="news-img" src="<?php echo _upload_tintuc_l .
              $tintuc[0]["thumb"]; ?>" alt="<?php echo $tintuc[0]["ten"]; ?>" />
        </article>
        <div class="gr-r-news">
            <article class="r-news-item">
                <div class="layer"></div>
                <h3 class="news-title">
                    <?php echo $tintuc[1]["ten"]; ?>
                </h3>
                <a href="tin-tuc/<?php echo $tintuc[1][
                  "tenkhongdau"
                ]; ?>-<?php echo $tintuc[1]["id"]; ?>.html" type="button" class="btn-news">
                    <?php echo _more ?>
                    <i><img src="./images/arrow-right.svg" alt=""></i>
                </a>
                <img class="news-img" src="<?php echo _upload_tintuc_l .
                  $tintuc[1]["thumb"]; ?>" alt="<?php echo $tintuc[1]["ten"]; ?>" />
            </article>
            <article class="r-news-item">
                <div class="layer"></div>
                <h3 class="news-title">
                    <?php echo $tintuc[2]["ten"]; ?>
                </h3>
                <a href="tin-tuc/<?php echo $tintuc[2][
                  "tenkhongdau"
                ]; ?>-<?php echo $tintuc[2]["id"]; ?>.html" type="button" class="btn-news">
                    <?php echo _more ?>
                    <i><img src="./images/arrow-right.svg" alt=""></i>
                </a>
                <img class="news-img" src="<?php echo _upload_tintuc_l .
                  $tintuc[2]["thumb"]; ?>" alt="<?php echo $tintuc[2]["ten"]; ?>" />
            </article>
        </div>
    </div>
</div>

<h1 style="height:0px;line-height:0px; visibility:hidden;">
    <?php echo $row_setting["title_" . $lang]; ?>
</h1>
<h2 style="height:0px;line-height:0px; visibility:hidden;">
    <?php echo $row_setting["title_" . $lang]; ?>
</h2>
<h3 style="height:0px;line-height:0px; visibility:hidden;">
    <?php echo $row_setting["title_" . $lang]; ?>
</h3>
<h4 style="height:0px;line-height:0px; visibility:hidden;">
    <?php echo $row_setting["title_" . $lang]; ?>
</h4>
<h5 style="height:0px;line-height:0px; visibility:hidden;">
    <?php echo $row_setting["title_" . $lang]; ?>
</h5>
<h6 style="height:0px;line-height:0px; visibility:hidden;">
    <?php echo $row_setting["title_" . $lang]; ?>
</h6>
<div id="right1">
    <!-- <div class="box_main">
    <div class="title_p">
      <h3 class="title">
        <?php echo _sanpham1; ?>
      </h3>
    </div>
    <?php if (!empty($spnb)) {
      foreach ($spnb as $k => $product_item) {

        $str = "";
        if (($k + 1) % 2 == 0) {
          $str = 'style="margin-right:0px;"';
        }
        ?>
        <div class="right_item" <?php echo $str; ?>>

          <div class="img">
            <div class="img_wrap">
              <a href="san-pham/<?php echo $product_item[
                "tenkhongdau"
              ]; ?>-<?php echo $product_item["id"]; ?>.html">
                <img src="<?php echo _upload_product_l .
                  $product_item["thumb"]; ?>" alt="<?php echo $product_item["ten"]; ?>" />
              </a>
            </div>
          </div>
          <h3><a href="san-pham/<?php echo $product_item[
            "tenkhongdau"
          ]; ?>-<?php echo $product_item["id"]; ?>.html"><?php echo $product_item[
  "ten"
]; ?></a>
          </h3>
          <div class="desc">
            <?php echo $product_item["mota"]; ?>
          </div>
            <?php if ($product_item["file"] != "") { ?>
            <a class="download" target="_blank" href="<?php echo _upload_product_l .
              $product_item["file"]; ?>"><img
                src="images/pdf.png" alt="<?php echo $product_item["ten"]; ?>"></a>
            <?php } ?>
          <div class="clr"></div>
        </div>
            <?php if (($k + 1) % 2 == 0) {
              echo '<div class="clr"></div>';
            }
      }
    } ?>

    <div class="clr"></div>
  </div> -->

    <!-- <div class="box_main">
    <div class="title_p">
      <h3 class="title">
        <?php echo _sanpham2; ?>
      </h3>
    </div>
    <?php if (!empty($spnb2)) {
      foreach ($spnb2 as $k => $product_item) {

        $str = "";
        if (($k + 1) % 2 == 0) {
          $str = 'style="margin-right:0px;"';
        }
        ?>
        <div class="right_item" <?php echo $str; ?>>

          <div class="img">
            <div class="img_wrap">
              <a href="san-pham-kitz/<?php echo $product_item[
                "tenkhongdau"
              ]; ?>-<?php echo $product_item["id"]; ?>.html">
                <img src="<?php echo _upload_product_l .
                  $product_item["thumb"]; ?>" alt="<?php echo $product_item["ten"]; ?>" />
              </a>
            </div>
          </div>
          <h3><a
              href="san-pham-kitz/<?php echo $product_item[
                "tenkhongdau"
              ]; ?>-<?php echo $product_item["id"]; ?>.html"><?php echo $product_item[
  "ten"
]; ?></a>
          </h3>
          <div class="desc">
            <?php echo $product_item["mota"]; ?>
          </div>
            <?php if ($product_item["file"] != "") { ?>
            <a class="download" target="_blank" href="<?php echo _upload_product_l .
              $product_item["file"]; ?>"><img src="images/pdf.png"
                alt="<?php echo $product_item["ten"]; ?>"></a>
            <?php } ?>
          <div class="clr"></div>
        </div>
            <?php if (($k + 1) % 2 == 0) {
              echo '<div class="clr"></div>';
            }
      }
    } ?>

    <div class="clr"></div>
  </div> -->
</div>