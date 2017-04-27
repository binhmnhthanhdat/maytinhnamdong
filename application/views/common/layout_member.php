<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo $this->meta_key;?>" />
<meta name="description" content="<?php echo $this->meta_desc;?>" />
<title><?php echo $this->site_title;?></title>
<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>layout/css/layout_index.css" />
<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>divbox_2/css/divbox.css" media="screen" />
<script type="text/javascript" src="<?php echo base_url();?>layout/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>layout/js/jquery-ticket.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>divbox_2/divbox.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>layout/js/scrolltop.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>layout/js/choqng.js"></script>
<script type="text/javascript" src="<?=base_url();?>tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	var index_url = '<?=$this->index;?>';
</script>
<script language="javascript" type="text/javascript">
tinyMCE.init ({
mode: "exact",
elements: "hung_den",
theme: "simple"
});   	

tinyMCE.init({
		// General options
		mode : "exact",
		elements : "cai_gi",
		theme : "advanced",
		skin : "o2k7",
		relative_urls : false,
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave",

		// Theme options
        theme_advanced_buttons1 : "bold,italic,underline,strikethrough,pasteword,bullist,numlist,|,justifyleft,justifycenter,justifyright,justifyfull,|,fontselect,fontsizeselect,forecolor,backcolor,|,undo,redo,|,link,unlink,anchor",
        theme_advanced_buttons2 : "tablecontrols,|,hr,removeformat,|,emotions,image,|,fullscreen,preview",
        theme_advanced_buttons3 : "",
        theme_advanced_buttons4 : "",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : true,
		//file_browser_callback: "ajaxfilemanager",

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
		});
    
    	function ajaxfilemanager(field_name, url, type, win) {
			var ajaxfilemanagerurl = "<?=base_url();?>tinymce/jscripts/tiny_mce/plugins/ajaxfilemanager/ajaxfilemanager.php";
			switch (type) {
				case "image":
					break;
				case "media":
					break;
				case "flash": 
					break;
				case "file":
					break;
				default:
					return false;
			}
            tinyMCE.activeEditor.windowManager.open({
                url: "<?=base_url();?>tinymce/jscripts/tiny_mce/plugins/ajaxfilemanager/ajaxfilemanager.php",
                width: 782,
                height: 400,
                inline : "yes",
                close_previous : "no"
            },{
                window : win,
                input : field_name
            });
            
			/* return false;			
			var fileBrowserWindow = new Array();
			fileBrowserWindow["file"] = ajaxfilemanagerurl;
			fileBrowserWindow["title"] = "Ajax File Manager";
			fileBrowserWindow["width"] = "782";
			fileBrowserWindow["height"] = "440";
			fileBrowserWindow["close_previous"] = "no";
			tinyMCE.openWindow(fileBrowserWindow, {
			  window : win,
			  input : field_name,
			  resizable : "yes",
			  inline : "yes",
			  editor_id : tinyMCE.getWindowArg("editor_id")
			});
			
			return false;*/
			}
    
</script>
<style type="text/css">
	body {behavior: url(/layout/css/fix_hover.htc);}
</style>
</head>
<body>

<div id="wrapper">
	<?php echo $header;?>
    
    <div id="container">
        <?php echo $content;?>
    </div><!--End #container-->
    <div class="clear"></div>
    <?php echo $footer;?>
    
</div><!--End #wrapper-->

</body>
</html>