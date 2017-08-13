<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * No-Posts Loop Content Template-Part File
 *
/**
 * If there are no posts in the loop,
 * display default content
 */ 
$title = ( is_search() ? sprintf(__('Your search for %s did not match any entries.', 'lumos' ), get_search_query() ) : __( '404 &#8212; Fancy meeting you here!', 'lumos' ) );
?>

<h1 class="title-404"><?php echo $title; ?></h1>
			
<p><?php _e( 'Don&#39;t panic, we&#39;ll get through this together. Let&#39;s explore our options here.', 'lumos' ); ?></p>
			
<h6><?php 
printf( __( 'You can return %s or search for the page you were looking for.', 'lumos' ),
	sprintf( '<a href="%1$s" title="%2$s">%3$s</a>',
		esc_url( get_home_url() ),
		esc_attr__( 'Home', 'lumos' ),
		esc_attr__( '&larr; Home', 'lumos' )
	) 
); 
?></h6>
			
<?php get_search_form(); ?>