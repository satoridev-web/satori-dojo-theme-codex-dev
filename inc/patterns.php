<?php
/**
 * Block patterns registration.
 *
 * @package SATORI_Dojo
 */

if ( ! function_exists( 'satori_dojo_register_patterns' ) ) {
    /**
     * Register custom block patterns.
     *
     * @return void
     */
    function satori_dojo_register_patterns() {
        if ( ! function_exists( 'register_block_pattern' ) ) {
            return;
        }

        register_block_pattern_category(
            'satori-dojo',
            array( 'label' => __( 'SATORI Dojo', 'satori-dojo' ) )
        );

        $pattern_files = array(
            'club-hero.php'          => __( 'Club Hero', 'satori-dojo' ),
            'training-info.php'      => __( 'Training Info', 'satori-dojo' ),
            'team-grid.php'          => __( 'Instructors / Team Grid', 'satori-dojo' ),
            'cta-strip.php'          => __( 'CTA Strip', 'satori-dojo' ),
        );

        foreach ( $pattern_files as $file => $title ) {
            register_block_pattern(
                'satori-dojo/' . basename( $file, '.php' ),
                array(
                    'title'      => $title,
                    'categories' => array( 'satori-dojo' ),
                    'content'    => satori_dojo_get_pattern_content( get_template_directory() . '/patterns/' . $file ),
                )
            );
        }
    }
}
add_action( 'init', 'satori_dojo_register_patterns' );

if ( ! function_exists( 'satori_dojo_get_pattern_content' ) ) {
    /**
     * Get pattern file content.
     *
     * @param string $file File path.
     * @return string
     */
    function satori_dojo_get_pattern_content( $file ) {
        if ( ! file_exists( $file ) ) {
            return '';
        }

        ob_start();
        include $file;
        return ob_get_clean();
    }
}
