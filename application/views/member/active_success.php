<div class="box_login">
      <div style="float:left; width:450px; margin-right:20px;"><img src="<?php echo base_url();?>layout/images/banner_login.jpg" width="450" height="210" />
      </div>
      <div class="login">
      	<p style="line-height:20px;">
		<?php if($result == 'ok') { ?>
		 Tài khoản của bạn đã kích hoạt thành công. Bạn có thể <a href="<?=site_url('member/login');?>">Đăng nhập</a> để sử dụng đầy đủ chức năng trên www.choqng.com
         <?php } else { ?>
         Tài khoản của bạn không thể kích hoạt. Có thể lí do quá thời hạn qui định kích hoạt tài khoản.
         <?php }?>
         </p>
      </div>
            
</div><!--End box login-->


