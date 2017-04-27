<!--begin product_home-->
<?php if(!empty($categorys)) : ?>
<?php foreach($categorys as $cat) : ?>
<div class="product_home">

	<h3><a href="<?=site_url('xem-danh-muc/' . $cat->catid . '-' . $cat->alias);?>" title="<?=$cat->cat_name;?>"><?=$cat->cat_name;?></a></h3>
	<div>
         <?php if(!empty($product_categorys[$cat->catid])) : ?>
		<ul>
            <?php foreach($product_categorys[$cat->catid] as $pro) : ?>
			<li>
				<a href="<?=site_url('xem-san-pham/'. $pro->id .'-'. $pro->catid .'-' . $pro->p_name_alias);?>"><img style="margin-top: 13px" width="140" height="135" src="<?=base_url();?><?=$pro->p_image_thumb;?>" alt="<?=$pro->p_name;?>" ></a>				                                
				<p>
					<a href="<?=site_url('xem-san-pham/'. $pro->id .'-'. $pro->catid .'-' . $pro->p_name_alias);?>"><?=$pro->p_name;?></a>
					<span><strong>Khuyến mại :</strong> <?=$pro->khuyenmai;?></span><br>
					<span>Giá : <strong>  <?  echo number_format($pro->gia); ?></strong></span>
				</p>
				<a class="last-child" href="<?=site_url('xem-san-pham/'. $pro->id .'-'. $pro->catid .'-' . $pro->p_name_alias);?>">CHI TIẾT</a>	
			</li>
			<?php endforeach;?>
			
		</ul>
        <?php else :?>
            <?php echo "Chưa có sản phẩm nào trong mục này";?>
		<?php endif;?>
	</div>

</div>
<?php endforeach;?>

<?php endif;?>
<!--begin service-->

<?php if(!empty($categorys_service)) : ?>
<?php foreach($categorys_service as $cat) : ?>
<div class="service_home">
	<h3><a href="<?=site_url('xem-danh-muc/' . $cat->catid . '-' . $cat->alias);?>" title="<?=$cat->cat_name;?>"><?=$cat->cat_name;?></a></h3>
	<div>
        <?php if(!empty($service_categorys[$cat->catid])) : ?>
		<ul>
        <?php foreach($service_categorys[$cat->catid] as $pro) : ?>
			<li>
				<a href="<?=site_url('xem-san-pham/'. $pro->id .'-'. $pro->catid .'-' . $pro->p_name_alias);?>" class="title"><?=$pro->p_name;?> </a>
				<a href="<?=site_url('xem-san-pham/'. $pro->id .'-'. $pro->catid .'-' . $pro->p_name_alias);?>" class="image">
				<img  src="<?=base_url();?><?=$pro->p_image_thumb;?>" alt="<?=$pro->p_name;?>"></a>				                                
				<div class="thongtin">
					<div class="name">Thông tin :</div>
					<div class="description">
						<?=$pro->p_description;?>
					</div>
					
				</div>
				<a class="last-child" href="<?=site_url('xem-san-pham/'. $pro->id .'-'. $pro->catid .'-' . $pro->p_name_alias);?>">CHI TIẾT</a>	
			</li>
			
		<?php endforeach;?>	
		</ul>
        <?php else :?>
            <?php echo "Chưa có dịch vụ  nào trong mục này";?>
		<?php endif;?>
	</div>
</div>
<!--end service-->
<?php endforeach;?>

<?php endif;?>


<!--begin product_page-->
<?php if(!empty($cats_news)) : ?>
<?php foreach($cats_news as $kqcats_news) : ?>
<div style="clear: both;"></div>
<div id="" class="news_home">
	<h3><a><? echo $kqcats_news->name;?></a></h3>
	<!--begin listnews_page-->
	<div id="listnews_page">
        <?php foreach($cats_news_list[$kqcats_news->id] as $new) : ?>
		<dl>
			<dt><a href="<?=site_url('xem-tin/' . $new->id .'-'. $this->util->alias($new->title));?>"><img width="140" height="100" src="<?=base_url();?><?=$new->image;?>" alt="<?=$new->title;?>"></a></dt>
			<dd>
				<h4><a href="<?=site_url('xem-tin/' . $new->id .'-'. $this->util->alias($new->title));?>"><?=$new->title;?></a></h4>
                <p><?=word_limiter($new->intro, 150);?></p>

			</dd>
		</dl>
        <?php endforeach;?>
	
	</div>
	<!--end listnews_page-->
</div>
<?php endforeach;?>
<?php endif;?>
<!--end product_page-->