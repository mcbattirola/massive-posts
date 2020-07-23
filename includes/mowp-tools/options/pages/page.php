<?php
namespace Massive_Posts\MOWP_Tools\Options\Pages;

use Massive_Posts\MOWP_Tools\Utils\HTML_Element;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Page extends HTML_Element {
	public static $PAGE_WIDTH_FULL = 0;
	public static $PAGE_WIDTH_800 = 1;
}
