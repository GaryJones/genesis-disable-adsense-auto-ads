<?php
/**
 * Genesis Disable AdSense Auto Ads
 *
 * @package      Gamajo\GenesisDisableAdSenseAutoAds
 * @author       Gary Jones
 * @copyright    2018 Gary Jones, Gamajo
 * @license      GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name:       Genesis Disable AdSense Auto Ads
 * Plugin URI:        https://github.com/garyjones/genesis-disable-adsense-auto-ads
 * Description:       Hides the references to AdSense Auto Ads in Genesis Framework 2.6.0 and above.
 * Version:           0.1.0
 * Author:            Gary Jones
 * Author URI:        https://gamajo.com
 * Text Domain:       genesis-disable-adsense-auto-ads
 * License:           GPL-2.0-or-later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * GitHub Plugin URI: https://github.com/garyjones/genesis-disable-adsense-auto-ads
 * Requires PHP:      5.3
 * Requires WP:       4.7
 */

namespace Gamajo\GenesisDisableAdSenseAutoAds;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Sets AdSense ID to always be an empty string - stops meta box from appearing on Post screens.
add_filter( 'genesis_pre_get_option_adsense_id', '__return_empty_string' );

// Removes AdSense metabox from Theme Settings.
add_action( 'genesis_theme_settings_metaboxes', function () {
	remove_meta_box( 'genesis-theme-settings-adsense', 'toplevel_page_genesis', 'main' );
});

// Removes AdSense ID setting from Customizer.
add_filter( 'genesis_customizer_theme_settings_config', function ( $config ) {
	unset( $config['genesis']['sections']['genesis_adsense'] );

	return $config;
});
