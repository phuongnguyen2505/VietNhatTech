<?php
$d->reset();
$sql_slider = "select ten_$lang as ten,photo,link,mota_$lang as mota, stt from table_slider ";
$d->query($sql_slider);
$result_slider = $d->result_array();

// Sort the $result_slider array by "stt"
usort($result_slider, function ($a, $b) {
  return $a['stt'] - $b['stt'];
});
?>
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<div id="banner">
  <?php require _template . "layout/banner.php"; ?>
</div>
<!--banner-->
<div class="f-brand m-100">
  <div class="title-brand">
    <h1 class="main-title">
      <?php echo _fbrand ?>&nbsp;
      <p>
        <?php echo _fbrand2 ?>
      </p>
    </h1>
    <h1 class="hidden-title">FAMOUS BRAND</h1>
  </div>
  <div class="s-brand">
    <?php
    if (!empty($result_slider)) {
      foreach ($result_slider as $slider_item) {
        ?>
        <div class="row">
          <div class="brand-item">
            <a href="<?= $slider_item['link'] ?>" target="_blank" class="hover-img" title="<?= $slider_item['ten'] ?>">
              <figure>
                <img src="<?= _upload_hinhanh_l . $slider_item['photo'] ?>" alt="<?= $slider_item['ten'] ?>"
                  title="<?= $slider_item['ten'] ?>">
              </figure>
            </a>
          </div>
        </div>
        <?php
      }
    }

    ?>
  </div>
</div>

<div class="news">
  <div class="title-brand">
    <h1 class="main-title">
      <?php echo _news ?>&nbsp;
      <p>
        <?php echo _new ?>
      </p>
    </h1>
    <h1 class="hidden-title">News</h1>
  </div>
  <div class="gr-news m-100">
    <!-- <article class="news-item">
      <div class="layer"></div>
      <h3 class="news-title">
        <?php
        $content = $tintuc[0]["ten"];
        $words = explode(' ', $content);

        if (count($words) > 10) {
          $limitedContent = implode(' ', array_slice($words, 0, 8)) . '...';
          echo "<p>{$limitedContent}</p>";
        } else {
          echo "<p>{$content}</p>";
        }
        ?>
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
          <?php
          $content = $tintuc[1]["ten"];
          $words = explode(' ', $content);

          if (count($words) > 10) {
            $limitedContent = implode(' ', array_slice($words, 0, 8)) . '...';
            echo "<p>{$limitedContent}</p>";
          } else {
            echo "<p>{$content}</p>";
          }
          ?>
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
          <?php
          $content = $tintuc[2]["ten"];
          $words = explode(' ', $content);

          if (count($words) > 10) {
            $limitedContent = implode(' ', array_slice($words, 0, 8)) . '...';
            echo "<p>{$limitedContent}</p>";
          } else {
            echo "<p>{$content}</p>";
          }
          ?>
        </h3>
        <a href="tin-tuc/<?php echo $tintuc[2][
          "tenkhongdau"
        ]; ?>-<?php echo $tintuc[2]["id"]; ?>.html" type="button" class="btn-news">
          <?php echo _more ?>
          <i><img src="./images/arrow-right.svg" alt=""></i>
        </a>
        <img class="news-img" src="<?php echo _upload_tintuc_l .
          $tintuc[2]["thumb"]; ?>" alt="<?php echo $tintuc[2]["ten"]; ?>" />
      </article> -->
    <div class="swiper-container">
      <div class="swiper-wrapper">
        <?php
        // Loop through the first 5 news items
        for ($i = 0; $i < min(5, count($tintuc)); $i++) {
          $content = $tintuc[$i]["ten"];
          $words = explode(' ', $content);

          if (count($words) > 10) {
            $limitedContent = implode(' ', array_slice($words, 0, 8)) . '...';
          } else {
            $limitedContent = $content;
          }
          ?>
          <!-- News Article -->
          <div class="swiper-slide" data-id="<?php echo $i + 1; ?>">
            <div class="news-form">
              <div class="news-image"
                style="background-image:url('<?php echo _upload_tintuc_l . $tintuc[$i]["thumb"]; ?>')"></div>
              <div class="news-content">
                <h3 class="news-title">
                  <a href="tin-tuc/<?php echo $tintuc[$i]["tenkhongdau"]; ?>-<?php echo $tintuc[$i]["id"]; ?>.html">
                    <?php echo $limitedContent; ?>
                  </a>
                </h3>
                <p>
                  <?php
                  $str = strip_tags($tintuc[$i]["mota"]);
                  $contentWordLimit = 100;
                  $strCut = substr($str, 0, $contentWordLimit);
                  $str = substr($strCut, 0, strrpos($strCut, " ")) . "...";
                  echo $str;
                  ?>
                </p>
                <div class="swiper-bottom-gr">
                  <span>
                    <?php echo date('d-m-Y', $tintuc[$i]['ngaytao']) ?>
                  </span>
                  <a href="tin-tuc/<?php echo $tintuc[$i]["tenkhongdau"]; ?>-<?php echo $tintuc[$i]["id"]; ?>.html"
                    type="button" class="btn-news-swiper">
                    <?php echo _more; ?>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <?php
        }
        ?>
      </div>
      <!-- Add Navigation -->
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <!-- Add Pagination -->
      <div class="swiper-pagination"></div>
    </div>
  </div>
</div>
<div class="gr-news-mb m-100">
  <article class="news-item-mb">
    <a href="tin-tuc/<?php echo $tintuc[0][
      "tenkhongdau"
    ]; ?>-<?php echo $tintuc[0]["id"]; ?>.html">
      <img class="news-img-mb" src="<?php echo _upload_tintuc_l .
        $tintuc[0]["thumb"]; ?>" alt="<?php echo $tintuc[0]["ten"]; ?>" />
    </a>
    <a href="tin-tuc/<?php echo $tintuc[0][
      "tenkhongdau"
    ]; ?>-<?php echo $tintuc[0]["id"]; ?>.html">
      <div class="row">
        <h3 class="news-title-mb">
          <?php
          $content = $tintuc[0]["ten"];
          $words = explode(' ', $content);

          if (count($words) > 10) {
            $limitedContent = implode(' ', array_slice($words, 0, 10)) . '...';
            echo "{$limitedContent}";
          } else {
            echo "{$content}";
          }
          ?>
        </h3>
      </div>
    </a>
  </article>
  <article class="news-item-mb">
    <a href="tin-tuc/<?php echo $tintuc[1][
      "tenkhongdau"
    ]; ?>-<?php echo $tintuc[1]["id"]; ?>.html">
      <img class="news-img-mb" src="<?php echo _upload_tintuc_l .
        $tintuc[1]["thumb"]; ?>" alt="<?php echo $tintuc[1]["ten"]; ?>" />
    </a>
    <a href="tin-tuc/<?php echo $tintuc[1][
      "tenkhongdau"
    ]; ?>-<?php echo $tintuc[1]["id"]; ?>.html">
      <div class="row">
        <h3 class="news-title-mb">
          <?php
          $content = $tintuc[1]["ten"];
          $words = explode(' ', $content);

          if (count($words) > 10) {
            $limitedContent = implode(' ', array_slice($words, 0, 10)) . '...';
            echo "{$limitedContent}";
          } else {
            echo "{$content}";
          }
          ?>
        </h3>
      </div>
    </a>
  </article>
  <article class="news-item-mb">
    <a href="tin-tuc/<?php echo $tintuc[2][
      "tenkhongdau"
    ]; ?>-<?php echo $tintuc[2]["id"]; ?>.html">
      <img class="news-img-mb" src="<?php echo _upload_tintuc_l .
        $tintuc[2]["thumb"]; ?>" alt="<?php echo $tintuc[2]["ten"]; ?>" />
    </a>
    <a href="tin-tuc/<?php echo $tintuc[2][
      "tenkhongdau"
    ]; ?>-<?php echo $tintuc[2]["id"]; ?>.html">
      <div class="row">
        <h3 class="news-title-mb">
          <?php
          $content = $tintuc[2]["ten"];
          $words = explode(' ', $content);

          if (count($words) > 10) {
            $limitedContent = implode(' ', array_slice($words, 0, 10)) . '...';
            echo "{$limitedContent}";
          } else {
            echo "{$content}";
          }
          ?>
        </h3>
      </div>
    </a>
  </article>
</div>
</div>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
  var swiper = new Swiper('.swiper-container', {
    slidesPerView: 3,
    spaceBetween: 5,
    loop: true,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
  });
</script>
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