<?php
/**
 * The theme header
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'toc' ); ?></a>

	<header id="masthead" class="site-header">
        <div class="inner tiny">
            <div class="container">
                <div class="site-header-row row justify-content-between">
                    <div class="branding-col col-7">
                        <div class="site-branding">
	                        <?php $logo_color = is_front_page() ? '-white' : ''; ?>
                            <a class="site-title" href="<?php echo home_url(); ?>"><img class="custom-logo" src="<?php echo THEME_IMAGES . 'branding/logo' . $logo_color . '.svg'; ?>" alt="<?php echo get_bloginfo( 'name' ); ?>"></a>
                            <span class="site-description"><?php bloginfo( 'description' ); ?></span>
                        </div>
                    </div>
                    <?php if ( has_nav_menu( 'primary-menu' ) ) { ?>
                        <div class="nav-col col-5 text-end">
                            <nav id="site-navigation" class="main-navigation">
                                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php _e( 'Menu', 'toc' ); ?></button>
                                <?php
                                wp_nav_menu(
                                    array(
                                        'theme_location' => 'primary-menu',
                                        'menu_id'        => 'primary-menu',
                                    )
                                );
                                ?>
                                <button class="close-menu"><?php _e( 'Close Menu', 'toc' ); ?></button>
                            </nav>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
	</header>
