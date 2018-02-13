<?php
/**
 * Template Name: Custom Blog
 * 
 * Description: Corporate Staffing Solution JobPosting Blog template
 * URI: http://www.web-savvy-marketing.com/
 * Author: Web Savvy Marketing
 * Version: 2.0
 * Author URI: http://www.web-savvy-marketing.com/
*/


remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_loop', 'wsm_css_custom_loop' );
/**
 * Attach a loop to the `genesis_loop` output hook so we can get some front-end output of blog to include our custom post type.
 *
 * @since 1.1.0
 */
function wsm_css_custom_loop() {

	$include = genesis_get_option( 'blog_cat' );
	$exclude = genesis_get_option( 'blog_cat_exclude' ) ? explode( ',', str_replace( ' ', '', genesis_get_option( 'blog_cat_exclude' ) ) ) : '';
	global $paged;
	$query_args = wp_parse_args(
		genesis_get_custom_field( 'query_args' ),
		array(
			'cat'              => $include,
			'category__not_in' => $exclude,
			'showposts'        => genesis_get_option( 'blog_cat_num' ),
			'paged'            => $paged,
			'post_type'      => array( 'post', 'job_posting' ),
		)
	);

	genesis_custom_loop( $query_args );
}
genesis();
