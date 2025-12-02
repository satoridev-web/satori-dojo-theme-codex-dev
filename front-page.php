<?php
/**
 * Front page template.
 *
 * @package SATORI_Dojo
 */

global $wp_query;
get_header();
?>
    <div class="front-hero">
        <div class="hero-content">
            <h1><?php bloginfo( 'name' ); ?></h1>
            <p><?php bloginfo( 'description' ); ?></p>
        </div>
    </div>

    <?php
    while ( have_posts() ) :
        the_post();
        the_content();
    endwhile;
    ?>
<?php
get_footer();
