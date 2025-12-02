<?php
/**
 * Customizer settings for SATORI Dojo.
 *
 * @package SATORI_Dojo
 */

if ( ! function_exists( 'satori_dojo_customize_register' ) ) {
    /**
     * Register Customizer settings and controls.
     *
     * @param WP_Customize_Manager $wp_customize Customizer object.
     * @return void
     */
    function satori_dojo_customize_register( $wp_customize ) {
        $wp_customize->add_panel(
            'satori_dojo_theme_options',
            array(
                'title'       => __( 'SATORI Dojo — Theme Options', 'satori-dojo' ),
                'description' => __( 'Manage branding, layout, club details, and integrations.', 'satori-dojo' ),
                'priority'    => 160,
            )
        );

        $font_choices = array(
            'system'      => __( 'System Sans (Default)', 'satori-dojo' ),
            'serif'       => __( 'Serif (Georgia, Times)', 'satori-dojo' ),
            'sans-serif'  => __( 'Sans (Inter, Arial)', 'satori-dojo' ),
            'mono'        => __( 'Mono ("SFMono", Menlo)', 'satori-dojo' ),
        );

        // Brand & Identity.
        $wp_customize->add_section(
            'satori_dojo_brand_identity',
            array(
                'title'    => __( 'Brand & Identity', 'satori-dojo' ),
                'panel'    => 'satori_dojo_theme_options',
                'priority' => 10,
            )
        );

        $wp_customize->add_setting(
            'satori_dojo_primary_color',
            array(
                'default'           => '#0f766e',
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'satori_dojo_primary_color',
                array(
                    'label'   => __( 'Primary Colour', 'satori-dojo' ),
                    'section' => 'satori_dojo_brand_identity',
                )
            )
        );

        $wp_customize->add_setting(
            'satori_dojo_secondary_color',
            array(
                'default'           => '#0ea5e9',
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'satori_dojo_secondary_color',
                array(
                    'label'   => __( 'Secondary Colour', 'satori-dojo' ),
                    'section' => 'satori_dojo_brand_identity',
                )
            )
        );

        $wp_customize->add_setting(
            'satori_dojo_background_color',
            array(
                'default'           => '#ffffff',
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'satori_dojo_background_color',
                array(
                    'label'   => __( 'Background Colour', 'satori-dojo' ),
                    'section' => 'satori_dojo_brand_identity',
                )
            )
        );

        // Typography.
        $wp_customize->add_section(
            'satori_dojo_typography',
            array(
                'title'    => __( 'Typography', 'satori-dojo' ),
                'panel'    => 'satori_dojo_theme_options',
                'priority' => 20,
            )
        );

        $wp_customize->add_setting(
            'satori_dojo_heading_font',
            array(
                'default'           => 'sans-serif',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
        $wp_customize->add_control(
            'satori_dojo_heading_font',
            array(
                'label'   => __( 'Heading Font', 'satori-dojo' ),
                'section' => 'satori_dojo_typography',
                'type'    => 'select',
                'choices' => $font_choices,
            )
        );

        $wp_customize->add_setting(
            'satori_dojo_body_font',
            array(
                'default'           => 'system',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
        $wp_customize->add_control(
            'satori_dojo_body_font',
            array(
                'label'   => __( 'Body Font', 'satori-dojo' ),
                'section' => 'satori_dojo_typography',
                'type'    => 'select',
                'choices' => $font_choices,
            )
        );

        $wp_customize->add_setting(
            'satori_dojo_base_font_size',
            array(
                'default'           => '16',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control(
            'satori_dojo_base_font_size',
            array(
                'label'       => __( 'Base Font Size (px)', 'satori-dojo' ),
                'section'     => 'satori_dojo_typography',
                'type'        => 'range',
                'input_attrs' => array(
                    'min'  => 14,
                    'max'  => 22,
                    'step' => 1,
                ),
            )
        );

        // Layout.
        $wp_customize->add_section(
            'satori_dojo_layout',
            array(
                'title'    => __( 'Layout', 'satori-dojo' ),
                'panel'    => 'satori_dojo_theme_options',
                'priority' => 30,
            )
        );

        $wp_customize->add_setting(
            'satori_dojo_container_width',
            array(
                'default'           => '1100',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control(
            'satori_dojo_container_width',
            array(
                'label'       => __( 'Container Width (px)', 'satori-dojo' ),
                'section'     => 'satori_dojo_layout',
                'type'        => 'range',
                'input_attrs' => array(
                    'min'  => 960,
                    'max'  => 1320,
                    'step' => 20,
                ),
            )
        );

        $wp_customize->add_setting(
            'satori_dojo_header_layout',
            array(
                'default'           => 'logo-left-nav-right',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
        $wp_customize->add_control(
            'satori_dojo_header_layout',
            array(
                'label'   => __( 'Header Layout', 'satori-dojo' ),
                'section' => 'satori_dojo_layout',
                'type'    => 'select',
                'choices' => array(
                    'logo-left-nav-right'   => __( 'Logo left, navigation right', 'satori-dojo' ),
                    'logo-center-nav-below' => __( 'Logo centred, navigation below', 'satori-dojo' ),
                ),
            )
        );

        $wp_customize->add_setting(
            'satori_dojo_footer_columns',
            array(
                'default'           => 3,
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control(
            'satori_dojo_footer_columns',
            array(
                'label'       => __( 'Footer Columns', 'satori-dojo' ),
                'section'     => 'satori_dojo_layout',
                'type'        => 'number',
                'input_attrs' => array(
                    'min' => 1,
                    'max' => 4,
                ),
            )
        );

        // Club / Business Details.
        $wp_customize->add_section(
            'satori_dojo_club_details',
            array(
                'title'    => __( 'Club / Business Details', 'satori-dojo' ),
                'panel'    => 'satori_dojo_theme_options',
                'priority' => 40,
            )
        );

        $club_fields = array(
            'club_name'       => __( 'Name', 'satori-dojo' ),
            'club_tagline'    => __( 'Tagline', 'satori-dojo' ),
            'club_address'    => __( 'Address', 'satori-dojo' ),
            'club_map_url'    => __( 'Map URL', 'satori-dojo' ),
            'club_email'      => __( 'Email', 'satori-dojo' ),
            'club_phone'      => __( 'Phone', 'satori-dojo' ),
            'training_times'  => __( 'Training Times', 'satori-dojo' ),
        );

        foreach ( $club_fields as $field => $label ) {
            $wp_customize->add_setting(
                "satori_dojo_{$field}",
                array(
                    'sanitize_callback' => 'wp_kses_post',
                )
            );
            $wp_customize->add_control(
                "satori_dojo_{$field}",
                array(
                    'label'   => $label,
                    'section' => 'satori_dojo_club_details',
                    'type'    => 'training_times' === $field ? 'textarea' : 'text',
                )
            );
        }

        // Social Media.
        $wp_customize->add_section(
            'satori_dojo_social_media',
            array(
                'title'    => __( 'Social Media', 'satori-dojo' ),
                'panel'    => 'satori_dojo_theme_options',
                'priority' => 50,
            )
        );

        $social_networks = array( 'facebook', 'instagram', 'youtube', 'tiktok' );
        foreach ( $social_networks as $network ) {
            $wp_customize->add_setting(
                "satori_dojo_{$network}_url",
                array(
                    'sanitize_callback' => 'esc_url_raw',
                )
            );
            $wp_customize->add_control(
                "satori_dojo_{$network}_url",
                array(
                    'label'   => sprintf(
                        /* translators: %s: Social network name. */
                        esc_html__( '%s URL', 'satori-dojo' ),
                        esc_html( ucfirst( $network ) )
                    ),
                    'section' => 'satori_dojo_social_media',
                    'type'    => 'url',
                )
            );
        }

        foreach ( array( 'header', 'footer' ) as $location ) {
            $wp_customize->add_setting(
                "satori_dojo_show_social_{$location}",
                array(
                    'default'           => false,
                    'sanitize_callback' => 'wp_validate_boolean',
                )
            );
            $wp_customize->add_control(
                "satori_dojo_show_social_{$location}",
                array(
                    'label'   => sprintf(
                        /* translators: %s: Location label (header or footer). */
                        esc_html__( 'Show icons in %s', 'satori-dojo' ),
                        esc_html( $location )
                    ),
                    'section' => 'satori_dojo_social_media',
                    'type'    => 'checkbox',
                )
            );
        }

        // Custom Code.
        $wp_customize->add_section(
            'satori_dojo_custom_code',
            array(
                'title'    => __( 'Custom Code', 'satori-dojo' ),
                'panel'    => 'satori_dojo_theme_options',
                'priority' => 60,
            )
        );

        $wp_customize->add_setting(
            'satori_dojo_custom_css',
            array(
                'sanitize_callback' => 'wp_strip_all_tags',
            )
        );
        $wp_customize->add_control(
            'satori_dojo_custom_css',
            array(
                'label'       => __( 'Custom CSS', 'satori-dojo' ),
                'section'     => 'satori_dojo_custom_code',
                'type'        => 'textarea',
                'description' => __( 'Add small CSS overrides. Avoid large stylesheets here.', 'satori-dojo' ),
            )
        );

        $wp_customize->add_setting(
            'satori_dojo_custom_js',
            array(
                'sanitize_callback' => 'wp_strip_all_tags',
            )
        );
        $wp_customize->add_control(
            'satori_dojo_custom_js',
            array(
                'label'       => __( 'Custom JS (advanced)', 'satori-dojo' ),
                'section'     => 'satori_dojo_custom_code',
                'type'        => 'textarea',
                'description' => __( 'Advanced use only. Scripts are printed in the footer.', 'satori-dojo' ),
            )
        );
    }
}
add_action( 'customize_register', 'satori_dojo_customize_register' );

if ( ! function_exists( 'satori_dojo_customizer_css' ) ) {
    /**
     * Output inline CSS variables based on Customizer settings.
     *
     * @return void
     */
    function satori_dojo_customizer_css() {
        $heading_font = satori_dojo_get_font_stack( get_theme_mod( 'satori_dojo_heading_font', 'sans-serif' ) );
        $body_font    = satori_dojo_get_font_stack( get_theme_mod( 'satori_dojo_body_font', 'system' ) );
        $base_size    = absint( get_theme_mod( 'satori_dojo_base_font_size', 16 ) );
        $container    = absint( get_theme_mod( 'satori_dojo_container_width', 1100 ) );

        $css_vars = array(
            '--satori-dojo-color-primary'          => sanitize_hex_color(
                get_theme_mod( 'satori_dojo_primary_color', '#0f766e' )
            ),
            '--satori-dojo-color-secondary'        => sanitize_hex_color(
                get_theme_mod( 'satori_dojo_secondary_color', '#0ea5e9' )
            ),
            '--satori-dojo-color-background'       => sanitize_hex_color(
                get_theme_mod( 'satori_dojo_background_color', '#ffffff' )
            ),
            '--satori-dojo-font-heading'           => $heading_font,
            '--satori-dojo-font-body'              => $body_font,
            '--satori-dojo-base-font-size'         => $base_size . 'px',
            '--satori-dojo-container-width'        => $container . 'px',
            '--satori-dojo-color-primary-strong'   => satori_dojo_adjust_brightness(
                get_theme_mod( 'satori_dojo_primary_color', '#0f766e' ),
                -10
            ),
            '--satori-dojo-color-surface'          => '#f7fafc',
            '--satori-dojo-color-text'             => '#1f2933',
            '--satori-dojo-color-text-muted'       => '#475569',
        );

        printf(
            '<style id="satori-dojo-customizer-vars">:root{%s}</style>',
            satori_dojo_array_to_css_vars( $css_vars )
        );

        $custom_css = get_theme_mod( 'satori_dojo_custom_css' );
        if ( ! empty( $custom_css ) ) {
            printf(
                '<style id="satori-dojo-custom-css">%s</style>',
                wp_strip_all_tags( $custom_css )
            );
        }
    }
}
add_action( 'wp_head', 'satori_dojo_customizer_css' );

if ( ! function_exists( 'satori_dojo_customizer_js' ) ) {
    /**
     * Output optional custom JS in footer.
     *
     * @return void
     */
    function satori_dojo_customizer_js() {
        $custom_js = get_theme_mod( 'satori_dojo_custom_js' );
        if ( empty( $custom_js ) ) {
            return;
        }

        printf(
            '<script id="satori-dojo-custom-js">%s</script>',
            wp_strip_all_tags( $custom_js )
        );
    }
}
add_action( 'wp_footer', 'satori_dojo_customizer_js', 20 );
