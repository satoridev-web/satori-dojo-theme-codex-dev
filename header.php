<?php
/**
 * The header template.
 *
 * @package SATORI_Dojo
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
wp_body_open();
$header_layout = get_theme_mod( 'satori_dojo_header_layout', 'logo-left-nav-right' );
?>
<header class="site-header header-layout-<?php echo esc_attr( $header_layout ); ?>">
    <div class="container">
        <div class="site-branding">
            <?php
            if ( has_custom_logo() ) {
                the_custom_logo();
            } else {
                ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="site-title">
                    <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
                </a>
                <p class="site-description"><?php echo esc_html( get_bloginfo( 'description', 'display' ) ); ?></p>
                <?php
            }
            ?>
        </div>
        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">&#9776;</button>
        <nav
            id="site-navigation"
            class="main-navigation"
            aria-label="<?php esc_attr_e( 'Primary Menu', 'satori-dojo' ); ?>"
        >
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                )
            );
            ?>
        </nav>
        <?php satori_dojo_display_social_icons( 'header' ); ?>
    </div>
</header>
<main id="primary" class="site-main">
    <div class="container">
