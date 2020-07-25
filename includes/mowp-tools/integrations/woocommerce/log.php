<?php
namespace Massive_Posts\MOWP_Tools\Integrations\Woocommerce;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Log {
	public static $source = 'massive-posts';

	public static function debug( $message ) {
		$logger = wc_get_logger();
		$logger->debug( $message, array( 'source' => self::$source ) );
	}

	public static function error( $message ) {
		$logger = wc_get_logger();
		$logger->error( $message, array( 'source' => self::$source ) );
	}
}