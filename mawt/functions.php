<?php
/**
 * My Awesome WordPress Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage mawt
 * @since 1.0.0
 * @version 1.9.0
 */

if ( !function_exists( 'mawt_scripts' ) ):
  function mawt_scripts () {
    wp_register_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Raleway:400,700', array(), '1.0.0', 'all' );
    wp_register_style( 'style', get_stylesheet_uri(), array('google-fonts'), '1.0.0', 'all' );

    wp_enqueue_style( 'google-fonts' );
    wp_enqueue_style( 'style' );

    wp_register_script( 'scripts', get_template_directory_uri() . '/scripts.js', array('jquery'), '1.0.0', true );

    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'scripts' );
  }
endif;

add_action('wp_enqueue_scripts', 'mawt_scripts');

if ( !function_exists( 'mawt_menus' ) ):
  function mawt_menus () {
    register_nav_menus(array(
      'main_menu' => __('Menú Principal', 'mawt'),
      'social_menu' => __('Menú Redes Sociales', 'mawt')
    ));
  }
endif;

add_action( 'init', 'mawt_menus' );

if ( !function_exists( 'mawt_register_sidebars' ) ):
  function mawt_register_sidebars () {
    register_sidebar(array(
      'name' => __('Sidebar principal', 'mawt') ,
      'id' => 'main_sidebar',
      'description' => __('Este es el sidebar principal', 'mawt'),
      'before_widget' => '<article id="%1$s" class="Widget  %2$s">',
      'after_widget' => '</article>',
      'before_title' => '<h3>',
      'after_title' => '</h3>',
    ));
  }
endif;

add_action('widgets_init', 'mawt_register_sidebars');

if ( !function_exists( 'mawt_setup' ) ):
  function mawt_setup () {
    //Soporte para traducciones
      //https://developer.wordpress.org/themes/functionality/internationalization/
      //https://make.wordpress.org/polyglots/handbook/
    //Herramientas
      //https://www.icanlocalize.com/tools/php_scanner
      //https://poedit.net/
    load_theme_textdomain( 'mawt', get_template_directory() . '/languages' );

    //https://developer.wordpress.org/reference/functions/add_theme_support/
    add_theme_support( 'post-thumbnails' );
    //add_image_size( name, width, height, crop );

    add_theme_support('html5', array(
      'comment-list',
      'comment-form',
      'search-form',
      'gallery',
      'caption'
    ));
  }
endif;

add_action( 'after_setup_theme', 'mawt_setup' );

require_once get_template_directory() . '/inc/custom-header.php';

require_once get_template_directory() . '/inc/customizer.php';

require_once get_template_directory() . '/inc/custom-login.php';

require_once get_template_directory() . '/inc/custom-admin.php';

//require_once get_template_directory() . '/inc/custom-post-types.php';

//require_once get_template_directory() . '/inc/custom-taxonomies.php';

//require_once get_template_directory() . '/inc/custom-metaboxes.php';

require_once get_template_directory() . '/inc/custom-pre-get-posts.php';

require_once get_template_directory() . '/inc/custom-theme-options.php';

require_once get_template_directory() . '/inc/custom-contact-form.php';

?>
