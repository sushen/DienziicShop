<?php
/**
 * Describe child theme functions
 *
 * @package SparkleStore
 * @subpackage SparkleStore Lite
 * 
 */

/*-------------------------------------------------------------------------------------------------------------------------------*/
if ( ! function_exists( 'sparklestore_lite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sparklestore_lite_setup() {
    
    $sparklestore_lite_theme_info = wp_get_theme();
    $GLOBALS['sparklestore_lite_version'] = $sparklestore_lite_theme_info->get( 'Version' );
}
endif;

add_action( 'after_setup_theme', 'sparklestore_lite_setup' );


/**
 * Register Google fonts for News Portal Lite.
 *
 * @return string Google fonts URL for the theme.
 * @since 1.0.0
 */
if ( ! function_exists( 'sparklestore_lite_fonts_url' ) ) :
    function sparklestore_lite_fonts_url() {

        $fonts_url = '';
        $font_families = array();

        /*
         * Translators: If there are characters in your language that are not supported
         * by Open+Sans, translate this to 'off'. Do not translate into your own language.
         */
        if ( 'off' !== _x( 'on', 'Open+Sans font: on or off', 'sparklestore-lite' ) ) {
            $font_families[] = 'Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i';
        } 

        /*
         * Translators: If there are characters in your language that are not supported
         * by Raleway, translate this to 'off'. Do not translate into your own language.
         */
        if ( 'off' !== _x( 'on', 'Raleway font: on or off', 'sparklestore-lite' ) ) {
            $font_families[] = 'Raleway:100,200,200i,300,400,500,600,700,800';
        }

        if( $font_families ) {
            $query_args = array(
                'family' => urlencode( implode( '|', $font_families ) ),
                'subset' => urlencode( 'latin,latin-ext' ),
            );

            $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
        }

        return $fonts_url;
    }
endif;

/**
 * Managed the theme default color
 */
function sparklestore_lite_customize_register( $wp_customize ) {

	global $wp_customize;

    /**
     * Theme Primary Color
    */
    $wp_customize->add_section( 'sparklestore_lite_primary_theme_color', array(
      'title'    => esc_html__('Themes Color Options', 'sparklestore-lite'),
      'priority' => 2,
    ));

        $wp_customize->add_setting('sparklestore_lite_primary_theme_color_options', array(
            'default' => '#033772',
            'sanitize_callback' => 'sanitize_hex_color',        
        ));

        $wp_customize->add_control('sparklestore_lite_primary_theme_color_options', array(
            'type'     => 'color',
            'label'    => esc_html__('Primary Colors', 'sparklestore-lite'),
            'section'  => 'sparklestore_lite_primary_theme_color',
            'setting'  => 'sparklestore_lite_primary_theme_color_options',
        ));


        $wp_customize->add_setting('sparklestore_lite_secondary_theme_color_options', array(
            'default' => '#cd1b29',
            'sanitize_callback' => 'sanitize_hex_color',        
        ));

        $wp_customize->add_control('sparklestore_lite_secondary_theme_color_options', array(
            'type'     => 'color',
            'label'    => esc_html__('Secondary Colors', 'sparklestore-lite'),
            'section'  => 'sparklestore_lite_primary_theme_color',
            'setting'  => 'sparklestore_lite_secondary_theme_color_options',
        ));

    /**
     * Theme Header Settings
    */
    $wp_customize->add_panel('sparklestore_lite_header_settings', array(
       'priority' => 3,
       'title' => esc_html__('Header Settings', 'sparklestore-lite')
    ));

        /**
         * General Header Settings
        */
        $wp_customize->add_section( 'sparklestore_lite_general_header_settings', array(
            'title'    => esc_html__('General Header Settings', 'sparklestore-lite'),
            'panel'    => 'sparklestore_lite_header_settings',
            'priority' => 1,
        ));


            $wp_customize->add_setting('sparklestore_lite_nav_cat_options', array(
                'default' => 'enable',
                'sanitize_callback' => 'sparklestore_lite_radio_enable_disable_sanitize',
            ));

          $wp_customize->add_control('sparklestore_lite_nav_cat_options', array(
              'type' => 'radio',
              'label' => esc_html__('Enable / Disable Menu Category', 'sparklestore-lite'),
              'section' => 'sparklestore_lite_general_header_settings',
              'choices' => array(
                'enable' => esc_html__('Enable', 'sparklestore-lite'),
                'disable' => esc_html__('Disable', 'sparklestore-lite')
              )
          ));

        function sparklestore_lite_radio_enable_disable_sanitize($input) {
            $valid_keys = array(
                'enable' => esc_html__('Enable', 'sparklestore-lite'),
                'disable' => esc_html__('Disable', 'sparklestore-lite')
            );
            if ( array_key_exists( $input, $valid_keys ) ) {
                return $input;
            } else {
                return '';
            }
        }

        $wp_customize->get_section('sparklestore_header_quickinfo')->panel = 'sparklestore_lite_header_settings';

        /**
         * Social Icon Link
        */
        $wp_customize->add_section( 'sparklestore_lite_social_icon_settings', array(
            'title'    => esc_html__('Social Media Link', 'sparklestore-lite'),
            'panel'    => 'sparklestore_lite_header_settings',
            'priority' => 3,
        ));

            $sparklestore_lite_social_links = array(

                'sparklestore_lite_social_facebook' => array(
                    'id' => 'sparklestore_lite_social_facebook',
                    'title' => esc_html__('Facebook', 'sparklestore-lite'),
                    'default' => ''
                ),

                'sparklestore_lite_social_twitter' => array(
                    'id' => 'sparklestore_lite_social_twitter',
                    'title' => esc_html__('Twitter', 'sparklestore-lite'),
                    'default' => ''
                ),

                'sparklestore_lite_social_instagram' => array(
                    'id' => 'sparklestore_lite_social_instagram',
                    'title' => esc_html__('Instagram', 'sparklestore-lite'),
                    'default' => ''
                ),

                'sparklestore_lite_social_pinterest' => array(
                    'id' => 'sparklestore_lite_social_pinterest',
                    'title' => esc_html__('Pinterest', 'sparklestore-lite'),
                    'default' => ''
                ),

                'sparklestore_lite_social_youtube' => array(
                    'id' => 'sparklestore_lite_social_youtube',
                    'title' => esc_html__('YouTube', 'sparklestore-lite'),
                    'default' => ''
                ),
            );

            $i = 20;

            foreach( $sparklestore_lite_social_links as $sparklestore_lite_social_link ) {

                $wp_customize->add_setting(
                    $sparklestore_lite_social_link['id'], 

                    array(
                        'default' => $sparklestore_lite_social_link['default'],
                        'sanitize_callback' => 'esc_url_raw'
                    )
                );

                $wp_customize->add_control(
                    $sparklestore_lite_social_link['id'], 

                    array(
                        'label' => $sparklestore_lite_social_link['title'],
                        'section'=> 'sparklestore_lite_social_icon_settings',
                        'settings'=> $sparklestore_lite_social_link['id'],
                        'priority' => $i
                    )
                );

              $i++;

            }


}

add_action( 'customize_register', 'sparklestore_lite_customize_register', 20 );

/**
 * Enqueue child theme styles and scripts
 */
add_action( 'wp_enqueue_scripts', 'sparklestore_lite_scripts', 20 );

function sparklestore_lite_scripts() {
    
    global $sparklestore_lite_version;

    wp_enqueue_style( 'sparkleStore-lite-google-font', sparklestore_lite_fonts_url(), array(), null );
    
    wp_dequeue_style( 'sparklestore-style' );
    
	wp_enqueue_style( 'sparklestore-parent-style', trailingslashit( esc_url ( get_template_directory_uri() ) ) . '/style.css', array(), esc_attr( $sparklestore_lite_version ) );

    wp_enqueue_style( 'sparklestore-lite-style', get_stylesheet_uri(), array(), esc_attr( $sparklestore_lite_version ) );
    
    $sparklestore_lite_primary_color = get_theme_mod( 'sparklestore_lite_primary_theme_color_options', '#033772' );

    $sparklestore_lite_secondary_color = get_theme_mod( 'sparklestore_lite_secondary_theme_color_options', '#cd1b29' );
    
    $output_css = '';
    

    $output_css .= "
            .main_menu_category_menu,
            .main-menu .main-menu-links ul li,
            .menu-category ul,
            .menu-category ul ul,
            .rightheaderwrap #submit-button,
            .top-cart-content .block-subtitle,

            .woocommerce #respond input#submit, 
            .woocommerce a.button, 
            .woocommerce button.button, 
            .woocommerce input.button,
            .woocommerce a.added_to_cart:before, 
            .woocommerce a.button.add_to_cart_button:before, 
            .woocommerce a.button.product_type_grouped:before, 
            .woocommerce a.button.product_type_external:before, 
            .woocommerce a.button.product_type_variable:before,

            .woocommerce a.button.add_to_cart_button:hover, 
            li.product a.added_to_cart:hover, 
            .woocommerce #respond input#submit:hover, 
            .woocommerce button.button:hover, 
            .woocommerce .widget-area a.clear-all:hover, 
            .woocommerce input.button:hover, 
            .woocommerce a.button.product_type_grouped:hover, 
            .woocommerce a.button.product_type_external:hover, 
            .woocommerce a.button.product_type_variable:hover,
            .categoryarea ul.categoryslider li .categorycount,
            .woocommerce nav.woocommerce-pagination ul li a:focus, 
            .woocommerce nav.woocommerce-pagination ul li a:hover, 
            .woocommerce nav.woocommerce-pagination ul li span.current,
            .widget_shopping_cart_content .buttons a.wc-forward:before,

            .woocommerce .widget_shopping_cart .cart_list li a.remove:hover, 
            .woocommerce.widget_shopping_cart .cart_list li a.remove:hover,

            .woocommerce-account .woocommerce-MyAccount-navigation ul li.is-active a, 
            .woocommerce-account .woocommerce-MyAccount-navigation ul li:hover a,
            .woocommerce-account .woocommerce-MyAccount-navigation ul li a,
            .woocommerce #respond input#submit.alt, 
            .woocommerce a.button.alt, 
            .woocommerce button.button.alt, 
            .woocommerce input.button.alt,

            .quantity button, 
            .quantity input[type='button'], 
            .quantity input[type='reset'], 
            .quantity input[type='submit'],


            .main-menu .main-menu-links ul > li.menu-item-has-children:hover ul,

            .woocommerce .widget_price_filter .ui-slider .ui-slider-range,
            .woocommerce .widget_price_filter .ui-slider .ui-slider-handle,

            .blocktitlewrap .SparkleStoreAction>div,
            .box-hover .add-to-links li a:after,
            .fullpromowrap .fullwrap button, 
            .categorproducts .block-title-desc .view-bnt,
            ul.sparkletablinks > li a,
            .sparklestore-blogwrap .bloginner .blogmeta,
            .calendar_wrap caption,
            .widget_product_search a.button, 
            .widget_product_search button, 
            .widget_product_search input[type='submit'], 
            .widget_search .search-submit,
            .scrollup,
            .sparklestore-blogwrap li:hover .blogmeta,
            .nav-previous a, .nav-next a,
            .sparklestore-slider a.sparklestore-button:hover,
            .blog-readmore a,
            .pagination span.current, .pagination a:hover,
            .wishlist_table td.product-name a.button:hover{ 

                background-color: ". esc_attr( $sparklestore_lite_primary_color ) ."

            }\n";

    $output_css .= "
            .gridlist-toggle a,
            .gridlist-toggle a.active, 
            .gridlist-toggle a:hover, 
            .gridlist-toggle a:focus,
            .form-submit input, .return-to-shop a, 
            .yith-woocompare-widget .compare, 
            .yith-woocompare-widget .clear-all, 
            .woocommerce #review_form #respond .form-submit input, 
            .single-product .single_add_to_cart_button,
            .woocommerce div.product .woocommerce-tabs ul.tabs li:hover, 
            .woocommerce div.product .woocommerce-tabs ul.tabs li.active{ 

               background-color: ". esc_attr( $sparklestore_lite_primary_color ) ." !important;

            }\n";

    $output_css .= "
            @media (max-width: 768px){ .main-menu .main-menu-links ul li{ 

               background-color: ". esc_attr( $sparklestore_lite_primary_color ) ." !important;

            } }\n";


            

    $output_css .= "
            .site-branding,
            .topheader .quickinfowrap .quickinfo li:hover, 
            .topheader .quickinfowrap .quickinfo li:hover a, 
            .topheader .toplinkswrap .toplinks ul li:hover, 
            .topheader .toplinkswrap .toplinks ul li:hover a,
            .entry-title a:hover,
            ul.list-info li a:hover, .blog-readmore:hover,
            .post-detail-container .blog-readmore a:hover,

            a:hover,
            .item-title a:hover,

            .woocommerce #respond input#submit:hover, 
            .woocommerce a.button:hover, .woocommerce button.button:hover, 
            .woocommerce input.button:hover,

            .quantity button:hover, 
            .quantity input[type='button']:hover, 
            .quantity input[type='reset']:hover, 
            .quantity input[type='submit']:hover,

            .footer-middle .widget a:hover, 
            .footer-middle .widget a:hover::before, 
            .footer-middle .widget li:hover::before,
            .footer-bottom a:hover,

            .widget a:hover, .widget a:hover::before, .widget li:hover::before,
            .wishlist_table td.product-name a.button,

            .product_meta span a:hover,

            .woocommerce-message:before,
            .woocommerce-info:before,

            .email-icon:before,
            .add-icon:before,
            .phone-icon:before,
            .email-icon:before,

            .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,

            .woocommerce ul.cart_list li a:hover, .woocommerce ul.product_list_widget li a:hover,

            .wishlist .top-wishlist a i.fa, .view-cart .cart-contents .header-icon i{ 

                color: ". esc_attr( $sparklestore_lite_primary_color ) .";

            }\n";

    $output_css .= "
            .form-submit input:hover,
            .woocommerce #review_form #respond .form-submit input:hover, 
            .single-product .single_add_to_cart_button:hover,
            .yith-woocompare-widget .clear-all:hover, 
            .yith-woocompare-widget .compare:hover,
            single-product .yith-wcwl-add-to-wishlist .yith-wcwl-add-button a.add_to_wishlist:hover,

            .single-product .yith-wcwl-wishlistexistsbrowse.show a:hover, .single-product .entry-summary .compare.button:hover, .single-product .yith-wcwl-add-to-wishlist a.add_to_wishlist:hover{ 

               color: ". esc_attr( $sparklestore_lite_primary_color ) ." !important;

            }\n";

    $output_css .= "
        .top-cart-content .widget,
        .blog-readmore a,
        .post-detail-container .blog-readmore a:hover,
        .pagination span.current, .pagination a:hover,
        .pagination span.current, .pagination a,
        .fullpromowrap .fullwrap button, .categorproducts .block-title-desc .view-bnt,

        .woocommerce div.product .woocommerce-tabs ul.tabs:before,
        .woocommerce-cart .cart_totals h2, 
        .woocommerce .cart-collaterals .cross-sells h2, 
        .woocommerce-page .cart-collaterals .cross-sells h2, 
        .related.products h2, .up-sells.upsells.products h2, 
        .woocommerce-account #customer_login .col-1 h2, 
        .woocommerce-account #customer_login .col-2 h2, 
        .woocommerce-order-details h2, .woocommerce-customer-details h2,


        .woocommerce a.button.add_to_cart_button, 
        .woocommerce a.added_to_cart, 
        .woocommerce a.button.product_type_grouped, 
        .woocommerce a.button.product_type_external, 
        .woocommerce a.button.product_type_variable,

        .quantity button:hover, 
        .quantity input[type='button']:hover, 
        .quantity input[type='reset']:hover, 
        .quantity input[type='submit']:hover,

        .email-icon:before,
        .add-icon:before,
        .phone-icon:before,
        .email-icon:before,

        .woocommerce nav.woocommerce-pagination ul li,

        .wishlist_table td.product-name a.button,
        .woocommerce-message,
        .woocommerce-info,

        .woocommerce-cart .wc-proceed-to-checkout a.checkout-button,

        .woocommerce-billing-fields h3, .woocommerce-shipping-fields h3, h3#order_review_heading, .woocommerce-additional-fields h3, .woocommerce-Address-title h3,

        .woocommerce #respond input#submit,     
        .woocommerce a.button, 
        .woocommerce button.button, 
        .woocommerce input.button, 
        .woocommerce #respond input#submit:hover, 
        .woocommerce a.button:hover, .woocommerce button.button:hover, 
        .woocommerce input.button:hover,
        .widget-area .widget .widget-title,
        .flex-control-nav > li > a:hover, .flex-control-nav > li > a.flex-active{ 

            border-color: ". esc_attr( $sparklestore_lite_primary_color ) ."

        }\n";

    $output_css .= "
            .form-submit input, .return-to-shop a, 
            .yith-woocompare-widget .compare, 
            .yith-woocompare-widget .clear-all, 
            .woocommerce #review_form #respond .form-submit input, 
            .single-product .single_add_to_cart_button,
            .footer-middle .widget .widget-title{ 

               border-color: ". esc_attr( $sparklestore_lite_primary_color ) ." !important;

            }\n";


    $output_css .= "
            .wishlist .top-wishlist a .count, .view-cart .cart-contents .header-icon .count,
            .woocommerce span.onsale, .new-label,
            .blocktitlewrap .SparkleStoreAction>div:hover:before,
            .box-hover .add-to-links li a:hover, .box-hover .add-to-links li a:hover:after,
            ul.sparkletablinks > li a:hover, ul.sparkletablinks > li.active a{ 

               background-color: ". esc_attr( $sparklestore_lite_secondary_color ) .";

            }\n";

    $output_css .= "
            .woocommerce span.onsale:after, .new-label:after{ 

                border-color: ". esc_attr( $sparklestore_lite_secondary_color ) ." transparent transparent;

            }\n";

    $output_css .= "
            .footer-middle .widget h4.widget-title:before{ 

                border-color: ". esc_attr( $sparklestore_lite_secondary_color ) .";

            }\n";


    $output_css .= "
        @media (max-width: 768px){ .main-menu .main-menu-links .menu>li.menu-item-has-children li, .main-menu .main-menu-links .menu>li.menu-item-has-children li { 

            background-color:". esc_attr( $sparklestore_lite_primary_color ) .";

        } }\n";

    wp_add_inline_style( 'sparklestore-lite-style', $output_css );
    
}