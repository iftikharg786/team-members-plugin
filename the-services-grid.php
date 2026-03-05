<?php
/**
 * Plugin Name: The Services Grid
 * Description: A premium services grid widget with specific default content and deep Elementor style integration.
 * Plugin URI:  https://yellowhoster.com
 * Version:     1.0.0
 * Author:      yellow hoster
 * Author URI:  https://yellowhoster.com
 * Text Domain: the-services-grid
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Register Editing Services Widget.
 *
 * Include widget file and register widget class.
 *
 * @since 1.0.0
 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
 * @return void
 */
function register_editing_services_widget($widgets_manager)
{

    require_once(__DIR__ . '/widgets/service-grid-widget.php');

    $widgets_manager->register(new \Elementor_Service_Grid_Widget());

}
add_action('elementor/widgets/register', 'register_editing_services_widget');

/**
 * Enqueue Google Fonts (Playfair Display) and Plugin Styles
 */
function editing_services_widget_enqueue_scripts()
{
    wp_enqueue_style('playfair-display', 'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&display=swap', array(), null);
    wp_enqueue_style('editing-services-grid-style', plugins_url('/assets/css/style.css', __FILE__), array(), '1.0.1');
}
add_action('wp_enqueue_scripts', 'editing_services_widget_enqueue_scripts');
