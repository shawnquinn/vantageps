<?php
get_header(); ?>
<?php get_sidebar(); ?>

		<div id="primary">
			<div class="content-wrapper">

			<?php if ( have_posts() ) : ?>

				<?php ctw_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', get_post_format() ); ?>

				<?php endwhile; ?>

				<?php ctw_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<article id="post-0" class="post not-found">
					<h1 class="entry-title">Nothing Found</h1>
					<div class="entry-content">
						<p>Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.</p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

			</div>
		</div><!-- #primary -->

<?php get_footer(); ?>