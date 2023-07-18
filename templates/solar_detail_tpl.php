<div class="banner">
    <div class="hero-banner">
        <div class="layer">
            <div class="right m-100">
                <article>
                    <section class="welcome">Welcome to Viet Nhat</section>
                    <section class="gr-banner w700 esa-us">
                        <h1 class="hide-title">SOLAR</h1>
                        <h1 class="hero-title"><?php echo $tintuc_detail[0]['ten']?></h1>
                    </section>
                </article>
            </div>
        </div>
        <div class="clr"></div>
    </div>
</div>
<div class="row m-100 mt-100">
    <div class="box_main">
        <div class="content">
            <div class="esaus">
                <?php echo stripcslashes($tintuc_detail[0]['noidung'])?>
            </div>
            <!-- <div class="clr" style="height:0px; border-bottom:1px solid #cdcdcd;"></div> -->
            <!-- <p class="small"><?php echo _ngaydang?> <span
                    style="font-size:12px;">:<?php echo date('d-m-Y h:i:s A', $tintuc_detail[0]['ngaytao'])?> </span>-
                <?php echo _daxem?> <span style="font-size:12px;">:<?php echo $tintuc_detail[0]['luotxem']?></span></p>
            <br /> -->


            <!-- k<br />
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

            <!-- <div class="clr" style="height:0px; border-bottom:1px solid #cdcdcd; margin-top:20px;"></div> -->
            <?php if(!empty($tintuc_khac)) { ?>
            <div class="othernews">
                <h2><?php echo _baivietkhac?></h2>
                <ul>

                    <?php foreach($tintuc_khac as $tinkhac){
                      
                        ?>
                    <li><a href="thu-vien-tai-lieu/<?php echo $tinkhac['tenkhongdau']?>-<?php echo $tinkhac['id']?>.html"
                            style="text-decoration:none;"><?php echo $tinkhac['ten']?></a>
                        (<?php echo make_date($tinkhac['ngaytao'])?>)
                    </li>
                    <?php } 
                    ?>
                </ul>

            </div><br />
            <?php }?>
        </div>
    </div>
    <!-- end box_main -->


</div>
<!-- end right -->

<style>
.esa-us .hide-title {
    font-size: 135px;
}
</style>
