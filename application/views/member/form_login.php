<div class="box_login">
      <div style="float:left; width:450px; margin-right:20px;"><img src="<?php echo base_url();?>layout/images/banner_login.jpg" width="450" height="210" /></div>
      <div class="login">
         <h1>Đăng nhập</h1>
         <b style="color:#ff0000;">Để bảo vệ tài khoản. Bạn nên thoát khỏi tài khoản trước khi rời khỏi trình duyệt.</b>
          <div class="div_input_info">
          			<?php if($this->session->flashdata('error_mem') !='') : ?>
                    <h3 style="padding:10px 5px; color:#ff0000; font-size:12px; border: 1px solid #ddd;">
						<?php echo $this->session->flashdata('error_mem');?> 
                    </h3>
                    <?php endif;?>
               	  <form action="<?=$action;?>" method="post" name="frm" id="frm">
                  <table width="100%" border="0" cellspacing="5" cellpadding="0">
                  <tr>
                        <td width="30%"><b>Tài khoản:</b></td>
                   		<td width="70%">
                        	<input type="text" id="username" name="username" class="user_pass" value="<?=set_value('username');?>"/>
                            <?php echo form_error('username');?>                         </td>
                    </tr>
                      <tr>
                        <td><b>Mật khẩu:</b></td>
                        <td>
                        	<input type="password" id="password" name="password" class="user_pass" />
                            <?php echo form_error('password');?>                         </td>
                      </tr>
                      
                      <tr>
                        <td>&nbsp;</td>
                        <td><a href="<?=site_url('member/register');?>" title="Đăng ký tài khoản mới">Đăng ký mới</a> | <a href="<?=site_url('member/forgot_password');?>" title="Quên mật khẩu">Quên mật khẩu</a></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;
                            <img src="<?php echo base_url();?>layout/images/button_login.png" border="0" align="middle" style="cursor:pointer;" onClick="$('#frm').submit(); return false;" />                        </td>
                    </tr>
                    </table>
			</form>
              </div>
            </div>
            
        </div><!--End box login-->