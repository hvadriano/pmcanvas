<script type="text/javascript" src="<?php echo base_url().'js/tinymce/jscripts/tiny_mce/tiny_mce.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'js/tinymce/jscripts/tiny_mce/plugins/tinybrowser/tb_tinymce.js.php'?>"></script>
	<script type="text/javascript">
		tinyMCE.init({
			// General options
			language : "pt",
			mode : "exact",
			elements : "<?php echo isset($ids)?$ids:"";?>",
			theme : "advanced",
			plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups",
	
			// Theme options
			theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,formatselect,fontsizeselect",
			theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo",
			theme_advanced_buttons3 : "link,unlink,anchor,image,cleanup,insertdate,inserttime,preview,|,forecolor,backcolor",
			theme_advanced_buttons4 : "",
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			theme_advanced_statusbar_location : "bottom",
			theme_advanced_resizing : true,
	
			// Example content CSS (should be your site CSS)
			content_css : "css/content.css",
	
			// Drop lists for link/image/media/template dialogs
			template_external_list_url : "lists/template_list.js",
			external_link_list_url : "lists/link_list.js",
			external_image_list_url : "lists/image_list.js",
			media_external_list_url : "lists/media_list.js",
		    file_browser_callback : "tinyBrowser",
			// Replace values for the template plugin
			template_replace_values : {
				username : "Some User",
				staffid : "991234"
			}
		});
	</script>