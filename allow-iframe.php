<?php
/**
 * Plugin Name: iframe allower
 * Plugin URI: https://github.com/
 * Description: allows iframe embed and objects
 * Version: .7
 * Author: Tom Woodward
 * Author URI: http://bionicteaching.com
 * License: GPL2
 */
 
 /*   2015 Tom Woodward   (email : bionicteaching@gmail.com)
 
 	This program is free software; you can redistribute it and/or modify
 	it under the terms of the GNU General Public License, version 2, as 
 	published by the Free Software Foundation.
 
 	This program is distributed in the hope that it will be useful,
 	but WITHOUT ANY WARRANTY; without even the implied warranty of
 	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 	GNU General Public License for more details.
 
 	You should have received a copy of the GNU General Public License
 	along with this program; if not, write to the Free Software
 	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */


add_filter( 'wp_kses_allowed_html', 'esw_author_cap_filter',1,1 );

function esw_author_cap_filter( $allowedposttags ) {

	//Here put your conditions, depending your context
if (function_exists('wp_get_current_user')){
	if ( !current_user_can( 'publish_posts' ) )
	return $allowedposttags;

	// Here add tags and attributes you want to allow

	$allowedposttags['iframe']=array(

	'align' => true,
	'width' => true,
	'height' => true,
	'frameborder' => true,
	'name' => true,
	'src' => true,
	'id' => true,
	'class' => true,
	'style' => true,
	'scrolling' => true,
	'marginwidth' => true,
	'marginheight' => true,
	'allowfullscreen' => true, 
	'mozallowfullscreen' => true, 
	'webkitallowfullscreen' => true,
	'allowusermedia' => true,
	'allowfullscreen' => true,
	'allow' => true,

	);

	$allowedposttags["object"] = array(
	 "height" => array(),
	 "width" => array()
	);
	 
	$allowedposttags["param"] = array(
	 "name" => array(),
	 "value" => array()
	);

	$allowedposttags["embed"] = array(
	 "type" => array(),
	 "src" => array(),
	 "flashvars" => array()
	);


	$allowedposttags["input"] = array(
	 "type" => array(),
	 "range" => array(),
	 "min" => array(),
	 "max" => array(),
	 "value" => array(),
	 "id" => array(),
	 "class" => array(),
	);

	return $allowedposttags;

	}
}