<?php
/*
Plugin Name: IDX Styler
Plugin URI: http://themes.agentevolution.com/
Description: Styles IDX features of your Agentevo Theme
Author: Agent Evolution
Author URI: http://themes.agentevolution.com/

Version: 1.0.0

License: GNU General Public License v2.0 (or later)
License URI: http://www.opensource.org/licenses/gpl-license.php
*/

/** Define our constants */
define( 'AIS_SETTINGS_FIELD', 'ais_options' );
define( 'AIS_PLUGIN_DIR', dirname( __FILE__ ) );


add_action('admin_menu', 'ais_add_idx_styler_menu_page');
/**
 * Adds 'IDX Styler' page under 'Appearance'
 *
 * @return void
 */
function ais_add_idx_styler_menu_page() {
	add_submenu_page('themes.php', 'IDX Styler', 'IDX Styler', 'add_users', 'ae-idx-styler', 'ais_idx_styler_page_content');
}


/**
 * The page content for the IDX Styler admin page
 *
 * @return void
 */
function ais_idx_styler_page_content() {
	include_once 'views/idx-styler.php';
}


add_action('admin_init', 'ais_register_settings');
/**
 * Registers settings
 */
function ais_register_settings() {
	register_setting(AIS_SETTINGS_FIELD, 'plugin_ae_idx_styler_settings');
}


/**
 * Returns the options saved in the IDX Styles admin page
 */
function ais_get_options() {
	return get_option('plugin_ae_idx_styler_settings');
}


add_action('wp_enqueue_scripts', 'ais_load_css_for_selected_provider_and_theme');
/**
 * Loads the stylesheet for the selected theme/idx provider
 */
function ais_load_css_for_selected_provider_and_theme() {

	$options = ais_get_options();

	if ( ! isset($options['idx_provider']) || ! isset($options['ae_child_theme']) ) {
		return; // one or both options not found, do not attempt to load css
	}

	wp_enqueue_style('ae_idx_styler_css', plugin_dir_url(__FILE__) . 'css/' . $options['ae_child_theme'] . '/' . $options['idx_provider'] . '.css');
}

/* hook updater to init */
add_action( 'init', 'ae_idx_styler_updater_init' );

/**
 * Load and Activate Plugin Updater Class.
 * @since 0.1.0
 */
function ae_idx_styler_updater_init() {

    /* Load Plugin Updater */
    require_once( trailingslashit( plugin_dir_path( __FILE__ ) ) . 'includes/plugin-updater.php' );

    /* Updater Config */
    $config = array(
        'base'         => plugin_basename( __FILE__ ), //required
        'repo_uri'     => 'http://www.agentevolution.com/',
        'repo_slug'    => 'ae-idx-styler',
    );

    /* Load Updater Class */
    new AE_IDX_Styler_Plugin_Updater( $config );
}