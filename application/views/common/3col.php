<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0022)http://xaignavong.com/ -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $this->site_title;?></title>
<meta name="keywords" content="<?php echo $this->meta_key;?>" />
<meta name="description" content="<?php echo $this->meta_desc;?>" />
<link type="text/css" rel="stylesheet" href="<? echo base_url();?>css/general.css">
<link type="text/css" rel="stylesheet" href="<? echo base_url();?>css/layout.css">
<!-- Scripts -->
<link rel="stylesheet" type="text/css" href="<? echo base_url();?>css/presentationCycle.css" />
 <?php 
$sql="select * from setting ";	
$setting= $this->db->query($sql);
$kqsetting=$setting->row();
 ?>
   
    <script type='text/javascript' src='<? echo base_url();?>js/jquery.js'></script>
    <script type='text/javascript' src='<? echo base_url();?>js/jquery.cycle.all.min.js'></script>
    <script type='text/javascript' src='<? echo base_url();?>js/presentationCycle.js'></script>
    <script type='text/javascript' src='<? echo base_url();?>js/jlib.js'></script>
    <script type="text/javascript">
                      $(function () {
                          $("#br_list").jCarouselLite({
                              btnNext: "#tab_b1 .next",
                              btnPrev: "#tab_b1 .prev",
                              visible: 5,
                              scroll: 1,
                              auto: 3000,
                              speed: 800
                          })
                      });
    </script>
<body>

<!--begin container-->
<div id="container">
    <!--begin menu_top-->
	<div id="menu_top">
		<p><? echo $kqsetting->site_name;?></p>
		<div>
			<ul>
			</ul>
			<p>
			
				<a href="mailto:<? echo $kqsetting->google_analytics; ?>" id="email_topmenu">Email</a>
			</p>
		</div>
	</div>
    <!--end menu_top-->
    <!--begin header-->
	<div id="header">
		<?php echo $header;?>
	</div>
	<!--end header-->
    <!--begin box_menu-->
    <div id="box_menu">
        <?php echo $menu;?>
    </div>	<div style="clear:both"></div>
	<!--end box_menu-->
    <?php echo $banner;?>    
	
	<div id="content_page">
	
      <!--begin left_page-->
		<div id="left_page">
			<?php echo $left;?>
		</div>
		<!--end left_page-->
		
		
		<!--begin right_page-->
		<div id="right_page">
			<? echo $content; ?>
		</div>
		<!--end right_page-->
		
	</div>
    <!--end content_page-->   
	<div style="clear:both"></div>	
	<?php echo $footer;?>
  
  </body>
  </html>