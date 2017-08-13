<?php
/**
 * Template Name: One Column Page
 */
get_header(); ?>

<?php get_template_part( 'entry-header' ); ?>

    <div id="one-column">
	    <div class="container">
			<div class="row">
				<div id="primary" class="col-md-12">
					<div class="content-wrapper">
		
						<?php get_template_part( 'loop-header' ); ?>
		
						<?php //get_template_part( 'entry-header-title' ); ?>
		
						<?php while ( have_posts() ) : the_post(); ?>
		
							<?php get_template_part( 'content', 'page' ); ?>
		
							<?php comments_template( '', true ); ?>
		
						<?php endwhile; // end of the loop. ?>
		
					</div><!-- #content -->
				</div><!-- #primary -->
			</div><!-- .row -->
	    </div><!-- .container -->
    </div><!-- #one-column -->
<?php get_footer(); ?>