<?php
/**
 * Plugin Name:		Massive Posts
 * Plugin URI:		https://...
 * Description:		Create posts massively
 * Author:			Matheus Battirola
 * Version:			0.1.0
 * License:			Copyright
 * Text Domain:		massive-posts
 *
 * @package Massive_Posts
 */

use Massive_Posts\MOWP_Tools\MOWP_Tools;
use Massive_Posts\Massive_Posts;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'MASSIVE_POSTS_ROOT_PATH', __FILE__ );
define( 'MASSIVE_POSTS_NS', 'massive-posts' );
define( 'MASSIVE_POSTS_SLUG', 'massive-posts' );

if ( ! class_exists( '\Massive_Posts\Massive_Posts' ) ) {
	// include_once dirname( MASSIVE_POSTS_ROOT_PATH ) . '/includes/mowp-tools/mowp-tools.php';
	// include_once dirname( MASSIVE_POSTS_ROOT_PATH ) . '/includes/massive-posts-utils.php';
	// include_once dirname( MASSIVE_POSTS_ROOT_PATH ) . '/includes/massive-posts-options.php';
	include_once dirname( MASSIVE_POSTS_ROOT_PATH ) . '/includes/massive-posts.php';

	// MOWP_Tools::init();
	Massive_Posts::init();
}
