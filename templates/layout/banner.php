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
        <!-- <?php
        /* ?>
         <object width="620" height="130" data="<?=_upload_hinhanh_l.$row_banner_giua['photo']?>" type="application/x-shockwave-flash" style="margin-left: 150px;">
         
         </style> 
         <param value="<?=_upload_hinhanh_l.$row_banner_giua['photo']?>" name="movie">
         <param value="high" name="quality">
         <param value="transparent" name="wmode">
         </object>
         <?php */
        ?> -->
        <div class="layer">
            <!-- <div class="left">
                <div class="banner"></div>
            </div> -->
            <div class="right m-100">
                <section>
                    <div class="welcome">Welcome to Viet Nhat</div>
                    <div class="title-banner w700">
                        <h1 class="first-title">Better Savings</h1>
                        <h1 class="second-title">For Better Future</h1>
                    </div>
                    <section>
                        <div class="des">
                            <p>CÔNG TY TNHH KỸ THUẬT QUỐC TẾ VIỆT NHẬT được biết đến là đơn vị chuyên nghiệp trong tư
                                vấn, thi công, lắp đặt các hệ thống đường ống hơi nóng, khí nén, hệ thống máy nén khí,
                                máy sấy khí, hệ thống lạnh,… Chế tạo, sửa chữa, bảo trì hệ thống hơi và lò hơi. Với đội
                                ngũ giàu kinh nghiệm, chuyên môn và tâm huyết trong ngành, chúng tôi cam kết mang lại
                                cho Quý khách hàng các giải pháp tốt nhất về việc sử dụng năng lượng hiệu quả và tiết
                                kiệm.</p>
                        </div>
                        <div class="btn-more">
                            <a href="gioi-thieu/gioi-thieu-2.html">
                                <button class="learn-more">
                                    <span class="circle" aria-hidden="true">
                                        <span class="icon arrow"></span>
                                    </span>
                                    <span class="button-text">Xem thêm</span>
                                </button>
                            </a>
                        </div>
                    </section>
                </section>

            </div>
        </div>


        <!-- <div class="box_head">
            <div style="text-align:right;">
                <a  title="Tiếng Việt" href="index.php?com=ngonngu&lang=vi"><img src="images/vi.png" alt="Tiếng Việt" width="30"></a>  
                <a  title="English" href="index.php?com=ngonngu&lang=en"><img src="images/en.png" alt="English" width="30"></a>
            </div>
            <div class="dienthoai"><?php echo _hotrokythuat ?>: <span><?php echo $row_setting[
            "dienthoai"
            ] ?></span></div>
            <div class="fax"><?php echo _phongkinhdoanh ?>: <span><?php echo $row_setting[
            "fax"
            ] ?></span></div>
            <div class="email">Email: <?php echo $row_setting["email"] ?></div>
            <div class="hotline">Hotline: <span><?php echo $row_setting[
              "hotline"
            ] ?></span></div>
        </div> -->



        <div class="clr"></div>
    </div>
</div>
<style>
.hero-banner {
    background: url(<?php echo _upload_hinhanh_l.$row_banner_giua["photo"] ?>) no-repeat;
    flex: 1;
    aspect-ratio: 16/9;
    background-size: 100% 100%;
}
</style>
