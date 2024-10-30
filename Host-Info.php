<?php

/**
 * Plugin Name:	Host Info
 * Plugin URI:	https://willemso.com/host-info/
 * Description:	Simple and easy overview of the Wordpress server information
 * Version:	1.0
 * Author:	Olivier Willems
 * Author URI:	https://willemso.com/
 * Text Domain:	Host-Info
 * License:	GPLv2 or later
 * License URI:	http://www.gnu.org/licenses/gpl-2.0.html
 */

//Set Defaults
define ("HOSTINFO_INCLUDES", dirname(__FILE__) . "/Includes/");
define ("HOSTINFO_CSS", plugin_dir_url( __FILE__ )."Assets/css/");
define ("HOSTINFO_LANG", dirname( plugin_basename( __FILE__ ) ) . "/languages/");

//Simple Security Check
defined("ABSPATH") or die("Direct Acces Blocked; Cannot access pages directly!");

//Load Plugin 
require_once( HOSTINFO_INCLUDES . "core-engine.php");

?>