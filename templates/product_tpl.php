<h1 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;">
    <?php echo $row_setting['title_' . $lang] ?>
</h1>
<h2 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;">
    <?php echo $row_setting['title_' . $lang] ?>
</h2>
<h3 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;">
    <?php echo $row_setting['title_' . $lang] ?>
</h3>
<h4 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;">
    <?php echo $row_setting['title_' . $lang] ?>
</h4>
<h5 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;">
    <?php echo $row_setting['title_' . $lang] ?>
</h5>
<h6 style="height:0px;line-height:0px; visibility:hidden;margin:0px !important;">
    <?php echo $row_setting['title_' . $lang] ?>
</h6>
<script language="javascript">
function select_onchange() {
    var a = document.getElementById("idc");
    window.location = "<?php echo $com_select ?>/" + a.value + "/";
    return true;
}
</script>
<?php
function get_main_list()
{
    global $table_select, $lang;
    $sql = "select ten_$lang as ten,id,tenkhongdau from table_" . $table_select . "_list  order by stt asc";
    $stmt = mysql_query($sql);
    $str = '
      <select id="idc" name="idc" onchange="select_onchange()" class="main_font">
      <option value="">--' . _chonloaisp . '--</option>      
      ';
    while ($row = @mysql_fetch_array($stmt)) {
        if ($row["tenkhongdau"] == isset($_REQUEST['idc']) ? $_REQUEST['idc']:'') {
            $selected = "selected";
        } else {
            $selected = "";
        }
        $str .= '<option value=' . $row["tenkhongdau"] . ' ' . $selected . '>' . $row["ten"] . '</option>';
    }
    $str .= '</select>';
    return $str;
}

?>
<script type="text/javascript">
$(function() {
    $('#saerch').click(function(evt) {
        onSearch1(evt);
    });
});

function onSearch1(evt) {
    var keyword1 = document.search.keyword1;
    var type_search = document.search.type_search.value;
    if (keyword1.value == '' || keyword1.value === '<?php echo _nhaptukhoa ?>') {
        alert('<?php echo _chuanhaptk ?>');
        keyword1.focus();
        return false;
    }
    location.href = 'http://<?php echo $config_url ?>/tim-kiem.html/keyword=' + keyword1.value + "&type=" + type_search;
}

function doEnter(evt) {
    // IE         // Netscape/Firefox/Opera
    var key;
    if (evt.keyCode == 13 || evt.which == 13) {
        onSearch1(evt);
    } else {
        return false;
    }
}
</script>
<div class="banner">
    <div class="hero-banner">
        <div class="layer">
            <div class="right m-100">
                <article>
                    <section class="welcome">Welcome to Viet Nhat</section>
                    <section class="gr-banner w700">
                        <h1 class="hide-title">product</h1>
                        <h1 class="hero-title <?php echo $title_tcat ?>">
                            <?php echo $title_tcat ?>
                        </h1>
                    </section>
                </article>
            </div>
        </div>
        <div class="clr"></div>
    </div>
</div>
<div class="row gr-product m-100">
    <div id="left"><?php require "layout/left.php";?></div><!-- end #left -->
    <div id="right1">
        <div class="box_main">
            <!-- <div>
                <?php echo _loaisp ?>:
                <?php echo get_main_list() ?>
            </div><br /> -->
            <div class="row">
                <div class="tk_sp">
                    <form name="search" action="tim-kiem.html" method="get" onsubmit="return false;">
                        <input type="text" class="search-product" name="keyword1" style="padding:2px 15px;"
                            placeholder="Nhập từ khóa">
                        <input type="hidden" name="type_search" value="<?php echo $type ?>">
                        <input type="submit" name="saerch" id="saerch" value="Search" style="padding:2px 5px;">
                    </form>
                </div>
                <div class="grid-list-switch">
                    <div class="grid-view active-s">
                        <svg width="40" height="40" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M18.3332 1.66666H4.99984C3.15889 1.66666 1.6665 3.15904 1.6665 4.99999V18.3333C1.6665 20.1743 3.15889 21.6667 4.99984 21.6667H18.3332C20.1741 21.6667 21.6665 20.1743 21.6665 18.3333V4.99999C21.6665 3.15904 20.1741 1.66666 18.3332 1.66666Z"
                                stroke="black" stroke-width="3" />
                            <path
                                d="M44.9998 1.66666H31.6665C29.8256 1.66666 28.3332 3.15904 28.3332 4.99999V18.3333C28.3332 20.1743 29.8256 21.6667 31.6665 21.6667H44.9998C46.8408 21.6667 48.3332 20.1743 48.3332 18.3333V4.99999C48.3332 3.15904 46.8408 1.66666 44.9998 1.66666Z"
                                stroke="black" stroke-width="3" />
                            <path
                                d="M44.9998 28.3333H31.6665C29.8256 28.3333 28.3332 29.8257 28.3332 31.6667V45C28.3332 46.8409 29.8256 48.3333 31.6665 48.3333H44.9998C46.8408 48.3333 48.3332 46.8409 48.3332 45V31.6667C48.3332 29.8257 46.8408 28.3333 44.9998 28.3333Z"
                                stroke="black" stroke-width="3" />
                            <path
                                d="M18.3332 28.3333H4.99984C3.15889 28.3333 1.6665 29.8257 1.6665 31.6667V45C1.6665 46.8409 3.15889 48.3333 4.99984 48.3333H18.3332C20.1741 48.3333 21.6665 46.8409 21.6665 45V31.6667C21.6665 29.8257 20.1741 28.3333 18.3332 28.3333Z"
                                stroke="black" stroke-width="3" />
                        </svg>
                    </div>
                    <div class="list-view">
                        <svg width="40" height="40" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M23.3332 11.6667H49.9998M23.3332 38.3333H49.9998M4.99984 5H11.6665C13.5075 5 14.9998 6.49238 14.9998 8.33333V15C14.9998 16.8409 13.5075 18.3333 11.6665 18.3333H4.99984C3.15889 18.3333 1.6665 16.8409 1.6665 15V8.33333C1.6665 6.49238 3.15889 5 4.99984 5ZM4.99984 31.6667H11.6665C13.5075 31.6667 14.9998 33.1591 14.9998 35V41.6667C14.9998 43.5076 13.5075 45 11.6665 45H4.99984C3.15889 45 1.6665 43.5076 1.6665 41.6667V35C1.6665 33.1591 3.15889 31.6667 4.99984 31.6667Z"
                                stroke="black" stroke-width="3" />
                        </svg>
                    </div>
                </div>
            </div>

            <br />
            <!-- <div class="wrapper" id="wrapper">
                <div class="col">
                    Column #1
                </div>
                <div class="col">
                    Column #2
                </div>
                <div class="col">
                    Column #3
                </div>
                <div class="col">
                    Column #4
                </div>
            </div> -->
            <section class="product-list wrapper" id="wrapper">
                <?php
                if (!empty($product)) {

                    foreach ($product as $k => $product_item) {

                        ?>
                <div class="product-item grid-view-s col">
                    <div class="card">
                        <a class="product-img"
                            href="<?php echo $com_select ?>/<?php echo $product_item['tenkhongdau'] ?>-<?php echo $product_item['id'] ?>.html">
                            <img src="<?php echo _upload_product_l . $product_item['thumb'] ?>"
                                alt="<?php echo $product_item['ten'] ?>" />
                        </a>
                        <div class="product-r-item">
                            <a class="title-product"
                                href="<?php echo $com_select ?>/<?php echo $product_item['tenkhongdau'] ?>-<?php echo $product_item['id'] ?>.html">
                                <?php echo $product_item['ten'] ?>
                            </a>
                            <p class="cate">
                                <?php
                                $sql_danhmuc = "select ten_$lang as ten from table_" . $table_select . "_list where id='" . $product_item['id_list'] . "'";
                                $result = mysql_query($sql_danhmuc);
                                $item_danhmuc = mysql_fetch_array($result);
                                echo @$item_danhmuc['ten']
                                ?>
                                <span class="v-line"></span>
                                <?php if ($product_item['file'] != '') { ?>
                                <a target="_blank"
                                    href="<?php echo _upload_product_l . $product_item['file'] ?>">Download</a>
                                <?php } else { ?>

                                <?php } ?>
                            </p>
                            <div class="reverse">
                                <div class="des-product">
                                    <?php echo $product_item['mota'] ?>
                                </div>
                                <div class="gr-cate-download">
                                    <?php if ($product_item['file'] != '') { ?>
                                    <a target="_blank"
                                        href="<?php echo _upload_product_l . $product_item['file'] ?>">Download</a>
                                    <?php } else { ?>

                                    <?php } ?>
                                    <div class="more-product">
                                        <a
                                            href="<?php echo $com_select ?>/<?php echo $product_item['tenkhongdau'] ?>-<?php echo $product_item['id'] ?>.html">
                                            Xem thêm
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                        <?php
                    }
                }
                ?>
            </section>
            <!-- <center>
                <table id="product-list" cellpadding="0" cellspacing="0" class="CSSTableGenerator" align="center"
                    width="95%">
                    <tbody>
                        <tr>
                            <td>
                                <?php echo _hinhanh ?>
                            </td>
                            <td>
                                <?php echo _loaisp ?>
                            </td>
                            <td>
                                <?php echo _tensp ?>
                            </td>
                            <td>
                                <?php echo _mota ?>
                            </td>
                            <td>Download</td>
                        </tr>
                        <?php
                        if (!empty($product)) {

                            foreach ($product as $k => $product_item) {

                                ?>

                        <tr>
                            <td align="center">
                                <a
                                    href="<?php echo $com_select ?>/<?php echo $product_item['tenkhongdau'] ?>-<?php echo $product_item['id'] ?>.html">
                                    <img src="<?php echo _upload_product_l . $product_item['thumb'] ?>"
                                        alt="<?php echo $product_item['ten'] ?>" />
                                </a>
                            </td>
                            <td align="center">
                                <?php
                                $sql_danhmuc = "select ten_$lang as ten from table_" . $table_select . "_list where id='" . $product_item['id_list'] . "'";
                                $result = mysql_query($sql_danhmuc);
                                $item_danhmuc = mysql_fetch_array($result);
                                echo @$item_danhmuc['ten']
                                ?>
                            </td>
                            <td align="center">
                                <a
                                    href="<?php echo $com_select ?>/<?php echo $product_item['tenkhongdau'] ?>-<?php echo $product_item['id'] ?>.html"><?php echo $product_item['ten'] ?></a>
                            </td>
                            <td>
                                <?php echo $product_item['mota'] ?>
                            </td>
                            <td align="center">
                                <?php if ($product_item['file'] != '') { ?>
                                <a target="_blank"
                                    href="<?php echo _upload_product_l . $product_item['file'] ?>">Download</a>
                                <?php } else { ?>
                                ----
                                <?php } ?>
                            </td>
                        </tr>


                                <?php

                            }

                        }
                        ?>

                    </tbody>
                </table>
            </center> -->

            <div class="clr"></div>

        </div>

        <div class="clr"></div>
        <div class="phantrang">
            <?php echo $paging['paging'] ?>
        </div>
    </div>
</div>

<style>
.hero-title {
    letter-spacing: 0.3em !important;
}

.Yoshitake {
    background: linear-gradient(180deg, #2982e6 0%, rgba(41, 130, 230, 0.1) 100%) !important;
    -webkit-background-clip: text !important;
    background-clip: text !important;
    -webkit-text-fill-color: transparent !important;
    text-fill-color: transparent !important;
}

.EBRO-GERMANY {
    font-size: 100px !important;
    background: linear-gradient(180deg, #fe5800 0%, rgba(254, 88, 0, 0.1) 100%) !important;
    -webkit-background-clip: text !important;
    background-clip: text !important;
    -webkit-text-fill-color: transparent !important;
    text-fill-color: transparent !important;
}

.Ingersoll {
    font-size: 90px !important;
}

.PISCO-JAPAN {
    font-size: 125px !important;
    background: linear-gradient(180deg, #0057a8 0%, rgba(0, 87, 168, 0.1) 100%) !important;
    -webkit-background-clip: text !important;
    background-clip: text !important;
    -webkit-text-fill-color: transparent !important;
    text-fill-color: transparent !important;
}
</style>

<script>
var wrapper = document.getElementById("wrapper");

document.addEventListener("click", function(event) {
    if (!event.target.matches(".list-view")) return;
    $(".product-item").addClass("list-view-s");
    $(".list-view").addClass("active-s");

    $(".grid-view").removeClass("active-s");
    $(".product-item").removeClass("grid-view-s");

    event.preventDefault();
    wrapper.classList.add("list");
});

document.addEventListener("click", function(event) {
    if (!event.target.matches(".grid-view")) return;
    $(".product-item").addClass("grid-view-s");
    $(".grid-view").addClass("active-s");

    $(".list-view").removeClass("active-s");
    $(".product-item").removeClass("list-view-s");

    event.preventDefault();
    wrapper.classList.remove("list");
});
</script>
