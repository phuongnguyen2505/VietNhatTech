<?php
	$d->reset();
	$sql_doitac="select photo,id,ten_$lang as ten,tenkhongdau,thumb from #_product where hienthi =1 and noibat>0 order by stt asc,id desc";
	$d->query($sql_doitac);
	$sptb=$d->result_array();
	
?>


    <div id="spmoi">
        <h3 class="title_top"><?=_sanphammoi?></h3>
        <div class="ma-brand-slider-contain"> 
            <div class="ma-brand-slider">			
                <ul id ="ma-brandpro-slider" class="brand-slider">
                     <?php for($i=0;$i<count($sptb);$i++){ ?>
                        <li >
                          <a onmouseout="hideTip()" onmouseover="doTooltip(event, '<?=_upload_product_l,$sptb[$i]["photo"]?>')" href="san-pham/<?=$sptb[$i]['tenkhongdau']?>-<?=$sptb[$i]['id']?>.html" title="<?=$sptb[$i]['ten']?>"><img src="<?=_upload_product_l,$sptb[$i]["thumb"]?>" alt="<?=$sptb[$i]['ten']?>" title="<?=$sptb[$i]['ten']?>" width="173" height="113" /></a>
                          <!-- <h3><a href="san-pham/<?=$sptb[$i]['tenkhongdau']?>-<?=$sptb[$i]['id']?>.html"><?=$sptb[$i]['ten']?></a></h3> -->
                        </li>
                   <?php } ?>
                   
                </ul>
                <script type="text/javascript">
                            function mycarousel_initCallback_439(carousel) {
                                // Pause autoscrolling if the user moves with the cursor over the clip.
                                carousel.clip.hover(function() {
                                    carousel.stopAuto();
                                }, function() {
                                    carousel.startAuto();
                                });
                            };
                            $(document).ready(function() {
                                $('#ma-brandpro-slider').jcarousel({
                                    initCallback: mycarousel_initCallback_439,
                                    auto: 3,
                                    wrap: 'circular',
                                    animation: 1000,
                                    //buttonPrevHTML:null,
    								//buttonNextHTML:null,
                                   
                                    scroll: 1                    
                                });
                            });
                        </script>
                  <div class="clr"></div>
            </div>		
        </div>
    </div>