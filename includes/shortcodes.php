<?php
	
/**
 * Some Shortcodes.
---------------------------------------------------------*/
	//Segment Shortcode
	function segment_shortcode( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'class' => 'segment-outer',
		), $atts );

		return '<div class="segment-outer ' . esc_attr($a['class']) . '">' . '<div class="segment">' . do_shortcode($content) . '</div>' . '</div>';
	}

	//Bold Shortcode
	function bold_shortcode( $atts, $content = null ) {
		return '<div class="bold">' . $content . '</div>';
	}

	//Clear Shortcode
	function clear_shortcode( $atts, $content = null ) {
		return '<div class="clear"></div>';
	}
	
	//Column Row
	function row_shortcode( $atts, $content = null ) {
		extract(shortcode_atts(array('class' => ''), $atts));
		return '<div class="row '.$class.'">' . do_shortcode($content) . '</div>';
	}

	//Button Big Shortcode
	function button_shortcode( $atts, $content = null ) {
		extract(shortcode_atts(array('link' => '#', 'target' => '_self', 'type' => 'def', 'class' => ''), $atts));
		switch ($type) {
			case 'def':
				return '<a class="btn btn-primary btn-lg '.$class.'" href="'.$link.'" target="'.$target.'">' . do_shortcode($content) . '</a>';
				break;

			case 'alt':
				return '<a class="btn btn-secondary btn-lg '.$class.'" href="'.$link.'" target="'.$target.'">' . do_shortcode($content) . '</a>';
				break;

			default:
				return '<a class="btn btn-primary btn-lg '.$class.'" href="'.$link.'" target="'.$target.'">' . do_shortcode($content) . '</a>';
				break;
		}
	}

	//Quote Shortcode
	function quote_shortcode( $atts, $content = null ) {
		extract(shortcode_atts(array('link' => '#'), $atts));
		return '<blockquote class="quote">' . do_shortcode($content) . ' ' . '<a href="' .  $link . '" title="Testimonials">Read More »</a>' . '</blockquote>';
	}

	//CTA Gallery Shortcode
	function cta_gallery_shortcode( $content = null ) {

		return '<div class="holder">
		<div class="cta-container">

			<div class="col-1-2">
				<h3>Photo Gallery</h3>
				<img src="' . get_template_directory_uri() . '/images/bef-aft.png" alt="Photo Gallery" />
				<p>View before & after images of Dr. Dalal’s patients in our photo gallery.</p>
				<div class="margin-balance"><a class="button" href="/photo-gallery/">View Gallery</a></div>
			</div>
			<div class="col-1-2">
				<h3>Patient Reviews</h3>
				<p class="testimonial">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vestibulum justo ut eros sollicitudin, id finibus purus placerat. Nam dignissim commodo auctor. Integer ultrices turpis et lacinia cursus. Donec porta pretium iaculis. <br /><span>- Jane Doe</span></p>
				<div class="margin-balance"><a class="button" href="/reviews/">Patient Reviews</a></div>
			</div>

		</div><!-- end of cta-container -->
		</div><!-- end of holder -->';
	}

	//CTA Testimonials Shortcode
	function cta_testimonial_shortcode( $atts, $content = null ) {
		extract(shortcode_atts(array(), $atts));
		return '<div class="cta-container-testimonial">' . '<p>' . do_shortcode($content) . '</p>' . '<div class="margin-balance">' . '<a class="button-big" href="/testimonials/">View More »</a>' . '</div>' . '</div>';
	}

//CTA Shortcode
	function cta_shortcode( $content = null ) {
		return '<div class="cta2-container">
			<a href="/contact/">Schedule a Consultation Today <i class="fa fa-chevron-right"></i></a>

		</div>';
	}

	//Toggle Wrapper Shortcode
	 function toggle_wrapper_shortcode( $atts, $content = null ) {
	 	extract(shortcode_atts(array(), $atts));
		return '<div class="toggle-wrapper">' . do_shortcode($content) . '</div>';
	}


	//Toggle Shortcode
	 function toggle_shortcode( $atts, $content = null ) {
		 extract( shortcode_atts(
		 array(
		   'title' => 'Click To Open',
		   'color' => 'color'
		 ),
		 $atts,
		 $color ));

		 // check what type user entered
		switch ($color) {
        case 'white':
            return '<h3 class="trigger toggle-white"><a href="#">'. $title .'</a></h3><div class="toggle_container white">' . do_shortcode($content) . '</div>';
            break;
        case 'gray':
            return '<h3 class="trigger toggle-gray"><a href="#">'. $title .'</a></h3><div class="toggle_container gray">' . do_shortcode($content) . '</div>';
        default:
            return '<h3 class="trigger toggle-gray"><a href="#">'. $title .'<div class="plus-minus"></div></a></h3><div class="toggle_container gray">' . do_shortcode($content) . '</div>';
            break;
		}
	 }

	//Columns
	function column_shortcode($atts, $content = null) {
		extract(shortcode_atts(array('col' => '', 'class' => '' ), $atts));

		switch ($col) {
			case '1-4':
				return '<div class="col-md-3'. $class .'">' . do_shortcode($content) . '</div>';
				break;

			case '2-4':
				return '<div class="col-md-6'. $class .'">' . do_shortcode($content) . '</div>';
				break;

			case '1-2':
				return '<div class="col-md-6'. $class .'">' . do_shortcode($content) . '</div>';
				break;

			case '3-4':
				return '<div class="col-md-9'. $class .'">' . do_shortcode($content) . '</div>';
				break;

			case '1-3':
				return '<div class="col-md-4'. $class .'">' . do_shortcode($content) . '</div>';
				break;

			case '2-3':
				return '<div class="col-md-8'. $class .'">' . do_shortcode($content) . '</div>';
				break;

			case '4-4':
				return '<div class="col-md-12'. $class .'">' . do_shortcode($content) . '</div>';
				break;

			default:
				return '<div class="'. $class .'">' . do_shortcode($content) . '</div>';
				break;
		}
	}

	//Call to Action - CTA1 - Contact Page Shortcode
	function cta_one_shortcode( $atts, $content = null ) {
		return '<a class="cta-1" href="/contact/">Contact us Today</a>';
	}

	//Call to Action - CTA2 - Photo Gallery Shortcode
	function cta_two_shortcode( $atts, $content = null ) {
		return '<a class="cta-2" href="/photo-gallery/">View Our Photo Gallery</a>';
	}
	
	//Columns
	function column_nested_shortcode($atts, $content = null) {
		extract(shortcode_atts(array('col' => '', 'class' => null ), $atts));

		switch ($col) {
			case '1-4':
				return '<div class="col-md-3 '.$class.'">' . do_shortcode($content) . '</div>';
				break;

			case '2-4':
				return '<div class="col-md-6 '.$class.'">' . do_shortcode($content) . '</div>';
				break;

			case '1-2':
				return '<div class="col-md-6 '.$class.'">' . do_shortcode($content) . '</div>';
				break;						 

			case '3-4':
				return '<div class="col-md-9 '.$class.'">' . do_shortcode($content) . '</div>';
				break;

			case '1-3':
				return '<div class="col-md-4 '.$class.'">' . do_shortcode($content) . '</div>';
				break;

			case '2-3':
				return '<div class="col-md-8 '.$class.'">' . do_shortcode($content) . '</div>';
				break;

			case '4-4':
				return '<div class="col-md-12 '.$class.'">' . do_shortcode($content) . '</div>';
				break;

			default:
				return '<div class="col-md-12 '.$class.'">' . do_shortcode($content) . '</div>';
				break;
		}
	}


	//Call Shortcodes
	add_shortcode( 'segment', 'segment_shortcode' );
	add_shortcode( 'row', 'row_shortcode' );
	add_shortcode( 'bold', 'bold_shortcode' );
	add_shortcode( 'clear', 'clear_shortcode' );
	add_shortcode( 'button', 'button_shortcode' );
	add_shortcode( 'quote', 'quote_shortcode' );
	add_shortcode( 'cta-gallery', 'cta_gallery_shortcode' );
	add_shortcode( 'cta', 'cta_shortcode' );
	add_shortcode( 'testimonial', 'cta_testimonial_shortcode' );
	add_shortcode( 'toggle-wrapper', 'toggle_wrapper_shortcode' );
	add_shortcode( 'toggle', 'toggle_shortcode' );
	add_shortcode( 'col', 'column_shortcode' );
	add_shortcode( 'col-nest', 'column_nested_shortcode' );
add_shortcode( 'cta-2', 'cta_two_shortcode' );
	add_shortcode( 'cta-1', 'cta_one_shortcode' );

if( !function_exists('wpex_fix_shortcodes') ) {
	function wpex_fix_shortcodes($content){
		$array = array (
			'<p>[' => '[',
			']</p>' => ']',
			']<br />' => ']'
		);
		$content = strtr($content, $array);
		return $content;
	}
	add_filter('the_content', 'wpex_fix_shortcodes');
}
	
?>