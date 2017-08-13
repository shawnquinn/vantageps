<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;
/**
* Site Front Page
******************
* Globalize Theme Options
*/
global $lumos_options;
$lumos_options = lumos_get_options();
/**
* If front page is set to display the
* blog posts index, include home.php;
* otherwise, display static front page
* content
*/
if ( 'posts' == get_option( 'show_on_front' ) && $lumos_options['front_page'] != 1 ) {
get_template_part( 'home' );
} elseif ( 'page' == get_option( 'show_on_front' ) && $lumos_options['front_page'] != 1 ) {
$template = get_post_meta( get_option( 'page_on_front' ), '_wp_page_template', true );
$template = ( $template == 'default' ) ? 'index.php' : $template;
locate_template( $template, true );
} else {
get_header();
//test for first install no database
$db = get_option( 'lumos_theme_options' );
//test if all options are empty so we can display default text if they are
$empty = ( empty( $lumos_options['home_headline'] ) && empty( $lumos_options['home_subheadline'] ) && empty( $lumos_options['home_content_area'] ) ) ? false : true;
?>
<section class="slider">

  <div class="boxed">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-5">
          <div id="logo" >
				      <h1>
				        <a href="<?php echo home_url('/'); ?>">
				          <img class="img-fluid d-block mx-auto" src="<?php header_image(); ?>" width="<?php if (function_exists('get_custom_header')) {
                      echo get_custom_header() -> width;
                  } else {
                      echo HEADER_IMAGE_WIDTH;
                  } ?>" height="<?php if (function_exists('get_custom_header')) {
                      echo get_custom_header() -> height;
                  } else {
                      echo HEADER_IMAGE_HEIGHT;
                  } ?>" alt="<?php bloginfo('name'); ?>" />
				        </a>
				      </h1>
				    </div><!-- end of #logo -->

            <div class="row">
              <div class="col-md-6"><a href="tel:+1-347-292-9877" class="btn btn-block btn-primary">(347) 292-9877</a></div>
              <div class="col-md-6"><a href="<?php echo home_url('/contact-us/'); ?>" class="btn btn-block btn-primary">Book Online</a></div>
            </div>
        </div>
        <!-- col -->
      </div>
      <!-- row -->
    </div>
    <!-- container -->
  </div>
  <!-- boxed -->

  <ul class="bx-slider">
    <li id="one"></li>
  </ul>
  <!-- bx-slider -->
</section>
<!--end of .slider -->
<section class="home-content">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="row services">
          <div class="col-md-6 mb-4"><a href="<?php echo home_url('//'); ?>">
            <h3>Body</h3>
            <div class="box-overlay"></div>
            <img class="img-fluid d-block mx-auto" src="<?php echo get_template_directory_uri(); ?>/img/services/s-1.jpg" alt="Face">
            </a>
            </div>
          <div class="col-md-6 mb-4"><a href="<?php echo home_url('//'); ?>">
            <h3>Breast</h3>
            <div class="box-overlay"></div>
            <img class="img-fluid d-block mx-auto" src="<?php echo get_template_directory_uri(); ?>/img/services/s-2.jpg" alt="Breast">
            </a>
          </div>
          <div class="col-md-6 mb-4"><a href="<?php echo home_url('//'); ?>">
            <h3>Body</h3>
            <div class="box-overlay"></div>
            <img class="img-fluid d-block mx-auto" src="<?php echo get_template_directory_uri(); ?>/img/services/s-3.jpg" alt="Body">
            </a>
          </div>
          <div class="col-md-6 mb-4"><a href="<?php echo home_url('//'); ?>">
            <h3>Non-Invasive</h3>
            <div class="box-overlay"></div>
            <img class="img-fluid d-block mx-auto" src="<?php echo get_template_directory_uri(); ?>/img/services/s-4.jpg" alt="Non-Invasive">
            </a>
          </div>
        </div>
        </div>

      <div id="primary" class="col-md-6">
        <div id="content">
          <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); ?>
          <?php get_template_part( 'loop-header' ); ?>
          <?php lumos_entry_before(); ?>
          <div id="post-<?php the_ID(); ?>"
               <?php post_class(); ?> >
          <?php lumos_entry_top(); ?>
          <?php //get_template_part( 'post-meta-page' ); ?>
          <div class="post-entry">
            <?php the_content(__('Read more &#8250;', 'lumos')); ?>
            <?php wp_link_pages(array('before' => '<div class="pagination">' . __('Pages:', 'lumos'), 'after' => '</div>')); ?>
          </div>
          <!-- end of .post-entry -->
          <?php get_template_part( 'post-data' ); ?>
          <?php lumos_entry_bottom(); ?>
        </div>
        <!-- end of #post--->
        <?php
  		endwhile;
  		get_template_part( 'loop-nav' );
  		else :
  		get_template_part( 'loop-no-posts' );
  		endif;
  		?>
      </div>
      <!-- end of #content -->
    </div>
    <!-- end of primary -->
    </div>
  </div>
<!-- .container -->
</section>
<!-- section.home-content -->

<section id="px-1" class="services">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-6">
        <div class="box">
          <a href="<?php echo home_url('//'); ?>">
            <h4>Laparoscopic <br />Surgery</h4>
          </a>
          <div class="hover-arrow">
            <span class="fa-stack fa-lg">
              <i class="fa fa-circle fa-stack-2x fa-inverse"></i>
              <i class="fa fa-angle-right fa-stack-1x"></i>
            </span>
          </div>
          <!-- hover arrow -->
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="box">
          <a href="<?php echo home_url('//'); ?>">
            <h4>Colon/Rectal <br />Surgery</h4>
          </a>
          <div class="hover-arrow">
            <span class="fa-stack fa-lg">
              <i class="fa fa-circle fa-stack-2x fa-inverse"></i>
              <i class="fa fa-angle-right fa-stack-1x"></i>
            </span>
          </div>
          <!-- hover arrow -->
      </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="box">
          <a href="<?php echo home_url('//'); ?>">
            <h4>General <br />Surgery</h4>
          </a>
          <div class="hover-arrow">
            <span class="fa-stack fa-lg">
              <i class="fa fa-circle fa-stack-2x fa-inverse"></i>
              <i class="fa fa-angle-right fa-stack-1x"></i>
            </span>
          </div>
          <!-- hover arrow -->
      </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="box">
          <a href="<?php echo home_url('//'); ?>">
            <h4>Breast<br />Surgery</h4>
          </a>
          <div class="hover-arrow">
            <span class="fa-stack fa-lg">
              <i class="fa fa-circle fa-stack-2x fa-inverse"></i>
              <i class="fa fa-angle-right fa-stack-1x"></i>
            </span>
          </div>
          <!-- hover arrow -->
      </div>
      </div>
    </div>
  </div>
</section>

<section class="meet">
	<div class="container">

		<div class="row">
			<div class="col-12">
        <h1 class="featured-title text-center">Meet Our Team <span>Experience. Excellence. Commitment.</span></h1>
			</div><!-- col -->
    </div>
    <!-- row -->

      <div class="row py-5 align-items-center">
			      <div class="col-sm-6">
      				<div class="row">
      				  <div class="col-lg-4 mb-4">
      				        <img class="img-fluid d-block mx-auto" src="<?php echo get_template_directory_uri(); ?>/img/doc-fpo.jpg" alt="Dr. Name" />
      				  </div>

      				  <div class="col-lg-8">
                  <h4 class="text-center text-lg-left">Name of Doctor <span>Doc's Title</span></h1>
          				<p>Phasellus vel auctor odio, vitae aliquam massa. Suspendisse vestibulum varius ligula, quis hendrerit dolor auctor a. Integer vel lobortis sem, at condimentum dui. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lobortis tempor pretium.</p>
          				<div class="row">
            				<div class="col-xl-9">
            				      <button class="btn btn-lg btn-primary btn-block" href="<?php echo home_url('//'); ?>">Learn More</button>
            				</div>
          				</div>
      				  </div>
      				</div>
      			</div><!-- col -->

            <div class="col-sm-6">
              <div class="row">
                <div class="col-lg-4 mb-4">
                      <img class="img-fluid d-block mx-auto" src="<?php echo get_template_directory_uri(); ?>/img/doc-fpo.jpg" alt="Dr. Name" />
                </div>

                <div class="col-lg-8">
                  <h4 class="text-center text-lg-left">Name of Doctor <span>Doc's Title</span></h1>
                  <p>Phasellus vel auctor odio, vitae aliquam massa. Suspendisse vestibulum varius ligula, quis hendrerit dolor auctor a. Integer vel lobortis sem, at condimentum dui. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lobortis tempor pretium.</p>
                  <div class="row">
                    <div class="col-xl-9">
                          <button class="btn btn-lg btn-primary btn-block" href="<?php echo home_url('//'); ?>">Learn More</button>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- col -->
		  </div><!-- row -->

	</div><!-- .container -->
</section><!-- section -->

<section id="px-2" class="review">
	<div class="container">
    <div class="row">
      <div class="col-md-6 my-4">
        <div class="box">
          <h4>Patient review</h4>
          <blockquote>
            “Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut tellus lacus, vehicula sed mauris id, auctor congue sapien. Phasellus rhoncus at lacus vel faucibus... ”
          </blockquote>
          <div class="author">
            <span class="name">Jane Doe</span>
            <span class="location">Rancho Mirage</span>
          </div>
          <a href="<?php echo home_url('//') ?>">
            <div class="hover-arrow">
              <span class="fa-stack fa-lg">
                <i class="fa fa-circle fa-stack-2x fa-inverse"></i>
                <i class="fa fa-angle-right fa-stack-1x"></i>
              </span>
            </div>
          </a>
          <!-- hover arrow -->
        </div>
      </div>
      <!-- col -->

      <div class="col-md-6 my-4">
        <div class="box">
          <h4>Patient review</h4>
          <blockquote>
            “Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut tellus lacus, vehicula sed mauris id, auctor congue sapien. Phasellus rhoncus at lacus vel faucibus... ”
          </blockquote>
          <div class="author">
            <span class="name">Jane Doe</span>
            <span class="location">Rancho Mirage</span>
          </div>
          <a href="<?php echo home_url('//') ?>">
            <div class="hover-arrow">
              <span class="fa-stack fa-lg">
                <i class="fa fa-circle fa-stack-2x fa-inverse"></i>
                <i class="fa fa-angle-right fa-stack-1x"></i>
              </span>
            </div>
          </a>
          <!-- hover arrow -->
        </div>
      </div>
      <!-- col -->
    </div>
	</div><!-- .container -->
</section><!-- section -->

<section class="call-to-actions">
	<div class="container">
		<div class="row">
			<div class="cta col-sm-4">
				<a href="<?php echo home_url('/photo-gallery/'); ?>">
					<div class="box">
						<h4>Patient <br/>Reviews</h4>
            <div class="callout d-flex align-items-center">
              <p>Get patient information and download forms</p>
              <div class="hover-arrow">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x fa-inverse"></i>
                  <i class="fa fa-angle-right fa-stack-1x"></i>
                </span>
              </div>
            </div>
						<img class="w-100 d-block mx-auto" src="<?php echo get_template_directory_uri(); ?>/img/ctas/cta-1.jpg" alt="Patient Reviews" />
					</div>
				</a>
			</div><!-- col -->

			<div class="cta col-sm-4">
				<a href="<?php echo home_url('//'); ?>">
					<div class="box">
						<h4>Patient <br/>Forms</h4>
            <div class="callout d-flex align-items-center">
              <p>Read what our patients are saying about us</p>
              <div class="hover-arrow">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x fa-inverse"></i>
                  <i class="fa fa-angle-right fa-stack-1x"></i>
                </span>
              </div>
            </div>
						<img class="w-100 d-block mx-auto" src="<?php echo get_template_directory_uri(); ?>/img/ctas/cta-2.jpg" alt="Patient Forms" />
					</div>
				</a>
			</div><!-- col -->

			<div class="cta col-sm-4">
				<a href="<?php echo home_url('/video-gallery/'); ?>">
					<div class="box">
						<h4>Schedule <br/> Consult</h4>
            <div class="callout d-flex align-items-center">
              <p>Contact us now to schedule your next appointment</p>
              <div class="hover-arrow">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x fa-inverse"></i>
                  <i class="fa fa-angle-right fa-stack-1x"></i>
                </span>
              </div>
            </div>
						<img class="w-100 d-block mx-auto" src="<?php echo get_template_directory_uri(); ?>/img/ctas/cta-3.jpg" alt="Schedule Consult" />
					</div>
				</a>
			</div><!-- col -->
		</div><!-- row -->
	</div><!-- .container -->
</section><!-- section -->

<?php get_footer(); } ?>
