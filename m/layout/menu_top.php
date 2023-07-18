<?php

    $d->reset();
    $sql_dmsp="select ten_$lang as ten,tenkhongdau,id,thumb,photo from #_product_list where hienthi =1  order by stt,id desc";
    $d->query($sql_dmsp);
    $dmsp=$d->result_array();
   
?>
<nav id="menu">
    <ul>
        <li ><a href="trang-chu.html" title="<?=_home?>" ><?=_home?></a></li>
        <li ><a href="gioi-thieu/gioi-thieu-2.html" title="<?=_about?>"><?=_about?></a></li>
        
             <?php
                if(!empty($dmsp)){
                   
                    foreach($dmsp as $dmsp_item){
            ?>
                <li><a href="san-pham/<?=$dmsp_item['tenkhongdau']?>/" title="<?=$dmsp_item['ten']?>"  ><?=$dmsp_item['ten']?></a>
                <?php
                    $d->reset();
                    $sql_dmsp="select ten_$lang as ten,tenkhongdau,id from #_product_cat where hienthi=1 and id_list=$dmsp_item[id] order by stt asc,id desc";
                    $d->query($sql_dmsp);
                    $dmsp1=$d->result_array();
                    if(!empty($dmsp1)){
                    echo '<ul>';
                    foreach($dmsp1 as $dmsp1_item){
                ?>
                <li>
                   <a href="san-pham/<?=$dmsp_item['tenkhongdau']?>/<?=$dmsp1_item['tenkhongdau']?>/" title="<?=$dmsp1_item['ten']?>"  ><?=$dmsp1_item['ten']?></a>
                </li>
                
                <?php
                        }
                      echo '</ul>';
                    }
                ?>
                </li>
            
            <?php   
                    }
                   
                }
            ?>

       
                 
        
        <li ><a  href="tin-tuc.html" title="tin tức" >tin tức</a></li>
        <li ><a  href="tuyen-dung.html" title="tuyển dụng" >tuyển dụng</a></li>
        <li ><a  href="lien-he.html" > <?=_contact?></a> </li>
        
    </ul>
  
   
</nav>

