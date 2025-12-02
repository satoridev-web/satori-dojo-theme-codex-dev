<?php
/**
 * Template tags and helpers.
 *
 * @package SATORI_Dojo
 */

if ( ! function_exists( 'satori_dojo_get_font_stack' ) ) {
    /**
     * Map font option to a stack.
     *
     * @param string $choice Font choice key.
     * @return string
     */
    function satori_dojo_get_font_stack( $choice ) {
        switch ( $choice ) {
            case 'serif':
                return '"Georgia", "Times New Roman", serif';
            case 'sans-serif':
                return '"Inter", "Helvetica Neue", Arial, sans-serif';
            case 'mono':
                return '"SFMono-Regular", Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace';
            case 'system':
            default:
                return '-apple-system, BlinkMacSystemFont, "Segoe UI", "Helvetica Neue", Arial, sans-serif';
        }
    }
}

if ( ! function_exists( 'satori_dojo_array_to_css_vars' ) ) {
    /**
     * Convert key/value array to CSS custom properties string.
     *
     * @param array $vars Variables.
     * @return string
     */
    function satori_dojo_array_to_css_vars( $vars ) {
        $declarations = array();
        foreach ( $vars as $key => $value ) {
            if ( empty( $value ) ) {
                continue;
            }
            $declarations[] = esc_attr( $key ) . ':' . esc_attr( $value );
        }

        return implode( ';', $declarations );
    }
}

if ( ! function_exists( 'satori_dojo_adjust_brightness' ) ) {
    /**
     * Adjust hex color brightness.
     *
     * @param string $hex   Hex code.
     * @param int    $steps Steps.
     * @return string
     */
    function satori_dojo_adjust_brightness( $hex, $steps ) {
        $hex   = str_replace( '#', '', $hex );
        $steps = max( -255, min( 255, $steps ) );

        $r = hexdec( substr( $hex, 0, 2 ) );
        $g = hexdec( substr( $hex, 2, 2 ) );
        $b = hexdec( substr( $hex, 4, 2 ) );

        $r = max( 0, min( 255, $r + $steps ) );
        $g = max( 0, min( 255, $g + $steps ) );
        $b = max( 0, min( 255, $b + $steps ) );

        return '#' . str_pad( dechex( $r ), 2, '0', STR_PAD_LEFT ) . str_pad( dechex( $g ), 2, '0', STR_PAD_LEFT ) . str_pad( dechex( $b ), 2, '0', STR_PAD_LEFT );
    }
}

if ( ! function_exists( 'satori_dojo_social_links' ) ) {
    /**
     * Retrieve social links.
     *
     * @return array
     */
    function satori_dojo_social_links() {
        $networks = array( 'facebook', 'instagram', 'youtube', 'tiktok' );
        $links    = array();

        foreach ( $networks as $network ) {
            $url = get_theme_mod( "satori_dojo_{$network}_url" );
            if ( ! empty( $url ) ) {
                $links[ $network ] = esc_url( $url );
            }
        }

        return $links;
    }
}

if ( ! function_exists( 'satori_dojo_display_social_icons' ) ) {
    /**
     * Render social icons list.
     *
     * @param string $location Location slug for toggle.
     */
    function satori_dojo_display_social_icons( $location = 'footer' ) {
        $show_icons = get_theme_mod( "satori_dojo_show_social_{$location}" );
        $links      = satori_dojo_social_links();

        if ( ! $show_icons || empty( $links ) ) {
            return;
        }

        echo '<ul class="satori-social-links">';
        foreach ( $links as $network => $url ) {
            printf(
                '<li class="social-%1$s"><a href="%2$s" aria-label="%1$s" target="_blank" rel="noopener">%3$s</a></li>',
                esc_attr( $network ),
                esc_url( $url ),
                esc_html( ucfirst( $network ) )
            );
        }
        echo '</ul>';
    }
}

if ( ! function_exists( 'satori_dojo_get_club_detail' ) ) {
    /**
     * Helper to fetch club detail with fallback.
     *
     * @param string $key   Theme mod key suffix.
     * @param string $default Default.
     * @return string
     */
    function satori_dojo_get_club_detail( $key, $default = '' ) {
        return get_theme_mod( "satori_dojo_{$key}", $default );
    }
}
