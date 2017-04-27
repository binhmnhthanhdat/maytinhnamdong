<!--begin product_page-->
 <?php 
$sql="select * from setting ";	
$setting= $this->db->query($sql);
$kqsetting=$setting->row();
 ?>
   
<div id="product_page">
	<h3><a>Contact us</a></h3>
	<!--begin contact_page-->
	<div id="contact_page">
		<!--begin left_contact_page-->
		<div id="left_contact_page">
			<div class="office_contact">
				<h4>Văn phòng giao dịch</h4>
				<p class="address"><strong>Company Name: </strong><? echo $kqsetting->site_name; ?>.</p>
				<p class="address"><strong>Add:</strong> <? echo $kqsetting->address; ?>.</p>
				<p class="email"><strong>Email:</strong> <a href=""><? echo $kqsetting->google_analytics; ?></a></p>
				<p class="tel"><strong>Phone:</strong> <? echo $kqsetting->phone; ?></p>
			</div>
			
		</div>
		<!--end left_contact_page-->
		
		<!--begin right_contact_page-->
		<div id="right_contact_page">
			<form id="contact-adverpage" action="<? echo base_url();?>lienhe/guilienhe" method="post">							
				<dl>
					<dt>Họ tên <span>*</span></dt>
					<dd>
					<input size="70" name="hoten" id="ContactForm_name" type="text" value="<?php echo set_value('hoten'); ?>">										
					<div id="ContactForm_name_em_" class="errorMessage">
					<?php echo form_error('hoten');?>
					</div>		                                
					</dd>
				</dl>
				<dl>
					<dt>Email <span>*</span></dt>
					<dd>
					<input size="70" name="email" id="ContactForm_email" type="text"  value="<?php echo set_value('email'); ?>">										
					<div id="ContactForm_email_em_" class="errorMessage">
						<?php echo form_error('email');?>
					</div>		                                
					</dd>
				</dl>
				<dl>
					<dt>Tiêu đề <span>*</span></dt>
					<dd>
					<input size="70" name="tieude" id="ContactForm_address" type="text"  value="<?php echo set_value('tieude'); ?>">										
					<div id="ContactForm_address_em_" class="errorMessage">
					<?php echo form_error('tieude');?>
					</div>		                                
					</dd>
				</dl>
				<dl>
					<dt>Nội dung <span>*</span></dt>
					<dd>
					<textarea rows="13" cols="70" name="noidung" id="ContactForm_body" style="width:320px">
					
					</textarea>										
					<div id="ContactForm_body_em_" class="errorMessage">
						<?php echo form_error('noidung');?>
					</div>		                                
					</dd>
				</dl>
				<dl>
					<dt><span style="color: #e00;"></span> <strong><font color="red"> <?php   echo "  ".$this->session->userdata('security_code');?></font></strong></dt>
					<dd>
					<input class="required" name="capcha" id="ContactForm_address" type="text">										
					<div id="ContactForm_body_em_" class="errorMessage">
						<?php echo form_error('capcha');?>
					</div>		                                
					</dd>
				</dl>
				<dl>
					<dt></dt>
					<dd class="last-child">
					<input type="submit" value="SEND" class="btn">
					<input type="reset" value="RESET" class="black_btn"></dd>
				</dl>
				
								 
			</form>
		</div>
		<!--end right_contact_page-->
	</div>
	<!--end contact_page-->
</div>
<!--end product_page-->