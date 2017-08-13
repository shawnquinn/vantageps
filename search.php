<?php
get_header(); ?>

		<div class="container">
		<section id="primary" class="col-md-9">
			<div class="content-wrapper">

			<?php if ( have_posts() ) : ?>
                <h1 class="page-title"><?php printf( 'Search Results for: %s','<span>' . get_search_query() . '</span>' ); ?></h1>

				<?php ctw_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<h4 class="page-title"><?php echo get_the_title(); ?></h4>
					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
					?>

				<?php endwhile; ?>

				<?php ctw_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<article id="post-0" class="post not-found">
					<h1 class="entry-title">Nothing Found</h1>
					<div class="entry-content">
						<pSorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

			</div><!-- #content -->
		</section><!-- #primary -->
		
		<?php get_sidebar(); ?>

<?php get_footer(); ?>