<?php
get_header(); ?>


<?php get_template_part( 'entry-header' ); ?>

<div class="wrapper-1024">
		<section id="primary">
			<div class="content-wrapper">

			<?php if ( have_posts() ) : ?>
                <h1>
                    <?php
						printf( 'Tag Archives: %s', '<span>' . single_tag_title( '', false ) . '</span>' );
					?>
                </h1>

				<?php ctw_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

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
						<p>Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.</p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

			</div><!-- #content -->
		</section><!-- #primary -->
		<?php get_sidebar(); ?>
		</div><!-- end of wrapper 1024 -->

<?php get_footer(); ?>
