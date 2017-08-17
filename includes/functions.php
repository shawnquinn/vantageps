<?php

function md_disclaimer($style = "") {
	if ( is_tax( CTMPG_Settings::TAXONOMY ) ||  get_post_type() == CTMPG_Settings::POST_TYPE ) {
		return '<span class="disclaimer" style="text-align:center;display:block;clear:both;font-size:14px;font-style:italic;padding-bottom:20px;'.$style.'">* Results are not guaranteed or guaranteed to be permanent.</span>';
		}
	}

add_action( 'after_setup_theme', 'ctw_setup' );
add_action( 'init', 'ctw_enqueue_scripts_and_styles');
add_action( 'template_redirect', 'ctw_redirect');

function ctw_redirect() {
	if ( is_404() ) {
		$redirects = array(
			'' => '',
		);

		foreach ( $redirects as $old => $go_to ) {
			$request_uri = $_SERVER['REQUEST_URI'];

			if ( stripos( $request_uri, $old ) !== false ) {
				wp_redirect( site_url() . '/' . $go_to, 301 );
				exit;
			}
		}
		wp_redirect(site_url(), 301);
		exit;
	}
}

function ctw_enqueue_scripts_and_styles() {

	if( is_admin() ) {
		return;
	}

    wp_enqueue_script( 'jquery' );


	$ctw_registered_styles = array(
		'bootstrap-css'			=> get_template_directory_uri().'/assets/css/bootstrap/css/bootstrap.min.css',
		'google-fonts'			=> '//fonts.googleapis.com/css?family=Open+Sans:400,400i,700|Quicksand:300,400',
		'animate'						=> get_template_directory_uri().'/assets/css/animate.css',
		'font-awesome'			=> get_template_directory_uri().'/assets/css/font-awesome.min.css',
		'slicknav'					=> get_template_directory_uri().'/assets/css/slicknav.min.css',
		//'style-sheet'				=> get_template_directory_uri().'/style.min.css',
		'dev-style-sheet'	=> get_template_directory_uri().'/style.css'
	);

	$ctw_registered_scripts = array(
		'popper-js'		=>	'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js',
		'bootstrap-js'		=>	get_template_directory_uri().'/assets/css/bootstrap/js/bootstrap.min.js',
		// 'fastclick' 		=>	get_template_directory_uri().'/js/fastclick.js',
		// 'superfish' 		=>	get_template_directory_uri().'/js/superfish.js',
		// 'supersubs' 		=>	get_template_directory_uri().'/js/supersubs.js',
		// 'slicknav'			=>	get_template_directory_uri().'/js/jquery.slicknav.min.js',
		// 'waypoints'		 	=>	get_template_directory_uri().'/js/jquery.waypoints.min.js',
		// 'waypints-sticky' 	=>	get_template_directory_uri().'/js/sticky.min.js',
		// 'headroom-main'		=>	get_template_directory_uri().'/js/headroom.min.js',
		// 'headroom-jquery'	=>	get_template_directory_uri().'/js/jQuery.headroom.js',
		// 'bx-sliderjs' 		=>	get_template_directory_uri().'/js/jquery.bxslider.min.js',
		'vendors'		 		=>	get_template_directory_uri().'/assets/js/vendors.js',
		'tweenMax'			=> 'http://cdnjs.cloudflare.com/ajax/libs/gsap/1.14.2/TweenMax.min.js',
		'scrollMagic'		=> 'http://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js',
		'AnimationGSAP' => 'http://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/animation.gsap.js',
		'custom'		 		=>	get_template_directory_uri().'/assets/js/custom.js'
	);


	foreach($ctw_registered_styles as $name => $loc)
	{
		wp_enqueue_style($name, $loc);
	}

	foreach($ctw_registered_scripts as $name => $loc)
	{
		wp_enqueue_script($name, $loc, false, null, true);
	}
}


function ctw_setup() {

	// Add default posts and comments RSS feed links to <head>.
	add_theme_support( 'automatic-feed-links' );

	// This theme uses wp_nav_menu().
	register_nav_menu( 'header-nav', 'Header Nav');
	register_nav_menu( 'footer-nav', 'Footer Nav');
	register_nav_menu( 'footer-nav-2', 'Footer Nav Two');
	register_nav_menu( 'sidebar-nav', 'Sidebar Nav');

	register_nav_menu( 'face-nav', 'Face Nav');
	register_nav_menu( 'breast-nav', 'Breast Nav');
	register_nav_menu( 'body-nav', 'Body Nav');
	register_nav_menu( 'skin-nav', 'Skin Nav');
	register_nav_menu( 'men-nav', 'Men Nav');


	// Add support for a variety of post formats
	add_theme_support( 'post-formats', array( 'image'/*, 'link', 'gallery', 'status', 'quote', 'aside'*/ ) );
	add_theme_support( 'post-thumbnails' );

	// Custom Image Sizes
	add_image_size( 'full', 1920, 630 ); // 1920 pixels wide by 630 pixels tall, soft proportional crop mode for Homepage Slider
	add_image_size( 'blog-posts', 707, 375, array( 'left', 'top' ) ); // 405 pixels wide by 215 pixels tall, Hard Crop left top for homepage blog posts
	add_image_size( 'blog-ad', 737, 542, array( 'left', 'top' ) ); // 405 pixels wide by 215 pixels tall, Hard Crop left top for homepage blog posts
}

/**
 * Register our sidebars and widgetized areas. Also register the default Epherma widget.
 *
 * @since Twenty Eleven 1.0
 */
function ctw_widgets_init() {
	register_sidebar( array(
			'name' => 'Primary Sidebar',
			'id' => 'sidebar-1',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => "</aside>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );

	register_sidebar( array(
			'name' => 'Secondary Sidebar',
			'id' => 'sidebar-2',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => "</aside>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );

	register_sidebar( array(
			'name' =>'Footer Area One',
			'id' => 'sidebar-3',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => "</aside>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );

	register_sidebar( array(
			'name' =>'Footer Area Two',
			'id' => 'sidebar-4',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => "</aside>",
			'before_title' => '<h3 class="widget-title blue">',
			'after_title' => '</h3>',
		) );

	register_sidebar( array(
			'name' =>'Footer Area Three',
			'id' => 'sidebar-5',
			'before_widget' => '<aside id="%1$s" class="widget locations %2$s">',
			'after_widget' => "</aside>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );

	register_sidebar( array(
			'name' =>'Footer Area Four',
			'id' => 'sidebar-6',
			'before_widget' => '<aside id="%1$s" class="widget contact %2$s">',
			'after_widget' => "</aside>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );

		register_sidebar( array(
			'name' =>'Footer Area Five',
			'id' => 'sidebar-7',
			'before_widget' => '<aside id="%1$s" class="widget locations %2$s">',
			'after_widget' => "</aside>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
}
add_action( 'widgets_init', 'ctw_widgets_init' );

function ctw_content_nav( $nav_id ) {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $nav_id; ?>">
			<div class="nav-previous"><?php next_posts_link('<span class="meta-nav">&larr;</span> Older posts'); ?></div>
			<div class="nav-next"><?php previous_posts_link('Newer posts <span class="meta-nav">&rarr;</span>'); ?></div>
		</nav><!-- #nav-above -->
	<?php endif;
}

function ctw_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
	case 'pingback' :
	case 'trackback' :
?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'nox' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( 'Edit', '<span class="edit-link">', '</span>' ); ?></p>
	<?php
	break;
default :
?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php
	$avatar_size = 68;
	if ( '0' != $comment->comment_parent )
		$avatar_size = 39;

	echo get_avatar( $comment, $avatar_size );

	/* translators: 1: comment author, 2: date and time */
	printf( __( '%1$s on %2$s <span class="says">said:</span>', 'nox' ),
		sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
		sprintf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
			esc_url( get_comment_link( $comment->comment_ID ) ),
			get_comment_time( 'c' ),
			/* translators: 1: date, 2: time */
			sprintf( __( '%1$s at %2$s', 'nox' ), get_comment_date(), get_comment_time() )
		)
	);
?>

					<?php edit_comment_link( __( 'Edit', 'nox' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .comment-author .vcard -->

				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation">Your comment is awaiting moderation.</em>
					<br />
				<?php endif; ?>

			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => 'Reply <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->

	<?php
	break;
	endswitch;
}

function ctw_posted_on() {
	printf( __( '<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="by-author"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'nox' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf('View all posts by %s', get_the_author() ) ),
		get_the_author()
	);
}

//////////////////////Added//////////////////////////////////////////////////////////////////////////////////////

/*
 * Globalize Theme options
 */
$lumos_options = lumos_get_options();

/*
 * Hook options
 */
add_action('admin_init', 'lumos_theme_options_init');
add_action('admin_menu', 'lumos_theme_options_add_page');

/**
 * Retrieve Theme option settings
 */
function lumos_get_options() {
	// Globalize the variable that holds the Theme options
	global $lumos_options;
	// Parse array of option defaults against user-configured Theme options
	$lumos_options = wp_parse_args( get_option( 'lumos_theme_options', array() ), lumos_get_option_defaults() );
	// Return parsed args array
	return $lumos_options;
}

/**
 *Theme option defaults
 */
function lumos_get_option_defaults() {
	$defaults = array(
		'breadcrumb' => false,

		'front_page' => 1,

		'twitter_uid' => '',
		'facebook_uid' => '',
		'linkedin_uid' => '',
		'youtube_uid' => '',
		'stumble_uid' => '',
		'rss_uid' => '',
		'blogger_uid' => '',
		'google_plus_uid' => '',
		'instagram_uid' => '',
		'pinterest_uid' => '',
		'yelp_uid' => '',
		'vimeo_uid' => '',
		'foursquare_uid' => ''
	);
	return apply_filters( 'lumos_option_defaults', $defaults );
}

/**
 * Fire up the engines boys and girls let's start theme setup.
 */
add_action('after_setup_theme', 'lumos_setup');

if (!function_exists('lumos_setup')):

	function lumos_setup() {

		global $content_width;

		/**
		 * Global content width.
		 */
		if (!isset($content_width))
			$content_width = 550;

		/**
		 * lumos is now available for translations.
		 * Add your files into /languages/ directory.
		 * @see http://codex.wordpress.org/Function_Reference/load_theme_textdomain
		 */
		load_theme_textdomain('lumos', get_template_directory().'/languages');

		$locale = get_locale();
		$locale_file = get_template_directory().'/languages/$locale.php';
		if (is_readable( $locale_file))
			require_once( $locale_file);



		/**
		 * Custom Separate Menus for Header and Footer
		 */

		if ( function_exists('get_custom_header')) {

			add_theme_support('custom-background');

		} else {

			// < 3.4 Backward Compatibility

			/**
			 * This feature allows users to use custom background for a theme.
			 * @see http://codex.wordpress.org/Function_Reference/add_custom_background
			 */

			add_custom_background();

		}

		// WordPress 3.4 >
		if (function_exists('get_custom_header')) {

			add_theme_support('custom-header', array (
					// Header image default
					'default-image'   => get_template_directory_uri() . '/images/default-logo.png',
					// Header text display default
					'header-text'   => false,
					// Header image flex width
					'flex-width'             => true,
					// Header image width (in pixels)
					'width'        => 300,
					// Header image flex height
					'flex-height'            => true,
					// Header image height (in pixels)
					'height'           => 100,
					// Admin header style callback
					'admin-head-callback' => 'lumos_admin_header_style'));

			// gets included in the admin header
			function lumos_admin_header_style() {
				?><style type="text/css">
                .appearance_page_custom-header #headimg {
					background-repeat:no-repeat;
					border:none;
				}
             </style><?php
			}

		} else {

			// Backward Compatibility

			/**
			 * This feature adds a callbacks for image header display.
			 * In our case we are using this to display logo.
			 * @see http://codex.wordpress.org/Function_Reference/add_custom_image_header
			 */
			define('HEADER_TEXTCOLOR', '');
			define('HEADER_IMAGE', '%s/images/default-logo.png'); // %s is the template dir uri
			define('HEADER_IMAGE_WIDTH', '100%'); // use width and height appropriate for your theme
			define('HEADER_IMAGE_HEIGHT', 'auto');
			define('NO_HEADER_TEXT', true);


			// gets included in the admin header
			function lumos_admin_header_style() {
				?><style type="text/css">
                #headimg {
	                background-repeat:no-repeat;
                    border:none !important;
                    width:<?php echo HEADER_IMAGE_WIDTH; ?>px;
                    height:<?php echo HEADER_IMAGE_HEIGHT; ?>px;
                }
             </style><?php
			}

			add_custom_image_header('', 'lumos_admin_header_style');

		}

		// While upgrading set theme option front page toggle not to affect old setup.
		$lumos_options = get_option( 'lumos_theme_options' );
		if( $lumos_options && isset( $_GET['activated'] ) ) {

			// If front_page is not in theme option previously then set it.
			if( !isset( $lumos_options['front_page'] )) {

				// Get template of page which is set as static front page
				$template = get_post_meta( get_option( 'page_on_front' ), '_wp_page_template', true );

				// If static front page template is set to default then set front page toggle of theme option to 1
				if( 'page' == get_option( 'show_on_front' ) && $template == 'default' ) {
					$lumos_options['front_page'] = 1;
				}
				else {
					$lumos_options['front_page'] = 0;
				}
				update_option( 'lumos_theme_options', $lumos_options );
			}
		}
	}

endif;

/**
 * Set a fallback menu that will show a home link.
 */

function lumos_fallback_menu() {
	$args = array(
		'depth'       => 0,
		'sort_column' => 'menu_order, post_title',
		'menu_class'  => 'menu',
		'include'     => '',
		'exclude'     => '',
		'echo'        => false,
		'show_home'   => true,
		'link_before' => '',
		'link_after'  => ''
	);
	$pages = wp_page_menu( $args );
	$prepend = '<div class="main-nav">';
	$append = '</div>';
	$output = $prepend.$pages.$append;
	echo $output;
}

/**
 * This function removes .menu class from custom menus
 * in widgets only and fallback's on default widget lists
 * and assigns new unique class called .menu-widget
 *
 * Marko Heijnen Contribution
 *
 */
class lumos_widget_menu_class {
	public function __construct() {
		add_action( 'widget_display_callback', array( $this, 'menu_different_class' ), 10, 2 );
	}

	public function menu_different_class( $settings, $widget ) {
		if( $widget instanceof WP_Nav_Menu_Widget )
			add_filter( 'wp_nav_menu_args', array( $this, 'wp_nav_menu_args' ) );

		return $settings;
	}

	public function wp_nav_menu_args( $args ) {
		remove_filter( 'wp_nav_menu_args', array( $this, 'wp_nav_menu_args' ) );

		if( 'menu' == $args['menu_class'] )
			$args['menu_class'] = 'menu-widget';

		return $args;
	}
}
new lumos_widget_menu_class();

/**
 * Removes div from wp_page_menu() and replace with ul.
 */
function lumos_wp_page_menu ($page_markup) {
	preg_match('/^<div class=\"([a-z0-9-_]+)\">/i', $page_markup, $matches);
	$divclass = $matches[1];
	$replace = array('<div class="'.$divclass.'">', '</div>');
	$new_markup = str_replace($replace, '', $page_markup);
	$new_markup = preg_replace('/^<ul>/i', '<ul class="'.$divclass.'">', $new_markup);
	return $new_markup; }

add_filter('wp_page_menu', 'lumos_wp_page_menu');

/**
 * wp_title() Filter for better SEO.
 *
 * Adopted from Twenty Twelve
 * @see http://codex.wordpress.org/Plugin_API/Filter_Reference/wp_title
 *
 */
if (!function_exists('lumos_post_meta_data') && ! defined( 'AIOSEOP_VERSION' ) ) :

	function lumos_wp_title( $title, $sep ) {
		global $paged, $page;

		if ( is_feed() )
			return $title;

		// Add the site name.
		$title .= get_bloginfo( 'name' );

		// Add the site description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			$title = "$title $sep $site_description";

		// Add a page number if necessary.
		if ( $paged >= 2 || $page >= 2 )
			$title = "$title $sep " . sprintf( __( 'Page %s', 'lumos' ), max( $paged, $page ) );

		return $title;
	}
add_filter( 'wp_title', 'lumos_wp_title', 10, 2 );

endif;

/**
 * Filter 'get_comments_number'
 *
 * Filter 'get_comments_number' to display correct
 * number of comments (count only comments, not
 * trackbacks/pingbacks)
 *
 * Chip Bennett Contribution
 */
function lumos_comment_count( $count ) {
	if ( ! is_admin() ) {
		global $id;
		$comments_by_type = &separate_comments(get_comments('status=approve&post_id=' . $id));
		return count($comments_by_type['comment']);
	} else {
		return $count;
	}
}
add_filter('get_comments_number', 'lumos_comment_count', 0);

/**
 * wp_list_comments() Pings Callback
 *
 * wp_list_comments() Callback function for
 * Pings (Trackbacks/Pingbacks)
 */
function lumos_comment_list_pings( $comment ) {
	$GLOBALS['comment'] = $comment;
?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php }

/**
 * Returns a "Continue Reading" link for excerpts
 */
function ctw_continue_reading_link() {
	return ' <a href="'. esc_url( get_permalink() ) . '">' . 'Continue reading <span class="meta-nav">&rarr;</span></a>';
}

function ctw_auto_excerpt_more( $more ) {
	return ' &hellip;' . ctw_continue_reading_link();
}

add_filter( 'excerpt_more', 'ctw_auto_excerpt_more' );

/**
 * Sets the post excerpt length to 40 words.
 */
function lumos_excerpt_length($length) {
	return 25;
}

add_filter('excerpt_length', 'lumos_excerpt_length');

/**
 * Returns a "Read more" link for excerpts
 */
function lumos_read_more() {
// 	return '<div class="read-more"><a href="' . get_permalink() . '">' . __('Read more &#8250;', 'lumos') . '</a></div><!-- end of .read-more -->';
	return;
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and lumos_read_more_link().
 */
function lumos_auto_excerpt_more($more) {
	return '<span class="ellipsis">&hellip;</span>' . lumos_read_more();
}

add_filter('excerpt_more', 'lumos_auto_excerpt_more');

/**
 * Adds a pretty "Read more" link to custom post excerpts.
 */
function lumos_custom_excerpt_more($output) {
	if (has_excerpt() && !is_attachment()) {
		$output .= lumos_read_more();
	}
	return $output;
}

add_filter('get_the_excerpt', 'lumos_custom_excerpt_more');


/**
 * This function removes inline styles set by WordPress gallery.
 */
function lumos_remove_gallery_css($css) {
	return preg_replace("#<style type='text/css'>(.*?)</style>#s", '', $css);
}

add_filter('gallery_style', 'lumos_remove_gallery_css');

/**
 * This function removes default styles set by WordPress recent comments widget.
 */
function lumos_remove_recent_comments_style() {
	global $wp_widget_factory;
	if ( isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments']) )
		remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'lumos_remove_recent_comments_style' );

/**
 * This function prints post meta data.
 *
 * Ulrich Pogson Contribution
 *
 */
if (!function_exists('lumos_post_meta_data')) :

function lumos_post_meta_data() {
	printf( __( '<span class="%1$s">Posted on </span>%2$s<span class="%3$s"> by </span>%4$s', 'lumos' ),
	'meta-prep meta-prep-author posted',
	sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="timestamp">%3$s</span></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_html( get_the_date() )
	),
	'byline',
	sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
		get_author_posts_url( get_the_author_meta( 'ID' ) ),
		sprintf( esc_attr__( 'View all posts by %s', 'lumos' ), get_the_author() ),
		esc_attr( get_the_author() )
		)
	);
}
endif;


/**
 * This function removes WordPress generated category and tag atributes.
 * For W3C validation purposes only.
 *
 */
function lumos_category_rel_removal ($output) {
	$output = str_replace(' rel="category tag"', '', $output);
	return $output;
}

add_filter('wp_list_categories', 'lumos_category_rel_removal');
add_filter('the_category', 'lumos_category_rel_removal');

/**
 * Breadcrumb Lists
 * Allows visitors to quickly navigate back to a previous section or the root page.
 *
 * Adopted from Dimox
 *
 */
if (!function_exists('lumos_breadcrumb_lists')) :

	function lumos_breadcrumb_lists() {

		/* === OPTIONS === */
		$text['home']     = __('Home','lumos'); // text for the 'Home' link
		$text['category'] = __('Archive for %s','lumos'); // text for a category page
		$text['search']   = __('Search results for: %s','lumos'); // text for a search results page
		$text['tag']      = __('Posts tagged %s','lumos'); // text for a tag page
		$text['author']   = __('View all posts by %s','lumos'); // text for an author page
		$text['404']      = __('Error 404','lumos'); // text for the 404 page

		$showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
		$showOnHome  = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
		$delimiter   = ' <span class="chevron">&#8250;</span> '; // delimiter between crumbs
		$before      = '<span class="breadcrumb-current">'; // tag before the current crumb
		$after       = '</span>'; // tag after the current crumb
		/* === END OF OPTIONS === */

		global $post, $paged, $page;
		$homeLink = home_url('/');
		$linkBefore = '<span typeof="v:Breadcrumb">';
		$linkAfter = '</span>';
		$linkAttr = ' rel="v:url" property="v:title"';
		$link = $linkBefore . '<a' . $linkAttr . ' href="%1$s">%2$s</a>' . $linkAfter;

		if ( is_front_page()) {

			if ($showOnHome == 1) echo '<div class="breadcrumb-list"><a href="' . $homeLink . '">' . $text['home'] . '</a></div>';

		} else {

			echo '<div class="breadcrumb-list" xmlns:v="http://rdf.data-vocabulary.org/#">' . sprintf($link, $homeLink, $text['home']) . $delimiter;

			if ( is_home() ) {
				if ($showCurrent == 1) echo $before . get_the_title( get_option('page_for_posts', true) ) . $after;

			} elseif ( is_category() ) {
				$thisCat = get_category(get_query_var('cat'), false);
				if ($thisCat->parent != 0) {
					$cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
					$cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
					$cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
					echo $cats;
				}
				echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;

			} elseif ( is_search() ) {
				echo $before . sprintf($text['search'], get_search_query()) . $after;

			} elseif ( is_day() ) {
				echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
				echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
				echo $before . get_the_time('d') . $after;

			} elseif ( is_month() ) {
				echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
				echo $before . get_the_time('F') . $after;

			} elseif ( is_year() ) {
				echo $before . get_the_time('Y') . $after;

			} elseif ( is_single() && !is_attachment() ) {
				if ( get_post_type() != 'post' ) {
					$post_type = get_post_type_object(get_post_type());
					$slug = $post_type->rewrite;
					printf($link, $homeLink . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
					if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;
				} else {
					$cat = get_the_category(); $cat = $cat[0];
					$cats = get_category_parents($cat, TRUE, $delimiter);
					if ($showCurrent == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
					$cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
					$cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
					echo $cats;
					if ($showCurrent == 1) echo $before . get_the_title() . $after;
				}

			} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
				$post_type = get_post_type_object(get_post_type());
				echo $before . $post_type->labels->singular_name . $after;

			} elseif ( is_attachment() ) {
				$parent = get_post($post->post_parent);
				$cat = get_the_category($parent->ID); $cat = $cat[0];
				$cats = get_category_parents($cat, TRUE, $delimiter);
				$cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
				$cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
				echo $cats;
				printf($link, get_permalink($parent), $parent->post_title);
				if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;

			} elseif ( is_page() && !$post->post_parent ) {
				if ($showCurrent == 1) echo $before . get_the_title() . $after;

			} elseif ( is_page() && $post->post_parent ) {
				$parent_id  = $post->post_parent;
				$breadcrumbs = array();
				while ($parent_id) {
					$page_child = get_page($parent_id);
					$breadcrumbs[] = sprintf($link, get_permalink($page_child->ID), get_the_title($page_child->ID));
					$parent_id  = $page_child->post_parent;
				}
				$breadcrumbs = array_reverse($breadcrumbs);
				for ($i = 0; $i < count($breadcrumbs); $i++) {
					echo $breadcrumbs[$i];
					if ($i != count($breadcrumbs)-1) echo $delimiter;
				}
				if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;

			} elseif ( is_tag() ) {
				echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;

			} elseif ( is_author() ) {
				global $author;
				$userdata = get_userdata($author);
				echo $before . sprintf($text['author'], $userdata->display_name) . $after;

			} elseif ( is_404() ) {
				echo $before . $text['404'] . $after;

			}if ( get_query_var('paged') ) {
				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
				echo $delimiter . sprintf( __( 'Page %s', 'lumos' ), max( $paged, $page ) );
				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
			}

			echo '</div>';

		}
	} // end lumos_breadcrumb_lists

endif;


/****************************************************************/
/*** Popular Posts ***/
/****************************************************************/
function nox_set_post_views($postID) {
    $count_key = 'nox_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function nox_track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;
    }
    nox_set_post_views($post_id);
}
add_action( 'wp_head', 'nox_track_post_views');


//Get the Number of Views
function nox_get_post_views($postID){
    $count_key = 'nox_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}




/**
 * WordPress Widgets start right here.
 */
function lumos_widgets_init() {

	register_sidebar(array(
			'name' => __('Main Sidebar', 'lumos'),
			'description' => __('Area 1 - sidebar.php', 'lumos'),
			'id' => 'main-sidebar',
			'before_title' => '<div class="widget-title">',
			'after_title' => '</div>',
			'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
			'after_widget' => '</div>'
		));

	register_sidebar(array(
			'name' => __('Top Widget', 'lumos'),
			'description' => __('Area 11 - sidebar-top.php', 'lumos'),
			'id' => 'top-widget',
			'before_title' => '<div class="widget-title">',
			'after_title' => '</div>',
			'before_widget' => '<div id="%1$s" class="%2$s">',
			'after_widget' => '</div>'
		));
}

add_action('widgets_init', 'lumos_widgets_init');

/**
 * Front Page function starts here. The Front page overides WP's show_on_front option. So when show_on_front option changes it sets the themes front_page to 0 therefore displaying the new option
 */

function lumos_front_page_override( $new, $orig ) {
	global $lumos_options;

	if( $orig !== $new ) {
		$lumos_options['front_page'] = 0;

		update_option( 'lumos_theme_options', $lumos_options );
	}
	return $new;
}
add_filter( 'pre_update_option_show_on_front', 'lumos_front_page_override', 10, 2 );

/**
 * Funtion to add CSS class to body
 */
function lumos_add_class( $classes ) {

	// Get lumos theme option.
	global $lumos_options;
	if( $lumos_options['front_page'] == 1 && is_front_page() ) {
		$classes[] = 'front-page';
	} else if ( !is_front_page() ) {
		$classes[] = 'inside-page';
	}

	return $classes;
}

add_filter( 'body_class','lumos_add_class' );
?>
