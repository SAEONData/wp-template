<?php
/**
 * SAEON functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage SAEON
 * @since 1.0.0
 */

function add_theme_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
}

add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

  
function saeon_theme_support() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	add_theme_support(
		'custom-logo',
		array(
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		)
	);
	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

}

/**
 * Add fields to Customise theme.
 */

function add_site_identitiy($wp_customize) {

	// $wp_customize->add_setting( 's-logo', array(
	// 'default' => '',
	// 'capability' => 'edit_theme_options'
	// ) );
   
	// $wp_customize->add_control( 's-logo', array(
	// 'label' => 'Header logo',
	// 'section' => 'title_tagline',
	// 'type' => 'media'
	// ) );

	/**
	 * Add 'Home Top Background Image' image upload Control.
	 */
	$wp_customize->add_setting(
		// $id
		's-logo',
		// $args
		array(
			'default'		=> get_stylesheet_directory_uri() . '/images/minimography_005_orig.jpg',
			'sanitize_callback'	=> 'esc_url_raw',
			'transport'		=> 'postMessage'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			// $wp_customize object
			$wp_customize,
			// $id
			's-logo',
			// $args
			array(
				'settings'		=> 's-logo',
				'section'		=> 'title_tagline',
				'label'			=> __( 'Website Logo', 'theme-slug' ),
				'description'	=> __( 'Select the image to be used for logo.', 'theme-slug' )
			)
		)
	);
   }
   add_action('customize_register', 'add_site_identitiy');



/**
 * Register navigation menus uses wp_nav_menu in five places.
 */
function saeon_menus() {

	$locations = array(
		'primary'  => __( 'Desktop Horizontal Menu', 'saeon' ),
	);

	register_nav_menus( $locations );
}

add_action( 'init', 'saeon_menus' );

/**
 * Get the information about the logo.
 *
 * @param string $html The HTML output from get_custom_logo (core function).
 *
 * @return string $html
 */
function saeon_get_custom_logo( $html ) {

	$logo_id = get_theme_mod( 'custom_logo' );

	if ( ! $logo_id ) {
		return $html;
	}

	$logo = wp_get_attachment_image_src( $logo_id, 'full' );

	if ( $logo ) {
		// For clarity.
		$logo_width  = esc_attr( $logo[1] );
		$logo_height = esc_attr( $logo[2] );

		// If the retina logo setting is active, reduce the width/height by half.
		if ( get_theme_mod( 'retina_logo', false ) ) {
			$logo_width  = floor( $logo_width / 2 );
			$logo_height = floor( $logo_height / 2 );

			$search = array(
				'/width=\"\d+\"/iU',
				'/height=\"\d+\"/iU',
			);

			$replace = array(
				"width=\"{$logo_width}\"",
				"height=\"{$logo_height}\"",
			);

			// Add a style attribute with the height, or append the height to the style attribute if the style attribute already exists.
			if ( strpos( $html, ' style=' ) === false ) {
				$search[]  = '/(src=)/';
				$replace[] = "style=\"height: {$logo_height}px;\" src=";
			} else {
				$search[]  = '/(style="[^"]*)/';
				$replace[] = "$1 height: {$logo_height}px;";
			}

			$html = preg_replace( $search, $replace, $html );

		}
	}

	return $html;

}

add_filter( 'get_custom_logo', 'saeon_get_custom_logo' );



/**
 * Register widget areas.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function saeon_sidebar_registration() {

	// Arguments used in all register_sidebar() calls.
	$shared_args = array(
		'before_title'  => '<h2 class="widget-title subheading heading-size-3">',
		'after_title'   => '</h2>',
		'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
		'after_widget'  => '</div></div>',
	);

	// Footer #1.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Footer #1', 'saeon' ),
				'id'          => 'sidebar-1',
				'description' => __( 'Widgets in this area will be displayed in the first column in the footer.', 'saeon' ),
			)
		)
	);

	// Footer #2.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Footer #2', 'saeon' ),
				'id'          => 'sidebar-2',
				'description' => __( 'Widgets in this area will be displayed in the second column in the footer.', 'saeon' ),
			)
		)
	);

}

add_action( 'widgets_init', 'saeon_sidebar_registration' );


