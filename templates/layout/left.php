<?php
$d->reset();
$sql_dmsp = "select ten_$lang as ten,tenkhongdau,id from #_" . $table_select . "_list where hienthi =1 order by stt asc";
$d->query($sql_dmsp);
$dmsp = $d->result_array();


$d->reset();
$sql_quangcao = "select  ten_$lang as ten,yahoo,skype,dienthoai,email from #_yahoo where hienthi =1 order by id desc ";
$d->query($sql_quangcao);
$hotro = $d->result_array();

$d->reset();
$sql = "select ten_$lang as ten,tenkhongdau,id,url from #_video where hienthi=1 order by stt asc";
$d->query($sql);
$video = $d->result_array();
?>

<!--Danh mục sản phẩm-->
<div class="left_box box_dm">
    <h2>
        <?php echo _dmsp ?>
    </h2>
    <div id="smoothmenu" class="ddsmoothmenu-v danhmuc">
        <ul class="cateUl accordion accordion-2 transitionAll">
            <?php
            if (!empty($dmsp)) {

                foreach ($dmsp as $dmsp_item) {
                    ?>


            <li>
                    <?php
                    if (isset($_GET['idc']) && $_GET['idc'] == $dmsp_item['tenkhongdau']) {
                        echo '<a class="active1" href="' . $com_select . '/' . $dmsp_item['tenkhongdau'] . '/" title="' . $dmsp_item['ten'] . '">' . $dmsp_item['ten'] . '</a>';
                    } else {
                        echo '<a href="' . $com_select . '/' . $dmsp_item['tenkhongdau'] . '/" title="' . $dmsp_item['ten'] . '">' . $dmsp_item['ten'] . '</a>';
                    }
                    ?>
                    <?php
                        // $d->reset();
                        // $sql_dmsp="select ten_$lang as ten,tenkhongdau,id from #_".$table_select."_cat where hienthi=1 and id_list=$dmsp_item[id] order by stt asc,id desc";
                        // $d->query($sql_dmsp);
                        // $dmsp1=$d->result_array();
                    if (!empty($dmsp1)) {
                        echo '<ul>';
                        foreach ($dmsp1 as $dmsp1_item) {
                            ?>
            <li><a href="<?php echo $com_select ?>/<?php echo $dmsp_item['tenkhongdau'] ?>/<?php echo $dmsp1_item['tenkhongdau'] ?>/"
                    title="<?php echo $dmsp1_item['ten'] ?>"><?php echo $dmsp1_item['ten'] ?></a>
                            <?php
                            // $d->reset();
                            // $sql_dmsp="select ten_$lang as ten,tenkhongdau,id from #_".$table_select."_item where hienthi=1 and id_cat=$dmsp1_item[id] order by stt asc,id desc";
                            // $d->query($sql_dmsp);
                            // $dmsp2=$d->result_array();
                            if (!empty($dmsp2)) {
                                echo '<ul>';
                                foreach ($dmsp2 as $dmsp2_item) {
                                    ?>
            <li><a href="<?php echo $com_select ?>/<?php echo $dmsp_item['tenkhongdau'] ?>/<?php echo $dmsp1_item['tenkhongdau'] ?>/<?php echo $dmsp2_item['tenkhongdau'] ?>/"
                    title="<?php echo $dmsp2_item['ten'] ?>"><?php echo $dmsp2_item['ten'] ?></a></li>

                                    <?php
                                }
                                echo '</ul>';
                            }
                            ?>
            </li>

                            <?php
                        }
                        echo '</ul>';
                    }
                    ?>
            </li>

                    <?php

                }
            }
            ?>

        </ul>
    </div>
</div>



<!-- <div class="left_box">
    <h2>
        <?php echo _hotrotructuyen ?>
    </h2>
    <div class="hotl">
        <br />
        <span class="sodt" style="color:#ff0000; font-style:italic; font-size:24px;">
            <?php echo $row_setting['hotline'] ?>
        </span>

    </div>
    <div id="hotro">

        <ul>

            <?php
            if (!empty($hotro)) {
                foreach ($hotro as $hotro_it) {
                    ?>
                    <li>
                        <div style="text-align:left; line-height:20px; position:relative;padding:5px 0px; ">
                            <div class="nick">
                                <span class="ht_img">
                                    <a rel="nofollow" href="ymsgr:sendIM?<?php echo $hotro_it['yahoo'] ?>"><img
                                            src="http://opi.yahoo.com/online?u=<?php echo $hotro_it['yahoo'] ?>&amp;m=g&amp;t=2"
                                            alt="<?php echo $hotro_it['yahoo'] ?>" style="position: relative;"> YAHOO</a>
                                    <a rel="nofollow" href="skype:<?php echo @$hotro_it['skype'] ?>?chat"><img src="images/skype.png"
                                            alt="<?php echo @$hotro_it['ten'] ?>" title="" /> SKYPE</a>

                                </span>
                                <div class="clr"></div>
                            </div>
                        </div>
                    </li>

                    <?php
                }
            }
            ?>

        </ul>

    </div>
    <div class="clr" style="height:10px;"></div>
</div> -->

<!-- <div class="left_box">
    <h2>video clip</h2>
    <div class="video">
        <script type="text/javascript">

            $(document).ready(function () {


                $('#video').change(function (e) {

                    var value = $(this).val();

                    if (value != '')
                        $('#vide-iframe').load("ajax/video.php?id=" + value);

                    return false;
                });

            });
        </script>

        <div id="vide-iframe">
            <?php
            if (!empty($video)) {

                ?>
                <a href="quickview.php?id=<?php echo $video[0]['id'] ?>" class="various3 xemnhanh">
                    <img width="220" height="165" src="http://img.youtube.com/vi/<?php echo $video[0]['url'] ?>/hqdefault.jpg"
                        alt="<?php echo $video[0]['ten'] ?>" />
                    <span class="nut_video"></span>
                </a>
                <?php
            }

            ?>
        </div>
        <?php
        if (!empty($video)) {
            echo '<select name="video"  id="video" >';
            foreach ($video as $video_item) {
                ?>
                <option value="<?php echo $video_item['id'] ?>"><?php echo $video_item["ten"] ?></option>
                <?php
            }
            echo '</select>';
        }
        ?>
    </div>
    <div class="clr" style="height:10px;"></div>
</div> -->
<!-- <div class="left_box">
    <h2>
        <?php echo _thongke ?>
    </h2>
    <div class="ht_content">
        <ul id="thongke" style="">

            <li><img src="images/online.png" alt="<?php echo _dang_online ?>" /><?php echo _dang_online ?>: <span>
                    <?php echo $count_user_online ?>
                </span></li>

            <li><img src="images/ngay.png" alt="<?php echo _homnay ?>" /><?php echo _homnay ?> : <span>
                    <?php echo $today_visitors ?>
                </span></li>
            <li><img src="images/thang.png" alt="<?php echo _trongthang ?>" /><?php echo _trongthang ?> : <span>
                    <?php echo $month_visitors ?>
                </span></li>
            <li><img src="images/tong.png" alt="<?php echo _tongtruycap ?>" /><?php echo _tongtruycap ?> : <span>
                    <?php echo $all_visitors ?>
                </span></li>
        </ul>
    </div>
</div> -->
