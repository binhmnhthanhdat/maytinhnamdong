<div style="float:left; width:750px;">
                <div class="breadcrumb" style="padding:5px 0px 5px 30px;">
                        <?php foreach($breabcrumb as $key => $val) : ?>
                        <a href="<?=$val;?>"><?=$key;?></a> &raquo; 
                        <?php endforeach;?>
                </div><!--End Breadcrumb-->
                    <h2><?=$title_name;?></h2>
                               		
                    <div id="div_750">
                        <h1>Bài viết trong danh mục "<?=$title_name;?>"</h1>
                        <div id="show_product">
                        	<div id="div_product" style="padding-left:35px;">
                        	<?php if($product_category->result() !='') { ?>
							<?php $i=1;?>
                            <?php foreach($product_category->result() as $row) : ?>
                            
                        	<div class="box_p">
                        	<div class="image_p">
							<?php if($hinh = $this->product->get_1_image($row->id)) { ?>
                            <img src="<?=base_url();?><?=$hinh;?>" />
                            <?php } else { ?>
                             <img src="<?=base_url();?>layout/images/no_images.jpg" />
                             <?php } ?>
                            </div>
                            <div class="title_p">
                            <a href="<?=site_url('product/view/'.$row->id.'/'.$row->category_id.'/'.$row->alias);?>" title="<?=$row->title;?>"><?=$row->title;?></a>
                            </div>
                            <div class="title_p">
                            	<span>
                                	<a href="<?=site_url('product/province/'.$row->province_id.'/'.$this->tinh->get_name_alias($row->province_id));?>">Phạm vị: <?php echo $this->tinh->get_name($row->province_id);?></a>
                                </span><br />
                                <span>
                                	<a href="<?=site_url('product/type/'.$row->article_type.'/'.$this->type->get_name_alias($row->article_type));?>">Loại tin: <?php echo $this->type->get_name($row->article_type);?></a>
                                </span>
                              </div>
                            <div class="price_p">
								<?=number_format($row->price,0,'','.');?> VNĐ
                            </div>
                        </div>
						<?php if($i%4 == 0) echo '</div><div class="clear"></div><div id="div_product" style="padding-left:35px;">'; ?>
                        <?php $i++;?>
						<?php endforeach;?>
                    <?php } else { ?>
                    	<?php echo "Chưa có bài viết nào"; ?>
                    <?php } ?>
                        </div> <!--End show product-->
                      </div>
            		</div><!--End show product in danh muc-->
             <?php if($page) : ?>		
            <div class="pagination">
             <?php echo $page; ?>
            </div>
            <?php endif;?>       
            </div>
            
    	    <div id="right_col">
        	
            <div class="advs_left">
                <ul>
                    <li><a href="#"><img src="<?=base_url();?>layout/images/adv/advs_left.jpg" border="0" /></a></li>
                    <li><a href="#"><img src="<?=base_url();?>layout/images/adv/advs_left.jpg" border="0" /></a></li>
                    
                </ul>
        	</div><!--End advs_right-->
            
        </div><!--End right_col-->
<!--
 <script type="text/javascript">
 	function go_search() {
		var _tinh = $('#province').val();
		var _type = $('#article_type').val();
		
		window.location.href = '<? //=$url_current;?>/?province=' + _tinh + '&type=' + _type;
	}
 </script>
 -->