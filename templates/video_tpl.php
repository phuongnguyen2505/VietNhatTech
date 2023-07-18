<script type="text/javascript">
  $(document).ready(function () {
    $('.video1').click(function () {
      var href = $(this).attr('href');

      if (href != '')
        $('.video_top').load("ajax/video.php?id=" + href);

      return false;

    });
  });
</script>
<div class="box_main margin15">
  <div class="title_p">
    <h3 class="title">video clip</h3>
  </div>

  <div class="video_top">
    <iframe width="500" height="350" src="//www.youtube.com/embed/<?= trim($tintuc[0]['urrl']) ?>?rel=0&autoplay=1"
      frameborder="0" allowfullscreen></iframe>
  </div>
  <?php



  if (!empty($tintuc)) {
    for ($i = 1; $i < count($tintuc); $i++) {
      $trs = '';
      if (($i % 4) == 0)
        $trs = 'style="margin-right:0px;"';
      ?>



      <div class="block_item_home" <?= $trs ?>>

        <div class="block-img">
          <a class="video1" title="<?= $tintuc[$i]['ten'] ?>" href="<?= $tintuc[$i]['id'] ?>">

            <img src="<?= _upload_hinhanh_l . $tintuc[$i]['image'] ?>" alt="<?= $tintuc[$i]['ten'] ?>"
              title="<?= $tintuc[$i]['ten'] ?>" />
            <span class="nut_video"></span>
          </a>

        </div>
        <div class="block-img_over"><a href="javascript:" title="<?= $tintuc[$i]['ten'] ?>"><?= $tintuc[$i]['ten'] ?></a></div>


      </div><!--blocj item-->
      <?php
      if (($i % 4) == 0)
        echo '<div class="clr"></div>';
    }
  }

  ?>

  <div class="clr" style="height:20px;"></div>

</div>