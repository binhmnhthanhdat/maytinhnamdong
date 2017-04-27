<!--begin left_box-->
<div id="menu_cat" class="left_box">
	<h2>Danh mục sản phẩm</h2>
	<div>
        <?php if(!empty($cats)) :?>
		<ul>
            <?php foreach($cats as $cat) :?>
			<li><a href="<?=site_url('xem-danh-muc/' . $cat['catid'] . '-' . $cat['alias']);?>"><?=$cat['cat_name'];?> </a>
			<?php if(count($cat['cat_sub'])>0)
            {
            
            ?>
            	<div>
					<p></p>
					<ul>
                        <?php foreach($cat['cat_sub'] as $cat_sub) :?>
						<li><a href="<? echo  site_url('xem-danh-muc/' . $cat_sub->catid . '-' . $cat_sub->alias);?>"><? echo $cat_sub->cat_name;?></a></li>
                        <?php endforeach;?>
						
					</ul>
					<p class="last-child"></p>
				</div>
				<img src="<? echo base_url();?>/images/bullet_nav.png">
             <?
            }
            ?>   
			</li>
			<?php endforeach;?>
		</ul>
     <?php endif;?>
	</div>
</div>
<!--end left_box-->


<!--begin left_box-->
<div class="left_box" id="popular_product">
	<h2>Sản phầm nổi bật</h2>
    <? //print_r ($product_noibat);?>
    <?php if(!empty($product_noibat)) :?>
	<div>
        <?php foreach($product_noibat->result() as $kqproduct_noibat) :?>
        <? // print_r($kqproduct_noibat); ?>
		<dl>
			<dt>
				<a href="<? echo  site_url('xem-san-pham/' . $kqproduct_noibat->id. '-' . $kqproduct_noibat->catid. '-'. $kqproduct_noibat->p_name_alias);?>"><img  width="60" height="60" src="<? echo base_url();?><? echo  $kqproduct_noibat->p_image_thumb;?>" alt="<? echo  $kqproduct_noibat->p_name;?>"></a>
			</dt>
			<dd>
				<a href="<? echo  site_url('xem-san-pham/' . $kqproduct_noibat->id. '-'. $kqproduct_noibat->catid. '-' . $kqproduct_noibat->p_name_alias);?>"><? echo  $kqproduct_noibat->p_name;?> </a>
				<span>Giá: <strong>:<? echo number_format($kqproduct_noibat->gia);?> </strong></span>
				<span><strong><a href="<? echo  site_url('xem-san-pham/' . $kqproduct_noibat->id. '-'. $kqproduct_noibat->catid. '-' . $kqproduct_noibat->p_name_alias);?>">Chi tiết</a></strong></span>
			</dd>
		</dl>
		<?php endforeach;?>
										
	</div>
    <?php endif;?>
</div>
<!--end left_box-->