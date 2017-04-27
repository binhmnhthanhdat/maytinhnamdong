<div class="box_login">
      <div style="float:left; width:450px; margin-right:20px;"><img src="<?php echo base_url();?>layout/images/banner_login.jpg" width="450" height="210" /></div>
      <div class="login">
         <h1>Thông tin đăng ký</h1>
          <div class="div_input_info">
          			<?php if($this->session->flashdata('error_mem') !='') : ?>
                    <h3 style="padding:10px 5px; color:#ff0000; font-size:12px; border: 1px solid #ddd;"><?php echo $this->session->flashdata('error_mem');?> </h3>
                    <?php endif;?>
               	  <form action="<?=$action;?>" method="post" name="frm" id="frm">
                  <table width="100%" border="0" cellspacing="5" cellpadding="0">
                  <tr>
                        <td width="30%"><b>Tài khoản:</b></td>
                   		<td width="70%">
                        	<input type="text" id="username" name="username" class="user_pass" value="<?=set_value('username');?>"/>
                            <?php echo form_error('username');?>
                         </td>
                    </tr>
                      <tr>
                        <td><b>Mật khẩu:</b></td>
                        <td>
                        	<input type="password" id="password" name="password" class="user_pass" />
                            <?php echo form_error('password');?>
                         </td>
                      </tr>
                      <tr>
                        <td><b>Xác nhận mật khẩu:</b></td>
                        <td>
                        	<input type="password" id="re_pass" name="re_pass" class="user_pass" />
                        	<?php echo form_error('re_pass');?>
                        </td>
                      </tr>
                      <tr>
                        <td><b>Email:</b></td>
                        <td>
                        	<input type="text" id="email" name="email" class="user_pass" value="<?=set_value('email');?>" />
                        	<?php echo form_error('email');?>    
                        </td>
                      </tr>
                      <tr>
                        <td><b>Xác nhận Email:</b></td>
                        <td>
                        	<input type="text" id="email_confirm" name="email_confirm" class="user_pass" />
                         	<?php echo form_error('email_confirm');?>   
                         </td>
                      </tr>
                      <tr>
                        <td><b>Địa chỉ:</b></td>
                        <td>
                        	<input type="text" id="address" name="address" class="user_pass" value="<?=set_value('address');?>" />
                        	<?php echo form_error('address');?>    
                        </td>
                      </tr>
                      <tr>
                        <td><b>Điện thoại:</b></td>
                        <td>
                        	<input type="text" id="phone" name="phone" class="user_pass" value="<?=set_value('phone');?>" />
                        	<?php echo form_error('phone');?>
                        </td>
                      </tr>
                      <tr>
                        <td valign="top"><b>Mã bảo vệ:</b></td>
                        <td align="left" valign="middle">
                        	<input type="text" id="sercode" name="sercode" size="10" class="user_pass" value="<?=set_value('sercode');?>" onblur="if(this.value =='') this.value = 'Nhập mã bảo vệ';" onfocus="if(this.value == 'Nhập mã bảo vệ') this.value ='';" /><br /><br>
                        	<?=$captcha;?>
                        	<?php echo form_error('sercode');?>                        
                        </td>
                      </tr>
                     <tr>
                        <td colspan="2">
                        <input type="checkbox" checked="checked" />&nbsp;Bạn đồng ý với <a href="<?=site_url('member/terms');?>" class="ajax" title="Điều khoản sử dụng">Điều khoản sử dụng</a> trên www.Choqng.com 
                        <script type="text/javascript">
                        	$('.ajax').divbox({type:'ajax', caption: false});
                        </script>                       
                        </td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;
                            <img src="<?php echo base_url();?>layout/images/button_register.png" border="0" align="middle" style="cursor:pointer;" onClick="$('#frm').submit(); return false;" />                        </td>
                    </tr>
                    </table>
					</form>
              </div>
            </div>
            
        </div><!--End box login-->