<?php
/**
 * Enqueue theme assets.
 *
 * @package SATORI_Dojo
 */

if ( ! function_exists( 'satori_dojo_scripts' ) ) {
    /**
     * Register scripts and styles.
     *
     * @return void
     */
    function satori_dojo_scripts() {
        $theme_version = wp_get_theme()->get( 'Version' );

        wp_enqueue_style(
            'satori-dojo-style',
            get_stylesheet_uri(),
            array(),
            $theme_version
        );

        wp_enqueue_style(
            'satori-dojo-theme',
            get_template_directory_uri() . '/assets/css/theme.css',
            array(),
            $theme_version
        );

        wp_enqueue_script(
            'satori-dojo-theme',
            get_template_directory_uri() . '/assets/js/theme.js',
            array(),
            $theme_version,
            true
        );
    }
}
add_action( 'wp_enqueue_scripts', 'satori_dojo_scripts' );

if ( ! function_exists( 'satori_dojo_editor_assets' ) ) {
    /**
     * Editor assets.
     *
     * @return void
     */
    function satori_dojo_editor_assets() {
        $theme_version = wp_get_theme()->get( 'Version' );

        wp_enqueue_style(
            'satori-dojo-editor',
            get_template_directory_uri() . '/assets/css/editor.css',
            array(),
            $theme_version
        );
    }
}
add_action( 'enqueue_block_editor_assets', 'satori_dojo_editor_assets' );
