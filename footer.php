<?php
/**
 * The template for displaying the footer.
 *
 * @package SATORI_Dojo
 */
?>
    </div><!-- .container -->
</main><!-- #primary -->
<footer class="site-footer">
    <div class="container">
        <?php $footer_columns = absint( get_theme_mod( 'satori_dojo_footer_columns', 3 ) ); ?>
        <div class="footer-grid footer-columns-<?php echo esc_attr( $footer_columns ); ?>">
            <div class="footer-column">
                <h2 class="footer-heading">
                    <?php echo esc_html( get_theme_mod( 'satori_dojo_club_name', get_bloginfo( 'name' ) ) ); ?>
                </h2>
                <p>
                    <?php
                    echo esc_html(
                        get_theme_mod(
                            'satori_dojo_club_tagline',
                            get_bloginfo( 'description' )
                        )
                    );
                    ?>
                </p>
            </div>
            <div class="footer-column">
                <h3><?php esc_html_e( 'Contact', 'satori-dojo' ); ?></h3>
                <ul class="footer-contact">
                    <?php if ( satori_dojo_get_club_detail( 'club_address' ) ) : ?>
                        <li><?php echo esc_html( satori_dojo_get_club_detail( 'club_address' ) ); ?></li>
                    <?php endif; ?>
                    <?php if ( satori_dojo_get_club_detail( 'club_email' ) ) : ?>
                        <li>
                            <a href="mailto:<?php echo esc_attr( satori_dojo_get_club_detail( 'club_email' ) ); ?>">
                                <?php echo esc_html( satori_dojo_get_club_detail( 'club_email' ) ); ?>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if ( satori_dojo_get_club_detail( 'club_phone' ) ) : ?>
                        <li>
                            <a href="tel:<?php echo esc_attr( satori_dojo_get_club_detail( 'club_phone' ) ); ?>">
                                <?php echo esc_html( satori_dojo_get_club_detail( 'club_phone' ) ); ?>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if ( satori_dojo_get_club_detail( 'club_map_url' ) ) : ?>
                        <li>
                            <a
                                href="<?php echo esc_url( satori_dojo_get_club_detail( 'club_map_url' ) ); ?>"
                                target="_blank"
                                rel="noopener"
                            >
                                <?php esc_html_e( 'View map', 'satori-dojo' ); ?>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="footer-column">
                <h3><?php esc_html_e( 'Training Times', 'satori-dojo' ); ?></h3>
                <p>
                    <?php echo wp_kses_post( nl2br( satori_dojo_get_club_detail( 'training_times' ) ) ); ?>
                </p>
            </div>
            <div class="footer-column">
                <h3><?php esc_html_e( 'Connect', 'satori-dojo' ); ?></h3>
                <?php satori_dojo_display_social_icons( 'footer' ); ?>
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'footer',
                        'menu_class'     => 'footer-menu',
                        'depth'          => 1,
                    )
                );
                ?>
            </div>
        </div>
        <p class="site-info">
            &copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
        </p>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
