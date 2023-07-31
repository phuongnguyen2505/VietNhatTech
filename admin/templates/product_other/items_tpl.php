<script type="text/javascript">
function doEnter(evt) {
    // IE                    // Netscape/Firefox/Opera
    var key;
    if (evt.keyCode == 13 || evt.which == 13) {
        onSearch(evt);
    }
}

function onSearch(evt) {
    var keyword = document.getElementById("keyword").value;
    //var encoded = Base64.encode(keyword);
    location.href = "index.php?com=product_other&act=man&keyword=" + keyword;
    loadPage(document.location);

}
</script>
<script>
$(document).ready(function() {
    $("#chonhet").click(function() {
        var status = this.checked;
        $("input[name='chon']").each(function() {
            this.checked = status;
        })
    });

    $("#xoahet").click(function() {
        var listid = "";
        $("input[name='chon']").each(function() {
            if (this.checked) listid = listid + "," + this.value;
        })
        listid = listid.substr(1); //alert(listid);
        if (listid == "") {
            alert("Bạn chưa chọn mục nào");
            return false;
        }
        hoi = confirm("Bạn có chắc chắn muốn xóa?");
        if (hoi == true) document.location = "index.php?com=product_other&act=delete&listid=" + listid;
    });
});
</script>
<script language="javascript">
function select_onchange() {
    var a = document.getElementById("id_list");
    window.location = "index.php?com=product_other&act=man&id_list=" + a.value;
    return true;
}

function select_onchange1() {
    //var a=document.getElementById("id_list");
    var b = document.getElementById("id_cat");
    window.location = "index.php?com=product_other&act=man&id_cat=" + b.value;
    return true;
}

function select_onchange2() {
    //var a=document.getElementById("id_list");
    var c = document.getElementById("id_item");
    window.location = "index.php?com=product_other&act=man&id_item=" + c.value;
    return true;
}
</script>
<?php
function get_main_list()
{
    $sql="select ten_vi,id from table_product_other_list  order by stt asc";
    $stmt=mysql_query($sql);
    $str='
			<select id="id_list" name="id_list" onchange="select_onchange()" class="main_font">
			<option value="">Danh mục cấp 1</option>			
			';
    while ($row=@mysql_fetch_array($stmt)) 
    {
        if (isset($_REQUEST['id_list']) && $row["id"] == $_REQUEST['id_list']) {
            $selected="selected";
        } else { 
            $selected="";
        }
        $str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';            
    }
    $str.='</select>';
    return $str;
}
function get_main_cat()
{
    $sql="select ten_vi,id from table_product_other_cat where hienthi =1 and id_list=".$_REQUEST['id_list']." order by stt asc";
    $stmt=mysql_query($sql);
    $str='
			<select id="id_cat" name="id_cat" onchange="select_onchange1()" class="main_font">
			<option value="">Danh mục cấp 2</option>			
			';
    while ($row=@mysql_fetch_array($stmt)) 
    {
        if($row["id"]==$_REQUEST['id_cat']) {
            $selected="selected";
        } else { 
            $selected="";
        }
        $str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';            
    }
    $str.='</select>';
    return $str;
}
function get_main_item()
{
    $sql="select ten_vi,id from table_product_other_item where hienthi =1 and id_cat=".$_REQUEST['id_cat']." order by stt asc";
    $stmt=mysql_query($sql);
    $str='
			<select id="id_item" name="id_item" onchange="select_onchange2()" class="main_font">
			<option value="">Danh mục cấp 3</option>			
			';
    while ($row=@mysql_fetch_array($stmt)) 
    {
        if($row["id"]==$_REQUEST['id_item']) {
            $selected="selected";
        } else { 
            $selected="";
        }
        $str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';            
    }
    $str.='</select>';
    return $str;
}
?>
<h3><a href="index.php?com=product_other&act=add">Thêm sản phẩm</a></h3>
Tìm kiếm: <input name="keyword" id="keyword" type="text" /> <input type="button" value=" Tìm "
    onclick="onSearch(event)" />
<table class="blue_table">
    <tr>
        <th style="width:5%" align="center"><input type="checkbox" name="chonhet" id="chonhet" /></th>
        <th style="width:5%;">Stt</th>
        <th style="width:15%;"><?php echo get_main_list();?></th>
        <!-- <th style="width:15%;"><?php echo get_main_cat()?></th> -->
        <!-- <th style="width:15"><?php echo get_main_item()?></th> -->
        <th style="width:20%;">Tên </th>
        <!-- <th style="width:5%;">Hình ảnh</th> -->
        <th style="width:5%;">SP Nổi bật</th>
        <!-- <th style="width:5%;">SP bán chạy</th> -->
        <!-- <th style="width:5%;">SP tiêu biểu</th>       -->
        <th style="width:5%;">Hiển thị</th>
        <th style="width:5%;">Sửa</th>
        <th style="width:5%;">Xóa</th>
    </tr>
    <?php for($i=0, $count=count($items); $i<$count; $i++){?>
    <tr>
        <td style="width:5%;" align="center"><input type="checkbox" name="chon" id="chon"
                value="<?php echo $items[$i]['id']?>" class="chon" /></td>
        <td style="width:5%;"><?php echo $items[$i]['stt']?></td>
        <td style="width:10%;">
            <?php
            $sql_danhmuc="select ten_vi from table_product_other_list where id='".$items[$i]['id_list']."'";
            $result=mysql_query($sql_danhmuc);
            $item_danhmuc =mysql_fetch_array($result);
            echo @$item_danhmuc['ten_vi']
            ?>
        </td>
        <!--  <td style="width:10%;">
        <?php
        $sql_danhmuc="select ten_vi from table_product_other_cat where id='".$items[$i]['id_cat']."'";
        $result=mysql_query($sql_danhmuc);
        $item_danhmuc =mysql_fetch_array($result);
        echo @$item_danhmuc['ten_vi']
        ?>      
        </td> -->
        <!-- <td style="width:10%;">
        <?php
        $sql_danhmuc="select ten_vi from table_product_other_item where id='".$items[$i]['id_item']."'";
        $result=mysql_query($sql_danhmuc);
        $item_danhmuc =mysql_fetch_array($result);
        echo @$item_danhmuc['ten_vi']
        ?>      
        </td> -->
        <td style="width:20%;"><a
                href="index.php?com=product_other&act=edit&id_list=<?php echo $items[$i]['id_list']?>&id_cat=<?php echo $items[$i]['id_cat']?>&id_item=<?php echo $items[$i]['id_item']?>&id=<?php echo $items[$i]['id']?>"
                style="text-decoration:none;"><?php echo $items[$i]['ten_vi']?></a></td>
        <!-- <td style="width:10%;"><a href="index.php?com=hasp&type1=hasp&act=man_photo&idc=<?php echo $items[$i]['id']?>" style="text-decoration:underline;">Thêm ảnh</a></td>  -->
        <td align="center" style="width:5%;">
            <?php if (@$items[$i]['noibat'] > 0) { ?>
            <a
                href="index.php?com=product_other&act=man&noibat=<?= $items[$i]['id'] ?><?php if (isset($_REQUEST['curPage'])) echo '&curPage=' . $_REQUEST['curPage']; ?>">
                <img src="media/images/yes-km.gif" border="0" />
            </a>
            <?php } else { ?>
            <a
                href="index.php?com=product_other&act=man&noibat=<?= $items[$i]['id'] ?><?php if (isset($_REQUEST['curPage'])) echo '&curPage=' . $_REQUEST['curPage']; ?>">
                <img src="media/images/no-km.gif" border="0" />
            </a>
            <?php } ?>

        </td>
        <!-- <td align="center" style="width:5%;">
         <?php 
            if(@$items[$i]['spbc']>0) {
                ?>
        
        <a href="index.php?com=product_other&act=man&spbc=<?php echo $items[$i]['id']?><?php if($_REQUEST['curPage']!='') { echo'&curPage='. $_REQUEST['curPage'];
                                                          }?>"><img src="media/images/yes-km.gif" border="0" /></a>
        <? 
        }
        else
        {
        ?>
         <a href="index.php?com=product_other&act=man&spbc=<?php echo $items[$i]['id']?><?php if($_REQUEST['curPage']!='') { echo'&curPage='. $_REQUEST['curPage'];
                                                           }?>"><img src="media/images/no-km.gif"  border="0"/></a>
                <?php
            }?>      
         </td>  -->
        <!-- <td align="center" style="width:5%;">
         <?php 
            if(@$items[$i]['sptb']>0) {
                ?>
        
        <a href="index.php?com=product_other&act=man&sptb=<?php echo $items[$i]['id']?><?php if($_REQUEST['curPage']!='') { echo'&curPage='. $_REQUEST['curPage'];
                                                          }?>"><img src="media/images/yes-km.gif" border="0" /></a>
        <? 
        }
        else
        {
        ?>
         <a href="index.php?com=product_other&act=man&sptb=<?php echo $items[$i]['id']?><?php if($_REQUEST['curPage']!='') { echo'&curPage='. $_REQUEST['curPage'];
                                                           }?>"><img src="media/images/no-km.gif"  border="0"/></a>
                <?php
            }?>      
         </td>      -->
        <td style="width:5%;">
            <?php 
            if(@$items[$i]['hienthi']==1) {
                ?>

            <a href="index.php?com=product_other&act=man&hienthi=<?php echo $items[$i]['id']?><?php if($_REQUEST['curPage']!='') { echo'&curPage='. $_REQUEST['curPage'];
                                                                  }?>"><img src="media/images/active_1.png"
                    border="0" /></a>
            <? 
        }
        else
        {
        ?>
            <a href="index.php?com=product_other&act=man&hienthi=<?php echo $items[$i]['id']?><?php if($_REQUEST['curPage']!='') { echo'&curPage='. $_REQUEST['curPage'];
                                                                  }?>"><img src="media/images/active_0.png"
                    border="0" /></a>
            <?php
            }?>
        </td>
        <td style="width:5%;"><a
                href="index.php?com=product_other&act=edit&id_list=<?php echo $items[$i]['id_list']?>&id_cat=<?php echo $items[$i]['id_cat']?>&id_item=<?php echo $items[$i]['id_item']?>&id=<?php echo $items[$i]['id']?>"><img
                    src="media/images/edit.png" /></a></td>
        <td style="width:5%;"><a href="index.php?com=product_other&act=delete&id=<?php echo $items[$i]['id']?>"
                onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" /></a></td>
    </tr>
    <?php	}?>
</table>
<a href="index.php?com=product_other&act=add"><img src="media/images/add.jpg"
        border="0" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" id="xoahet"><img src="media/images/delete.jpg"
        border="0" /></a>

<div class="paging"><?php echo $paging['paging']?></div>