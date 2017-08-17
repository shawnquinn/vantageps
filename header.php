<?php
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
/**
* Header
*/
global $lumos_options;
$lumos_options = lumos_get_options();
?>
<!DOCTYPE html>
<html
      <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="profile" href="http://gmpg.org/xfn/11" />
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  <title>
    <?php wp_title('|', true, 'right');?>
  </title>

  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/img/favicons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/img/favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/img/favicons/favicon-16x16.png">
  <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/img/favicons/manifest.json">
  <link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/img/favicons/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="theme-color" content="#ffffff">

  <?php wp_head(); ?>
</head>
<body
      <?php body_class(); ?> >

<header id="header">
  <div class="sticky-container sticky">
		<div class="container-fluid">
			<div class="row align-items-center">
				<div class="col-lg-12">
          <?php if(!is_frontpage) : ?>
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
				</div>

        <?php endif; ?>


					<div id="main-nav" class="row">
						<div class="col-12 p-0">
							<nav id="access">
						      <ul class="mobile-nav d-md-none">
						        <li>
						          <a href="<?php echo home_url('/contact/'); ?>">
						            <i class="fa fa-envelope" aria-hidden="true">
						            </i>
						          </a>
						        </li>
						        <li>
						          <a href="tel:+1-347-292-9877">
						            <i class="fa fa-phone" aria-hidden="true">
						            </i>
						          </a>
						        </li>
						      </ul>
						      <?php wp_nav_menu(array( 'theme_location' => 'header-nav','menu_class' => 'sf-menu menu-slick')); ?>
						    </nav><!-- nav#access -->
						</div><!-- col -->
					</div><!-- row -->
				</div><!-- col -->
			</div><!-- row -->
		</div><!-- container-fluid -->
  </div>
  <!-- .container-->
  </div>
  <!-- .container-->

</header>
<!-- #header -->


<div id="main">

  <div class="float-box d-none d-md-block">
    <a class="clicker" href="<?php echo home_url(''); ?>">
      <span>Contact Us
      </span>
    </a>
    <div class="row">
	    	<div class="col col-6">
	      <address>
          <span>Address:</span><br/>
          185 Montague St, 4th Floor<br/>
          Brooklyn, NY 11201<br/>
          Phone: (347) 292-9877
	      </address>
	      <a href="<?php echo home_url('/location/'); ?>">
	        <img class="img-fluid mt-2" src="<?php echo get_template_directory_uri(); ?>/img/map.png" alt="Location" />
	      </a>
	    </div>
	    <!-- end of col-1-3 -->
	    <div class="col col-6">
	      <?php echo do_shortcode('[contact-form-7 id="136" title="Contact form 1"]') ?>
	    </div>
	    <!-- end of col-1-3 -->
	    <div class="col col-md-4 links" hidden>
  		  <div id="flex-item" class="w-100 d-block">
  		      <a href="<?php echo home_url(''); ?>">Current Specials
  		      </a>
  		      <a href="<?php echo home_url(''); ?>">Get Directions
  		      </a>
  		      <a href="<?php echo home_url('/photo-gallery/'); ?>">Photo Gallery
  		      </a>
  		  </div><!-- flex-item -->
	    </div>
	    <!-- end of col-1-3 -->
    </div><!-- row -->
  </div>
  <!-- end of float-box -->
