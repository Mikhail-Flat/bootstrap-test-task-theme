<?php
function enqueue_script_styles_theme() {
	wp_enqueue_style( 'theme_bootstrap', THEME_URI . '/assets/css/bootstrap.min.css' );
	wp_enqueue_style( 'theme_custom', THEME_URI . '/assets/css/custom.css' );

	wp_enqueue_script( 'theme_bootstrap', THEME_URI . '/assets/js/bootstrap.min.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'theme_custom', THEME_URI . '/assets/js/custom.js', array( 'jquery' ), false, true );
}
add_action( 'wp_enqueue_scripts', 'enqueue_script_styles_theme', -99999 );