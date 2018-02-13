<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB directory)
 *
 * Be sure to replace all instances of 'yourprefix_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */


if ( file_exists( CHILD_DIR . '/lib/metabox/init.php' ) ) {
	require_once CHILD_DIR . '/lib/metabox/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/CMB2/init.php';
}

// Register Top Image metabox

add_action( 'cmb2_init', 'css_feature_post_metabox' );
function css_feature_post_metabox() {

	$prefix = '_css_post_';

	$cmb_css_post_metabox = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => __( 'Featured Post Setting', 'cmb2' ),
		'object_types' => array( 'post',), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
	) );

	$cmb_css_post_metabox->add_field( array(
		'name' => __( 'Display as Featured', 'cmb2' ),
		'id'   => $prefix . 'feature',
		'type' => 'checkbox',
	) );

}

