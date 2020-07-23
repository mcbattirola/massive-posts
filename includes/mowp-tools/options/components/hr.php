<?php
namespace Massive_Posts\MOWP_Tools\Options\Components;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class HR extends Component {
	public function __construct( $id = null, $classes = [] ) {
		parent::__construct( 'hr', false, $id, $classes );
	}
}
