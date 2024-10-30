<?php

/*
 * Core Engine of plugin "Host Info"
 *	Created by Olivier Willems 
 *	@ http://willemso.com/
 *	Please do not copy code without credits..
 */

//Simple Security Check
defined("ABSPATH") or die("Direct Acces Blocked; Cannot access pages directly!");

//Show menu at "Tools"
add_action( "admin_menu", "HI_add_submenu" );

function HI_add_submenu() {
	global $HI_tools_page;
	$HI_tools_page = add_submenu_page(
				"tools.php",
				__( "Host Info", "Host-Info" ),
				__( "Host Info", "Host-Info" ),
				"manage_options",
				"HI_menu",
				"HI_page"
				);
 }

//Load visual output
function HI_page() {
	include(HOSTINFO_INCLUDES . "UI.php");
}

//Load make-up for visual output
add_action( "admin_enqueue_scripts", "HI_style" );

function HI_style() {
	global $HI_tools_page;
	$screen = get_current_screen();

	if ( $screen->id != $HI_tools_page ) {
					return;
	}
	
	wp_enqueue_style(
		"Host_Info_style_css",
		HOSTINFO_CSS."style.css",
		array(),
		false,
		"all"
	);
}

//Load Language Pack
add_action( "init", "HI_load_textdomain" );

function HI_load_textdomain() {
	load_plugin_textdomain( "Host-Info", false, HOSTINFO_LANG );
}

//Let´s find out the Server uptime
function HI_uptime () {
	exec("uptime", $system);
	$string = explode(" up ", $system[0]);
	$string = explode(',', $string [1]);
	$string_days = explode(" ", $string[0]);
	$string_days = $string_days[0];
	$string_time = explode(":", $string [1]);
	$string_hours = $string_time[0];
	$string_minutes = $string_time[1];

	$uptime_days = $string_days . " " . __( "days", "Host-Info" );
	$uptime_hours = $string_hours . " " . __( "hours", "Host-Info" );
	$uptime_minutes = $string_minutes . " " . __( "minutes", "Host-Info" );

	$uptime = $uptime_days . ", " . $uptime_hours . " & " . $uptime_minutes;

        return $uptime; 
    }

?>