<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package FrameMacz
 */

if ( ! is_active_sidebar( 'footer-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area col-lg-12">
	<?php dynamic_sidebar( 'footer-1' ); ?>
</aside><!-- #secondary -->
