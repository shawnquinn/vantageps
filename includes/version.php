<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Version Control
 *
 *
 */
?>
<?php
if ( function_exists('wp_get_theme')) {
	
function lumos_template_data() {
    echo '<!-- We need this for debugging -->' . "\n";
    echo '<!-- ' . get_lumos_template_name() . ' ' . get_lumos_template_version() . ' -->' . "\n";
}
 
add_action('wp_head', 'lumos_template_data');

function lumos_theme_data() {
    if ( is_child_theme() ) {
        echo '<!-- ' . get_lumos_theme_name() . ' ' . get_lumos_theme_version() . ' -->' . "\n";
    }
}

add_action('wp_head', 'lumos_theme_data');

function get_lumos_theme_name() {
	$theme = wp_get_theme();
	return $theme->Name;
}

function get_lumos_theme_version() {
	$theme = wp_get_theme();
	return $theme->Version;	
}

function get_lumos_template_name() {
	$theme = wp_get_theme();
	$parent = $theme->parent();
	if ( $parent )
		$theme = $parent;
	
	return $theme->Name;
}

function get_lumos_template_version() {
	$theme = wp_get_theme();
	$parent = $theme->parent();
	if ( $parent )
		$theme = $parent;

	return $theme->Version;	
}

} else {
	
/**
 * < 3.4 Backward Compatibility
 *
 * Konstantin Kovshenin Contribution
 *
 */
	
$theme_data = get_theme_data(STYLESHEETPATH . '/style.css');
define('lumos_current_theme', $theme_name = $theme_data['Name']);

function lumos_template_data() {

    $theme_data = get_theme_data(TEMPLATEPATH . '/style.css');
    $lumos_template_name = $theme_data['Name'];
    $lumos_template_version = $theme_data['Version'];

    echo '<!-- We need this for debugging -->' . "\n";
    echo '<meta name="template" content="' . $lumos_template_name . ' ' . $lumos_template_version . '" />' . "\n";
}

add_action('wp_head', 'lumos_template_data');

function lumos_theme_data() {
    if (is_child_theme()) {
        $theme_data = get_theme_data(STYLESHEETPATH . '/style.css');
        $lumos_theme_name = $theme_data['Name'];
        $lumos_theme_version = $theme_data['Version'];

        echo '<meta name="theme" content="' . $lumos_theme_name . ' ' . $lumos_theme_version . '" />' . "\n";
    }
}

add_action('wp_head', 'lumos_theme_data');
}