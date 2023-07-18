<div class="m-100 mt-100">
    <div>
        <?php
        if(count($tintuc)>0) {
            for($i=0,$count_tintuc=count($tintuc);$i<$count_tintuc;$i++){
                       $str='';
                if(($i+1)%2==0) { $str='style="margin-right:0px;"';
                } else {
                    $str='style="margin-right:20px;"';
                }
                    
                ?>
        <div class="box_news" <?php echo $str?>>
            <div class="image_boder"><a
                    href="download/<?php echo $tintuc[$i]['tenkhongdau']?>-<?php echo $tintuc[$i]['id']?>.html"><img
                        src="<?php echo _upload_tintuc_l,$tintuc[$i]['thumb']?>"
                        alt="<?php echo $tintuc[$i]['ten']?>" /></a></div>

            <div class="mota_tt">
                <div class="ten_tt">
                    <h2> <a
                            href="solar/<?php echo $tintuc[$i]['tenkhongdau']?>-<?php echo $tintuc[$i]['id']?>.html"><?php echo $tintuc[$i]['ten']?></a>
                    </h2>
                </div>
                <?php echo $tintuc[$i]['mota'];?>

            </div>
            <?php if($tintuc[$i]['file']!='') {?>
            <a class="download" target="_blank" href="<?php echo _upload_tintuc_l.$tintuc[$i]['file']?>"><img
                    src="images/pdf.png" alt="<?php echo $product_item['ten']?>"></a>
            <?php }?>
            <div class="clr"></div>
        </div>

        <?php
                if(($i+1)%2==0) { echo '<div class="clr"></div> ';
                }
            }
                                    
            ?>

        <?php	
        }else { echo '<p>Nội dung đang cập nhật, bạn vui lòng xem các chuyên mục khác.</p>';
        }  ?>
        <div class="clr"></div>
        <div class="phantrang"><?php echo $paging['paging']?></div>



    </div>
</div>
<!-- end right -->