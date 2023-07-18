<div id="search" class="search">
    <form action="tim-kiem.html" method="get" name="frm_search" id="frm_search" onsubmit="return false;">

        <input type="text" id="search_input" name="keyword" onkeypress="doEnter(event)"
            value="<?php echo _nhaptukhoa ?>" onblur="if(this.value=='') this.value='<?php echo _nhaptukhoa ?>'"
            onfocus="if(this.value =='<?php echo _nhaptukhoa ?>') this.value=''" />
        <input type="submit" name="searchAct" value="Go" id="btnSearch" />
    </form>
    <script type="text/javascript">
    $(function() {
        $('#btnSearch').click(function(evt) {
            onSearch(evt);
        });
    });

    function onSearch(evt) {
        var keyword = document.frm_search.keyword;
        if (keyword.value == '' || keyword.value === '<?php echo _nhaptukhoa ?>') {
            alert('<?php echo _chuanhaptk ?>');
            keyword.focus();
            return false;
        }
        location.href = 'http://<?php echo $config_url ?>/vietnhat-tech.com/tim-kiem.html/keyword=' + keyword.value;
    }

    function doEnter(evt) {
        // IE                    // Netscape/Firefox/Opera
        var key;
        if (evt.keyCode == 13 || evt.which == 13) {
            onSearch(evt);
        } else {
            return false;
        }
    }
    </script>
</div>

<style>
.search {
    width: 250px;
    height: 30px;
}
</style>
