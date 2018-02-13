<?php 

/**
 * Footer Functions
 *
 * This file controls the footer on the site. The standard Genesis footer
 * has been replaced with one that has menu links on the right side and
 * copyright and credits on the left side.
 *
 * @category     ChildTheme
 * @package      Admin
 * @author       Web Savvy Marketing
 * @copyright    Copyright (c) 2012, Web Savvy Marketing
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since        1.0.0
 *
 */
 
add_action( 'genesis_before_footer', 'css_clients_logos', 5 );
function css_clients_logos() {
	echo '<div class="bottom-section">';
		genesis_widget_area( 'footer-subscribe', array( 'before' => '<div class="bottom-subscribe widget-area"><div class="wrap">', 'after' => '</div></div>') );
		genesis_widget_area( 'clients', array( 'before' => '<div class="our-clients widget-area"><div class="wrap">', 'after' => '</div></div>') );
	echo '</div>';
}

remove_action( 'genesis_footer', 'genesis_do_footer' );

add_action( 'genesis_footer', 'css_child_do_footer' );
function css_child_do_footer() {

	$copyright = genesis_get_option( 'wsm_copyright', 'css-settings' );
	$credit= genesis_get_option( 'wsm_credit', 'css-settings' );
	
	if ( !empty($credit ) ) { 		
		echo '<p class="credit">' . genesis_get_option( 'wsm_credit', 'css-settings' ) . '</p>';
	}
	
	if ( !empty( $copyright ) ) { 		
		echo '<p class="copyright">' . genesis_get_option( 'wsm_copyright', 'css-settings' ) . '</p>';
	}

}