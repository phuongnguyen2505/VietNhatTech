
<?php
$d->reset();
	$sql_support="select * from #_yahoo where hienthi= 1 order by stt,id desc";
	$d->query($sql_support);
	$hotro=$d->result_array();
?>

<style type="text/css">
/**************************************/
#footerSlideContainer {
	bottom: -3px;
	position: fixed;
	right: 0px;
	width: 300px;
	z-index: 1000;
}
#footerSlideButton {
  	 background: url("images/hotrotructuyen.png") no-repeat scroll left top transparent;
	border: medium none;
	cursor: pointer;
	height:66px;
	position: absolute;
	right: 0px;
	top: -66px;
	width: 228px;

}
#footerSlideContent {
    -moz-border-bottom-colors: none;
	-moz-border-left-colors: none;
	-moz-border-right-colors: none;
	-moz-border-top-colors: none;
	background:#0E5893;
	border-color: rgba(255, 255, 255, 0.3) ;
	border-image: none;
	border-style: solid none solid solid;
	border-width: 5px medium medium 5px;
	bottom: 0px;
	color: #fff;
	font-family: 'avo';
	font-size: 0.8em;
	position: relative;
	width: 100%;
	overflow: hidden;
}
#footerSlideContent h3 {
    color: #ff0;
    font-size: 36px;
    margin: 10px 0;
}
#footerSlideText ul {
    list-style: none outside none;
	margin: 10px 0 0 20px;
	padding: 0;
	width: 294px;
}
#footerSlideText ul li {
	background: none repeat scroll 0 0 transparent;
	color: #fff;
	font-size: 12px;
	font-weight: bold;
	list-style: none outside none;
	margin-top: 8px;
	padding: 0;
}
#footerSlideText {
    color: #fff;
	font-size: 11px;
	padding: 10px 5px 5px;
	/*text-shadow: 1px 1px #FFFFFF;*/
}
#footerSlideText .note {
    color: red;
    left: 20px;
    position: relative;
}	
#footerSlideText .line {
    background: url(images/line.gif) repeat-x center top;
    height: 2px;
    margin: 12px auto;
    width: 95%;
}
#footerSlideText .titles {
    color: #fff;
	font-size: 14px;
	font-weight: bold;
	text-transform: uppercase;
}
#footerSlideText ul li .left1 {
display: inline-block;
width: 125px;
}

</style>
<script language="javascript" type="text/javascript">
$(document).ready(function(){
	
	$("#footerSlideContent").hide();
	$("#footerSlideButton").click(function(){
		$("#footerSlideContent").slideToggle(500);	
	});
}
)
</script>

<div id="footerSlideContainer">
        <div id="footerSlideButton" style="background-position: 0% 100%; text-align:center; line-height:77px;font-size: 16px;text-indent:50px;
"><span style="color:#fff; font-weight:normal; text-transform:none;font-size: 16px;"></span></div>
       	<div id="footerSlideContent" >
            <div id="footerSlideText" style="display: block;"> <span class="titles">Hotline: <strong style="color:#ff0"><?=$row_setting['hotline']?></strong></span>
                     <ul>
                     <?php
					 	if(!empty($hotro)){
							foreach($hotro as $hotro_it){
					?>
                    <li style="border-bottom:1px solid #3E75A0;">
                        <span class="left1"><a href="skype:<?=$hotro_it['skype']?>?chat"><img src="images/skype.png" alt="Mr. Phong"></a>&nbsp;<a rel="nofollow" href="ymsgr:sendIM?<?=$hotro_it['yahoo']?>"><img src="http://opi.yahoo.com/online?u=<?=$hotro_it['yahoo']?>&amp;m=g&amp;t=1" alt="<?=$hotro_it['yahoo']?>" style="position: relative;top: -7px;left: 10px;"> </a></span>
                        <span class="right1" style="position:relative; top:-10px; display: inline-block;"><b ><?=$hotro_it['ten_'.$lang]?></b><br /><b style="color:#ff0;"><?=$hotro_it['dienthoai']?></b></span>
                      
                    </li>
                    
                    <?php	
							}
						}
					 
					 ?>
                        
                    </ul>
            	
            </div>
        </div>
	</div>
