<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package FrameMacz
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function framemacz_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
		$classes[] = 'archive-view';
	}

	if (is_multi_author()) {
		$classes[] = 'group-blog';
	}

	// Adds a class whether a sidebar is in uses

	if (is_active_sidebar( 'sidebar-1' )) {
		$classes[] = 'has-sidebar';
	} else {
		$classes[] = 'no-sidebar';
	}

// Ads a class for front page Yaf_Route_Static

if (is_front_page()) {
	$classes[] = 'is-frontpage';
}

	return $classes;
}
add_filter( 'body_class', 'framemacz_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function framemacz_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'framemacz_pingback_header' );



function framemacz_specific_menu_location_atts( $atts, $item, $args, $depth ) {
    // add class for each nav link & change href when pages switch from frontpage to any
    if( $args->theme_location == 'primary' ) {
      // add the desired attributes:
      $atts['class'] = 'menu-link-class';
    }
		// var_dump($args);
      // change menu links when not in frontpage for smooth scrolling
      // If menu is Primary (#205)
    if(!is_front_page() && ($args->theme_location == 'menu-1' )) {
      switch ($atts['href']) {
          case '#page-top':
              $atts['href'] = get_home_url();
              break;
          case '#services':
              $atts['href'] = get_home_url().'#services';
              break;
          case '#portfolio':
              $atts['href'] = get_home_url().'#portfolio';
              break;
          case '#about':
              $atts['href'] = get_home_url().'#about';
              break;
          case '#team':
              $atts['href'] = get_home_url().'#team';
              break;
          case '#contact':
              $atts['href'] = get_home_url().'#contact';
              break;
          default:
              break;

      }
		// var_dump($atts);
		// echo "rbtm crap";
    }

    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'framemacz_specific_menu_location_atts', 10, 4 );
