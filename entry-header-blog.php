<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Entry Header Template-Part File
 *
/**
 * Globalize Theme Options
 */
global $lumos_options;
$lumos_options = lumos_get_options(); ?>

<div class="container-fluid">
	<div class="row">
	
	<?php 
		$content .= '';
			$content .= '<div class="bg-container" style="background-image: url('.get_template_directory_uri().'/img/contact-bg.jpg)"><div class="bg-overlay"><div class="container">';
			$content .= '<h1 class="entry-title">';
			$content .= 'Palm Desert Plastic Surgery Blog';
			$content .= '</h1>';
			$content .= '</div></div></div>';
	echo $content; ?>
	

	
	</div><!-- .row -->
</div><!-- container-fluid -->