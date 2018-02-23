<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FrameMacz
 */

?>

  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <?php framemacz_post_thumbnail(); ?>
      <div class="post__content">
        <header class="entry-header">
          <?php  framemacz_entry_footer(); ?>
          <?php
          if (is_single()) :
            the_title('<h1 class="entry-title">', '</h1>');
            else :
              the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
            endif;

            if ('post' === get_post_type()) : ?>
            <div class="entry-meta">
              <?php framemacz_posted_on(); ?>
            </div>
            <!-- .entry-meta -->
          <?php endif; ?>
        </header><!-- .entry-header -->

        <div class="entry-content">
          <?php
          $read_more = sprintf(  wp_kses( __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'framemacz'),
            array( 'span' => array( 'class' => array(), ), )), get_the_title() );
            the_excerpt();
          //the_content($read_more);
          //wp_link_pages(array('before' => '<div class="page-links">' . esc_html__('Pages:', 'framemacz'), 'after'  => '</div>', ));
          ?>
        </div> <!-- entry-content -->
        <div class="continue-reading">
            <a href="<?php echo esc_url(get_permalink()) ?>" rel="bookmark"><?php echo $read_more; ?></a>
        </div>  <!-- continue-reading -->
      </div>  <!-- post__content -->
  </article>
  <!-- #post-<?php //the_ID(); ?> -->
