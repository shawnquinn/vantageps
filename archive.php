<?php
get_header(); ?>


	<?php get_template_part( 'entry-header' ); ?>

<div id="def-column">
	<div class="container">

		<section id="primary" class="col-md-9">
			<div class="content-wrapper">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title">
						<?php if ( is_day() ) : ?>
							<?php printf('Daily Archives: %s', '<span>' . get_the_date() . '</span>' ); ?>
						<?php elseif ( is_month() ) : ?>
							<?php printf( 'Monthly Archives: %s', '<span>' . get_the_date( 'F Y') . '</span>' ); ?>
						<?php elseif ( is_year() ) : ?>
							<?php printf( 'Yearly Archives: %s', '<span>' . get_the_date( 'Y') . '</span>' ); ?>
						<?php else : ?>
                            Blog Archives
						<?php endif; ?>
					</h1>
				</header>

				<?php ctw_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
				
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

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

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title">Nothing Found</h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p>Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.</p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

			</div><!-- #content -->
		</section><!-- #primary -->
		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>