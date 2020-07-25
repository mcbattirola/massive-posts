<?php
namespace Massive_Posts;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Massive_Posts_Utils {
	public static function add_option( $option_name, $value ) {
		return add_option( MASSIVE_POSTS_NS . '-' . $option_name, $value );
	}

	public static function get_option( $option_name ) {
		return get_option( MASSIVE_POSTS_NS . '-' . $option_name );
	}

	public static function delete_option( $option_name ) {
		return delete_option( MASSIVE_POSTS_NS . '-' . $option_name );
	}

	public static function update_option( $option_name, $value ) {
		return update_option( MASSIVE_POSTS_NS . '-' . $option_name, $value );
	}
}
