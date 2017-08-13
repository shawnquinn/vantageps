<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Blog Template
 *
 * 
 */

get_header(); 

global $more; $more = 0; 
?>
<?php get_template_part( 'entry-header-blog' ); ?>

<div class="container">
	<div id="primary" class="col-md-9">
	<div id="content-blog" class="<?php echo implode( ' ', lumos_get_content_classes() ); ?>">
        
	<?php get_template_part( 'loop-header' ); ?>
        
	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
        	
			<?php lumos_entry_before(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>       
				<?php lumos_entry_top(); ?>
				
				<?php get_template_part( 'post-meta' ); ?>
				<div class="post-entry">
					
					<?php if ( has_post_thumbnail()) : ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
							<?php the_post_thumbnail(); ?>
						</a>
						
					<?php endif; ?>
			
					<?php the_excerpt(__('Read more &#8250;', 'lumos')); ?>
					<?php wp_link_pages(array('before' => '<div class="pagination">' . __('Pages:', 'lumos'), 'after' => '</div>')); ?>
				</div><!-- end of .post-entry -->
				
				<?php get_template_part( 'post-data' ); ?>
				               
				<?php lumos_entry_bottom(); ?>      
			</div><!-- end of #post-<?php the_ID(); ?> -->
			<hr />       
			<?php lumos_entry_after(); ?>
			
		<?php 
		endwhile; 

		get_template_part( 'loop-nav' ); 

	else : 

		get_template_part( 'loop-no-posts' ); 

	endif; 
	?>  
      
</div><!-- end of #content-blog -->
</div>
	<?php get_sidebar(); ?>
</div><!-- end of wrapper-1024 -->


<?php get_footer(); ?>