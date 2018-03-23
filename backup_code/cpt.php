<?php


$pt1 = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
// https://www.redbridgenet.com/how-to-get-image-thumbnail-filename-in-wordpress/

//get frontpage id
$post_id = get_option( 'page_on_front' ); //  $frontpage_id
//$blog_id = get_option( 'page_for_posts' );
//
//Initialize Custom Fields
$t1 = get_field('services_section_title', $post_id);
$d1 = get_field('services_section_description', $post_id);

// WP_Query arguments
$args = array(
	'post_type'              => array( 'service' ),
	'post_status'            => array( 'publish' ),
	'nopaging'               => true,
	'order'                  => 'DESC',
	'orderby'                => 'date',
);


// The Query
$query = new WP_Query( $args );

// check & print values
var_dump( $query->posts  );
echo 'foundpost: '.$query->found_posts;
echo 'postcount: '.$query->post_count;


// The Loop
if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post();
		// do something
	}
} else {
	// no posts found
}

// Restore original Post Data
wp_reset_postdata();


 ?>
