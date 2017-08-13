<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Top Widget Template
 *
 */
?>
    <?php
        if (! is_active_sidebar('top-widget')
	    )
            return;
    ?>
	<?php lumos_widgets_before(); // above widgets container hook ?>
    <div id="top-widget" class="top-widget">
        <?php lumos_widgets(); // above widgets hook ?>
        
            <?php if (is_active_sidebar('top-widget')) : ?>
            
            <?php dynamic_sidebar('top-widget'); ?>

            <?php endif; //end of top-widget ?>

        <?php lumos_widgets_end(); // after widgets hook ?>
    </div><!-- end of #top-widget -->
	<?php lumos_widgets_after(); // after widgets container hook ?>