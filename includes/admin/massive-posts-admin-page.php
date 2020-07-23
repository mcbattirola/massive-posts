<?php
namespace Massive_Posts\Admin;

// use Massive_Posts\MOWP_Tools\Options\Components\Panel;
// use Massive_Posts\MOWP_Tools\Options\Pages\Page;
// use Massive_Posts\MOWP_Tools\Options\Pages\Simple_Page;

use Massive_Posts\Massive_Posts_Options;
use Massive_Posts\MOWP_Tools\Options\Pages\Page;
use Massive_Posts\MOWP_Tools\Options\Components\Field;
use Massive_Posts\MOWP_Tools\Options\Components\Field_Textarea;
use Massive_Posts\MOWP_Tools\Options\Components\Input;
use Massive_Posts\MOWP_Tools\Options\Components\Panel;
use Massive_Posts\MOWP_Tools\Options\Components\Panel_Container;
use Massive_Posts\MOWP_Tools\Options\Components\Panel_Footer_Submit;
use Massive_Posts\MOWP_Tools\Options\Components\Panel_Ribbon;
use Massive_Posts\MOWP_Tools\Options\Pages\Simple_Page;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Massive_Posts_Admin_Page extends Admin_Page {

    public function __construct() {

        $page = new Simple_Page( 'page title', Page::$PAGE_WIDTH_800 );

        $new_customer_panel = new Panel( 'test', 'this is my subtitle' );
        $page->append_page_child( $new_customer_panel );
        
        parent::__construct( $page );
    }
}