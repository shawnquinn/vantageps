<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
* Footer
*/
global $lumos_options;
$lumos_options = lumos_get_options();
?>

<section id="px-3" class="contact">
		<div class="container">

			<div class="row align-items-center">

				<div class="col-md-6 contact-info">

							<div class="row">
								<div class="col-12">
									<h3 class="featured-title">Contact Us</h3>
								</div>
							</div><!-- row -->
							<div class="row align-items-center">
							<div class="col-sm-6 hidden-xs-down">
								<a href="<?php echo home_url(); ?>">
									<img class="img-fluid d-block mx-auto" src="<?php echo get_template_directory_uri('/location/'); ?>/img/map.png" alt="Location" />
								</a>
							</div>
							<div class="col-sm-6">
								<address class="text-center text-md-left">
									<span class="text-uppercase">United<br/>
									Surgical<br/>
									Associates</span><br/>
									123 Street Name<br/>
									Rancho Mirage, CA 12345<br/><br/>
									Tel: (760) 123-4567<br/>
									Fax: (760) 234-5678
								</address>

								<?php // First let's check if any of this was set

								echo '<ul class="social-icons text-center text-md-left d-block py-4">';
								if (!empty($lumos_options['facebook_uid'])) echo '<li><a target="_blank" class="icon-facebook" href="' . $lumos_options['facebook_uid'] . '">'.'</a></li>';
								if (!empty($lumos_options['twitter_uid'])) echo '<li><a target="_blank" class="icon-twitter" href="' . $lumos_options['twitter_uid'] . '">'.'</a></li>';
								if (!empty($lumos_options['google_plus_uid'])) echo '<li><a target="_blank" class="icon-google-plus" href="' . $lumos_options['google_plus_uid'] . '">'.'</a></li>';
								if (!empty($lumos_options['youtube_uid'])) echo '<li><a target="_blank" class="icon-youtube" href="' . $lumos_options['youtube_uid'] . '">'.'</a></li>';
								if (!empty($lumos_options['linkedin_uid'])) echo '<li><a target="_blank" class="icon-linkedin" href="' . $lumos_options['linkedin_uid'] . '">'.'</a></li>';
								if (!empty($lumos_options['yelp_uid'])) echo '<li><a target="_blank" class="icon-yelp" href="' . $lumos_options['yelp_uid'] . '">'.'</a></li>';
								if (!empty($lumos_options['blogger_uid'])) echo '<li><a target="_blank" class="icon-blogger" href="' . $lumos_options['blogger_uid'] . '">'.'</a></li>';
								if (!empty($lumos_options['instagram_uid'])) echo '<li><a target="_blank" class="icon-instagram" href="' . $lumos_options['instagram_uid'] . '">'.'</a></li>';
								if (!empty($lumos_options['foursquare_uid'])) echo '<li><a target="_blank" class="icon-foursquare" href="' . $lumos_options['foursquare_uid'] . '">'.'</a></li>';

								echo '</ul><!-- end of .social-icons -->';
								?>
							</div>
						</div>
				</div><!-- col -->

				<div class="col-md-6 widget">
					<?php echo do_shortcode('[contact-form-7 id="26" title="Footer"]') ?>
				</div>

			</div><!-- row -->
		</div><!-- .container -->
	</section><!-- end section.contact -->

</div><!-- #main -->

    <footer id="footer">
    <div id="footer-info">

        <div class="bottom">
            <div class="container">
	            <div class="row py-4">
		            <div id="footer-1" class="col-md-3 my-1 hidden-sm-down">
				        <h4>Quick Links</h4>
				        <nav id="footer-nav">
		                    <?php wp_nav_menu( array( 'theme_location' => 'footer-nav','menu_class' => 'nav')   ); ?>
		                </nav>
			        </div><!-- end of col-md-3 -->

			        <div id="footer-2" class="col-md-3 my-1 hidden-sm-down">
				        <h4>Services</h4>
						<nav id="footer-nav">
		                    <?php wp_nav_menu( array( 'theme_location' => 'footer-nav-2','menu_class' => 'nav')   ); ?>
		                </nav>
			        </div><!-- end of col-md-3 -->

			        <div id="footer-4" class="col-md-3 my-1">
				        <h4>Connect</h4>
				        <?php // First let's check if any of this was set

								echo '<ul class="social-icons text-xs-center text-md-left">';
								if (!empty($lumos_options['facebook_uid'])) echo '<li><a target="_blank" class="icon-facebook" href="' . $lumos_options['facebook_uid'] . '">'.'</a></li>';
								if (!empty($lumos_options['twitter_uid'])) echo '<li><a target="_blank" class="icon-twitter" href="' . $lumos_options['twitter_uid'] . '">'.'</a></li>';
								if (!empty($lumos_options['google_plus_uid'])) echo '<li><a target="_blank" class="icon-google-plus" href="' . $lumos_options['google_plus_uid'] . '">'.'</a></li>';
								if (!empty($lumos_options['youtube_uid'])) echo '<li><a target="_blank" class="icon-youtube" href="' . $lumos_options['youtube_uid'] . '">'.'</a></li>';
								if (!empty($lumos_options['linkedin_uid'])) echo '<li><a target="_blank" class="icon-linkedin" href="' . $lumos_options['linkedin_uid'] . '">'.'</a></li>';
								if (!empty($lumos_options['yelp_uid'])) echo '<li><a target="_blank" class="icon-yelp" href="' . $lumos_options['yelp_uid'] . '">'.'</a></li>';
								if (!empty($lumos_options['blogger_uid'])) echo '<li><a target="_blank" class="icon-blogger" href="' . $lumos_options['blogger_uid'] . '">'.'</a></li>';
								if (!empty($lumos_options['instagram_uid'])) echo '<li><a target="_blank" class="icon-instagram" href="' . $lumos_options['instagram_uid'] . '">'.'</a></li>';
								if (!empty($lumos_options['foursquare_uid'])) echo '<li><a target="_blank" class="icon-foursquare" href="' . $lumos_options['foursquare_uid'] . '">'.'</a></li>';

								echo '</ul><!-- end of .social-icons -->';
								?>

			        </div><!-- footer-4 -->



			        <div id="footer-4" class="col-md-3 my-1">
						<h4>Contact Us</h4>
						<div class="row">
							<div class="col-12">
								<address>
								123 Street Name<br/>
								Rancho Mirage, CA 12345
								Tel: (760) 123-4567
								</address>
							</div><!-- col -->
						</div><!-- row -->



			        </div><!-- .col-md-3 -->



	            </div><!-- .row -->

            </div><!-- .container -->
        </div><!-- .bottom -->
        <div class="footer-copyright">
                    <div class="container">
	                    <div class="row py-3">
	                    	<div class="col-12">
		                    	<?php esc_attr_e('Copyright &copy;', 'lumos'); ?><?php _e(date('Y')); ?><a href="<?php echo home_url('/') ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>."> <?php bloginfo('name').esc_attr_e('.', 'lumos'); ?>
													</a>
													<?php esc_attr_e('All Rights Reserved.', 'lumos'); ?> <?php esc_attr_e('Designed by', 'lumos'); ?> <a href="http://creativetakemedical.com/" title="<?php echo esc_attr_e('CreativeTake Medical', 'lumos'); ?>" target="_blank">CreativeTake Web.</a>
	                    	</div><!-- col -->
	                    </div><!-- row -->
                    </div><!-- container -->
        </div><!-- end of footer-copyright -->
    </div><!-- .footer-info -->
</footer>

<?php wp_footer(); ?>

</body>
</html>
