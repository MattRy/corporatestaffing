<?php

// Start the engine

require_once(TEMPLATEPATH.'/lib/init.php');
require_once( 'lib/init.php' );

// Calls the theme's constants & files
css_init();

// Editor Styles
add_editor_style( 'editor-style.css' );


// Add Viewport meta tag for mobile browsers
add_action( 'genesis_meta', 'css_add_viewport_meta_tag' );
function css_add_viewport_meta_tag() {
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0"/>';
}

// Force Stupid IE to NOT use compatibility mode
add_filter( 'wp_headers', 'css_keep_ie_modern' );
function css_keep_ie_modern( $headers ) {
        if ( isset( $_SERVER['HTTP_USER_AGENT'] ) && ( strpos( $_SERVER['HTTP_USER_AGENT'], 'MSIE' ) !== false ) ) {
                $headers['X-UA-Compatible'] = 'IE=edge,chrome=1';
        }
        return $headers;
}

// Load Moderinzr script for IE and Gravity Forms placeholders
add_action( 'get_header', 'css_load_modernizr' );
function css_load_modernizr() {
    wp_enqueue_script( 'modernizr', CHILD_URL . '/lib/js/modernizr.min.js', array( 'jquery' ), '0.4.0', TRUE );
}


// Add new image sizes
add_image_size( 'Blog Thumbnail', 224, 154, TRUE );
add_image_size( 'featured', 290, 330, TRUE );

// Customize the Search Box
add_filter( 'genesis_search_button_text', 'custom_search_button_text' );
function custom_search_button_text( $text ) {
    return esc_attr( 'Go' );
}

// Modify the author box display
add_filter( 'genesis_author_box', 'css_author_box' );
function css_author_box() {
	$authinfo = '';
	$authdesc = get_the_author_meta('description');

	if( !empty( $authdesc ) ) {
		$authinfo .= sprintf( '<section %s>', genesis_attr( 'author-box' ) );
		$authinfo .= '<h3 class="author-box-title">' . __( 'About the Author', 'css' ) . '</h3>';
		$authinfo .= get_avatar( get_the_author_id() , 104, '', get_the_author_meta( 'display_name' ) . '\'s avatar' ) ;
		$authinfo .= '<div class="author-box-content" itemprop="description">';
		$authinfo .= '<p>' . get_the_author_meta( 'description' ) . '</p>';
		$authinfo .= '</div>';
		$authinfo .= '</section>';
	}
	if ( is_author() || is_single() ) {
		echo $authinfo;
	}
}

//* Customize the entry meta in the entry header (requires HTML5 theme support)
add_filter( 'genesis_post_info', 'sp_post_info_filter' );
function sp_post_info_filter( $post_info ) {
$post_info = '[post_date format="M j, Y" before=""]';
return $post_info;
}


// Customize the post meta function
add_filter( 'genesis_post_meta', 'post_meta_filter' );
function post_meta_filter( $post_meta ) {
	if ( ! is_singular( array( 'post', 'job_posting' ) ) )   return;

	if ( is_singular( array( 'post' ) ) ) {
		$post_meta = '[post_categories sep=", " before="Categories: "] [post_tags sep=", " before="Employer: "] ';
	} else {
		// here it must be a job_posting - Decide if using post Tag or Hiring Organization taxonomy or both or none
		if ( ! has_term( '', array('post_tag', 'hiring_organizations' ) ) )  return '[post_categories sep=", " before="Categories: "]';
		// Has one of 'em
		$has_term_hire_org = has_term( '', 'hiring_organizations' );
		$has_term_post_tag = has_term( '', 'post_tag');
		if ( $has_term_hire_org && $has_term_post_tag ) {	
			// Has both	
			$post_meta = '[wsm-custom-post-meta taxonomy="employment_type" prepend="Employment Type: "]<br>[post_categories sep=", " before="Categories: "] <br>[post_tags sep=", " before="Employer: "] <br>[wsm-custom-post-meta taxonomy="hiring_organizations" sep=", " prepend=""]';
			return $post_meta;
		}
		if ( $has_term_post_tag ) {
			// Has post tag only
			$post_meta = '[wsm-custom-post-meta taxonomy="employment_type" prepend="Employment Type: "]<br>[post_categories sep=", " before="Categories: "] <br>[post_tags sep=", " before="Employer: "] ';
			return $post_meta;
		} 
			// Only has hiring org
		$post_meta = '[wsm-custom-post-meta taxonomy="employment_type" prepend="Employment Type: "] <br>[post_categories sep=", " before="Categories: "] <br>[wsm-custom-post-meta taxonomy="hiring_organizations" sep=", " prepend="Employer: "] ';
	}
    return $post_meta;
}

// Add Read More button to blog page and archives
//  Added Read More link code back per ticket # 698. 
add_filter( 'excerpt_more', 'css_add_excerpt_more' );
add_filter( 'get_the_content_more_link', 'css_add_excerpt_more' );
add_filter( 'the_content_more_link', 'css_add_excerpt_more' );
function css_add_excerpt_more( $more ) {

	//* Remove all nofollow on blog and archive pages TKT 1334  Dec 2017 */
    // return '<span class="more-link"><a href="' . get_permalink() . '" rel="nofollow">Keep Reading ></a></span>';
	return '<span class="more-link"><a href="' . get_permalink() . '">Keep Reading ></a></span>';
    // return '';
}

/*
 * Add support for targeting individual browsers via CSS
 * See readme file located at /lib/js/css_browser_selector_readm.html
 * for a full explanation of available browser css selectors.
 */
add_action( 'get_header', 'css_load_scripts' );
function css_load_scripts() {
    wp_enqueue_script( 'browserselect', CHILD_URL . '/lib/js/css_browser_selector.js', array('jquery'), '0.4.0', TRUE );
}

// Structural Wrap
add_theme_support( 'genesis-structural-wraps', array(
	'header',
	'nav',
	'site-inner',
	'footer-widgets',
	'footer',
) );


// Changes Default Navigation to Primary & Footer

add_theme_support ( 'genesis-menus' ,
	array (
		'primary' => 'Primary Navigation Menu' ,
	)
);

//* Unregister Layouts
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );
genesis_unregister_layout( 'sidebar-content-sidebar' );

//* Add support for 4-column footer widgets
add_theme_support( 'genesis-footer-widgets', 4);

// Setup Sidebars
unregister_sidebar( 'sidebar-alt' );
genesis_register_sidebar( array(
	'id'			=> 'home-top-left',
	'name'			=> __( 'Home Top Call to Action', 'css' ),
	'description'	=> __( 'This is the home page calls to action section.', 'css' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'home-featured',
	'name'			=> __( 'Featured Post', 'css' ),
	'description'	=> __( 'This is the featured post section.', 'css' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'home-main-left',
	'name'			=> __( 'Home Main - Left', 'css' ),
	'description'	=> __( 'This is the home main section.', 'css' ),
	'before_title' => '<h3 class="widget-title widgettitle">',
    'after_title' => '</h3>',
) );
genesis_register_sidebar( array(
	'id'			=> 'home-main-right',
	'name'			=> __( 'Home Main - Right', 'css' ),
	'description'	=> __( 'This is the home main section.', 'css' ),
	'before_title' => '<h3 class="widget-title widgettitle">',
    'after_title' => '</h3>',
) );
genesis_register_sidebar( array(
	'id'			=> 'home-sidebar',
	'name'			=> __( 'Home Page Sidebar', 'css' ),
	'description'	=> __( 'This is the Home Sidebar.', 'css' ),
	'before_title' => '<h3 class="widget-title widgettitle">',
    'after_title' => '</h3>',
) );
genesis_register_sidebar( array(
	'id'			=> 'blog-sidebar',
	'name'			=> __( 'Blog Sidebar', 'css' ),
	'description'	=> __( 'This is the Blog Page Sidebar.', 'css' ),
	'before_title' => '<h3 class="widget-title widgettitle">',
    'after_title' => '</h3>',
) );
genesis_register_sidebar( array(
	'id'			=> 'page-sidebar',
	'name'			=> __( 'Page Sidebar', 'css' ),
	'description'	=> __( 'This is the Page Sidebar.', 'css' ),
	'before_title' => '<h3 class="widget-title widgettitle">',
    'after_title' => '</h3>',
) );
genesis_register_sidebar( array(
	'id'			=> 'footer-subscribe',
	'name'			=> __( 'Footer Subscribe', 'css' ),
	'description'	=> __( 'This is the bottom subscribe section.', 'css' ),
	'before_title' => '<h3 class="widget-title widgettitle">',
    'after_title' => '</h3>',
) );
genesis_register_sidebar( array(
	'id'			=> 'clients',
	'name'			=> __( 'Footer Clients', 'css' ),
	'description'	=> __( 'This is bottom clients section.', 'css' ),
	'before_title' => '<h3 class="widget-title widgettitle">',
    'after_title' => '</h3>',
) );

// Remove edit link from TablePress tables for logged in users
add_filter( 'tablepress_edit_link_below_table', '__return_false' );


//* Manually insert Cat Title to Blog Categories
remove_action( 'genesis_before_loop', 'genesis_do_taxonomy_title_description', 15 );
add_action('genesis_before_loop','wsm_cat_title', 16);
function wsm_cat_title () {
	if( is_category() || is_tag() || is_tax() ) {
		global $wp_query;
		$term = is_tax() ? get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ) : $wp_query->get_queried_object();
		$intro_text = apply_filters( 'genesis_term_intro_text_output', $term->meta['intro_text'] );
		printf('<div class="archive-description"><h1 class="archive-title">%1$s</h1>%2$s</div>', single_cat_title( '', false ), $intro_text);
	}
}

//* Add description
add_action( 'genesis_before_loop', 'wsm_output_category_info', 17 );
function wsm_output_category_info() {
	if ( is_category() || is_tag() || is_tax() ) {
		echo term_description();
	}
}

// Remove Post Info from Archive Pages
// Includes category, tags, old jobs, new job_posting cpt
// Commented out per TKT 1413 - 02/2018 to add date back in. 
function wsm_remove_post_meta() {
	if (is_archive()) {
		remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
		}
}
// add_action ( 'genesis_entry_header', 'wsm_remove_post_meta' );

// Add page title to blog page template
add_action( 'genesis_before', 'wsm_blog_page_title' );
function wsm_blog_page_title() {
    if ( is_page_template( 'page_blog.php' ) ) {
        add_action( 'genesis_before_content', 'wsm_show_blog_page_title_text', 2 );
    }
}
function wsm_show_blog_page_title_text() {
	echo '<div class="archive-description taxonomy-description">';
    echo '<h1 class="entry-title archive-title">' . get_the_title() . '</h1>';
	echo'</div>';
}

// Add span to widget title
add_filter( 'widget_title', 'child_widget_title' );
function child_widget_title( $title ){
	if( $title )
	return sprintf('<span>%s</span>', $title );
}

//add_action( 'genesis_site_title', 'header_right_logo', 10 );
function header_right_logo() {
	$logo_right= genesis_get_option( 'wsm_header_logo', 'css-settings' );
	$logo_right_url= genesis_get_option( 'wsm_header_logo_url', 'css-settings' );
	if ( !empty( $logo_right ) ) {
	if ( !empty( $logo_right_url ) ) :
		echo '<span class="logo-right"><a href="' . genesis_get_option( 'wsm_header_logo', 'css-settings' ) . '"><img src="' . genesis_get_option( 'wsm_header_logo', 'css-settings' ) . '" alt="" /></a></span>';
	else :
		echo '<span class="logo-right"><img src="' . genesis_get_option( 'wsm_header_logo', 'css-settings' ) . '" alt="" /></span>';
	endif;
	}
}

// Add XPDF support for SearchWP
add_filter( 'searchwp_xpdf_path', 'wsm_searchwp_xpdf_path' );
function wsm_searchwp_xpdf_path() {
	return '/nas/content/live/websavvyninja/_wpeprivate/pdftotext'; // path to the binary NOT A FOLDER
}

function wsm_searchwp_init() {
	return SearchWP::instance();
}

// Button Shortcode
add_shortcode('button', 'learnmore_func');
function learnmore_func($atts) {
	extract(
	$a = shortcode_atts(array(
		'url' => '#',
		'class' => '',
		'target' => '',
		'title' => 'Click Here',
		), $atts));

	return '<div class="more-link ' . esc_attr($a['class']) . '"><a href="' . esc_attr($a['url']) . '" target="' . esc_attr($a['target']) . '">' . esc_attr($a['title']) . '</a></div>';
}

// Allow shortcode inside widget title
add_filter( 'widget_title', 'shortcode_unautop');
add_filter( 'widget_title', 'do_shortcode');

// <strong> Shortcode

function bold_shortcode( $atts, $content = null ) {
	return '<strong>' . $content . '</strong>';
}
add_shortcode( 'b', 'bold_shortcode' );


// Per tKT 773 we're going to change the widget titles from an h2 to an h3 on the front page.'
// add_action( 'dynamic_sidebar_before', 'mr_widget_title_h2_h3' );

function mr_widget_title_h2_h3( $sidebar_id ) {
 global $wp_registered_sidebars;
 if ( is_front_page() ) {
	if ( isset( $wp_registered_sidebars[$sidebar_id] ) ) {
		if ( isset($wp_registered_sidebars[$sidebar_id]['before_title']) ) {
		$now = $wp_registered_sidebars[$sidebar_id]['before_title'];
		$h3 = str_ireplace( '<h2', '<h3', $now );
		$wp_registered_sidebars[$sidebar_id]['before_title'] = $h3;
		}
	}
 }
}

// add_filter( 'wpseo_genesis_force_adjacent_rel_home', 'my_genesis_show_rel_links' );
function my_genesis_show_rel_links() {
	return true;
}
// add_filter( 'wpseo_disable_adjacent_rel_links', 'my_genesis_disable_rel_links' );
function my_genesis_disable_rel_links() {
	add_filter( 'wpseo_genesis_force_adjacent_rel_home', 'my_genesis_show_rel_links' );
	return false;
}

// Add next/prev attributes to links
add_filter('next_posts_link_attributes', 'wsm_posts_link_next_attribute');
add_filter('previous_posts_link_attributes', 'wsm_posts_link_previous_attribute');

function wsm_posts_link_next_attribute() {
    return 'rel="next" class="archive-pagination pagination"';
}

function wsm_posts_link_previous_attribute() {
    return 'rel="prev" class="archive-pagination pagination"';
}

// Restyle Previous/Next Page links to match "Keep Reading" lniks used elsewhere
//   Per TKT 1334  Dec 2017
// Two functions below pulled directly from post.php and tweaked.
remove_action( 'genesis_after_endwhile', 'genesis_posts_nav' );
add_action( 'genesis_after_endwhile', 'genesis_posts_nav_with_style' );

/**
 * Conditionally echo archive pagination in a format dependent on chosen setting.
 *
 * This is shown at the end of archives to get to another page of entries.
 *
 * @since 0.2.3
 */
function genesis_posts_nav_with_style() {

	if ( 'numeric' === genesis_get_option( 'posts_nav' ) ) {
		genesis_numeric_posts_nav_with_more_style();
	} else {
		genesis_prev_next_posts_nav_with_more_style();
	}

}
/**
 * Echo archive pagination in Previous Posts / Next Posts format.
 *
 * Applies `genesis_prev_link_text` and `genesis_next_link_text` filters.
 *
 * @since 0.2.2
 */
function genesis_prev_next_posts_nav_with_more_style() {

	$prev_link = get_previous_posts_link( apply_filters( 'genesis_prev_link_text', '&#x000AB; ' . __( 'Previous Page', 'genesis' ) ) );
	$next_link = get_next_posts_link( apply_filters( 'genesis_next_link_text', __( 'Next Page', 'genesis' ) . ' &#x000BB;' ) );

	if ( $prev_link || $next_link ) {

		$pagination = $prev_link ? sprintf( '<div class="pagination-previous alignleft more-link">%s</div>', $prev_link ) : '';
		$pagination .= $next_link ? sprintf( '<div class="pagination-next alignright more-link">%s</div>', $next_link ) : '';

		genesis_markup( array(
			'open'    => '<div %s>',
			'close'   => '</div>',
			'content' => $pagination,
			'context' => 'archive-pagination',
		) );

	}

}

// Move Yoast SEO to bottom of edit screen
function wsm_yoasttobottom() {
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'wsm_yoasttobottom');

/** A custom shortcode to fetch terms of a custom taxomomy for any post **/
add_shortcode( 'wsm-custom-post-meta', 'wsm_custom_post_meta' );
function wsm_custom_post_meta( $atts ) {
	$defaults = array(
		'prepend' => 'Listed Under: ', // Text to be added before the terms output.
		'append' => '', // Text to be added after the terms ouptut.
		'separator' => '&middot; ', // Separator used to separate multiple terms.
		'taxonomy' => '', // Taxonomy name to fetch the terms from. Replace to set a default.
	);
	
	$atts = shortcode_atts( $defaults, $atts, 'wsm-custom-post-meta' );
	
	// using get_the_term_list() to retrieve all the associated taxonomy terms for a taxonomy
	$wsm_tax = get_the_term_list( $post->ID, $atts['taxonomy'], '', trim( $atts['separator'] ) . ' ', '' );
	
	$output = '<span class="entry-categories wsm-categories">' . $atts['prepend'] . $wsm_tax . $atts['append'] . '</span>';
	
	// Allow a filter to change the default output and the shortcode attributes/arguments
	return apply_filters( 'wsm_custom_post_meta', $output, $atts );
}

// Add series of widget areas to hold embedded posts for job archive page. 
genesis_register_sidebar( array(
	'id'			=> 'job-page-content-ad-1',
	'name'			=> __( 'Job Archive Page Content Intermixed Ad 1', 'wsm' ),
	'description'	=> __( 'This is the Job Archive Page Content Intermixed Ad Space 1 - for blog post. Displayed after 3rd post.', 'wsm' ),
	'before_title' => '<h2 class="widget-title widgettitle">',
    'after_title' => '</h2>',
) );
genesis_register_sidebar( array(
	'id'			=> 'job-page-content-ad-2',
	'name'			=> __( 'Job Archive Page Content Intermixed Ad 2', 'wsm' ),
	'description'	=> __( 'This is the Job Archive Page Content Intermixed Ad Space 2 - for blog post. Displayed after 5th post.', 'wsm' ),
	'before_title' => '<h2 class="widget-title widgettitle">',
    'after_title' => '</h2>',
) );
genesis_register_sidebar( array(
	'id'			=> 'job-page-content-ad-3',
	'name'			=> __( 'Job Archive Page Content Intermixed Ad 3', 'wsm' ),
	'description'	=> __( 'This is the Job Archive Page Content Intermixed Ad Space 3 - for blog post. Displayed after 8th post.', 'wsm' ),
	'before_title' => '<h2 class="widget-title widgettitle">',
    'after_title' => '</h2>',
) );