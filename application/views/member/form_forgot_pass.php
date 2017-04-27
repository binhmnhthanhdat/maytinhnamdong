<div class="box_login">
      <div style="float:left; width:450px; margin-right:20px;"><img src="<?php echo base_url();?>layout/images/banner_login.jpg" width="450" height="210" /></div>
      <div class="login">
         <h1>Quên mật khẩu</h1>
          <div class="div_input_info">
          			<?php if($this->session->flashdata('error_mem') !='') : ?>
                    <h3 style="padding:10px 5px; color:#ff0000; font-size:12px; border: 1px solid #ddd;"><?php echo $this->session->flashdata('error_mem');?> </h3>
                    <?php endif;?>
               	  <form action="<?=$action;?>" method="post" name="frm" id="frm">
                  <table width="100%" border="0" cellspacing="5" cellpadding="0">
                  <tr>
                        <td width="30%"><b>Nhập địa chỉ Email:</b></td>
                   		<td width="70%">
                        	<input type="text" id="email" name="email" class="user_pass" value="<?=set_value('email');?>"/>
                            <?=form_error('email');?>
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
                  </form>  
              </div>
            </div>
            
        </div><!--End box login-->