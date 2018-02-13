<?php 
do_action( 'genesis_home' );


add_action( 'genesis_after_header', 'css_home_top' ); 
function css_home_top() {
	echo '<div class="home-top"><div class="wrap">';
		genesis_widget_area( 'home-featured', array( 'before' => '<div class="home-slider">', 'after' => '</div>') );
		genesis_widget_area( 'home-top-left', array( 'before' => '<div class="home-top-left">', 'after' => '</div>') );
	echo '</div></div>';
}

// Remove the standard loop 
remove_action( 'genesis_loop', 'genesis_do_loop' );

// Execute custom child loop
add_action( 'genesis_loop', 'css_home_loop_helper' ); 
function css_home_loop_helper() {
	echo '<div class="home-main">';
		genesis_widget_area( 'home-main-left', array( 'before' => '<div class="home-main-left widget-area">', 'after' => '</div>') );
		genesis_widget_area( 'home-main-right', array( 'before' => '<div class="home-main-right widget-area">', 'after' => '</div>') );
	echo '</div>';
}

genesis();