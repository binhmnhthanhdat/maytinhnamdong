<div class="breadcrumb" style="padding:5px 0px 5px 30px;">
     <?php foreach($breabcrumb as $key => $val) : ?>
                        <a href="<?=$val;?>"><?=$key;?></a> &raquo; 
                        <?php endforeach;?>
</div><!--End Breadcrumb-->
<div class="box_login">
      <div style="float:left; width:450px; margin-right:20px;"><img src="<?php echo base_url();?>layout/images/banner_login.jpg" width="450" height="210" /></div>
      <div class="login">
         <h1>Thay đổi mật khẩu thành viên</h1>
          <div class="div_input_info">
          			<?php if($this->session->flashdata('error_mem') !='') : ?>
                    <h3 style="padding:10px 5px; color:#ff0000; font-size:12px; border: 1px solid #ddd;"><?php echo $this->session->flashdata('error_mem');?> </h3>
                    <?php endif;?>
               	  <form action="<?=$action;?>" method="post" name="frm" id="frm">
                  <table width="100%" border="0" cellspacing="5" cellpadding="0">
                  <tr>
                        <td width="30%"><b>Mật khẩu cũ:</b></td>
                   		<td width="70%">
                        	<input type="password" id="old_password" name="old_password" class="user_pass" value=""/>
                            <?=form_error('old_password');?>
                         </td>
                    </tr>
                    <tr>
                        <td width="30%"><b>Mật khẩu mới:</b></td>
                   		<td width="70%">
                        	<input type="password" id="new_password" name="new_password" class="user_pass" value=""/>
                            <?=form_error('new_password');?>
                         </td>
                    </tr>
                    <tr>
                        <td width="30%"><b>Xác nhận mật khẩu:</b></td>
                   		<td width="70%">
                        	<input type="password" id="re_newpassword" name="re_newpassword" class="user_pass" value=""/>
                            <?=form_error('re_newpassword');?>
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
                    
              </div>
            </div>
            
        </div><!--End box login-->