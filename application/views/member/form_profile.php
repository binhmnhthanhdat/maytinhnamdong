<div class="breadcrumb" style="padding:5px 0px 5px 30px;">
     <?php foreach($breabcrumb as $key => $val) : ?>
                        <a href="<?=$val;?>"><?=$key;?></a> &raquo; 
                        <?php endforeach;?>
</div><!--End Breadcrumb-->
<div class="box_login">
      <div style="float:left; width:450px; margin-right:20px;"><img src="<?php echo base_url();?>layout/images/banner_login.jpg" width="450" height="210" /></div>
      <div class="login">
         <h1>Thay đổi thông tin thành viên</h1>
          <div class="div_input_info">
          			<?php if($this->session->flashdata('error_mem') !='') : ?>
                    <h3 style="padding:10px 5px; color:#ff0000; font-size:12px; border: 1px solid #ddd;"><?php echo $this->session->flashdata('error_mem');?> </h3>
                    <?php endif;?>
               	  <form action="<?=$action;?>" method="post" name="frm" id="frm" enctype="multipart/form-data">
                  <table width="100%" border="0" cellspacing="5" cellpadding="0">
                  <tr>
                        <td width="30%"><b>Tài khoản:</b></td>
                   		<td width="70%">
                        	<input type="text" id="username" name="username" class="user_pass" value="<?=$users->mem_name;?>" disabled/>
                         </td>
                    </tr>
                      
                      <tr>
                        <td><b>Email:</b></td>
                        <td>
                        <?php if($users->mem_email !='') { ?>
                        	<input type="text" id="email" name="email" class="user_pass" value="<?=$users->mem_email;?>" />
                        	<?php echo form_error('email');?>
                         <?php } else { ?>
                             <input type="text" id="email" name="email" class="user_pass" value="<?=set_value('email');?>" />
                        	<?php echo form_error('email');?>
                         <?php };?>
                        </td>
                      </tr>
                      
                      <tr>
                        <td><b>Địa chỉ:</b></td>
                        <td>
                        	<?php if($users->mem_address !='') { ?>
                        	<input type="text" id="address" name="address" class="user_pass" value="<?=$users->mem_address;?>" />
                        	<?php echo form_error('address');?>
                         <?php } else { ?>
                             <input type="text" id="address" name="address" class="user_pass" value="<?=set_value('address');?>" />
                        	<?php echo form_error('address');?>
                         <?php };?> 
                        </td>
                      </tr>
                      <tr>
                        <td><b>Điện thoại:</b></td>
                        <td>
                        	<?php if($users->mem_phone !='') { ?>
                        	<input type="text" id="phone" name="phone" class="user_pass" value="<?=$users->mem_phone;?>" />
                        	<?php echo form_error('phone');?>
                         <?php } else { ?>
                             <input type="text" id="phone" name="phone" class="user_pass" value="<?=set_value('phone');?>" />
                        	<?php echo form_error('phone');?>
                         <?php };?>
                        </td>
                      </tr>
                      <tr>
                        <td><b>Website:</b></td>
                        <td>
                        	<?php if($users->mem_website !='') { ?>
                        	<input type="text" id="webiste" name="website" class="user_pass" value="<?=$users->mem_website;?>" />
                        	<?php echo form_error('website');?>
                         <?php } else { ?>
                             <input type="text" id="website" name="website" class="user_pass" value="<?=set_value('website');?>" />
                        	<?php echo form_error('website');?>
                         <?php };?>
                        </td>
                      </tr>
                      
                      <tr>
                        <td><b>Nick chat:</b></td>
                        <td>
                        	<?php if($users->mem_nick !='') { ?>
                        	<input type="text" id="nick" name="nick" class="user_pass" value="<?=$users->mem_nick;?>" />
                        	<?php echo form_error('nick');?>
                         <?php } else { ?>
                             <input type="text" id="nick" name="nick" class="user_pass" value="<?=set_value('nick');?>" />
                        	<?php echo form_error('nick');?>
                         <?php };?>
                        </td>
                      </tr>
                      
                      <tr>
                        <td><b>Tên đầy đủ:</b></td>
                        <td>
                        	<?php if($users->mem_fullname !='') { ?>
                        	<input type="text" id="fullname" name="fullname" class="user_pass" value="<?=$users->mem_fullname;?>" />
                         <?php } else { ?>
                             <input type="text" id="fullname" name="fullname" class="user_pass" value="<?=set_value('fullname');?>" />
                         <?php };?>
                        </td>
                      </tr>
                      <tr>
                        <td><b>Giới tính:</b></td>
                        <td>
                        	
                        	<input type="radio" id="sex" name="sex"  value="1" <?php if($users->mem_sex == 1) echo "checked";?> /> Nam
                            <input type="radio" id="sex" name="sex"  value="0" <?php if($users->mem_sex == 0) echo "checked";?> /> Nữ
                        	
                        </td>
                      </tr>
                      
                      <tr>
                        <td valign="top"><b>Hình đại diện:</b></td>
                        <td>
                        	<input type="file" name="file" /> <br />
                            <i style="font-size:11px;">Avatar size : 125 x 125 px</i> <br />
                            <?php if($users->mem_avatar !='') { ?>
                          <img src="<?=base_url();?><?=$users->mem_avatar;?>" width="50" height="50" />                        	<?php } ?>
                        </td>
                      </tr>
                      
                      <tr>
                        <td valign="top"><b>Mã bảo vệ:</b></td>
                        <td align="left" valign="middle">
                        	<input type="text" id="sercode" name="sercode" size="10" class="user_pass" value="<?=set_value('sercode');?>" onBlur="if(this.value =='') this.value = 'Nhập mã bảo vệ';" onFocus="if(this.value == 'Nhập mã bảo vệ') this.value ='';" /><br /><br>
                        	<?=$captcha;?>
                        	<?php echo form_error('sercode');?>                        
                        </td>
                      </tr>
                     
                      <tr>
                        <td>    
                        </td>
                        <td>
                        	<img src="<?php echo base_url();?>layout/images/btn_update.png" border="0" align="middle" style="cursor:pointer;" onClick="$('#frm').submit(); return false;" />
                        </td>
                    </tr>
                    </table>
                    <input type="hidden" id="oldFile" name="oldFile" value="<?=$users->mem_avatar;?>" />
					</form>
              </div>
            </div>
            
        </div><!--End box login-->