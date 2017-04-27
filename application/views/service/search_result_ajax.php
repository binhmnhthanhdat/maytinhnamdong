					<?php if(!empty($products)) : ?>
                        <div style="float:left; margin-bottom:10px;">
							<?php $i = 1;?>
                            <?php foreach($products->result() as $pro) : ?>
                            <?php $i++;?>
                                <div class="box_pro">
                                    <div class="pro_title"><a href="<?=site_url('xem-san-pham/'. $pro->id .'-'. $pro->p_name_alias);?>" title="<?=$pro->p_name;?>"><?=$pro->p_name;?></a></div>
                                    <div class="pro_image"><img src="<?=base_url();?><?=$pro->p_image_thumb;?>"/></div>
                                    <div class="pro_cart_detail"><a href="<?=site_url('mua-hang');?>" title="Mua hang">Mua hàng</a> | <a href="<?=site_url('xem-san-pham/'. $pro->id .'-'. $pro->catid . '-' . $pro->p_name_alias);?>" title="Chi tiết sản phẩm">Chi tiết</a></div>
                                </div>
                            <?php if($i%5 == 0) : ?>
                            </div><div style="float:left; margin-bottom:10px;">
                            <?php endif;?>
                            <?php endforeach;?>
                        </div>
                        <?php else :?>
                        <?php echo "Chưa có sản phẩm nào trong mục này";?>
                        <?php endif;?>
                        
                        <?php if(!empty($page)) :?>
                           <div class="pagination">
                                <div class="link">
                                    <?php echo $page;?>
                                </div>
                            </div><!--End pagination--> 
                     <?php endif;?>     