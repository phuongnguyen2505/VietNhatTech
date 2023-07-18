<?php
if (@$_REQUEST['com'] != 'san-pham' || !isset($_REQUEST['id'])) {
	?>
	<h1 id="title_web">
		<?php if (isset($title_bar))
			echo $title_bar;
		else
			echo $row_setting['title']; ?>
	</h1>
	<?php
}
$sql = "select * from #_photo where com='banner_top'";
$d->query($sql);
$item = $d->fetch_array();
$str_top = '';
$str_top1 = '';
if (isset($_SESSION['login_web']) || isset($_COOKIE['id_user'])) {
	$str_top = '';
	$str_top1 = ' style="font-size:14px"';
}
?>