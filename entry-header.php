<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Entry Header Template-Part File
 *
 * Globalize Theme Options
 */
global $lumos_options;
$lumos_options = lumos_get_options(); ?>

<div class="container-fluid">
	<div class="row">

	<?php if ( has_post_thumbnail() ) : ?>
	<?php $thumb_id = get_post_thumbnail_id();
			$thumb_url = wp_get_attachment_image_src($thumb_id,'full', true);
			$content .= '<div class="bg-container" style="background-image: url('.$thumb_url[0].')"><div class="bg-overlay"><div class="container">';
			$content .= '<h1 class="entry-title">';
			$content .= get_the_title();
			$content .= '</h1>';
			$content .= '</div></div></div>';
	echo $content; ?>

	<?php else : ?>

	<?php
			$content .= '<div class="bg-container" style="background-image: url('.get_template_directory_uri().'/img/bg-review.jpg)"><div class="bg-overlay"><div class="container">';
			$content .= '<h1 class="entry-title">';
			$content .= get_the_title();
			$content .= '</h1>';
			$content .= '</div></div></div>';
	echo $content; ?>

	<?php endif; ?>

	</div><!-- .row -->
</div><!-- container-fluid -->
