<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");
session_start();
$session = session_id();

@define("_source", "./sources/");
@define("_lib", "./admin/lib/");
@define("_upload_folder", "./media/upload/");
require_once _lib . "Mobile_Detect.php";
$detect = new Mobile_Detect();
$deviceType = $detect->isMobile()
    ? ($detect->isTablet()
        ? "tablet"
        : "phone")
    : "computer";
if ($deviceType != "computer") {
    @define("_template", "./templates/");
} else {
    @define("_template", "./templates/");
}
if (!isset($_SESSION["lang"])) {
    $_SESSION["lang"] = "vi";
}

$lang = $_SESSION["lang"];

require_once _source . "lang_$lang.php";
require_once _lib . "config.php";
require_once _lib . "constant.php";
require_once _lib . "functions.php";
// include_once _lib . "functions_giohang.php";
require_once _lib . "class.database.php";

require_once _lib . "file_requick.php";

require_once _source . "counter.php";
require_once _source . "useronline.php";
if (isset($_REQUEST["command"]) == "add" && $_REQUEST["productid"] > 0) {
    $pid = $_REQUEST["productid"];
    $q = isset($_GET["quality"]) ? (int) $_GET["quality"] : "1";
    addtocart($pid, $q);
    redirect("http://$config_url/gio-hang.html");
}
$d->reset();
$sql_background = "select * from #_background limit 0,1";
$d->query($sql_background);
$background = $d->fetch_array();

$d->reset();
$sql_banner_giua = "select photo from #_photo where com='ft' limit 0,1";
$d->query($sql_banner_giua);
$logo = $d->fetch_array();
?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="vi,en">

<head>
    <!-- Google Tag Manager -->
    <script>
        (function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-55P5WHZ');
    </script>
    <!-- End Google Tag Manager -->
    <base href="http://<?php echo $config_url; ?>/vietnhat-tech.com/" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo _upload_hinhanh_l .
        $logo["photo"]; ?>" />
    <title>
        <?php echo isset($title_custom) && $title_custom !== ""
            ? $title_custom
            : (isset($title_bar) ? $title_bar : "") . $row_setting["title_" . $lang]; ?>
    </title>
    <meta name="keywords" content="<?php echo $keywords_custom != ""
        ? $keywords_custom
        : $row_setting["keywords_" . $lang]; ?>" />
    <meta name="description" content="<?php echo $description_custom != ""
        ? $description_custom
        : $row_setting["description_" . $lang]; ?>" />
    <meta name="author" content="<?php echo $row_setting["ten_" . $lang]; ?>" />
    <meta name="copyright" content="<?php echo $row_setting["ten_" . $lang]; ?>" />
    <meta name="revisit-after" content="1 days" />
    <meta name="robots" content="index,follow,odp" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=1" />
    <meta property="og:site_name" content="<?php echo $row_setting["ten_" . $lang]; ?>" />
    <meta property="og:url" content="<?php echo getCurrentPageUrl(); ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="<?php echo $title_custom != ""
        ? $title_custom
        : $title_bar . $row_setting["title_" . $lang]; ?>" />
    <meta property="og:image" content="<?php echo $hinhsharefb; ?>" />
    <meta property="og:locale" content="vi_VN" />



    <?php if (1) { ?>
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <link href="css/responsive.css" rel="stylesheet" type="text/css" />
        <link type="text/css" href="css/magiczoomplus.css" media="all" rel="stylesheet" />
        <link href="css/jqueryslidemenu.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="css/jquery.simplyscroll.css" />
        <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

        <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
        <script type="text/javascript" src="js/magiczoomplus.js"></script>
        <script type="text/javascript" src="js/jqueryslidemenu.js"></script>

        <script type="text/javascript" src="js/jquery.jcarousel.js"></script>
        <script type="text/javascript" language="javascript" src="js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" language="javascript" src="js/jquery.animate-colors-min.js"></script>
        <script type="text/javascript" src="js/jquery.simplyscroll.min.js"></script>

        <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@700&display=swap" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css"
            rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
        <script type="text/javascript">
            var jQuery1113 = $.noConflict(true);
        </script>
        <script type="text/javascript" defer src="js/jquery.flexslider.js"></script>
        <script type="text/javascript">
            $('body').append('<div id="top" ></div>');
            $(window).scroll(function () {
                if ($(window).scrollTop() > 100) {
                    $('#top').fadeIn();
                } else {
                    $('#top').fadeOut();
                }
            });
            $('#top').click(function () {
                $('html, body').animate({
                    scrollTop: 0
                }, 500);
            });
        </script>
    <?php } else { ?>
        <script type="text/javascript" src="http://<?php echo $config_url; ?>/vietnhat-tech.com/js/jquery-1.11.0.js">
        </script>
        <script type="text/javascript">
            $(document).on("mobileinit", function () {
                $.mobile.ajaxEnabled = false;
                $.mobile.pushStateEnabled = false;
                $.mobile.ignoreContentEnabled = true;
            });
        </script>

        <script type="text/javascript"
            src="http://<?php echo $config_url; ?>/vietnhat-tech.com/js/jquery.touchSwipe.min.js">
            </script>
        <script type="text/javascript"
            src="http://<?php echo $config_url; ?>/vietnhat-tech.com/js/jquery.ui.touch-punch.js">
            </script>

        <link rel="stylesheet" href="http://<?php echo $config_url; ?>/vietnhat-tech.com/css/jquery.mobile-1.4.5.css">
        <link
            href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,greek-ext,cyrillic-ext,vietnamese,greek'
            rel='stylesheet' type='text/css'>
        <script src="http://<?php echo $config_url; ?>/vietnhat-tech.com/js/jquery.mobile-1.4.5.js"></script>
        <link href="http://<?php echo $config_url; ?>/vietnhat-tech.com/css/mobile.css" type="text/css" rel="stylesheet">


        <link type="text/css" rel="stylesheet" href="css/jquery.mmenu.all.css" />
        <script type="text/javascript" src="js/jquery.mmenu.min.all.js"></script>

        <link type="text/css" rel="stylesheet"
            href="http://<?php echo $config_url; ?>/vietnhat-tech.com/css/jquery.mbxslider.css">
        <script type="text/javascript" src="http://<?php echo $config_url; ?>/vietnhat-tech.com/js/jquery.bxslider.js">
        </script>

        <script src="http://<?php echo $config_url; ?>/vietnhat-tech.com/js/jquery.swipebox.js"></script>
        <link type="text/css" rel="stylesheet" href="http://<?php echo $config_url; ?>/vietnhat-tech.com/css/swipebox.css">

        <script type="text/javascript">
            $(document).ready(function () {
                $('nav#menu').mmenu();
            });
        </script>

    <?php } ?>
    <!-- Add mousewheel plugin (this is optional) -->
    <script type="text/javascript" src="js/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
    <!-- Add fancyBox main JS and CSS files -->
    <script type="text/javascript" src="js/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
    <link rel="stylesheet" type="text/css" href="js/fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen" />
    <script type="text/javascript">
        jQuery(document).ready(function () {

            jQuery(".various3").fancybox({
                'width': '70%',
                'height': '60%',
                'autoScale': false,
                'transitionIn': 'none',
                'transitionOut': 'none',
                'type': 'iframe'
            });
        });
    </script>
    <?php echo $row_setting["analytics"]; ?>


</head>

<body <?php if (@$_GET["com"] == "lien-he") {
    echo 'onLoad="initialize();"';
} ?>>
    <?php if (1) { ?>
        <?php include _template . "layout/header.php"; ?>
        <div id="container-page">
            <?php include _template . "layout/menu_top.php"; ?>
            <div id="container">
                <div id="header">
                </div><!-- header-->
                <div class="clr"></div>
                <div class="clr"></div>
                <div id="content" class="maxwidth">
                    <div id="main_content">
                        <div id="main">
                            <?php include _template . $template . "_tpl.php"; ?>
                            <div class="clr"></div>
                        </div>
                        <!--end #main-->
                    </div>
                    <!--main content-->
                </div><!-- content -->
            </div>
            <!--container-->

            <div id="footer">
                <?php include _template . "layout/footer.php"; ?>
            </div>
            <!--footer-->

            <div class="clr"></div>
            <?php echo $row_setting["chat"]; ?>
        </div>
        <!--container-page-->
    <?php } else { ?>
        <div id="wrapper">
            <?php
            include_once _template . "layout/banner.php";
            include _template . "layout/search.php";
            include_once _template . "layout/menu_top.php";
            if ($source == "index") {
                include_once _template . "layout/slideranh.php";
            }
            ?>
            <div id="container">
                <?php include _template . $template . "_tpl.php"; ?>
                <?php include_once _template . "layout/bottom.php"; ?>
            </div>
            <?php include_once _template . "layout/footer.php"; ?>
        </div>
        <?php echo $row_setting["chat"]; ?>
    <?php } ?>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-55P5WHZ" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
</body>

</html>