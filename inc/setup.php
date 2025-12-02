<?php
/**
 * Theme setup and defaults.
 *
 * @package SATORI_Dojo
 */

if ( ! function_exists( 'satori_dojo_setup' ) ) {
    /**
     * Set up theme supports.
     */
    function satori_dojo_setup() {
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );

        register_nav_menus(
            array(
                'primary' => __( 'Primary Menu', 'satori-dojo' ),
                'footer'  => __( 'Footer Menu', 'satori-dojo' ),
            )
        );

        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
            )
        );

        add_theme_support(
            'custom-background',
            apply_filters(
                'satori_dojo_custom_background_args',
                array(
                    'default-color' => 'ffffff',
                    'default-image' => '',
                )
            )
        );

        add_theme_support( 'custom-logo' );
        add_theme_support( 'customize-selective-refresh-widgets' );
        add_theme_support( 'align-wide' );
        add_theme_support( 'responsive-embeds' );
        add_theme_support( 'wp-block-styles' );
        add_theme_support( 'editor-styles' );
        add_editor_style( 'assets/css/editor.css' );
    }
}
add_action( 'after_setup_theme', 'satori_dojo_setup' );

if ( ! function_exists( 'satori_dojo_content_width' ) ) {
    /**
     * Set content width.
     */
    function satori_dojo_content_width() {
        $GLOBALS['content_width'] = apply_filters( 'satori_dojo_content_width', 800 );
    }
}
add_action( 'after_setup_theme', 'satori_dojo_content_width', 0 );

if ( ! function_exists( 'satori_dojo_widgets_init' ) ) {
    /**
     * Register widget area.
     */
    function satori_dojo_widgets_init() {
        register_sidebar(
            array(
                'name'          => __( 'Sidebar', 'satori-dojo' ),
                'id'            => 'sidebar-1',
                'description'   => __( 'Add widgets here.', 'satori-dojo' ),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h2 class="widget-title">',
                'after_title'   => '</h2>',
            )
        );
    }
}
add_action( 'widgets_init', 'satori_dojo_widgets_init' );
