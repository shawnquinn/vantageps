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

<div class="bg-container" style="background-image: url(<?php wp_get_attachment_image_src(get_post_thumbnail_id(),'full', true) ?>)">
	<div class="wrapper">

	</div><!-- end of wrapper -->
</div> <!--end of bg-container -->