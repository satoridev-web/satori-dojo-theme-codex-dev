<?php
/**
 * Front page template.
 *
 * @package SATORI_Dojo
 */

get_header();
?>
    <div class="front-hero">
        <div class="hero-content">
            <h1><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h1>
            <p><?php echo esc_html( get_bloginfo( 'description', 'display' ) ); ?></p>
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
