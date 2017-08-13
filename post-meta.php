<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Post Meta-Data Template-Part File
 *
 */
?>

<h4 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'lumos'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h4>

<div class="post-meta">
<?php lumos_post_meta_data(); ?>

	<?php if ( comments_open() ) : ?>
		<span class="comments-link">
		<span class="mdash">&mdash;</span>
	<?php comments_popup_link(__('No Comments &darr;', 'lumos'), __('1 Comment &darr;', 'lumos'), __('% Comments &darr;', 'lumos')); ?>
		</span>
	<?php endif; ?> 
</div><!-- end of .post-meta -->