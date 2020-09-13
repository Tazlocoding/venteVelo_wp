<?php 

include 'vendor/theme.php';

/**
 * Proper way to enqueue scripts and styles.
 */
function velo_load_css() {
  wp_enqueue_style(
    'velo-theme-style',
    get_template_directory_uri().'/assets/app.css'
  );
  
}
add_action( 'wp_enqueue_scripts', 'velo_load_css' );
