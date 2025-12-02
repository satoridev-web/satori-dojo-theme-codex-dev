<?php
/**
 * 404 template.
 *
 * @package SATORI_Dojo
 */

get_header();
?>
    <section class="error-404 not-found">
        <header class="page-header">
            <h1 class="page-title"><?php esc_html_e( 'Page not found', 'satori-dojo' ); ?></h1>
        </header>
        <div class="page-content">
            <p>
                <?php
                esc_html_e(
                    'Sorry, we could not find what you were looking for. Try searching or return to the homepage.',
                    'satori-dojo'
                );
                ?>
            </p>
            <?php get_search_form(); ?>
            <p>
                <a class="button" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <?php esc_html_e( 'Back to home', 'satori-dojo' ); ?>
                </a>
            </p>
        </div>
    </section>
<?php
get_footer();
