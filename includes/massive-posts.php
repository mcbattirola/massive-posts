<?php
namespace Massive_Posts;

use Massive_Posts\MOWP_Tools\Options\Menu;
use Massive_Posts\Admin\Massive_Posts_Admin_Page;


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Massive_Posts {
    public static function init() {
        if ( is_admin() ) {
			register_activation_hook( MASSIVE_POSTS_ROOT_PATH, array( 'Massive_Posts\Massive_Posts_Options', 'on_activate' ) );
			register_deactivation_hook( MASSIVE_POSTS_ROOT_PATH, array( 'Massive_Posts\Massive_Posts_Options', 'on_deactivate' ) );

            add_action( 'init', function() {
				self::include_admin_dependencies();
				self::init_admin();
			} );
        }
    }

    private static function include_admin_dependencies() {
		include_once dirname( MASSIVE_POSTS_ROOT_PATH ) . '/includes/admin/admin-page.php';
		include_once dirname( MASSIVE_POSTS_ROOT_PATH ) . '/includes/admin/massive-posts-admin-page.php';
    }
    
    private static function init_admin() {
		$admin_page = new Massive_Posts_Admin_Page();
		$menu = new Menu( __( 'Massive Posts', MASSIVE_POSTS_NS ), MASSIVE_POSTS_SLUG, $admin_page->get_page() );
		$menu->init();
	}
}