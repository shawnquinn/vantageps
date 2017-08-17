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
				<div class="col-md-8 col-lg-6 pt-5 mx-auto contact-info">
							<div class="row">
								<div class="col-12">
									<h3 class="featured-title text-center">Contact Us <span>Schedule Your Next Appointement</span></h3>
								</div>
							</div><!-- row -->
							<div class="row align-items-center">
							<div class="col-12">
								<address class="text-center">
									<span>Address:</span><br/>
									185 Montague St, 4th Floor | Brooklyn, NY 11201<br/><br/>
									<span>Phone:</span><br/>
									(347) 292-9877
								</address>
							</div>
						</div>
						<div class="row">
							<div class="col-12 px-0">
								<a href="<?php echo home_url(''); ?>">
									<img class="img-fluid d-block mx-auto" src="<?php echo get_template_directory_uri('/location/'); ?>/img/map.png" alt="Location" />
								</a>
							</div>
						</div>
				</div><!-- col -->
			</div><!-- row -->
		</div><!-- .container -->
	</section><!-- end section.contact -->

	<section class="social">
		<div class="container">
			<div class="row text-center">
				<div class="col-12">
					<h4 class="d-inline">Stay Connected:</h4>
					<?php
					echo '<ul class="social-icons text-center mt-4 mt-md-0">';
					if (!empty($lumos_options['facebook_uid'])) 		echo '<li><a target="_blank" class="icon-facebook" href="' . $lumos_options['facebook_uid'] . '">'.'</a></li>';
					if (!empty($lumos_options['twitter_uid'])) 			echo '<li><a target="_blank" class="icon-twitter" href="' . $lumos_options['twitter_uid'] . '">'.'</a></li>';
					if (!empty($lumos_options['google_plus_uid'])) 	echo '<li><a target="_blank" class="icon-google-plus" href="' . $lumos_options['google_plus_uid'] . '">'.'</a></li>';
					if (!empty($lumos_options['youtube_uid'])) 			echo '<li><a target="_blank" class="icon-youtube" href="' . $lumos_options['youtube_uid'] . '">'.'</a></li>';
					if (!empty($lumos_options['linkedin_uid'])) 		echo '<li><a target="_blank" class="icon-linkedin" href="' . $lumos_options['linkedin_uid'] . '">'.'</a></li>';
					if (!empty($lumos_options['yelp_uid'])) 				echo '<li><a target="_blank" class="icon-yelp" href="' . $lumos_options['yelp_uid'] . '">'.'</a></li>';
					if (!empty($lumos_options['blogger_uid'])) 			echo '<li><a target="_blank" class="icon-blogger" href="' . $lumos_options['blogger_uid'] . '">'.'</a></li>';
					if (!empty($lumos_options['instagram_uid'])) 		echo '<li><a target="_blank" class="icon-instagram" href="' . $lumos_options['instagram_uid'] . '">'.'</a></li>';
					if (!empty($lumos_options['foursquare_uid'])) 	echo '<li><a target="_blank" class="icon-foursquare" href="' . $lumos_options['foursquare_uid'] . '">'.'</a></li>';
					echo '</ul><!-- end of .social-icons -->';
					?>
				</div>
			</div>
		</div>
	</section>

</div><!-- #main -->

    <footer id="footer">
    <div id="footer-info">
        <div class="bottom">
            <div class="container">
	            <div class="row py-4">
		            <div id="footer-1" class="col-md-3 my-1 d-none d-md-block">
				        <h4>Quick Links</h4>
				        <nav id="footer-nav">
		                    <?php wp_nav_menu( array( 'theme_location' => 'footer-nav','menu_class' => 'nav')   ); ?>
		                </nav>
			        </div><!-- end of col-md-3 -->

			        <div id="footer-2" class="col-md-3 my-1 d-none d-md-block">
				        <h4>Services</h4>
						<nav id="footer-nav">
		                    <?php wp_nav_menu( array( 'theme_location' => 'footer-nav-2','menu_class' => 'nav')   ); ?>
		                </nav>
			        </div><!-- end of col-md-3 -->

			        <div id="footer-4" class="col-md-3 my-1 text-center text-md-left">
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

				        <div id="footer-4" class="col-md-3 my-1 text-center text-md-left">
									<h4>Contact Us</h4>
									<div class="row">
										<div class="col-12">
											<address>
											Vantage Plastic Surgery<br/>
											185 Montague Street, 4th Floor<br/>
											Brooklyn, NY 11201<br/>
											Phone: (347) 292-9877<br/>
											</address>
										</div><!-- col -->
									</div><!-- row -->
									<div class="row">
										<div class="footer-copyright col-12 text-center text-md-left">
	                  	<div class="col-12">
												<?php esc_attr_e('Copyright &copy;', 'lumos'); ?><?php _e(date('Y')); ?><a href="<?php echo home_url('/') ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>."> <?php bloginfo('name').esc_attr_e('.', 'lumos'); ?>
												</a>
												<?php esc_attr_e('All Rights Reserved.', 'lumos'); ?> <?php esc_attr_e('Designed by', 'lumos'); ?> <a href="http://creativetakemedical.com/" title="<?php echo esc_attr_e('CreativeTake Medical', 'lumos'); ?>" target="_blank">CreativeTake Web.</a>
	                  	</div>
	                  </div><!-- col -->
	                </div><!-- row -->
								</div>
	            </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .bottom -->

    </div><!-- .footer-info -->
</footer>

<?php wp_footer(); ?>

</body>
</html>
