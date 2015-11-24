<?php
/*
 Plugin Name: Rotary Update Member_Since Field
Description: Upon activation this plugin will update the custom member_since field for all users.  The Rotary theme is required to be installed and activated.
Version: 1.0
Author: Paul Osborn
Author URI: http://www.koolkatwebdesigns.com/
License: GPL2
*/

register_activation_hook( __FILE__, 'rotary_update_member_since' );
function rotary_update_member_since() {
    global $wpdb;
    
	query = 'UPDATE ' . $wpdb->usermeta . 
	         SET meta_value = case 
	                            when  meta_key ="memberyesno" then 1 
	                            when meta_key="membersince" then "20150101"
	                            else meta_value 
	                          end
	         WHERE ' . $wpdb->usermeta . '.user_id <> 1';
	//echo $query;
	$wpdb->query($query);
}
	
