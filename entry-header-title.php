<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Entry Header-Title
  *Template-Part File
 *
 * Globalize Theme Options
 */
global $lumos_options;
$lumos_options = lumos_get_options(); ?>

			<header class="entry-header">
						<?php if ( is_sticky() ) : ?>
							<hgroup>
								<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'lumos' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
								<h3 class="entry-format">Featured</h3>
							</hgroup>
						<?php elseif(is_singular()): ?>
			                <h1 class="entry-title">
			                    <?php the_title(); ?>
			                </h1>
			            <?php else:?>
			                <h1 class="entry-title">
<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyeleven' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>

			                </h1>
						<?php endif; ?>

						<?php if ( 'post' == get_post_type() ) : ?>
			                <div class="entry-meta">
			                    <!-- <?php// ctw_posted_on(); ?> -->
			                </div><!-- .entry-meta -->
						<?php endif; ?>

					</header><!-- .entry-header -->
