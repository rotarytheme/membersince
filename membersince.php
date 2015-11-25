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
    
    $args = array(
    		'exclude' => array( 1 )
    );
    
    // The Query
    $user_query = new WP_User_Query( $args );
    
    // User Loop
    if ( ! empty( $user_query->results ) ) {
    	foreach ( $user_query->results as $user ) {
    		update_user_meta( $user->ID, 'memberyesno', 1 ); 
    		update_user_meta( $user->ID, 'membersince', '01/01/2015', '' ); 
    		update_user_meta( $user->ID, 'email', $user->user_email ); 
    	}
    }
}
