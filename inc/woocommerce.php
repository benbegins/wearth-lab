<?php

// Woocommerce remove actions
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
// remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );

remove_action('woocommerce_single_product_summary','woocommerce_template_single_title', 5);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_price', 10);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_rating', 10);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_excerpt', 20);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_meta', 40);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_sharing', 50);

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

// Woocommerce CSS
// add_filter( 'woocommerce_enqueue_styles', '__return_false' );

// Remove image link on single product page
function e12_remove_product_image_link( $html, $post_id ) {
    return preg_replace( "!<(a|/a).*?>!", '', $html );
}
add_filter( 'woocommerce_single_product_image_thumbnail_html', 'e12_remove_product_image_link', 10, 2 );

// Update WooCommerce Flexslider options

add_filter( 'woocommerce_single_product_carousel_options', 'ud_update_woo_flexslider_options' );

function ud_update_woo_flexslider_options( $options ) {

    $options['directionNav'] = true;
    return $options;
}
 
/*
 * Add Revision support to WooCommerce Products
 * 
 */

add_filter( 'woocommerce_register_post_type_product', 'cinch_add_revision_support' );

function cinch_add_revision_support( $supports ) {
     $supports['supports'][] = 'revisions';

     return $supports;
}