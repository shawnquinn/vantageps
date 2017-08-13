<?php
get_header(); ?>


	<?php get_template_part( 'entry-header' ); ?>

<div id="def-column">
	<div class="container">

		<section id="primary" class="col-md-9">
			<div class="content-wrapper">

			<?php if ( have_posts() ) : ?>
<header class="page-header">
				
				<header class="page-header">
					<h1 class="page-title-cat"><?php
						printf('Category Archives: %s', '<span>' . single_cat_title( '', false ) . '</span>' );
					?></h1>

					<?php
						$category_description = category_description();
						if ( ! empty( $category_description ) )
							echo apply_filters( 'category_archive_meta', '<div class="category-archive-meta">' . $category_description . '</div>' );
					?>
				</header>

				<?php ctw_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

<?php lumos_entry_before(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php lumos_entry_top(); ?>

				<?php get_template_part( 'post-meta' ); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						//get_template_part( 'content', get_post_format() );
						
						the_excerpt();
						
					?>
<hr>
				<?php endwhile; ?>

				<?php ctw_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
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
	</div><!-- .container -->
</div><!-- end of default column -->

<?php get_footer(); ?>
