<?php
/**
 * Search results template.
 *
 * @package SATORI_Dojo
 */

global $wp_query;
get_header();
?>
    <header class="page-header">
        <h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'satori-dojo' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
    </header>

    <?php if ( have_posts() ) : ?>
        <?php
        while ( have_posts() ) :
            the_post();
            get_template_part( 'template-parts/content', 'search' );
        endwhile;

        the_posts_navigation();
        ?>
    <?php else : ?>
        <?php get_template_part( 'template-parts/content', 'none' ); ?>
    <?php endif; ?>
<?php
get_footer();
