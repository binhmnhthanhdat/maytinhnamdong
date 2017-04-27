<style type="text/css">
pre.samples
{
	background-color: #F7F7F7;
	border: 1px solid #D7D7D7;
	overflow: auto;
	padding: 0.25em;
}
</style>
<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Chi Tiết Thư</h3>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
			   
					<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
                    	<ul>
                        	<li>
                            	<p>Từ : <b><?php echo $noidungthu['lienhe_hoten']; ?></b> - Mail : <b><?php echo $noidungthu['lienhe_mail']; ?></b>
                                 - Là : <?php if($noidungthu['lienhe_id_mem']==0) echo "<b>Khách</b>"; else {echo "<b>Thành Viên (ID = ".$noidungthu['lienhe_id_mem'].")</b>"; }?> 
                                </p>
                            </li>
                            
                            <li>
                            	<p>Chủ Đề : <b><?php echo $noidungthu['lienhe_chude']; ?></b></p>
                            </li>
                            
                            <li>
                            	<p>
                                	Nội Dung : <b><?php echo $noidungthu['lienhe_noidung']; ?></b>
                                </p>
                            	
                            </li>
                        </ul>
						<form action="<?php echo base_url() ?>admincp/lien_he_mail/send_mail" method="post">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								<p>
									<label>Chủ Đề</label>
                                    <input type="hidden" name="txtmail" value="<?php echo $noidungthu['lienhe_mail']; ?>" />
                                    <input type="hidden" name="txtid" value="<?php echo $noidungthu['lienhe_id']; ?>" />
									<input class="text-input large-input" type="text" id="large-input" name="txtchude" value="CÔNG TY CỔ PHẦN MẠNG TRỰC TUYẾN MASTER WORLD" />
								</p>
								
								<p>
									<textarea class="text-input textarea wysiwyg" id="textarea" name="txtnoidung" cols="79" rows="25">
                                   		<?php 
											if($noidungthu['noidung_gui']!='') echo $noidungthu['noidung_gui'];
											else
											{
												$this->load->view('admin/mau_mail'); 
											}
										?>
                                    </textarea>
								</p>
										
								<p>
									<input class="button" type="submit" value="Send Now" name="btn_send" />
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
					</div> <!-- End #tab1 -->
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
			
			