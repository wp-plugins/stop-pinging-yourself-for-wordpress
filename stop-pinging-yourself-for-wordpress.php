<?php
/*
Plugin Name: Stop Pinging Yourself for WordPress
Plugin URI: http://thisismyurl.com/downloads/wordpress/plugins/stop-pinging-yourself-for-wordpress/
Description: Stops a WordPress blog from pinging itself with pingbacks
Author: christopherross
Version: 1.0.0
Author URI: http://thisismyurl.com
*/


/*
/--------------------------------------------------------------------\
|                                                                    |
| License: GPL                                                       |
|                                                                    |
| Copyright (C) 2011, c.bavota, Christopher Ross		    		 |
| http://thisismyurl.com, http://bavotasan.com						 |
| All rights reserved.                                               |
|                                                                    |
| This program is free software; you can redistribute it and/or      |
| modify it under the terms of the GNU General Public License        |
| as published by the Free Software Foundation; either version 2     |
| of the License, or (at your option) any later version.             |
|                                                                    |
| This program is distributed in the hope that it will be useful,    |
| but WITHOUT ANY WARRANTY; without even the implied warranty of     |
| MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the      |
| GNU General Public License for more details.                       |
|                                                                    |
| You should have received a copy of the GNU General Public License  |
| along with this program; if not, write to the                      |
| Free Software Foundation, Inc.                                     |
| 51 Franklin Street, Fifth Floor                                    |
| Boston, MA  02110-1301, USA                                        |
|                                                                    |
\--------------------------------------------------------------------/
*/

function thisismyurl_no_self_ping( $links ) {

	foreach ( $links as $link_count => $link ) {
		if ( 0 === strpos( $link, get_option( 'home' ) ) )
			unset( $links[$link_count] );
	}

}
add_action( 'pre_ping', 'thisismyurl_no_self_ping' );
