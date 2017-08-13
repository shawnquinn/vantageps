<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Post Data Template-Part File
 *
 */
?>

<?php if ( ! is_page() && ! is_search() ) { ?>

	<div class="post-data">
		<?php the_tags(__('Tagged with:', 'lumos') . ' ', ', ', '<br />'); ?> 
		<?php printf(__('Posted in %s', 'lumos'), get_the_category_list(', ')); ?> 
	</div><!-- end of .post-data --> 
 
<?php } ?>           

<div class="post-edit"><?php edit_post_link(__('Edit', 'lumos')); ?></div>  