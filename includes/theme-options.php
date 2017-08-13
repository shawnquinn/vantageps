<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Theme Options
 */

/**
 * A safe way of adding JavaScripts to a WordPress generated page.
 */
function lumos_admin_enqueue_scripts( $hook_suffix ) {
	wp_enqueue_style('lumos-theme-options', get_template_directory_uri() . '/includes/theme-options.css', false, '1.0');
	wp_enqueue_script('lumos-theme-options', get_template_directory_uri() . '/includes/theme-options.js', array('jquery'), '1.0');
}
add_action('admin_print_styles-appearance_page_theme_options', 'lumos_admin_enqueue_scripts');

/**
 * Init plugin options to white list our options
 */
function lumos_theme_options_init() {
    register_setting('lumos_options', 'lumos_theme_options', 'lumos_theme_options_validate');
}

/**
 * Load up the menu page
 */
function lumos_theme_options_add_page() {
    add_theme_page(__('Theme Options', 'ctw'), __('Theme Options', 'ctw'), 'edit_theme_options', 'theme_options', 'lumos_theme_options_do_page');
}
	
/**
 * Create the options page
 */
function lumos_theme_options_do_page() {

	if (!isset($_REQUEST['settings-updated']))
		$_REQUEST['settings-updated'] = false;
	?>
    
    <div class="wrap">
        <?php
        /**
         * < 3.4 Backward Compatibility
         */
        ?>
        <?php $theme_name = function_exists('wp_get_theme') ? wp_get_theme() : get_current_theme(); ?>
        <?php screen_icon(); echo "<h2>" . $theme_name ." ". __('Theme Options', 'lumos') . "</h2>"; ?>
        

		<?php if (false !== $_REQUEST['settings-updated']) : ?>
		<div class="updated fade"><p><strong><?php _e('Options Saved', 'lumos'); ?></strong></p></div>
		<?php endif; ?>
        
        <?php lumos_theme_options(); // Theme Options Hook ?>
        
        <form method="post" action="options.php">
            <?php settings_fields('lumos_options'); ?>
            <?php global $lumos_options; ?>
            
            <div id="rwd" class="grid col-940">

            <h3 class="rwd-toggle"><a href="#"><?php _e('Theme Elements', 'lumos'); ?></a></h3>
            <div class="rwd-container">
                <div class="rwd-block"> 
                               
                <?php
                /**
                 * Breadcrumb Lists
                 */
                ?>
                <div class="grid col-300"><?php _e('Disable Breadcrumb Lists?', 'lumos'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
					    <input id="lumos_theme_options[breadcrumb]" name="lumos_theme_options[breadcrumb]" type="checkbox" value="1" <?php isset($lumos_options['breadcrumb']) ? checked( '1', $lumos_options['breadcrumb'] ) : checked('0', '1'); ?> />
						<label class="description" for="lumos_theme_options[breadcrumb]"><?php _e('Check to disable', 'lumos'); ?></label>
						
						<p class="submit">
						<?php submit_button( __( 'Save Options', 'lumos' ), 'primary', 'lumos_theme_options[submit]', false ); ?>
						<?php submit_button( __( 'Restore Defaults', 'lumos' ), 'secondary', 'lumos_theme_options[reset]', false ); ?>
                        </p>
                    </div><!-- end of .grid col-620 -->
               
                                    
                </div><!-- end of .rwd-block -->
            </div><!-- end of .rwd-container -->
                        
            <h3 class="rwd-toggle"><a href="#"><?php _e('Home Page', 'lumos'); ?></a></h3>
            <div class="rwd-container">
                <div class="rwd-block">
                <?php
                /**
                 * Front Page Override Checkbox
                 */
                ?>
                <div class="grid col-300"><?php _e('Enable Custom Front Page', 'lumos'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="lumos_theme_options[front_page]" name="lumos_theme_options[front_page]" type="checkbox" value="1" <?php checked( '1', $lumos_options['front_page'], true ); ?> />
                        <label class="description" for="lumos_theme_options[home_headline]"><?php printf( __('Overrides the WordPress %1sfront page option%2s', 'lumos'), '<a href="options-reading.php">', '</a>'); ?></label>
                        <p class="submit">
						<?php submit_button( __( 'Save Options', 'lumos' ), 'primary', 'lumos_theme_options[submit]', false ); ?>
						<?php submit_button( __( 'Restore Defaults', 'lumos' ), 'secondary', 'lumos_theme_options[reset]', false ); ?>
                        </p>
                        
                    </div><!-- end of .grid col-620 -->	
				</div><!-- end of .rwd-block -->
            </div><!-- end of .rwd-container -->

            <h3 class="rwd-toggle"><a href="#"><?php _e('Social Icons', 'lumos'); ?></a></h3>
            <div class="rwd-container">
                <div class="rwd-block"> 
                            
                <?php
                /**
                 * Social Media
                 */
                ?>
                <div class="grid col-300"><?php _e('Twitter', 'lumos'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="lumos_theme_options[twitter_uid]" class="regular-text" type="text" name="lumos_theme_options[twitter_uid]" value="<?php if (!empty($lumos_options['twitter_uid'])) echo esc_url($lumos_options['twitter_uid']); ?>" />
                        <label class="description" for="lumos_theme_options[twitter_uid]"><?php _e('Enter your Twitter URL', 'lumos'); ?></label>
                    </div><!-- end of .grid col-620 -->

                <div class="grid col-300"><?php _e('Facebook', 'lumos'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="lumos_theme_options[facebook_uid]" class="regular-text" type="text" name="lumos_theme_options[facebook_uid]" value="<?php if (!empty($lumos_options['facebook_uid'])) echo esc_url($lumos_options['facebook_uid']); ?>" />
                        <label class="description" for="lumos_theme_options[facebook_uid]"><?php _e('Enter your Facebook URL', 'lumos'); ?></label>
                    </div><!-- end of .grid col-620 -->
                
                <div class="grid col-300"><?php _e('LinkedIn', 'lumos'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="lumos_theme_options[linkedin_uid]" class="regular-text" type="text" name="lumos_theme_options[linkedin_uid]" value="<?php if (!empty($lumos_options['linkedin_uid'])) echo esc_url($lumos_options['linkedin_uid']); ?>" /> 
                        <label class="description" for="lumos_theme_options[linkedin_uid]"><?php _e('Enter your LinkedIn URL', 'lumos'); ?></label>
                    </div><!-- end of .grid col-620 -->
                    
                <div class="grid col-300"><?php _e('YouTube', 'lumos'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="lumos_theme_options[youtube_uid]" class="regular-text" type="text" name="lumos_theme_options[youtube_uid]" value="<?php if (!empty($lumos_options['youtube_uid'])) echo esc_url($lumos_options['youtube_uid']); ?>" /> 
                        <label class="description" for="lumos_theme_options[youtube_uid]"><?php _e('Enter your YouTube URL', 'lumos'); ?></label>
                    </div><!-- end of .grid col-620 -->
                    
                <div class="grid col-300"><?php _e('StumbleUpon', 'lumos'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="lumos_theme_options[stumble_uid]" class="regular-text" type="text" name="lumos_theme_options[stumble_uid]" value="<?php if (!empty($lumos_options['stumble_uid'])) echo esc_url($lumos_options['stumble_uid']); ?>" /> 
                        <label class="description" for="lumos_theme_options[stumble_uid]"><?php _e('Enter your StumbleUpon URL', 'lumos'); ?></label>
                    </div><!-- end of .grid col-620 -->
                    
                    <div class="grid col-300"><?php _e('Blogger', 'lumos'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="lumos_theme_options[blogger_uid]" class="regular-text" type="text" name="lumos_theme_options[blogger_uid]" value="<?php if (!empty($lumos_options['stumble_uid'])) echo esc_url($lumos_options['blogger_uid']); ?>" /> 
                        <label class="description" for="lumos_theme_options[blogger_uid]"><?php _e('Enter your Blogger URL', 'lumos'); ?></label>
                    </div><!-- end of .grid col-620 -->
                    
                <div class="grid col-300"><?php _e('RSS Feed', 'lumos'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="lumos_theme_options[rss_uid]" class="regular-text" type="text" name="lumos_theme_options[rss_uid]" value="<?php if (!empty($lumos_options['rss_uid'])) echo esc_url($lumos_options['rss_uid']); ?>" /> 
                        <label class="description" for="lumos_theme_options[rss_uid]"><?php _e('Enter your RSS Feed URL', 'lumos'); ?></label>
                    </div><!-- end of .grid col-620 -->
                
                <div class="grid col-300"><?php _e('Google+', 'lumos'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="lumos_theme_options[google_plus_uid]" class="regular-text" type="text" name="lumos_theme_options[google_plus_uid]" value="<?php if (!empty($lumos_options['google_plus_uid'])) echo esc_url($lumos_options['google_plus_uid']); ?>" />  
                        <label class="description" for="lumos_theme_options[google_plus_uid]"><?php _e('Enter your Google+ URL', 'lumos'); ?></label>
                    </div><!-- end of .grid col-620 -->
                    
                <div class="grid col-300"><?php _e('Instagram', 'lumos'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="lumos_theme_options[instagram_uid]" class="regular-text" type="text" name="lumos_theme_options[instagram_uid]" value="<?php if (!empty($lumos_options['instagram_uid'])) echo esc_url($lumos_options['instagram_uid']); ?>" />  
                        <label class="description" for="lumos_theme_options[instagram_uid]"><?php _e('Enter your Instagram URL', 'lumos'); ?></label>
                    </div><!-- end of .grid col-620 -->
                    
                <div class="grid col-300"><?php _e('Pinterest', 'lumos'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="lumos_theme_options[pinterest_uid]" class="regular-text" type="text" name="lumos_theme_options[pinterest_uid]" value="<?php if (!empty($lumos_options['pinterest_uid'])) echo esc_url($lumos_options['pinterest_uid']); ?>" />  
                        <label class="description" for="lumos_theme_options[pinterest_uid]"><?php _e('Enter your Pinterest URL', 'lumos'); ?></label>
                    </div><!-- end of .grid col-620 -->
                    
                <div class="grid col-300"><?php _e('Yelp!', 'lumos'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="lumos_theme_options[yelp_uid]" class="regular-text" type="text" name="lumos_theme_options[yelp_uid]" value="<?php if (!empty($lumos_options['yelp_uid'])) echo esc_url($lumos_options['yelp_uid']); ?>" />  
                        <label class="description" for="lumos_theme_options[yelp_uid]"><?php _e('Enter your Yelp! URL', 'lumos'); ?></label>
                    </div><!-- end of .grid col-620 -->
                    
                <div class="grid col-300"><?php _e('Vimeo', 'lumos'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="lumos_theme_options[vimeo_uid]" class="regular-text" type="text" name="lumos_theme_options[vimeo_uid]" value="<?php if (!empty($lumos_options['vimeo_uid'])) echo esc_url($lumos_options['vimeo_uid']); ?>" />  
                        <label class="description" for="lumos_theme_options[vimeo_uid]"><?php _e('Enter your Vimeo URL', 'lumos'); ?></label>
                    </div><!-- end of .grid col-620 -->
                    
                <div class="grid col-300"><?php _e('foursquare', 'lumos'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="lumos_theme_options[foursquare_uid]" class="regular-text" type="text" name="lumos_theme_options[foursquare_uid]" value="<?php if (!empty($lumos_options['foursquare_uid'])) echo esc_url($lumos_options['foursquare_uid']); ?>" />  
                        <label class="description" for="lumos_theme_options[foursquare_uid]"><?php _e('Enter your foursquare URL', 'lumos'); ?></label>
                        <p class="submit">
						<?php submit_button( __( 'Save Options', 'lumos' ), 'primary', 'lumos_theme_options[submit]', false ); ?>
						<?php submit_button( __( 'Restore Defaults', 'lumos' ), 'secondary', 'lumos_theme_options[reset]', false ); ?>
                        </p>
                    </div><!-- end of .grid col-620 -->

                </div><!-- end of .rwd-block -->
            </div><!-- end of .rwd-container -->


            </div><!-- end of .grid col-940 -->
        </form>
    </div>
    <?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function lumos_theme_options_validate($input) {

	global $lumos_options;
	$defaults = lumos_get_option_defaults();

	if ( isset( $input['reset'] ) ) {

		$input = $defaults;

	} else {

		// checkbox value is either 0 or 1
		foreach (array(
			'breadcrumb',
			'front_page'
			) as $checkbox) {
			if (!isset($input[$checkbox]))
				$input[$checkbox] = null;
				$input[$checkbox] = ( $input[$checkbox] == 1 ? 1 : 0 );
		}

		$input['twitter_uid'] = esc_url_raw($input['twitter_uid']);
		$input['facebook_uid'] = esc_url_raw($input['facebook_uid']);
		$input['linkedin_uid'] = esc_url_raw($input['linkedin_uid']);
		$input['youtube_uid'] = esc_url_raw($input['youtube_uid']);
		$input['stumble_uid'] = esc_url_raw($input['stumble_uid']);
		$input['rss_uid'] = esc_url_raw($input['rss_uid']);
		$input['google_plus_uid'] = esc_url_raw($input['google_plus_uid']);
		$input['instagram_uid'] = esc_url_raw($input['instagram_uid']);
		$input['pinterest_uid'] = esc_url_raw($input['pinterest_uid']);
		$input['yelp_uid'] = esc_url_raw($input['yelp_uid']);
		$input['vimeo_uid'] = esc_url_raw($input['vimeo_uid']);
		$input['foursquare_uid'] = esc_url_raw($input['foursquare_uid']);

	}
	
    return $input;
}
