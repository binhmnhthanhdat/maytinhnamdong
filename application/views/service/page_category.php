<!--begin service-->
<div class="service_home">
	<h3>
	<?php foreach($render_path as $key => $val) : ?>
        <a href="<?=$val;?>"><?=$key;?> &raquo;</a> 
    <?php endforeach;?>
	</h3>
	<?php if(!empty($products) and count($products->result())>0) : ?>
	<div>
		<ul>
			<?php foreach($products->result() as $pro) : ?>
			<li>
				<a href="<?=site_url('xem-dich-vu/'. $pro->id .'-'. $pro->catid . '-' . $pro->p_name_alias);?>" class="title"><?=$pro->p_name;?> </a>
				<a href="<?=site_url('xem-dich-vu/'. $pro->id .'-'. $pro->catid . '-' . $pro->p_name_alias);?>" class="image">
				<img  src="<?=base_url();?><?=$pro->p_image_thumb;?>" alt="<?=$pro->p_name;?>"></a>				                                
				<div class="thongtin">
					<div class="name">Thông tin :</div>
					<div class="description">
						<?=$pro->p_description;?>
					</div>
					
				</div>
				<a class="last-child" href="<?=site_url('xem-dich-vu/'. $pro->id .'-'. $pro->catid . '-' . $pro->p_name_alias);?>">CHI TIẾT</a>	
			</li>
			<?php endforeach;?>
			
		</ul>
	</div>
	<?php else :?>
    <div style="padding: 20px;">
    <?php echo "Chưa có dịch vụ nào trong mục này";?>
    </div>
  <?php endif;?>   
</div>
<!--end service-->