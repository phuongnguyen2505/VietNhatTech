<div class="news-banner solar">
    <div class="layer-news">
        <h1 class="hide-title">SOLAR</h1>
        <h1 class="hero-title m-100">
            <?php echo $tintuc_detail[0]['ten'] ?>
        </h1>
        <!-- <p>CÔNG TY TNHH KỸ THUẬT QUỐC TẾ VIỆT NHẬT</p> -->
    </div>
</div>
<div class="row m-100 mt-100">
    <div class="box_main">
        <div class="content">
            <div class="esaus">
                <?php echo stripcslashes($tintuc_detail[0]['noidung']) ?>
            </div>
            <?php if (!empty($tintuc_khac)) { ?>
                <div class="othernews">
                    <h2>
                        <?php echo _baivietkhac ?>
                    </h2>
                    <ul>

                        <?php foreach ($tintuc_khac as $tinkhac) {

                            ?>
                            <li><a href="thu-vien-tai-lieu/<?php echo $tinkhac['tenkhongdau'] ?>-<?php echo $tinkhac['id'] ?>.html"
                                    style="text-decoration:none;">
                                    <?php echo $tinkhac['ten'] ?>
                                </a>
                                (
                                <?php echo make_date($tinkhac['ngaytao']) ?>)
                            </li>
                        <?php }
                        ?>
                    </ul>

                </div><br />
            <?php } ?>
        </div>
    </div>
    <!-- end box_main -->


</div>
<!-- end right -->
<style>
    .news-banner.solar {
        background: url("upload/hinhanh/solar5.jpg") no-repeat;
        aspect-ratio: 32/9;
        background-size: 100% 100%;
    }
</style>