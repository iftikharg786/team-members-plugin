<?php
/**
 * Plugin Name: Team Members Grid
 * Description: A premium team members grid widget with specific default content and deep Elementor style integration.
 * Plugin URI:  https://yellowhoster.com
 * Version:     1.0.0
 * Author:      yellow hoster
 * Author URI:  https://yellowhoster.com
 * Text Domain: team-members
 * Update URI:  false
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Prevent WordPress from checking for updates for this plugin on WordPress.org
 */
add_filter('site_transient_update_plugins', function($value) {
    if (isset($value->response[plugin_basename(__FILE__)])) {
        unset($value->response[plugin_basename(__FILE__)]);
    }
    return $value;
});

/**
 * Register Team Members Widget.
 *
 * Include widget file and register widget class.
 *
 * @since 1.0.0
 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
 * @return void
 */
function register_team_members_widget($widgets_manager)
{

    require_once(__DIR__ . '/widgets/team-members-widget.php');

    $widgets_manager->register(new \Elementor_Team_Members_Widget());

}
add_action('elementor/widgets/register', 'register_team_members_widget');

/**
 * Enqueue Google Fonts (Playfair Display) and Plugin Styles
 */
function team_members_widget_enqueue_scripts()
{
    wp_enqueue_style('playfair-display', 'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&display=swap', array(), null);
    wp_enqueue_style('team-members-grid-style', plugins_url('/assets/css/style.css', __FILE__), array(), '1.0.1');
}
add_action('wp_enqueue_scripts', 'team_members_widget_enqueue_scripts');

