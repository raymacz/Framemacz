<?php
/**
 * FrameMacz functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package FrameMacz
 */

if (! function_exists('framemacz_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function framemacz_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on FrameMacz, use a find and replace
         * to change 'framemacz' to the name of your theme in all the template files.
         */
        load_theme_textdomain('framemacz', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'menu-1' => esc_html__('Primary', 'framemacz'),
            'menu-2' => esc_html__('Footer', 'framemacz'),
            'menu-3' => esc_html__('Secondary', 'framemacz'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('framemacz_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ));
    }
endif;
add_action('after_setup_theme', 'framemacz_setup');

/**
 * Register custom fonts.
 */
function framemacz_fonts_url() {
	$fonts_url = '';

	/**
	 * Translators: If there are characters in your language that are not
	 * supported by fonts set below, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$source_4th_font = _x( 'on', 'PT Serif font: on or off', 'framemacz' );
	$source_3rd_font = _x( 'on', 'Roboto Slab font: on or off', 'framemacz' );
	$source_2nd_font = _x( 'on', 'Source Sans Pro font: on or off', 'framemacz' );
	$source_base_font = _x( 'on', 'PT Serif font: on or off', 'framemacz' );
  //echo "base font: "; print_r($source_base_font);
	$font_families = array();

	if ( 'off' !== $source_4th_font ) {
		$font_families[] = 'Montserrat:400,700';
	}

	if ( 'off' !== $source_3rd_font ) {
		$font_families[] = 'Roboto Slab:100,300,400,700';
	}

	if ( 'off' !== $source_2nd_font ) {
		$font_families[] = 'Kaushan Script';
	}

	if ( 'off' !== $source_base_font ) {
		$font_families[] = 'PT Serif:400,400i,700,700i';
	}


	if ( in_array( 'on', array($source_2nd_font, $source_base_font) ) ) {

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}


/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function framemacz_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'framemacz-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
//Prints resource hints to browsers for pre-fetching, pre-rendering and pre-connecting to web sites.
add_filter( 'wp_resource_hints', 'framemacz_resource_hints', 10, 2 );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function framemacz_content_width()
{
    $GLOBALS['content_width'] = apply_filters('framemacz_content_width', 640);
}
add_action('after_setup_theme', 'framemacz_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function framemacz_widgets_init()
{
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'framemacz'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'framemacz'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'framemacz_widgets_init');

// Enable this to add classes to <a> for Menus
// function add_menuclass($ulclass) {
//   return preg_replace('/<a /', '<a class="list-group-item"', $ulclass);
// }
//
// add_filter('wp_nav_menu','add_menuclass');


/**
 * Enqueue scripts and styles.
 */

 function replace_jquery() {
 	if (!is_admin()) { // comment out the next two lines to load the local copy of jQuery
 		wp_deregister_script('jquery');
 		wp_register_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js', false, '3.3.1');
 		wp_enqueue_script('jquery');
 	}
 }
//add_action('init', 'replace_jquery');


function framemacz_scripts()
{
		// Set Fonts
		wp_enqueue_style( 'framemacz-fonts', framemacz_fonts_url() );
    // bootstrap css
   //wp_enqueue_style( 'framemacz-style-bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');
    wp_enqueue_style('framemacz-style-bootstrap', get_template_directory_uri()  . '/bootstrap.css');
    // font awesome
    wp_enqueue_style('framemacz-style-fawesome', get_template_directory_uri()  . '/vendor/font-awesome/css/font-awesome.min.css');
    // style.css
    wp_enqueue_style('framemacz-style', get_stylesheet_uri()); // style.css
    // agency css
    wp_enqueue_style('framemacz-style-agency', get_template_directory_uri()  . '/agency.css');

    // bootstrap 4 requirement
    wp_enqueue_script('framemacz-script-tether', '//cdnjs.cloudflare.com/ajax/libs/tether/1.4.3/js/tether.min.js', array('jquery'), '20171225', true);
    wp_enqueue_script('framemacz-script-popper', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', array('jquery'), '20171225', true);
    wp_enqueue_script('framemacz-script-bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', array('jquery'), '20171225', true);

    // navigation
    wp_enqueue_script('framemacz-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '20151215', true);

    // check if svg is browser supported
    wp_enqueue_script('framemacz-functions-svg', get_template_directory_uri() . '/js/functions.js', array('jquery'), '20171225', true );
    wp_enqueue_script('framemacz-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);

    // Easing Plugin JavaScript
    wp_enqueue_script('framemacz-script-easing', get_template_directory_uri() . '/vendor/jquery-easing/jquery.easing.min.js', array(jquery), '20151215', true);

    // Custom scripts - Bootstrap 4 multilevel dropdown inside navigation
    wp_enqueue_script('framemacz-script-b4nav', get_template_directory_uri() . '/js/b4nav.js', array('jquery'), '20151215', true);

    // Custom scripts - Agency
    wp_enqueue_script('framemacz-script-agency', get_template_directory_uri() . '/js/agency.js', array('jquery'), '20151215', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'framemacz_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load SVG icon functions.
 */
require get_template_directory() . '/inc/icon-functions.php';
