<?php
/**
 * SATORI Dojo theme functions and definitions.
 *
 * @package SATORI_Dojo
 */

if ( ! defined( 'SATORI_DOJO_VERSION' ) ) {
    define( 'SATORI_DOJO_VERSION', '0.1.0' );
}

require_once get_template_directory() . '/inc/setup.php';
require_once get_template_directory() . '/inc/assets.php';
require_once get_template_directory() . '/inc/customizer.php';
require_once get_template_directory() . '/inc/patterns.php';
require_once get_template_directory() . '/inc/template-tags.php';

// Ensure theme text domain is loaded.
/**
 * Load theme text domain.
 *
 * @return void
 */
function satori_dojo_load_textdomain() {
    load_theme_textdomain( 'satori-dojo', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'satori_dojo_load_textdomain' );
