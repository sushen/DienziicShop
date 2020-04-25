<?php
/**
 * OCDI support.
 *
 * @package Sparklestore
 */

// Disable PT branding.
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

/**
 * OCDI after import.
 *
 * @since 1.0.0
 */
function sparklestore_ocdi_after_import() {

	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title( 'Home' );
	$blog_page_id  = get_page_by_title( 'Blogs' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );

    // Assign navigation menu locations.
    $menu_location_details = array(
        'sparkleprimary'     => 'main-menu',
        'sparklecategory'    => 'category',
        'sparkletopmenu'     => 'top-menu',
        'sparklefootermenu'  => 'footer-menu',
    );

    if ( ! empty( $menu_location_details ) ) {
        $navigation_settings = array();
        $current_navigation_menus = wp_get_nav_menus();
        if ( ! empty( $current_navigation_menus ) && ! is_wp_error( $current_navigation_menus ) ) {
            foreach ( $current_navigation_menus as $menu ) {
                foreach ( $menu_location_details as $location => $menu_slug ) {
                    if ( $menu->slug === $menu_slug ) {
                        $navigation_settings[ $location ] = $menu->term_id;
                    }
                }
            }
        }

        set_theme_mod( 'nav_menu_locations', $navigation_settings );
    }
}
add_action( 'pt-ocdi/after_import', 'sparklestore_ocdi_after_import' );


/**
 * Demo export/import
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Sparklestore
 */
if (!function_exists('sparklestore_ocdi_files')) :
    /**
     * OCDI files.
     *
     * @since 1.0.0
     *
     * @return array Files.
     */
    function sparklestore_ocdi_files() {

        return apply_filters( 'sparklestore_demo_import_files', array(
            
            array(
                'import_file_name'             => esc_html__( 'Technology Demo', 'sparklestore' ),
                'local_import_file'            => trailingslashit( get_template_directory() ) . 'welcome/demo-data/sparklestore.xml',
                'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'welcome/demo-data/sparklestore.wie',
                'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'welcome/demo-data/sparklestore.dat',
                'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'welcome/css/sparklestore.jpg',
                'preview_url'                  => 'http://demo.sparklewpthemes.com/sparklestore/',
            ),
            array(
                'import_file_name'             => esc_html__( 'Upgrade Premium', 'sparklestore' ),
                'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'welcome/css/sparklestorepro.jpg',
                'preview_url'                  => 'http://demo.sparklewpthemes.com/sparklestorepro/',
            ),
            array(
                'import_file_name'             => esc_html__( 'Upgrade Premium', 'sparklestore' ),
                'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'welcome/css/jewellery.jpg',
                'preview_url'                  => 'http://demo.sparklewpthemes.com/sparklestorepro/jewellery/',
            ),
            array(
                'import_file_name'             => esc_html__( 'Upgrade Premium', 'sparklestore' ),
                'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'welcome/css/clothing.jpg',
                'preview_url'                  => 'http://demo.sparklewpthemes.com/sparklestorepro/clothing/',
            ),
            array(
                'import_file_name'             => esc_html__( 'Upgrade Premium', 'sparklestore' ),
                'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'welcome/css/medical.jpg',
                'preview_url'                  => 'http://demo.sparklewpthemes.com/sparklestorepro/medical/',
            ),
            array(
                'import_file_name'             => esc_html__( 'Upgrade Premium', 'sparklestore' ),
                'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'welcome/css/cosmetics.jpg',
                'preview_url'                  => 'http://demo.sparklewpthemes.com/sparklestorepro/cosmetics/',
            )

        ));
    }
endif;
add_filter( 'pt-ocdi/import_files', 'sparklestore_ocdi_files');