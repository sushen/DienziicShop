<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SparkleStore Lite
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php sparklestore_html_tag_schema(); ?> >
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="site">

    <header id="masthead" class="site-header" itemscope="itemscope" itemtype="http://schema.org/WPHeader" role="banner">        
        <div class="header-container">
            <div class="topheader">
                <div class="container">
                    <div class="row">
                        <div class="quickinfowrap">                     
                            <ul class="quickinfo">
                                <?php
                                    $emial_icon       = esc_attr( get_theme_mod('sparklestore_email_icon') );
                                    $email_address    = sanitize_email( get_theme_mod('sparklestore_email_title') );
                                    
                                    $phone_icon       = esc_attr( get_theme_mod('sparklestore_phone_icon') );
                                    $phone_number     = esc_attr( get_theme_mod('sparklestore_phone_number') );
                                    
                                    $map_address_iocn = esc_attr( get_theme_mod('sparklestore_address_icon') );
                                    $map_address      = esc_html( get_theme_mod('sparklestore_map_address') );
                                ?>
                                    
                                <?php if(!empty( $email_address )) { ?>                                 
                                    <li>
                                        <span class="<?php if(!empty( $emial_icon )) { echo esc_attr( $emial_icon ); } ?>">&nbsp;</span>
                                        <a href="mailto:<?php echo esc_attr( antispambot( $email_address ) ); ?>"><?php echo esc_attr( antispambot( $email_address ) ); ?></a>
                                    </li>
                                <?php }  ?>
                                
                                <?php if(!empty( $phone_number )) { ?>                                  
                                    <li>
                                        <span class="<?php if(!empty( $phone_icon )) { echo esc_attr( $phone_icon ); } ?>">&nbsp;</span>
                                        <?php echo esc_attr( $phone_number ); ?>
                                    </li>
                                <?php }  ?>
                                
                                <?php if(!empty( $map_address )) { ?>                                   
                                    <li>
                                        <span class="<?php if(!empty( $map_address_iocn )) { echo esc_attr( $map_address_iocn ); } ?>">&nbsp;</span>
                                        <a target="_blank" href="https://www.google.com.np/maps/place/<?php echo esc_html( $map_address ); ?>"><?php echo esc_html( $map_address ); ?></a>
                                    </li>
                                <?php }  ?>                             
                            </ul>
                        </div>

                        <div class="toplinkswrap">
                            <div class="toplinks">

                                <div class="socialmedia-link">
                                    <ul>
                                        <?php if ( esc_url( get_theme_mod('sparklestore_lite_social_facebook') ) ) { ?>
                                            <li> <a title="Connect us on Facebook" href="<?php echo esc_url(get_theme_mod('sparklestore_lite_social_facebook'));?>" target="_blank"><i class="fa fa-facebook"></i></a> </li>
                                        <?php } ?>

                                        <?php if ( esc_url( get_theme_mod('sparklestore_lite_social_twitter') ) ) { ?>
                                            <li> <a title="Connect us on Twitter" href="<?php echo esc_url( get_theme_mod('sparklestore_lite_social_twitter') ); ?>" target="_blank"><i class="fa fa-twitter"></i></a> </li>
                                        <?php } ?>

                                        <?php if ( esc_url( get_theme_mod('sparklestore_lite_social_youtube') ) ) { ?>
                                            <li> <a href="<?php echo esc_url( get_theme_mod('sparklestore_lite_social_youtube') ); ?>" target="_blank"><i class="fa fa-youtube"></i></a> </li>
                                        <?php } ?>

                                        <?php if (esc_url(get_theme_mod('sparklestore_lite_social_instagram'))) { ?>
                                            <li> <a title="Connect us on Instagram" href="<?php echo esc_url( get_theme_mod('sparklestore_lite_social_instagram') ) ; ?>" target="_blank"><i class="fa fa-instagram"></i></a> </li>
                                        <?php } ?>

                                        <?php if ( esc_url( get_theme_mod('sparklestore_lite_social_linkedin') ) ) { ?>
                                            <li> <a href="<?php echo esc_url(get_theme_mod('sparklestore_lite_social_linkedin')); ?>" target="_blank">><i class="fa fa-linkedin"></i></a> </li>
                                        <?php } ?>

                                        <?php if ( esc_url( get_theme_mod('sparklestore_lite_social_pinterest') ) ) { ?>
                                            <li> <a href="<?php echo esc_url(get_theme_mod('sparklestore_lite_social_pinterest')); ?>" target="_blank"><i class="fa fa-pinterest"></i></a> </li>
                                        <?php } ?>
                                        <?php if(function_exists( 'sparklestore_products_wishlist' )) {  ?>
                                            <li>
                                                <div class="wishlistlink1">
                                                    <?php sparklestore_products_wishlist(); ?>
                                                </div>
                                            </li>
                                        <?php } ?>

                                        <li>
                                            <div class="myaccount">
                                                <a title="My Account" href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>">
                                                    <i class="fa fa-user"></i>
                                                    <span><?php esc_html_e('My Account', 'sparklestore-lite'); ?></span>
                                                </a>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div><!-- End Header Top Links --> 
                        </div>
                    </div>
                </div>
            </div>

            <div class="mainheader">
                <div class="container sp-clearfix">
                    <div class="sparklelogo">
                        <?php 
                            if ( function_exists( 'the_custom_logo' ) ) {
                                the_custom_logo();
                            } 
                        ?>
                        <div class="site-branding">                                 
                            <h1 class="site-title">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                    <?php bloginfo( 'name' ); ?>
                                </a>
                            </h1>
                            <?php
                            $description = get_bloginfo( 'description', 'display' );
                            if ( $description || is_customize_preview() ) { ?>
                                <p class="site-description"><?php echo $description; ?></p>
                            <?php } ?>
                        </div>
                    </div><!-- End Header Logo --> 

                    <div class="rightheaderwrap sp-clearfix">
                        <div class="category-search-form">
                            <?php 
                                if ( sparklestore_is_woocommerce_activated() ) {  
                                    sparklestore_advance_search_form(); 
                                } 
                            ?>
                        </div>
                         
                        <?php if ( sparklestore_is_woocommerce_activated() ) {  ?>
                            <div class="view-cart">
                                <?php echo wp_kses_post( sparklestore_shopping_cart() ); ?>
                                <div class="top-cart-content">
                                    <div class="block-subtitle"><?php esc_html_e('Recently added item(s)', 'sparklestore-lite'); ?></div>
                                    <?php the_widget('WC_Widget_Cart', 'title='); ?>
                                </div>
                            </div>
                        <?php } ?>

                        <?php if( function_exists ( 'sparklestore_products_wishlist' ) ) { ?>
                            <div class="wishlist">
                                <?php sparklestore_products_wishlist(); ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>  
        </div>
    </header>
    
    <nav class="main_menu_category_menu sp-clearfix">
        <div class="container">
            <?php
                $nav_cat = get_theme_mod( 'sparklestore_lite_nav_cat_options','enable' );
                if( !empty( $nav_cat ) && $nav_cat == 'enable' ){
            ?>
                <div class="category-menu-main">
                    <div class="category-menu-title">
                       <i class="fa fa-navicon"></i>
                       <?php esc_html_e('All Categories', 'sparklestore-lite'); ?>
                    </div>
                    <div class="menu-category">
                        <?php wp_nav_menu(array('theme_location' => 'sparklecategory')); ?>
                    </div>
                </div>
            <?php } ?>
            <div class="main-menu sp-clearfix">
                <div class="toggle-wrap">
                    <div class="toggle">
                        <i class="fa fa-align-justify"></i>
                        <span class="label"><?php esc_html_e('Menu', 'sparklestore-lite'); ?></span> 
                    </div>
                </div>
                <div class="main-menu-links <?php if( !empty( $nav_cat ) && $nav_cat != 'enable' ){ echo esc_attr( 'no_cat' ); } ?>">
                    <?php wp_nav_menu( array( 'theme_location' => 'sparkleprimary' ) ); ?>
                </div>
            </div>
        </div>
    </nav>

    <?php    
    if( is_front_page() ){ 
        $slider_options = esc_attr( get_theme_mod( 'sparklestore_slider_options', 'enable' ) );
        if( $slider_options == 'enable' ){ 
            do_action('sparklestore-slider');
        }
    }