<div id="product_page">
	<h3>
	
        <?php foreach($render_path as $key => $val) : ?>
         <a href="<?=$val;?>" style="padding-left: 5px;"> <?=$key;?>  &raquo; </a>
        <?php endforeach;?>
	</h3>
            
	<!--begin brief_product-->
    <?php if(!empty($pro_view)) :?>
	<div id="brief_product">
	
		<!--begin image_product-->
		<div id="image_product">
			<a rel="example_group" href="">
				<img  width="150" height="150" src="<?=base_url();?><?=$pro_view->p_image_thumb;?>" alt="">
			</a>
        </div>
		<!--end image_product-->
		
	
		<!--begin detail_product-->
		<div id="detail_product">
			<h1><?=$pro_view->p_name;?></h1>
			<p>Price: <? echo number_format($pro_view->gia);?></p>
			
			                            
			<div>
                <?=$pro_view->p_description;?>
				
			</div>
		</div>
		<!--end detail_product-->
		
	</div>
	<!--end brief_product-->
	
	<h2><strong>Details</strong></h2>
	
	<!--begin content_product-->
	<div id="content_product">
	<p>

		<?=$pro_view->p_detail;?>
	</p>
	</div>
	<!--end content_product-->
	<?php endif;?>
	
</div>
<div class="product_home" id="list_product">
	<h3><a>Sản phẩm tương tự</a></h3>
    <?php if(!empty($other_products)) : ?>
	<div>
		<ul>
            <?php foreach($other_products->result() as $pro) : ?>
			<li>
				<a href="<?=site_url('xem-san-pham/'. $pro->id .'-'. $pro->catid . '-' . $pro->p_name_alias);?>"><img  width="140" height="140" src="<?=base_url();?><?=$pro->p_image_thumb;?>" alt="<?=$pro->p_name;?>"></a>				                                
				<p>
					<a href=""><?=$pro->p_name;?> </a>
					<span><strong>Khuyến mại :</strong> <?=$pro->khuyenmai;?> </span>
					<span>Giá : <strong><? echo number_format($pro->gia);?></strong></span>
				</p>
				<a class="last-child" href="<?=site_url('xem-san-pham/'. $pro->id .'-'. $pro->catid . '-' . $pro->p_name_alias);?>">CHI TIẾT</a>	
			</li>
		    <?php endforeach;?>	
		</ul>
	</div>
    <?php else :?>
        <?php echo "Chưa có sản phẩm nào trong mục này";?>
	<?php endif;?>
</div>