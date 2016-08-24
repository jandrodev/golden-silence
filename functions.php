<?php
/**
 * Created by PhpStorm.
 * User: alejandro.seisdedos
 * Date: 29/05/2015
 * Time: 13:26
 */



/**
 *
 * Enqueue Styles and Scripts in theme
 *
 */
function styles_and_scripts() {

    wp_enqueue_style( 'theme-styles', get_bloginfo('template_directory').'/css/theme-styles.css' );

    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'functions-js', get_bloginfo('template_directory').'/js/functions.js', 'jquery', '1.0', true );

}
add_action( 'wp_enqueue_scripts', 'styles_and_scripts' );


/**
 *
 * Register the main sidebar
 *
 */
function register_theme_sidebar() {

    register_sidebar( array(
            'name'          => 'Main Sidebar',
            'id'            => 'main-sidebar',
            'description'   => 'This is the main sidebar',
            'before_widget' => '',
            'after_widget'  => '',
            'before_title'  => '',
            'after_widget'  => ''
        )
    );

}
add_action( 'widgets_init', 'register_theme_sidebar' );


/**
 *
 * Remove unnecessary tags in the <head> that adds Wordpress
 *
 */
function remove_head_trash() {

    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wlwmanifest_link');

}
add_action('init','remove_head_trash');


/**
 *
 * Pagination Function
 *
 */
function pagination() {

    global $wp_query;
    $int = 999999999;

    echo paginate_links( array(
            'base' => str_replace( $int, '%#%', esc_url( get_pagenum_link( $int ) ) ),
            'format' => '?paged=%#%',
            'prev_text'    => __(' Previous '),
            'next_text'    => __(' Next '),
            'current' => max( 1, get_query_var('paged') ),
            'total' => $wp_query->max_num_pages )
    );
}


/**
 *
 * wp_title('|', true, 'right');
 *
 * @param $title
 * @param $sep
 * @return string
 *
 * @link https://tommcfarlin.com/filter-wp-title/
 *
 */
function mayer_wp_title( $title, $sep ) {

    global $paged, $page;
    if ( is_feed() ) {
        return $title;
    }

    $title .= get_bloginfo( 'name' );

    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) ) {
        $title = "$title $sep $site_description";
    }

    if ( $paged >= 2 || $page >= 2 ) {
        $title = sprintf( __( 'Page %s', 'mayer' ), max( $paged, $page ) ) . " $sep $title";
    }

    return $title;

}
add_filter( 'wp_title', 'mayer_wp_title', 10, 2 );