<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
session_start();
@define('_template', './templates/');
@define('_source', './sources/');
@define('_lib', './lib/');

require_once _lib . "config.php";
require_once _lib . "constant.php";
require_once _lib . "functions.php";
require_once _lib . "library.php";
require_once _lib . "class.database.php";

$com = (isset($_REQUEST['com'])) ? addslashes($_REQUEST['com']) : "";
$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
if (isset($_REQUEST['author'])) {
    header('Content-Type: text/html; charset=utf-8');
    echo '<pre>';
    print_r($config['author']);
    echo '</pre>';
    die();
}
$login_name = 'Gaconlonton';

$d = new database($config['database']);
$d->reset();
$sql_setting = "select * from #_setting limit 0,1";
$d->query($sql_setting);
$row_setting = $d->fetch_array();
switch ($com) {


case 'product_other':
    $source = "product_other";
    break;

case 'album':
    $source = "album";
    break;
case 'order':
    $source = "donhang";
    break;
case 'newsletter':
    $source = "newsletter";
    break;
case 'hasp':
    $source = "hasp";
    break;
case 'hotro':
    $source = "hotro";
    break;
case 'congnghe':
    $source = "congnghe";
    break;
case 'solar':
    $source = "solar";
    break;

case 'banner':
    $source = "banner";
    break;
case 'dichvu2':
    $source = "dichvu2";
    break;
case 'tags':
    $source = "tags";
    break;
case 'meta':
    $source = "meta";
    break;
case 'product':
    $source = "product";
    break;
case 'product_kitz':
    $source = "product_kitz";
    break;
case 'user':
    $source = "user";
    break;
case 'thietbi':
    $source = "thietbi";
    break;
case 'gioithieu':
    $source = "gioithieu";
    break;
case 'tuyendung':
    $source = "tuyendung";
    break;
case 'hinhanhquangcao':
    $source = "hinhanhquangcao";
    break;

case 'video':
    $source = "video";
    break;
case 'lkweb':
    $source = "lkweb";
    break;
case 'hinhanh':
    $source = "hinhanh";
    break;
case 'download':
    $source = "download";
    break;
case 'about':
    $source = "about";
    break;
case 'slider':
    $source = "slider";
    break;
case 'slide':
    $source = "slide";
    break;
case 'footer':
    $source = "footer";
    break;
case 'dichvu':
    $source = "dichvu";
    break;
case 'news':
    $source = "tintuc";
    break;
case 'newsnb':
    $source = "tintucnb";
    break;
case 'setting':
    $source = "setting";
    break;
case 'quangcao':
    $source = "quangcao";
    break;
case 'yahoo':
    $source = "yahoo";
    break;
case 'email_dk':
    $source = "email_dk";
    break;
case 'lienhe':
    $source = "lienhe";
    break;
case 'background':
    $source = "background";
    break;
case 'faq':
    $source = "faq";
    break;
case 'bannerqc':
    $source = "bannerqc";
    break;
case 'mxh':
    $source = "mxh";
    break;
case 'doitac':
    $source = "doitac";
    break;
default:
    $source = "";
    $template = "index";
    break;
}

if ((!isset($_SESSION[$login_name]) || $_SESSION[$login_name] == false) && $act != "login") {
    redirect("index.php?com=user&act=login");
}

if ($source != "") {
    include _source . $source . ".php";
}

if (!isset($_SESSION[$login_name]) || !$_SESSION[$login_name]) {
    include _template . $template . "_tpl.php";

} else {
    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/DTD/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Website Administration</title>
    <link href="media/css/style.css" rel="stylesheet" type="text/css" />
    <!-- TinyMCE -->
    <script type="text/javascript" src="tiny_mce/tiny_mce.js"></script>

    <script type="text/javascript" src="media/scripts/jquery-1.8.0.min.js"></script>
    <script type="text/javascript" src="media/scripts/jquery.idTabs.min.js"></script>
    <script type="text/javascript">
    jQuery(document).ready(function() {
        // Tabs detail
        jQuery("#info_deals ul").idTabs();
    });
    </script>

    <!-- /TinyMCE -->

</head>

<body>

    <?php if (isset($_SESSION[$login_name]) && ($_SESSION[$login_name] == true)) { ?>
    <div id="wrapper">
        <?php include _template . "header_tpl.php" ?>

        <div id="main">

            <!-- Right col -->
            <div id="contentwrapper">
                <div id="content">

                    <?php include _template . $template . "_tpl.php" ?>
                </div>
            </div>
            <!-- End right col -->

            <!-- Left col -->
            <div id="leftcol">
                <div class="innertube">
                    <?php include _template . "menu_tpl.php"; ?>
                </div>
            </div>
            <!-- End Left col -->

            <div class="clr"></div>
        </div>
        <div id="footer">
            <?php include _template . "footer_tpl.php" ?>
        </div>
    </div>
    <?php } else { ?>
        <?php include _template . $template . "_tpl.php" ?>
    <?php } ?>
</body>

</html>
<?php } ?>
