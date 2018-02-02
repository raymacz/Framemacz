<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FrameMacz
 */

get_header();

 // Services
get_template_part( 'template-parts/content', 'services' );

 // Portfolio Grid
get_template_part( 'template-parts/content', 'portfolio' );

// About
get_template_part( 'template-parts/content', 'about' );

// Team
get_template_part( 'template-parts/content', 'team' );

// Clients
get_template_part( 'template-parts/content', 'clients' );

// Contact
get_template_part( 'template-parts/content', 'contact' );



?>



<?php
get_footer();
