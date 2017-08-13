<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Loop Navigation Template-Part File
 *
/**
 * Output Prev/Next Posts Links
 */
if (  $wp_query->max_num_pages > 1 ) : 
	?>

	<div class="navigation">
		<div class="previous"><?php next_posts_link( __( '&#8249; Older posts', 'lumos' ) ); ?></div>
		<div class="next"><?php previous_posts_link( __( 'Newer posts &#8250;', 'lumos' ) ); ?></div>
	</div><!-- end of .navigation -->

	<?php 
endif;