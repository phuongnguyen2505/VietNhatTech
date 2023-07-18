<div id="search">
        <input id="keyword" name="keyword" onkeypress="doEnter(event,'keyword');" type="search" placeholder="Tìm kiếm ..." />
    <script language="javascript"> 
    function doEnter(evt){
    // IE                   // Netscape/Firefox/Opera
    var key;
    if(evt.keyCode == 13 || evt.which == 13){
        onSearch(evt);
    }
    }
    function onSearch(evt) {            
    
            var keyword = document.getElementById("keyword").value;
            if(keyword=='')
                alert('Bạn chưa nhập từ khóa tìm kiếm!');
            else{
            //var encoded = Base64.encode(keyword);
                location.href = 'http://<?=$config_url?>/tim-kiem.html/keyword='+keyword;
                loadPage(document.location);            
            }
        }       
</script>
<!--Tim kiem-->   
   
</div>
