<div id="box_form_logo">
	<a href="" id="logo"><img src="<? echo base_url();?>/images/logo.png" alt="logo"></a>
	<div id="search">
		<form action="<? echo base_url();?>san-pham/tim-kiem" method="POST">	                	
		<span></span>
			<div>
				<input type="text" name="keyword" value="Searching keyword..." onfocus="if(this.value==&#39;Searching keyword...&#39;) this.value=&#39;&#39;;" onblur="if(this.value==&#39;&#39;) this.value=&#39;Searching keyword...&#39;;">
				<p>
					<span></span>
					<select name="catpro">
						
							<option value="">All products</option>		
                            <?php if(!empty($cats)) :?>     
                            <?php foreach($cats as $cat) :?>   
                            <?php if(count($cat['cat_sub'])>0)
                            {
                            ?>
    							<optgroup label="<?=$cat['cat_name'];?>">
                                    <?php if(count($cat['cat_sub'])>0)
                                    {
                                    
                                    ?>
                                    <?php foreach($cat['cat_sub'] as $cat_sub) :?>
    							     	<option value="<? echo $cat_sub->catid;?>"><? echo $cat_sub->cat_name;?></option>
                                    <?php endforeach;?>
                                    <?
                                    }
                                    ?> 
    							</optgroup>
                            <?
                            }
                            else
                            {
                            ?>
                                <option value="<?=$cat['catid'];?>"><?=$cat['cat_name'];?></option>
                            <?
                            }
                            ?>
						   	<?php endforeach;?>
							 <?php endif;?>
							
					</select>
				</p>
			</div>
			<input type="submit" value="Search">
		</form>	                
		<p><strong>Tìm kiếm sản phẩm: </strong>Nhập tên sản phẩm vào ô search.</p>
	</div>
</div>