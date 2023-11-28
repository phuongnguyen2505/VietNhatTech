<h1 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;">
    <?php echo $row_detail[0]['ten'] ?>
</h1>
<h2 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;">
    <?php echo $row_detail[0]['ten'] ?>
</h2>
<h3 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;">
    <?php echo $row_detail[0]['ten'] ?>
</h3>
<h4 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;">
    <?php echo $row_detail[0]['ten'] ?>
</h4>
<h5 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;">
    <?php echo $row_detail[0]['ten'] ?>
</h5>
<h6 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;">
    <?php echo $row_detail[0]['ten'] ?>
</h6>
<script type="text/javascript" src="js/yetii.js"></script>
<script type="text/javascript">
    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1&appId=625910880774979";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#mycarouselsp').jcarousel({
            scroll: 1,
            auto: 3,
            animation: 500,
            // wrap: 'circular'
            //buttonNextHTML:null,
            //buttonPrevHTML:null,
        });

    });
</script>

<div class="row m-100">
    <div class="box_main">
        <ul class="breadcrumb 
        <?php
        $sql_danhmuc = "select ten_$lang as ten from table_" . $table_select . "_list where id='" . $row_detail[0]['id_list'] . "'";
        $result = mysql_query($sql_danhmuc);
        $item_danhmuc = mysql_fetch_array($result);
        echo @$item_danhmuc['ten'] ?>">
            <li>
                <a href="./">
                    <?php echo _home ?>
                </a>
                <img src="images/arrow-bc.svg" alt="">
            </li>
            <li>
                <?php
                if ($com == "san-pham") {
                    echo '<a href="san-pham.html">' . _product . '</a>';
                } elseif ($com == "ingersoll-randusa") {
                    echo '<a href="ingersoll-randusa.html">' . _product1 . '</a>';
                } else {
                    $sql_danhmuc = "select ten_$lang as ten,tenkhongdau from table_" . $table_select . "_list where id='" . $row_detail[0]['id_list'] . "'";
                    $result = mysql_query($sql_danhmuc);
                    $item_danhmuc = mysql_fetch_array($result);
                    $url = isset($item_danhmuc['tenkhongdau']) ? $item_danhmuc['tenkhongdau'] : './';
                    echo '<a href="san-pham-khac/' . $url . '/">' . @$item_danhmuc['ten'] . '</a>';
                }
                ?>
                <img src="images/arrow-bc.svg" alt="">
            </li>
            <li>
                <?php echo $row_detail[0]['ten'] ?>
            </li>
        </ul>

        <div class="content productDetails">
            <article class="product-details">
                <div class="imgSP">
                    <div class="ProductThumb">
                        <div class="product_detail_pic">
                            <img src="<?php echo _upload_product_l, $row_detail[0]["photo"] ?>"
                                title="<?php echo $row_detail[0]['ten'] ?>" alt="<?php echo $row_detail[0]['ten'] ?>" />
                        </div>
                    </div>
                    <!--ProductThumb-->
                    <?php
                    if (!empty($row_hinhanhsp11)) {

                        ?>
                        <div id="slideShow" class="ImageCarouselBox" style="color:#F00">
                            <div class="ProductTinyImageList listImages">
                                <ul id="mycarouselsp" class="ulThumbImg scroll jcarousel jcarousel-skin-tango_sp">
                                    <li>
                                        <div class="TinyOuterDiv">
                                            <div>
                                                <a href="<?php echo _upload_product_l . $row_detail[0]['photo'] ?>"
                                                    rel="zoom-id: Zoomer"
                                                    rev="timthumb.php?src=<?php echo _upload_product_l, $row_detail[0]["photo"] ?>&h=0&w=280&zc=2&q=100"><img
                                                        src="timthumb.php?src=<?php echo _upload_product_l . $row_detail[0]['photo'] ?>&h=90&w=100&zc=2&q=100"
                                                        class="jshop_img_thumb" alt="<?php echo $row_detail[0]['ten'] ?>"
                                                        id="firstImgZoom" /></a>
                                            </div>
                                        </div>
                                    </li>
                                    <?php

                                    foreach ($row_hinhanhsp11 as $item_hinh) {
                                        ?>
                                        <li>
                                            <div class="TinyOuterDiv">
                                                <div>
                                                    <a href="<?php echo _upload_product_l . $item_hinh['photo'] ?>"
                                                        rel="zoom-id: Zoomer"
                                                        rev="timthumb.php?src=<?php echo _upload_product_l, $item_hinh["photo"] ?>&h=0&w=280&zc=2&q=100"
                                                        title="<?php echo $item_hinh['ten'] ?>"><img
                                                            src="timthumb.php?src=<?php echo _upload_product_l . $item_hinh['photo'] ?>&h=90&w=100&zc=2&q=100"
                                                            class="jshop_img_thumb" alt="<?php echo $item_hinh['ten'] ?>"
                                                            title="" />
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                        <?php
                                    }

                                    ?>
                                </ul>
                            </div>
                        </div>
                    <?php }
                    ?>
                </div>
                <!--imgSP-->
                <ul class="product_info">
                    <li>
                        <span class="name-cate">
                            <?php
                            $sql_danhmuc = "select ten_$lang as ten from table_" . $table_select . "_list where id='" . $row_detail[0]['id_list'] . "'";
                            $result = mysql_query($sql_danhmuc);
                            $item_danhmuc = mysql_fetch_array($result);
                            echo @$item_danhmuc['ten']
                                ?>
                        </span>
                    </li>
                    <li>
                        <p class="name_product" style="text-transform:uppercase">
                            <?php echo $row_detail[0]['ten'] ?>
                        </p>
                    </li>
                    <li>
                        <span class="des-product">
                            <?php
                            $content = $row_detail[0]['mota'];
                            $words = explode(' ', $content);

                            if (count($words) > 50) {
                                $limitedContent = implode(' ', array_slice($words, 0, 50)) . '...';
                                echo "<p>{$limitedContent}</p>";
                                echo '<button class="read-more-btn effect effect-1">' . _readmore . '</button>';
                            } else {
                                echo "<p>{$content}</p>";
                            }
                            ?>
                        </span>
                    </li>
                    <li>
                        <span class="view-contact">
                            <p class="view-contact_first-items">
                                <?php echo _luotxem ?>:
                                <?php echo $row_detail[0]['luotxem'] ?>
                            </p>
                            <div class="view-contact_right">
                                <p>
                                    <?php echo _contact ?>:<span>&nbsp;
                                        <?php echo $row_setting['hotline'] ?>
                                    </span>
                                </p>
                                <p style="text-transform: lowercase;">
                                    <?php echo $row_setting['email'] ?>
                                </p>
                            </div>
                        </span>
                    </li>
                    <li>
                        <?php if ($row_detail[0]['file'] != '') { ?>
                            <span class="pdf-dl">
                                <a target="_blank" href="<?php echo _upload_product_l . $row_detail[0]['file'] ?>">
                                    <img src="images/pdf-download.svg" alt="<?php echo $row_detail[0]['ten'] ?>">
                                </a>
                                <a class="dl-text" target="_blank"
                                    href="<?php echo _upload_product_l . $row_detail[0]['file'] ?>">
                                    Document
                                </a>
                            </span>
                        <?php } ?>
                    </li>
                    <!-- <li><p class="dhang" onclick="addtocart(<?php echo $row_detail[0]['id']; ?>)"><a href="lien-he.html">ĐẶT MUA HÀNG</a></p></li> -->
                </ul>
            </article>

            <div class="thongtin_sp">
                <div id="tab-container-1">
                    <ul id="tab-container-1-nav" class="tablayout">
                        <li class="activeli" id="tab_1"><a href="#tab1">
                                <?php echo _thongtinchitiet ?>
                            </a></li>
                        <!-- <li id="tab_2"><a href="#tab1">Thông số kỹ thuật</a></li> -->
                        <li id="tab_2"><a href="#tab2">
                                <?php echo _binhluan ?>
                            </a></li>
                    </ul>
                    <div class="tabs-container">
                        <!--Start .tabs-container-->
                        <div class="tab" id="tab1">
                            <!--Start Tab1-->
                            <?php echo stripcslashes($row_detail[0]["noidung"]) ?>
                            <div class="clear"></div>
                        </div>
                        <!--End Tab1-->
                        <div class="tab" id="tab2">
                            <!--Start Tab1-->
                            <?php
                            $d->reset();
                            $sql_contact = "select noidung_$lang as noidung from #_lienhe ";
                            $d->query($sql_contact);
                            $company_contact = $d->fetch_array();

                            ?>
                            <?php echo $company_contact['noidung']; ?>
                            <div class="clr"
                                style="height:0px; border-bottom:1px solid #cdcdcd; margin-top:20px; margin-bottom:5px;">
                            </div>
                            <div class="fb-comments" data-href="http://<?= $config_url ?>/<?php if ($com == "san-pham") {
                                  echo "san-pham";
                              } elseif ($com == "ingersoll-randusa") {
                                  echo "ingersoll-randusa";
                              } else {
                                  echo "san-pham-khac";
                              }
                              ?>/<?= $row_detail[0]['tenkhongdau'] ?>-<?= $row_detail[0]['id'] ?>.html"
                                data-width="100%" data-numposts="10">
                            </div>
                            <div class="clear"></div>
                        </div>
                        <!--End Tab2-->
                    </div>
                    <!--End .tabs-container-->
                </div>
                <!--tab-container-1-->
                <script type="text/javascript">
                    var tabber1 = new Yetii({
                        id: 'tab-container-1',
                        active: 1,
                        timeout: null,
                        interval: null,
                        tabclass: 'tab',
                        activeclass: 'active'
                    });
                </script>
            </div>
            <!--end thongtin_sp-->
        </div>
    </div>
</div>

<div class="wrapper-faq m-100">
    <div class="title-faq">
        <?php echo _faq ?>
    </div>
    <div class="item-wrapper">
        <div class="item-title" data-index="0">
            <?php echo _policy ?>
        </div>
        <div class="content-outer">
            <div class="content-faq">
                <?php echo _policydes ?>
            </div>
        </div>
    </div>
    <div class="item-wrapper">
        <div class="item-title" data-index="1">
            <?php echo _deli ?>
        </div>
        <div class="content-outer">
            <div class="content-faq">
                <?php echo _delides ?>
            </div>
        </div>
    </div>
    <div class="item-wrapper">
        <div class="item-title" data-index="2">
            <?php echo _aftersale ?>
        </div>
        <div class="content-outer">
            <div class="content-faq">
                <?php echo _aftersaledes1 ?><br>
                <?php echo _aftersaledes2 ?><br>
                <?php echo _aftersaledes3 ?>
            </div>
        </div>
    </div>
    <div class="clr" style="height:0px; border-bottom:1px solid #dfdfdf; margin-top:20px;"></div>
</div>
<div class="modal" id="content-modal">
    <div class="modal-content">
        <div class="row-modal">
            <div class="title-modal">
                <p>
                    <?php echo _mota ?>
                </p>
                <span class="close-modal-ico">&#x2716;</span>
            </div>
            <div class="des-modal">
                <?php echo $row_detail[0]['mota']; ?>
            </div>
            <span class="close-modal-btn">
                <?php echo _close ?>
            </span>
        </div>
    </div>
</div>
<div class="row m-100">
    <div class="box_main same-product">
        <h2>
            <span class="v-line"></span>
            <?php echo _sanphamcungloai ?>
        </h2>
        <div class="same-item">
            <?php
            if (!empty($sanpham_khac)) {

                foreach ($sanpham_khac as $k => $product_item) {
                    ?>
                    <div class="right_item">
                        <div class="img">
                            <div class="img_wrap">
                                <a
                                    href="<?php echo $com_select ?>/<?php echo $product_item['tenkhongdau'] ?>-<?php echo $product_item['id'] ?>.html">
                                    <img src="<?php echo _upload_product_l . $product_item['thumb'] ?>"
                                        alt="<?php echo $product_item['ten'] ?>" />
                                </a>
                            </div>
                        </div>
                        <div class="r-item-samep">
                            <h3>
                                <a
                                    href="<?php echo $com_select ?>/<?php echo $product_item['tenkhongdau'] ?>-<?php echo $product_item['id'] ?>.html">
                                    <?php
                                    $content = $product_item['ten'];
                                    $words = explode(' ', $content);

                                    if (count($words) > 8) {
                                        $limitedContent = implode(' ', array_slice($words, 0, 8)) . '...';
                                        echo "{$limitedContent}";
                                    } else {
                                        echo "{$content}";
                                    }
                                    ?>
                                </a>
                            </h3>
                            <div class="desc">
                                <?php
                                $content = strip_tags($product_item['mota']);
                                $words = explode(' ', $content);
                                if (count($words) > 20) {
                                    $limitedContent = implode(' ', array_slice($words, 0, 20)) . '...';
                                } else {
                                    $limitedContent = implode(' ', $words);
                                }
                                echo $limitedContent;
                                ?>
                            </div>
                            <div class="same-download">
                                <?php if ($product_item['file'] != '') { ?>
                                    <a href="<?php echo _upload_product_l . $product_item['file'] ?>">Download
                                    </a>
                                <?php } ?>
                                <a href="<?php echo $com_select ?>/<?php echo $product_item['tenkhongdau'] ?>-<?php echo $product_item['id'] ?>.html"
                                    -<?php echo $product_item['ten'] ?>">
                                    <?php echo _readmore ?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</div>

<style>
    .box_main.news-details {
        margin-top: 0 !important;
    }
</style>

<script>
    const wrapper = document.querySelector('.wrapper-faq')

    let activeIndex = null;

    const updateContentHeight = (contentWrapper, isOpen) => {
        if (isOpen) {
            // close previous
            if (activeIndex !== null) {
                const prev = wrapper.querySelector(`.item-title[data-index="${activeIndex}"]`)
                prev.nextElementSibling.style.height = 0
            }

            // open new
            const contentDom = contentWrapper.querySelector('.content-faq')
            const contentHeight = contentDom.clientHeight
            contentWrapper.style.height = contentHeight + 'px'
        } else {
            contentWrapper.style.height = 0
        }
    }

    const updateActiveIndex = (newIndex) => {
        const oldIndex = activeIndex
        activeIndex = newIndex
        // update class
        if (oldIndex !== null) {
            const dom = wrapper.querySelector(`.item-title[data-index="${oldIndex}"]`)
            dom.parentElement.classList.remove('active')
        }
        if (newIndex !== null) {
            const dom = wrapper.querySelector(`.item-title[data-index="${newIndex}"]`)
            dom.parentElement.classList.add('active')
        }
    }

    wrapper.addEventListener('click', (e) => {
        const isTitle = Array.from(e.target.classList).includes('item-title')
        if (!isTitle) return

        const targetIndex = Number(e.target.getAttribute('data-index'))
        const contentWrapper = e.target.nextElementSibling
        const isOpen = targetIndex !== activeIndex
        updateContentHeight(contentWrapper, isOpen)
        updateActiveIndex(isOpen ? targetIndex : null)
    })
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const readMoreBtn = document.querySelector('.read-more-btn');
        const modal = document.getElementById('content-modal');

        readMoreBtn.addEventListener('click', function () {
            modal.style.display = 'block';
        });

        function closeModal() {
            modal.style.display = 'none';
            setTimeout(function () {
                modal.style.display = 'none';
                modal.classList.remove('hide');
            }, 300);
        }

        const closeModalBtn = modal.querySelector('.close-modal-btn');
        const closeModalIco = modal.querySelector('.close-modal-ico');
        closeModalBtn.addEventListener('click', closeModal);
        closeModalIco.addEventListener('click', closeModal);

        window.addEventListener('click', function (event) {
            if (event.target === modal) {
                closeModal();
            }
        });
    });
</script>