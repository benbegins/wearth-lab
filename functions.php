
<?php

// Configure les fonctionnalités de bases
function wearthlab_theme_setup(){

    // Prise en charge des images de mise en avant
    add_theme_support('post-thumbnails');

    // Ajouter automatiquement le titre du site dans l'entete
    add_theme_support('title-tag');

    // Woocommerce theme support 
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-slider' );

    // Ajouts des menus
    // register_nav_menus( array(
    //     'main' => 'Menu Principal',
    // ) );

}
add_action( 'after_setup_theme', 'wearthlab_theme_setup' );

// Ajout des scripts
function wearthlab_theme_register_assets(){

    // CSS
    // wp_enqueue_style( 
    //     'font', 
    //     'https://use.typekit.net/pig7xlg.css',
    //     array(),
    //     '1.0'
    // );
    
    wp_enqueue_style( 
        'style', 
        get_template_directory_uri() . '/dist/main.css',
        array(),
        '1.0'
    );

    // JS
    // wp_enqueue_script( 
    //     'vue', 
    //     'https://unpkg.com/vue@3.2.20', 
    //     array(),
    //     '1.0',
    //     true
    // );
    wp_enqueue_script( 
        'app', 
        get_template_directory_uri() . '/dist/main.js', 
        array(),
        '1.0',
        true
    );

    // Remove Jquery
    // wp_deregister_script( 'jquery' );
    // Remove gutenberg css
		wp_dequeue_style( 'wp-block-library' );
        // Remove wp-embed script
		wp_deregister_script( 'wp-embed' );

}
add_action( 'wp_enqueue_scripts', 'wearthlab_theme_register_assets');


// Custom image size
add_image_size( 'xl', 1440);
add_image_size( 'xxl', 1900);


// Create option page
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}

//Disable plugin auto-update email notification
add_filter('auto_plugin_update_send_email', '__return_false');

// Cleanup Wordpress
require get_template_directory() . '/inc/cleanup.php';

// Custom Post and Taxonomy
require get_template_directory() . '/inc/custom-post.php';

// Woocommerce
require get_template_directory() . '/inc/woocommerce.php';



if ( ! function_exists( 'vq_disable_emoji_feature' ) ) {
	function vq_disable_emoji_feature() {

		// Prevent Emoji from loading on the front-end
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );

		// Remove from admin area also
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );

		// Remove from RSS feeds also
		remove_filter( 'the_content_feed', 'wp_staticize_emoji');
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji');

		// Remove from Embeds
		remove_filter( 'embed_head', 'print_emoji_detection_script' );

		// Disable from TinyMCE editor. Currently disabled in block editor by default
		add_filter( 'tiny_mce_plugins', 'vq_disable_emojis_tinymce' );

		/** Finally, prevent character conversion too
			 ** without this, emojis still work
			** if it is available on the user's device
		*/

		add_filter( 'option_use_smilies', '__return_false' );

	}
}

if ( ! function_exists( 'vq_disable_emojis_tinymce' ) ) {

	function vq_disable_emojis_tinymce( $plugins ) {
		if( is_array($plugins) ) {
			$plugins = array_diff( $plugins, array( 'wpemoji' ) );
		}
		return $plugins;
	}
}

add_action('init', 'vq_disable_emoji_feature');
