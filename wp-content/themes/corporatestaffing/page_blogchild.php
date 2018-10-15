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
add_action( 'genesis_after_entry', 'wsm_job_archive_page_blog_widgets' );
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

/**
 * Job Archive Widgets
 *
 * Add widget areas to Job Archive page for display category specific blog posts.
 *
 */
function wsm_job_archive_page_blog_widgets() {

	global $wp_query;
	if ( 2 == $wp_query->current_post ) {   //* Dump it out after the 3rd post
		genesis_widget_area( 'job-page-content-ad-1', array(
			'before' => '<div class="job-page-content-ad">',
			'after'  => '</div>',
		) );
	} elseif ( 5 == $wp_query->current_post ) {  //* Dump it out after the 6th post
		genesis_widget_area( 'job-page-content-ad-2', array(
			'before' => '<div class="job-page-content-ad clearfix">',
			'after'  => '</div>',
		) );
	} elseif ( 8 == $wp_query->current_post ) {  //* Dump it out after the 9th post
		genesis_widget_area( 'job-page-content-ad-3', array(
			'before' => '<div class="job-page-content-ad clearfix">',
			'after'  => '</div>',
		) );
	}
}

genesis();
