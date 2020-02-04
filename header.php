<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 */

?>
<?php ob_start(); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js" style="font-size:<?php echo apply_filters('theme_base_font_size', '16'); ?>px">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php endif; ?>
    <?php wp_head(); ?>
    
    
</head>

<body <?php body_class(); ?><?php body_style_attribute(); ?>>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'kc_scc_v3' ); ?></a>

    <header class="u-clearfix u-header u-sticky u-white u-header" id="sec-987c">
  <div class="u-align-left u-clearfix u-sheet u-sheet-1">
    <img src="<?php
                                $header_image = get_header_image();
                                if ($header_image) {
                                    echo esc_url($header_image);
                                } else {
                                    ?><?php echo get_template_directory_uri(); ?>/images/Knights_of_Columbus_Logo.png<?php
                                }
                            ?>" alt="" class="u-image u-image-default u-image-1" data-image-width="225" data-image-height="225">
    <h3 class="u-align-left-xs u-custom-font u-headline u-text u-text-1">
      <a href="<?php echo esc_url(home_url('/')); ?>"><?php $blogName = get_option('blogname'); if (strlen($blogName) > 0) { echo $blogName; } else {echo "Knights Of Columbus";}; ?></a>
    </h3>
    <?php
            ob_start();
            ?><nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1" data-responsive-from="XL">
      <div class="menu-collapse">
        <a class="u-button-style u-nav-link u-text-black" href="#" style="padding: 8px 0;">
          <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 302 302" style="undefined"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-a760"></use></svg>
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="svg-a760" x="0px" y="0px" viewBox="0 0 302 302" style="enable-background:new 0 0 302 302;" xml:space="preserve" class="u-svg-content"><g><rect y="36" width="302" height="30"></rect><rect y="236" width="302" height="30"></rect><rect y="136" width="302" height="30"></rect>
</g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
        </a>
      </div>
      <div class="u-nav-container">
        {menu}
      </div>
      <div class="u-nav-container-collapse">
        <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
          <div class="u-menu-close"></div>
          {responsive_menu}
        </div>
        <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
      </div>
    </nav><?php
            $menu_template = ob_get_clean();
            echo Theme_NavMenu::getMenuHtml(array(
                'container_class' => 'u-menu u-menu-dropdown u-offcanvas u-menu-1',
                'menu' => array(
                    'menu_class' => 'u-nav u-spacing-25 u-unstyled',
                    'item_class' => 'u-nav-item',
                    'link_class' => 'u-button-style u-nav-link',
                    'link_style' => 'padding: 8px 0;',
                    'submenu_class' => 'u-h-spacing-20 u-nav u-unstyled u-v-spacing-10 u-block-7f2e-6',
                    'submenu_item_class' => 'u-nav-item',
                    'submenu_link_class' => 'u-button-style u-nav-link u-white',
                    'submenu_link_style' => 'padding: 8px 0;',
                ),
                'responsive_menu' => array(
                    'menu_class' => 'u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2',
                    'item_class' => 'u-nav-item',
                    'link_class' => 'u-button-style u-nav-link',
                    'link_style' => 'padding: 8px 0;',
                    'submenu_class' => 'u-h-spacing-20 u-nav u-unstyled u-v-spacing-10 u-block-7f2e-10',
                    'submenu_item_class' => 'u-nav-item',
                    'submenu_link_class' => 'u-button-style u-nav-link u-white',
                    'submenu_link_style' => 'padding: 8px 0;',
                ),
                'theme_location' => 'primary-navigation-1',
                'template' => $menu_template,
            )); ?>
  </div>
</header>

    <div id="content">
        <?php $header = ob_get_clean();
        renderHeader($header, '', 'echo'); ?>
