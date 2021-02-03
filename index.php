<?php
/*
Plugin Name: PDF Secure
Plugin URI: https://wordpress.org/plugins/pdf-secure/
Description: Secure pdf with html5lightbox by disabling download button, disable print button.
Version: 1.0
Author: ViitorCloud
Author URI: http://viitorcloud.com/
Text Domain: pdf-secure
*/


/*******************************************************************************
              Function for add script in footer 
******************************************************************************/

function load_pdf_disable_js() {
	wp_enqueue_script('jquery');
	?>
	<script>
		$(document).ready(function(){
			$(".html5lightbox").click(function(){
				setTimeout(function(){
					$("#html5-lightbox-box iframe").contents().find("#download, #print").remove();
					$("#html5-lightbox-box iframe").contents().find("#viewer").append('<style type="text/css" media="print">* { display: none; }</style>');
				},1000);
			});
		});
	</script>
	<?php
}
add_action( 'wp_footer', 'load_pdf_disable_js');
?>
