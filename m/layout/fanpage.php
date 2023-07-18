<div id="fb-root"></div>
    <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>
<style type="text/css">
#likeFB {
	position: fixed;
	top: 150px;
	right: -191px;
	width: 239px;
	z-index: 9999;
}
.left_likeFB {
	float: left;
	width: 48px;
}
.right_likeFB {
	float: left;
	width: 181px;
	background-color: #F7F7F7;
}

	
</style>
<div id="likeFB">
			<script type="text/javascript">
        $(document).ready(function() {
            $('#likeFB').hover(function (){ 
                $('#likeFB').stop().animate({right:'-7px'},1000);
            },function(){
                $('#likeFB').stop().animate({right:'-191px'},1000);
            });
        });
    </script>
        <div class="left_likeFB">
            <img src="images/ico_facebook2.png" />
        </div><!-- End .left_likeFB -->
        <div class="right_likeFB">
            <div class="fb-like-box" data-href="<?=$row_setting['facebook']?> " 
                data-width="180" data-colorscheme="light" data-show-faces="true" 
                data-header="true" data-stream="false" data-show-border="true">
            </div>
        </div><!-- End .right_likeFB -->
        <div class="clr"></div>    
    </div><!-- End #likeFB -->