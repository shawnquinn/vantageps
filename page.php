<?php
get_header(); ?>

<?php get_template_part( 'entry-header' ); ?>


<div id="def-column">
<div class="container">
	<div class="row">
		<div id="primary" class="col-md-9">
			<div class="content-wrapper">

				<?php get_template_part( 'loop-header' ); ?>

				<?php //get_template_part( 'entry-header-title' ); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->

		</div><!-- #primary -->
		<?php get_sidebar(); ?>
	</div><!-- .row -->
</div><!-- .container -->
</div><!-- end of default column -->

<?php get_footer(); ?>