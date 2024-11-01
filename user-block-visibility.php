<?php

/*
Plugin Name: User Block Visibility
Description: Allows authors to restrict access to blocks by user roles.
Author: Nate Conley
Author URI: http://nateconley.com
Version: 1.0
License: GPL2
Text Domain: user-block-visibility
 */

define( 'UBV_JS', plugin_dir_url( __FILE__ ) . 'dist/js/' );
define( 'UBV_CSS', plugin_dir_url( __FILE__ ) . 'dist/css/' );
define( 'UBV_LIB', plugin_dir_path( __FILE__ ) . 'lib/' );
define( 'UBV_UTILITIES', plugin_dir_path( __FILE__ ) . 'lib/utilities.php' );
define( 'UBV_BUILT_IN_ROLE_PREFIX', 'ubv-built-in-' );

define( 'UBV_VERSION', '1.0' );

require_once( UBV_LIB . 'hide.php' );
require_once( UBV_LIB . 'scripts.php' );
