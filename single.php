<?php
get_header(); ?>

<?php get_template_part( 'entry-header-blog' ); ?>

<div class="container">
		<div id="primary" class="col-md-9">
			<div class="content-wrapper">

				<?php while ( have_posts() ) : the_post(); ?>
											
					<?php nox_set_post_views(get_the_ID()); // Fetch View Number ?>
					
					<?php //echo nox_get_post_views(get_the_ID()); // Show number ?>

					<?php get_template_part( 'content', 'single' ); ?>
					
					<nav id="nav-single">
						<span class="nav-previous"><?php previous_post_link( '%link','<span class="meta-nav">&larr;</span> Previous' ); ?></span>
						<span class="nav-next"><?php next_post_link( '%link', 'Next <span class="meta-nav">&rarr;</span>' ); ?></span>
					</nav><!-- #nav-single -->
					
					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->
<?php get_sidebar(); ?>
</div><!-- end of container-->
<?php get_footer(); ?>