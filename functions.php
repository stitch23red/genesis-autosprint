<?php
/**
 * WizzIT AutoSprint Theme
 *
 * This file adds functions to the Genesis Autosprint Theme
 *
 * @package AutoSprint Theme
 * @author  WizzIT
 * @license GPL-2.0+
 * @link    https://www.wizzits.com.au
 */

// Starts the engine.
require_once get_template_directory() . '/lib/init.php';

// Sets up the Theme.
require_once get_stylesheet_directory() . '/lib/theme-defaults.php';

// Add custom admin page
require_once get_stylesheet_directory() . '/inc/function-admin.php';

add_action( 'after_setup_theme', 'genesis_wizzit_localization_setup' );
/**
 * Sets localization (do not remove).
 *
 * @since 1.0.0
 */
function genesis_wizzit_localization_setup() {

	load_child_theme_textdomain( 'genesis-wizzit', get_stylesheet_directory() . '/languages' );

}

// Adds helper functions.
require_once get_stylesheet_directory() . '/lib/helper-functions.php';

// Adds image upload and color select to Customizer.
require_once get_stylesheet_directory() . '/lib/customize.php';

// Includes Customizer CSS.
require_once get_stylesheet_directory() . '/lib/output.php';

// Adds WooCommerce support.
require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-setup.php';

// Adds the required WooCommerce styles and Customizer CSS.
require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-output.php';

// Adds the Genesis Connect WooCommerce notice.
require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-notice.php';

//* Add support for custom header
add_theme_support( 'custom-header', array(
	'width'           => 1600,
	'height'          => 340,
) );

// Defines the child theme (do not remove).
define( 'CHILD_THEME_NAME', 'Auto Sprint - WizzIT' );
define( 'CHILD_THEME_URL', 'https://www.wizzits.com.au/' );
define( 'CHILD_THEME_VERSION', '2.6.0' );

add_action( 'wp_enqueue_scripts', 'genesis_enqueue_scripts_styles' );
/**
 * Enqueues scripts and styles.
 *
 * @since 1.0.0
 */
function genesis_enqueue_scripts_styles() {
	wp_enqueue_style(
		'wizzit-navigation',
		get_stylesheet_directory_uri() . '/css/navigation.css',
		array(),
		null
	);

	wp_enqueue_style(
		'FontAwesome',
		'https://use.fontawesome.com/releases/v5.0.13/css/all.css',
		array(),
		null
	);

	wp_enqueue_style(
		'genesis-source-sans-fonts',
		'//fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,700',
		array(),
		null
	);

	wp_enqueue_style(
		'google-fonts-anton',
		'//fonts.googleapis.com/css?family=Anton',
		array(),
		null
	);

	wp_enqueue_style(
		'google-fonts-daysone',
		'//fonts.googleapis.com/css?family=Days+One',
		array(),
		null
	);

	wp_enqueue_style( 'dashicons' );

/* Add Bootstrap */
/*
	wp_enqueue_style(
		'wizzit-bootstrap-min',
		get_stylesheet_directory_uri() . '/css/bootstrap.min.css',
		array(),
		null
	);

	wp_enqueue_style(
		'wizzit-bootstrap-grid-min',
		get_stylesheet_directory_uri() . '/css/bootstrap-grid.min.css',
		array(),
		null
	);

	wp_enqueue_style(
		'wizzit-bootstrap-reboot-min',
		get_stylesheet_directory_uri() . '/css/bootstrap-reboot.min.css',
		array(),
		null
	);

	wp_enqueue_script(
		'wizzit-bootstrap-bundle-min',
		get_stylesheet_directory_uri() . '/js/bootstrap.bundle.min.js',
		array(),
		null,
		true
	);

	wp_enqueue_script(
		'wizzit-bootstrap-min',
		get_stylesheet_directory_uri() . '/js/bootstrap.min.js',
		array(),
		null,
		true
	);
*/
	/* End Adding Bootstrap */


	if ( !is_admin() ) {
	  wp_deregister_script('jquery');
	  wp_register_script('jquery', 'https://code.jquery.com/jquery-1.12.4.js', false, '1.12.4');
	  wp_enqueue_script('jquery');
	}

	wp_enqueue_script(
		'wizzit-navigation',
		get_stylesheet_directory_uri() . '/js/navigation.js',
		array('jquery'),
		null,
		true
	);

}


/* Add Styles & JS for count down */
add_action( 'wp_enqueue_scripts', 'wizzit_enqueue_countdown_files' );
function wizzit_enqueue_countdown_files(){
	wp_enqueue_style(
		'wizzit-countdown-stylesheet',
		get_stylesheet_directory_uri() . '/css/countdown.css',
		array(),
		null
	);

	wp_enqueue_script(
		'wizzit-countdown-script',
		get_stylesheet_directory_uri() . '/js/countdown.js',
		array(),
		null,
		true
	);

}
/* End Count down */

/* Add Stylesheet for Sponsors Page */
add_action( 'wp_enqueue_scripts', 'wizzit_enqueue_sponsors_files' );
function wizzit_enqueue_sponsors_files(){
	wp_enqueue_style(
		'wizzit-sponsors-stylesheet',
		get_stylesheet_directory_uri() . '/css/sponsors.css',
		array(),
		null
	);
}

/* END Add Stylesheet for Sponsors Page */

/* Add Stylesheet for Results Page */
add_action( 'wp_enqueue_scripts', 'wizzit_enqueue_results_files' );
function wizzit_enqueue_results_files(){
	wp_enqueue_style(
		'wizzit-results-stylesheet',
		get_stylesheet_directory_uri() . '/css/results.css',
		array(),
		null
	);
}

/* END Add Stylesheet for Sponsors Page */

// Sets the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) {
	$content_width = 702; // Pixels.
}

// Adds support for HTML5 markup structure.
add_theme_support(
	'html5', array(
		'caption',
		'comment-form',
		'comment-list',
		'gallery',
		'search-form',
	)
);

// Adds support for accessibility.
add_theme_support(
	'genesis-accessibility', array(
		'404-page',
		'drop-down-menu',
		'headings',
		'rems',
		'search-form',
		'skip-links',
	)
);

// Adds viewport meta tag for mobile browsers.
add_theme_support(
	'genesis-responsive-viewport'
);

// Adds custom logo in Customizer > Site Identity.
add_theme_support(
	'custom-logo', array(
		'height'      => 200,
		'width'       => 800,
		'flex-height' => true,
		'flex-width'  => true,
	)
);

// Renames primary and secondary navigation menus.
add_theme_support(
	'genesis-menus', array(
		'primary'   => __( 'Header Menu', 'genesis-wizzit-primary' ),
		'secondary' => __( 'Footer Menu', 'genesis-wizzit-secondary' ),
	)
);

// Adds support for after entry widget.
add_theme_support( 'genesis-after-entry-widget-area' );

// Adds support for 3-column footer widgets.
add_theme_support( 'genesis-footer-widgets', 3 );

// Removes header right widget area.
unregister_sidebar( 'header-right' );

// Removes secondary sidebar.
unregister_sidebar( 'sidebar-alt' );

// Removes site layouts.
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );

// Removes output of primary navigation right extras.
remove_filter( 'genesis_nav_items', 'genesis_nav_right', 10, 2 );
remove_filter( 'wp_nav_menu_items', 'genesis_nav_right', 10, 2 );

add_action( 'genesis_theme_settings_metaboxes', 'genesis_wizzit_remove_metaboxes' );
/**
 * Removes output of unused admin settings metaboxes.
 *
 * @since 2.6.0
 *
 * @param string $_genesis_admin_settings The admin screen to remove meta boxes from.
 */
function genesis_wizzit_remove_metaboxes( $_genesis_admin_settings ) {

	remove_meta_box( 'genesis-theme-settings-header', $_genesis_admin_settings, 'main' );
	remove_meta_box( 'genesis-theme-settings-nav', $_genesis_admin_settings, 'main' );

}

add_filter( 'genesis_customizer_theme_settings_config', 'genesis_wizzit_remove_customizer_settings' );
/**
 * Removes output of header settings in the Customizer.
 *
 * @since 2.6.0
 *
 * @param array $config Original Customizer items.
 * @return array Filtered Customizer items.
 */
function genesis_wizzit_remove_customizer_settings( $config ) {

	unset( $config['genesis']['sections']['genesis_header'] );
	return $config;

}

// Displays custom logo.
add_action( 'genesis_site_title', 'the_custom_logo', 0 );

// Repositions the secondary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_footer', 'genesis_do_subnav', 10 );

add_filter( 'wp_nav_menu_args', 'genesis_wizzit_secondary_menu_args' );
/**
 * Reduces secondary navigation menu to one level depth.
 *
 * @since 2.2.3
 *
 * @param array $args Original menu options.
 * @return array Menu options with depth set to 1.
 */
function genesis_wizzit_secondary_menu_args( $args ) {

	if ( 'secondary' !== $args['theme_location'] ) {
		return $args;
	}

	$args['depth'] = 1;
	return $args;

}

add_filter( 'genesis_author_box_gravatar_size', 'genesis_sample_author_box_gravatar' );
/**
 * Modifies size of the Gravatar in the author box.
 *
 * @since 2.2.3
 *
 * @param int $size Original icon size.
 * @return int Modified icon size.
 */
function genesis_sample_author_box_gravatar( $size ) {

	return 90;

}

add_filter( 'genesis_comment_list_args', 'genesis_sample_comments_gravatar' );
/**
 * Modifies size of the Gravatar in the entry comments.
 *
 * @since 2.2.3
 *
 * @param array $args Gravatar settings.
 * @return array Gravatar settings with modified size.
 */
function genesis_sample_comments_gravatar( $args ) {

	$args['avatar_size'] = 60;
	return $args;

}

/* WizzIT Changes */

//* Disable the superfish script
add_action( 'wp_enqueue_scripts', 'sp_disable_superfish' );
function sp_disable_superfish() {
	wp_deregister_script( 'superfish' );
	wp_deregister_script( 'superfish-args' );
}

//Remove all page Titles
remove_action('genesis_entry_header', 'genesis_do_post_title');

//Add div inside header
add_action( 'genesis_header', 'wizzit_pre_header_div');
function wizzit_pre_header_div() {
	include(get_stylesheet_directory() . '/inc/templates/preheader.php');
}

/* Reposition primary navigation menu */
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_after_header', 'genesis_wizzit_nav', 7 );

function genesis_wizzit_nav() {
	printf( '<nav %s>', genesis_attr( 'custom-menu' ) );
	echo '<div class="toggle">
    			<i id="wizzit-burger" class="fa fa-bars wizzit-responsive-menu" aria-hidden="true"><span class="wizzit-burger-title">Menu</span></i>
  			</div>';

	wp_nav_menu( array(
	'theme_location' 	=> 'primary',
	'container'      	=> false,
	'depth'          	=> 0,
	'fallback_cb'    	=> false,
	'menu_class'     	=> 'genesis-nav-menu',
	'menu_id'					=> 'wizzit-primary-nav-menu',
	/*'walker'					=> new Nav_Wizzit_Walker(),*/
	) );

	echo '</nav>';
}


/* Reposition breadcrumbs before content */
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
add_action( 'genesis_before_content', 'genesis_do_breadcrumbs' );

// Change default breadcrumb text
add_filter('genesis_breadcrumb_args', 'change_breadcrumbs_youarehere_text');
function change_breadcrumbs_youarehere_text( $args ) {
	$args['labels']['prefix'] = 'You are here:&nbsp;';
	$args['sep'] = '&nbsp;> ';
	return $args;
}

// Remove site footer.
remove_action( 'genesis_footer', 'genesis_footer_markup_open', 5 );
remove_action( 'genesis_footer', 'genesis_do_footer' );
remove_action( 'genesis_footer', 'genesis_footer_markup_close', 15 );

// Customize site footer
add_action( 'genesis_footer', 'sp_custom_footer' );
function sp_custom_footer() { ?>

<div class="site-footer">
	<div class="wrap">
		<p><span class="dashicons dashicons-wordpress"></span> <?php echo date("Y"); ?> - Website by <a href="http://wizzits.com.au">WizzIT Computer Services</a></p>
	</div>
</div>

<?php }
