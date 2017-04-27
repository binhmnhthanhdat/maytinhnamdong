<div class="breadcrumb" style="width:920px; padding:5px 0px 5px 30px;">
    <?php foreach($breabcrumb as $key => $val) : ?>
    <a href="<?=$val;?>"><?=$key;?></a> &raquo;
    <?php endforeach;?>
</div><!--End Breadcrumb-->
<div class="box_login">
	<div class="box_cat_manager">
    	<h1>Bài viết</h1>
        <ul>
        	<li><a href="<?=site_url('dang-tin');?>">Đăng tin</a></li>
            <li><a href="<?=site_url('member/product_manager');?>">Quản lý bài viết</a></li>
        </ul>
        <h1>Tài khoản</h1>
        <ul>
        	<li><a href="<?=site_url('member/profile');?>">Đổi thông tin</a></li>
            <li><a href="<?=site_url('member/change_pass');?>">Đổi mật khẩu</a></li>
        </ul>
        <h1>Tin nhắn</h1>
        <ul>
        	<li><a href="#">Viết tin nhắn</a></li>
            <li><a href="<?=site_url('member/view_mesage');?>">Xem tin nhắn</a></li>
        </ul>
    </div>
    <div class="box_content_manager"></div>
</div>