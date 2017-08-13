<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Loop Header Template-Part File
 *
/**
 * Globalize Theme Options
 */
global $lumos_options;
$lumos_options = lumos_get_options(); 

/**
 * Display breadcrumb
 */
if ( 0 == $lumos_options['breadcrumb'] ) :
	echo lumos_breadcrumb_lists();
endif; 

/**
 * Display archive information
 */

if ( is_category() || is_tag() || is_author() || is_date() ) {
	?>
	<h6 class="title-archive">
	
		<?php 
		if ( is_day() ) : 
			printf( __( 'Daily Archives: %s', 'lumos' ), '<span>' . get_the_date() . '</span>' ); 
		elseif ( is_month() ) : 
			printf( __( 'Monthly Archives: %s', 'lumos' ), '<span>' . get_the_date( 'F Y' ) . '</span>' ); 
		elseif ( is_year() ) : 
			printf( __( 'Yearly Archives: %s', 'lumos' ), '<span>' . get_the_date( 'Y' ) . '</span>' ); 
		else : 
			_e( 'Blog Archives', 'lumos' ); 
		endif; 
		?>
	</h6>
	<?php
}