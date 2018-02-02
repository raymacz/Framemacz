<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package FrameMacz
 */

?>
  <!doctype html>
  <html <?php language_attributes(); ?>>

  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
  </head>

  <body id="page-top" <?php body_class(); ?>>
    <div id="page" class="site myancestor">
      <a class="skip-link screen-reader-text" href="#content"> <?php esc_html_e('Skip to content', 'framemacz'); ?> </a>

      <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
          <!-- <div class="row"> -->
            <div class=" col-5 col-md-8 col-lg-3 col-xl-3">
              <?php the_custom_logo(); ?>
              <a class="navbar-brand js-scroll-trigger" href="<?php echo esc_url( home_url( '#page-top' ) ); ?>" rel="home" ><?php bloginfo( 'name' ); ?></a>
              <?php
              $description = get_bloginfo( 'description', 'display' );
              if ( $description || is_customize_preview() ) : ?>
                <i class="site-description"><small><?php echo $description; /* WPCS: xss ok. */ ?></small></i>
              <?php endif; ?>

            </div>
            <div class=" ml-auto" >

              <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu <i class="fa fa-bars"></i>
              </button>
            </div>
                <?php
                  //  Bootstrap 4 multilevel dropdown inside navigation
                $disp_menu = array(
                    'menu'						 => 'Main Menu',
                    'theme_location'	 => 'menu-1',
                    'menu_id'          => 'primary-menu',
                    'menu_class'       => 'navbar-nav text-uppercase ml-auto',
                    'container'	 			 => 'div',
                    'container_id'		 => 'navbarResponsive',
                    'container_class'	 => 'collapse navbar-collapse',
                    'depth'            => 5,
                  );

                if (!is_front_page()) {
                  $disp_menu['theme_location'] = 'menu-3';
                }
                    wp_nav_menu($disp_menu);
                ?>
        </div>  <!-- container -->
      </nav>

      <!-- Header -->

        <?php if (!(get_header_image() && is_front_page())) : ?>
          <!-- .header-image -->
        <header id="masthead" class="site-header" role="banner">
        <figure class="header-image">
          <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
  			    <img src="<?php header_image(); ?>" width="<?php echo esc_attr(get_custom_header()->width); ?>" height="<?php echo esc_attr(get_custom_header()->height); ?>" alt="header image">
  		    </a>
        </figure>
      <?php else: ?>
        <header id="masthead" class="masthead site-header" role="banner">
          <div class="container">
            <div class="intro-text">
              <div class="intro-lead-in">Welcome To Our Website!</div>
              <div class="intro-heading text-uppercase">It's Nice Of You To Visit...</div>
              <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">Tell Me More</a>
            </div>
          </div>

        <?php endif; // End header image check.?>

      </header>
