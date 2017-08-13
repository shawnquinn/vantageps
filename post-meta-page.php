<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Page Meta-Data Template-Part File
 *
 */
?>

<!-- <h1 class="post-title"><?php// the_title(); ?></h1> -->

<?php if ( comments_open() ) : ?>               
<div class="post-meta">
<?php lumos_post_meta_data(); ?>

<?php if ( comments_open() ) : ?>
		<span class="comments-link">
		<span class="mdash">&mdash;</span>
<?php comments_popup_link(__('No Comments &darr;', 'lumos'), __('1 Comment &darr;', 'lumos'), __('% Comments &darr;', 'lumos')); ?>
		</span>
<?php endif; ?> 
</div><!-- end of .post-meta -->
<?php endif; ?> 