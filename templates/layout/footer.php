<?php

$d->reset();
$sql = "select noidung_$lang as noidung from #_footer ";
$d->query($sql);
$footer = $d->fetch_array();

$d->reset();
$sql = "select ten,id,url,image from #_mxh where hienthi=1 order by id asc";
$d->query($sql);
$mxh1 = $d->result_array();
?>

<div id="footer_info">
    <div id="footer_content" class="m-100">
        <div class="footer_block1">
            <div class="footer_title company tt_shadow2">
                <h2><?php echo $row_setting[
                "ten_" . $lang
                ] ?></h2>
            </div>
            <?php echo stripcslashes($footer["noidung"]) ?>
            <div class="thongke">
                <?php if (!empty($mxh1)) {
                    foreach ($mxh1 as $key => $value) { ?>
                <a href="<?php echo $value[
                   "url"
                 ] ?>" target="_blank"><img class="transi_1s" src="<?php echo _upload_hinhanh_l .
  $value["image"] ?>" alt="<?php echo $value["ten"] ?>" title="<?php echo $value["ten"] ?>" /></a>
                <?php }
                } ?>
                <div class="clr"></div>
            </div>
            <div class="footer-copyright m-100">
                <div class="logo-footer">
                    <a href="./">
                        <img src="./images/logo.png" alt="">
                    </a>
                </div>
                <div class="copyright">
                    <p>Copyright © 2023 Viet Nhat International Technical CO.,LTD</p>
                </div>
            </div>
            <div class="clr"></div>
        </div>
        <?php if ($row_setting["facebook"] != "") { ?>
        <!-- <div class="footer_block3">
      <div id="fb-root"></div>
        <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v1.0";
        fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
        </script>


        <div class="embed-responsive embed-responsive-4by3">
             <div class="fb-like-box" data-href="<?php echo $row_setting["facebook"] ?> " 
                data-width="500" data-height="240" data-colorscheme="light" data-show-faces="true" 
                data-header="true" data-stream="true" data-show-border="false">
            </div> 
        </div> 
        <div class="clr"></div>
    </div> -->

        <?php } ?>


        <div class="clr"></div>
        <div class="back-to-top" id="to-top">
        </div>
    </div>
    <!--footer cont?ent-->
</div>

<style>
.hero-banner {
    background: url(<?php echo _upload_hinhanh_l.$row_banner_giua["photo"] ?>) no-repeat;
    flex: 1;
    aspect-ratio: 16/9;
    background-size: 100% 100%;
}
</style>

<script type="text/javascript">
$('#to-top').click(function() {
    $('html, body').animate({
        scrollTop: 0
    }, 500);
});
</script>