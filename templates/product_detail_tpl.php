<h1 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;"><?php echo $row_detail[0]['ten']?></h1>
<h2 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;"><?php echo $row_detail[0]['ten']?></h2>
<h3 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;"><?php echo $row_detail[0]['ten']?></h3>
<h4 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;"><?php echo $row_detail[0]['ten']?></h4>
<h5 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;"><?php echo $row_detail[0]['ten']?></h5>
<h6 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;"><?php echo $row_detail[0]['ten']?></h6>
<script type="text/javascript" src="js/yetii.js"></script>
<div id="fb-root"></div>
<script type="text/javascript">
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1&appId=625910880774979";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

<script type="text/javascript">
$(document).ready(function() {
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
        <ul class="breadcrumb">
            <li>
                <a href="./">Trang chủ</a>
                <img src="images/arrow-bc.svg" alt="">
            </li>
            <li>
                <a href="
                <?php if ($com == "san-pham") {echo "san-pham.html";
                }
                elseif ($com == "ingersoll-rand") {echo "ingersoll-rand.html";
                }
                else{
                    echo "javascript:history.go(-1)";
                } ?>
                    ">
                    <?php if ($com == "san-pham") {echo _product;
                    } 
                    elseif ($com == ("ingersoll-rand")) {echo _product1;
                    }
                    else {
                        $sql_danhmuc = "select ten_$lang as ten from table_" . $table_select . "_list where id='" . $row_detail[0]['id_list'] . "'";
                        $result = mysql_query($sql_danhmuc);
                        $item_danhmuc = mysql_fetch_array($result);
                        echo @$item_danhmuc['ten'];
                    }
                    ?>
                </a>
                <img src="images/arrow-bc.svg" alt="">
            </li>
            <li>
                <?php echo $row_detail[0]['ten']?>
            </li>
        </ul>
        <div class="content">
            <article style="display: flex; align-items:center">
                <div class="imgSP">
                    <div class="ProductThumb">
                        <div class="product_detail_pic">
                            <img src="timthumb.php?src=<?php echo _upload_product_l,$row_detail[0]["photo"]?>&h=0&w=280&zc=2&q=100"
                                title="<?php echo $row_detail[0]['ten']?>" border="0" />
                        </div>
                    </div>
                    <!--ProductThumb-->
                    <?php         
                    if(!empty($row_hinhanhsp11)) {
                                
                        ?>
                    <div id="slideShow" class="ImageCarouselBox" style="color:#F00">
                        <div class="ProductTinyImageList listImages">
                            <ul id="mycarouselsp" class="ulThumbImg scroll jcarousel jcarousel-skin-tango_sp">
                                <li>
                                    <div class="TinyOuterDiv">
                                        <div>
                                            <a href="<?php echo _upload_product_l.$row_detail[0]['photo']?>"
                                                rel="zoom-id: Zoomer"
                                                rev="timthumb.php?src=<?php echo _upload_product_l,$row_detail[0]["photo"]?>&h=0&w=280&zc=2&q=100"><img
                                                    src="timthumb.php?src=<?php echo _upload_product_l.$row_detail[0]['photo']?>&h=90&w=100&zc=2&q=100"
                                                    class="jshop_img_thumb" alt="<?php echo $row_detail[0]['ten']?>"
                                                    id="firstImgZoom" /></a>
                                        </div>
                                    </div>
                                </li>
                                <?php         
                            
                                foreach($row_hinhanhsp11 as $item_hinh){
                                    ?>
                                <li>
                                    <div class="TinyOuterDiv">
                                        <div>
                                            <a href="<?php echo _upload_product_l.$item_hinh['photo']?>"
                                                rel="zoom-id: Zoomer"
                                                rev="timthumb.php?src=<?php echo _upload_product_l,$item_hinh["photo"]?>&h=0&w=280&zc=2&q=100"
                                                title="<?php echo $item_hinh['ten']?>"><img
                                                    src="timthumb.php?src=<?php echo _upload_product_l.$item_hinh['photo']?>&h=90&w=100&zc=2&q=100"
                                                    class="jshop_img_thumb" alt="<?php echo $item_hinh['ten']?>"
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
                    <div class="clr"></div>

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
                        <p class="name_product" style="text-transform:uppercase"><?php echo $row_detail[0]['ten']?></p>
                    </li>
                    <!-- <li><b><?php echo _gia?>:</b> <span style="font-weight:bold; color:#F00;font-size: 17px;"><?php if($row_detail[0]['gia']==0) { echo _contact; 
                                } else { echo number_format($row_detail[0]['gia'], 0, ",", ".")." đ";
}?></span></li> -->
                    <!-- <li><b><?php echo _masp?>:</b> <?php echo $row_detail[0]['masp']?></li>           -->
                    <!-- <li><b>Màu sắc:</b> <?php echo $row_detail[0]['tinhtrang']?></li>           -->
                    <li>
                        <span class="des-product">
                            <?php echo $row_detail[0]['mota']?>
                        </span>
                    </li>
                    <li>
                        <span class="view-contact">
                            <p><?php echo _luotxem?>: <?php echo $row_detail[0]['luotxem']?>
                            </p>
                            <p>Liên hệ:<span
                                    style="color:#f00;font-size:20px;">&nbsp<?php echo $row_setting['hotline']?></span>
                            </p>
                            <p><?php echo $row_setting['email']?></p>
                        </span>
                    </li>
                    <!-- <li>
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
                    </script>
                </li> -->
                    <?php if($row_detail[0]['file']!='') {?>
                    <li>
                        <span class="pdf-dl">
                            <a target="_blank" href="<?php echo _upload_product_l.$row_detail[0]['file']?>">
                                <img src="images/pdf-download.svg" alt="<?php echo $row_detail[0]['ten']?>">
                            </a>
                            <a class="dl-text" target="_blank"
                                href="<?php echo _upload_product_l.$row_detail[0]['file']?>">
                                Document
                            </a>
                        </span>
                        <span class="check-dl">
                            <img src="images/check.svg" alt="Kiểm tra định kỳ">
                            Kiểm tra định kỳ 3 tháng/lần
                        </span>
                    </li>
                    <li>
                        <a href="https://724.vn/san-pham/<?php echo $row_detail[0]['tenkhongdau'] ?>" target=”_blank”
                            class="btn-buynow" type=button>
                            <span class="text">Mua ngay tại 724.vn</span><span>Đi đến 724.vn</span>
                        </a>
                    </li>
                    <?php }?>
                    <!-- <li><p class="dhang" onclick="addtocart(<?php echo $row_detail[0]['id'];?>)"><a href="lien-he.html">ĐẶT MUA HÀNG</a></p></li> -->
                </ul>

                <div class="clr"></div>
            </article>

            <div class="thongtin_sp">
                <div class="clear" style="height:20px;"></div>
                <div id="tab-container-1" style="margin-top:30px">
                    <ul id="tab-container-1-nav" class="tablayout">
                        <li class="activeli" id="tab_1"><a href="#tab1"><?php echo _thongtinchitiet?></a></li>
                        <!-- <li id="tab_2"><a href="#tab1">Thông số kỹ thuật</a></li> -->
                        <li id="tab_2"><a href="#tab2"><?php echo _binhluan?></a></li>
                    </ul>
                    <div class="tabs-container">
                        <!--Start .tabs-container-->
                        <div class="tab" id="tab1">
                            <!--Start Tab1-->
                            <?php echo stripcslashes($row_detail[0]["noidung"])?>
                            <div class="clear"></div>
                        </div>
                        <!--End Tab1-->
                        <!--   <div class="tab" id="tab2">
                            <?php echo $row_detail[0]["thongso"]?>
                            <div class="clear"></div>
                        </div> -->
                        <div class="tab" id="tab2">
                            <!--Start Tab1-->
                            <?php 
                            $d->reset();
                            $sql_contact = "select noidung_$lang as noidung from #_lienhe ";
                            $d->query($sql_contact);
                            $company_contact = $d->fetch_array();

                            ?>
                            <?php echo $company_contact['noidung'];?>
                            <div class="clr"
                                style="height:0px; border-bottom:1px solid #cdcdcd; margin-top:20px; margin-bottom:5px;">
                            </div>

                            <div class="fb-comments"
                                data-href="http://<?php echo $config_url?>/san-pham/<?php echo $row_detail[0]['tenkhongdau']?>-<?php echo $row_detail[0]['id']?>.html"
                                data-width="100%" data-num-posts="10"></div>
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
                <div class="clear"></div>
            </div>
            <!--end thongtin_sp-->
            <div class="clear" style="height:20px;"></div>

        </div>

        <div class="clr"></div>
    </div>


    <!-- <div class="box_main">
        <div class="title_p">
            <h3 class="title"><?php echo _sanphamcungloai?></h3>
        </div>

        <?php
        if(!empty($sanpham_khac)) {
                
            foreach($sanpham_khac as $k=>$product_item){
                    $str='';
                if(($k+1)%2==0) { $str='style="margin-right:0px !important;"';
                } else { $str='style="margin-right:48px !important;"';
                }
                ?>
        <div class="right_item" <?php echo $str?>>

            <div class="img">
                <div class="img_wrap">
                    <a
                        href="<?php echo $com_select?>/<?php echo $product_item['tenkhongdau']?>-<?php echo $product_item['id']?>.html">
                        <img src="<?php echo _upload_product_l.$product_item['thumb']?>"
                            alt="<?php echo $product_item['ten']?>" />
                    </a>
                </div>
            </div>
            <h3><a
                    href="<?php echo $com_select?>/<?php echo $product_item['tenkhongdau']?>-<?php echo $product_item['id']?>.html"><?php echo $product_item['ten']?></a>
            </h3>
            <div class="desc"><?php echo $product_item['mota']?></div>
                <?php if($product_item['file']!='') {?>
            <a class="download" target="_blank" href="<?php echo _upload_product_l.$product_item['file']?>"><img
                    src="images/pdf.png" alt="<?php echo $product_item['ten']?>"></a>
                <?php }?>
            <div class="clr"></div>
        </div>
                <?php 
                if(($k+1)%2==0) { echo '<div class="clr"></div>';
                }
            }
                  
        }
        ?>

        <div class="clr"></div>

    </div> -->
    <!--end box_main-->
</div>

<div class="wrapper-faq m-100">
    <div class="title-faq">Thắc mắc thường gặp</div>
    <div class="item-wrapper">
        <div class="item-title" data-index="0">What is XYZ Tech News Company?</div>
        <div class="content-outer">
            <div class="content-faq">XYZ Tech News Company is an online platform dedicated to delivering the latest and
                most
                relevant news in the world of technology. We cover a wide range of topics, including but not limited to
                gadgets, software, cybersecurity, artificial intelligence, and emerging technologies. Our mission is to
                keep our readers informed and engaged with the rapidly evolving tech landscape.</div>
        </div>
    </div>
    <div class="item-wrapper">
        <div class="item-title" data-index="1">How often is the content updated on XYZ Tech News Company?</div>
        <div class="content-outer">
            <div class="content-faq">At XYZ Tech News Company, we understand the importance of staying up-to-date with
                the
                latest tech news. Therefore, we update our content on a daily basis. Our team of experienced writers and
                editors work diligently to bring you timely and accurate news articles, reviews, and analysis.</div>
        </div>
    </div>
    <div class="item-wrapper">
        <div class="item-title" data-index="2">Can I submit news tips or press releases to XYZ Tech News Company?</div>
        <div class="content-outer">
            <div class="content-faq">Absolutely! We encourage our readers and industry professionals to submit news
                tips,
                press releases, and any relevant information that may be of interest to our audience. You can reach out
                to us through our contact page or email us directly. We review all submissions and strive to cover
                stories that align with our editorial guidelines and audience interests.</div>
        </div>
    </div>
    <div class="item-wrapper">
        <div class="item-title" data-index="3">Can I share articles from XYZ Tech News Company on social media or other
            platforms?</div>
        <div class="content-outer">
            <div class="content-faq">Yes, you can! We appreciate and encourage our readers to share our articles across
                various platforms, including social media channels, blogs, and forums. We provide social media sharing
                buttons on each article, making it easy for you to spread the word about the latest tech news and
                insights.</div>
        </div>
    </div>
    <div class="item-wrapper">
        <div class="item-title" data-index="4">How can I stay updated with the latest news from XYZ Tech News Company?
        </div>
        <div class="content-outer">
            <div class="content-faq">To stay updated with the latest news from XYZ Tech News Company, there are several
                options available. Firstly, you can subscribe to our newsletter, where we send regular updates featuring
                our top stories and exclusive content. Additionally, you can follow us on social media platforms such as
                Twitter, Facebook, and LinkedIn, where we share our articles and engage with our audience. Finally, you
                can visit our website regularly or bookmark it for easy access to our latest articles.</div>
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
