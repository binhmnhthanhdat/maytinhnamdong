<div style="clear:both"></div>	
	<div class="quangcao">
		<div class="doitac">Đối tác<span class="soc-cheo"></span></div>
        <?
        $sql="select * from parttent where active=1";	
		$laypartner=$this->db->query($sql);
        if($laypartner->num_rows()>0)
    	{
        ?>
		<ul class="listPatner">
		<?php 
        foreach($laypartner->result() as $kqlaypartner)
        {
                  
        ?>	
			<li>
            <?php if($kqlaypartner->url!="#") { ?>
				<a href="<?php  echo $kqlaypartner->url;?>" title="<?php  echo $kqlaypartner->name;?>">
            <?php } ?> 
					<img src="<?php  echo base_url(); echo $kqlaypartner->path;?>" alt="<?php  echo $kqlaypartner->name;?>" height="50" />
			<?php if($kqlaypartner->url!="#") { ?>
               </a>
            <?php } ?> 
			</li>
			
		 <?php 
        }
         ?> 	 
		</ul>
        <?
        }
        ?>
		<div style="clear:both"></div>	
	</div>  
    <div style="clear:both"></div>	
    <?
    $sql="select * from khachhang where active=1";	
	$khachhang=$this->db->query($sql);
    if($khachhang->num_rows()>0)
	{
    ?>	
	<div class="chungnhan">
		<div class="cn-header">Khách hàng tiêu biểu <span class="soc-cheo"></span></div>
		<div class="brand_list">
		  <div id="tab_b1">
			  <div class="navlist">
				  <a href="#" class="prev"></a>
				  <a href="#" class="next"></a>
			  </div>     
			  <div id="br_list" >
                <ul>
                <?php 
                foreach($khachhang->result() as $kqkhachhang)
                {
                ?>
				  <li>
                   <?php if($kqkhachhang->url!="#") { ?>
   			          <a href="<?php  echo $kqkhachhang->url;?>" title="<?php  echo $kqkhachhang->name;?>">
                   <?php } ?> 
				        <img border="0" src="<?php  echo base_url(); echo $kqkhachhang->path;?>" width="192" height="132" alt="">
				 <?php if($kqkhachhang->url!="#") { ?>
                     </a>
                <?php } ?> 
                  </li>
                <?php 
                }
                ?> 
    			</ul>
			  </div>
		  </div>
		</div>
		<div style="clear:both"></div>	
    </div><!-- end chung nhan -->
    <?
    }
    ?>
    <br class="clear_left">
</div>
<!--end container-->


<!--end footer_box-->
<div id="footer_box">
    <div class="footer-info">
		<div class="ft-col col1">
			<h2 class="ft-topHd"><i class="icon-tt"></i>Thông tin <span>Công ty</span></h2>
             <?php 
            $sql="select * from setting ";	
            $setting= $this->db->query($sql);
            $kqsetting=$setting->row();
            ?>
			<div class="comp-info">
				<p><strong>Công ty <? echo $kqsetting->site_name; ?></strong></p>
				<p><b>Địa chỉ giao dịch:</b> <? echo $kqsetting->address; ?></p>
				<p><span style="color: #888; font-weight: bold">Email:</span> <span style="color: #ff0000;"><? echo $kqsetting->google_analytics; ?></span> | <span style="color: #888; font-weight: bold">Phone:</span> <span style="color: #ff0000;"><? echo $kqsetting->phone; ?></span> </p>
			</div>
		</div>
        <?php 
        $sql="select * from group_menufooter where active=1 order by ord asc limit 0,4";	
        $menufooter= $this->db->query($sql);
        $i=0;
       if($menufooter->num_rows()>0)
	   {
         foreach($menufooter->result() as $kqmenufooter)
        {                                                           
        ?>
		<div class="ft-col col2">
			<h2><i class="icon-hd"></i><?php  echo $kqmenufooter->name;?></span></h2>
			<ul>
            <?php 
            $sql="select * from menufooter where parent=\"".$kqmenufooter->id."\" order by ord asc limit 0,10";	
            $danhmucfooter= $this->db->query($sql);
            if($danhmucfooter->num_rows()>0)
		    {
            foreach($danhmucfooter->result() as $kqdanhmucfooter)
             {                                                        
            ?>
				<li><a href="<?php  echo $kqdanhmucfooter->link; ?>" rel="nofollow"><?php  echo $kqdanhmucfooter->name; ?></a></li>
			
           <?php 
            }
           }
          ?> 
			</ul>
		</div>
         <?php 
         }
       }
         ?> 
	
	</div> <!-- end footer top -->
	<div style="width:inherit;height:20px;float:left;"></div>
</div>
<!--end footer_box-->