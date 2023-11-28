<?php
$com = isset($_REQUEST["com"]) ? addslashes($_REQUEST["com"]) : "";
$act = isset($_REQUEST["act"]) ? addslashes($_REQUEST["act"]) : "";
$d = new database($config["database"]);

$d->reset();
$sql_setting = "select * from #_setting limit 0,1";
$d->query($sql_setting);
$row_setting = $d->fetch_array();

switch ($com) {
case "cat1":
    $source = "cat1";
    $template = "product";
    break;
case "cat2":
    $source = "cat2";
    $template = "product";
    break;
case "cat3":
    $source = "cat3";
    $template = "product";
    break;
case "tags":
    $source = "tags";
    $template = "product";
    break;
case "hoi-dap":
    $source = "hoidap";
    $template = "hoidap";
    break;

case "hinh-anh":
    $source = "hinhanh";
    $template = "hinhanh";
    break;
case "video":
    $source = "video";
    $template = "video";
    break;

case "dich-vu":
    $source = "dichvu";
    $template = isset($_GET["id"]) ? "thuvien_detail" : "thuvien";
    break;

case "download":
    $source = "congnghe";
    $template = isset($_GET["id"]) ? "congnghe_detail" : "congnghe";
    break;

  // case 'dich-vu':
  //     $source = "dichvu";
  //     $template = isset($_GET['id']) ? "dichvu_detail" : "dichvu";
  //     break;

case "ky-thuat":
    $source = "tuyendung";
    $template = isset($_GET["id"]) ? "tuyendung_detail" : "tuyendung";
    break;

case "du-an":
    $source = "duan";
    $template = isset($_GET["id"]) ? "duan_detail" : "duan";
    break;

case "gioi-thieu":
    $source = "about";
    $template = isset($_GET["id"]) ? "about_detail" : "about";
    break;

case "tin-tuc":
    $source = "news";
    $template = isset($_GET["id"]) ? "news_detail" : "news";
    break;

case "solar":
    $source = "solar";
    $template = isset($_GET["id"]) ? "solar_detail" : "solar";
    break;

case "lien-he":
    $source = "contact";
    $template = "contact";
    break;

case "tim-kiem":
    $source = "search";
    $template = "product";
    break;
case "gio-hang":
    $source = "giohang";
    $template = "giohang";
    break;

case "thanh-toan":
    $source = "thanhtoan";
    $template = "thanhtoan";
    break;

case "san-pham":
case "san-pham-kitz":
case changeTitle(_product1):
case "san-pham-khac":
    $source = "product";
    $template = isset($_GET["id"]) ? "product_detail" : "product";
    break;

case "dang-ky":
    $source = "user";
    $template = "register";
    break;
case "doi-tac":
    $source = "doitac";
    $template = "doitac";
    break;

case "dang-nhap":
    $source = "user";
    $template = "login";
    break;
case "logout":
    $source = "logout";
    $template = "index";
    break;

case "ngonngu":
    $source = "ngonngu";
    $template = "ngonngu";
    if (isset($_GET["lang"])) {
        switch ($_GET["lang"]) {
        case "vi":
            $_SESSION["lang"] = "vi";
            break;
        case "en":
            $_SESSION["lang"] = "en";
            break;
        case "ta":
            $_SESSION["lang"] = "ta";
            break;
        case "ja":
            $_SESSION["lang"] = "ja";
            break;
        default:
            $_SESSION["lang"] = "vi";
            break;
        }
    } else {
        $_SESSION["lang"] = "vi";
    }
    echo '<script language="javascript">history.go(-1)</script>';
    break;

default:
    $source = "index";
    $template = "index";
    break;
}

$type = isset($_GET["type"]) ? $_GET["type"] : $com;

switch ($type) {
case "san-pham":
    $table_select = "product";
    $com_select = "san-pham";
    $title_select = _product;
    break;
case "san-pham-kitz":
case changeTitle(_product1):
    $com_select = "san-pham-kitz";
    $table_select = "product_kitz";
    $title_select = _product1;
    break;

case "san-pham-khac":
    $com_select = "san-pham-khac";
    $table_select = "product_other";
    $title_select = _sanphamkhac;
    break;

default:
    $com_select = "san-pham";
    $table_select = "product";
    $title_select = _product;
    break;
}

if ($source != "") {
    include _source . $source . ".php";
}

if ($com_select == "san-pham-kitz") {
    $com_select = "ingersoll-randusa";
}

if (isset($_REQUEST["com"]) == "logout") {
    isset($_SESSION["login_name"]);
    // session_unregister($login_name);
    header("Location");
}
?>
