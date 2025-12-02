<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @package SATORI_Dojo
 */
?>
<section class="no-results not-found">
    <header class="page-header">
        <h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'satori-dojo' ); ?></h1>
    </header>
    <div class="page-content">
        <p><?php esc_html_e( 'Ready to publish your first post? Use the editor to add content.', 'satori-dojo' ); ?></p>
        <?php get_search_form(); ?>
    </div>
</section>
