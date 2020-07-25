<?php
namespace Massive_Posts\Admin;

use Massive_Posts\MOWP_Tools\Options\Pages\Page;
use Massive_Posts\MOWP_Tools\Options\Components\Option;
use Massive_Posts\MOWP_Tools\Options\Components\Field;
use Massive_Posts\MOWP_Tools\Options\Components\Field_Select;
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
    private $panel_ribbon;

    public function __construct() {
        if ( isset( $_POST[ 'post-id' ] ) && isset( $_POST[ 'sufix' ] ) && isset( $_POST[ 'num-posts' ] ) ) {
			$this->process_form( $_POST[ 'post-id' ], $_POST[ 'sufix' ], $_POST[ 'num-posts' ] );
		}

        $page = new Simple_Page( 'Massive Posts', Page::$PAGE_WIDTH_800 );

        $new_customer_panel = new Panel( 'Create Posts Massively', 'Select a post to copy, a sufix and set the quantity to create multiple posts' );
        $page->append_page_child( $new_customer_panel );
        
        $new_customer_panel->activate_form();

        if ( !is_null ( $this->$panel_ribbon ) ) {
            $new_customer_panel->append_child( $this->$panel_ribbon );
        }

        $new_customer_panel_container = new Panel_Container();
        $new_customer_panel->append_child( $new_customer_panel_container );

        $posts_dropdown = new Field_Select( 'post-id', 'Select post', $this->get_posts_options() );
        $new_customer_panel_container->append_child( $posts_dropdown );
        
        $posts_sufix = new Field( 'sufix', 'Posts sufix', Input::$TYPE_TEXT );
        $new_customer_panel_container->append_child( $posts_sufix );
        
        $number_of_posts = new Field( 'num-posts', 'Number of posts', Input::$TYPE_NUMBER );
        $new_customer_panel_container->append_child( $number_of_posts );
        
        $new_customer_panel->append_child( new Panel_Footer_Submit( __( 'Create', LEARNDASH_BOOST_NS ) ) );
        
        parent::__construct( $page );
    }

    private function process_form( $post_id, $sufix, $num_posts ) {
        $template_post = get_post( $post_id );

        for ($i=0; $i < $num_posts; $i++) { 
            $post_number = $i + 1;
            wp_insert_post( array(
                'post_title' => wp_strip_all_tags( $template_post->post_title . $sufix . $post_number ),
                'post_content' => $template_post->post_content . '<p>' . $sufix . $post_number . '</p>',
                'post_author' => $template_post->post_author,
                'post_excerpt' => $template_post->post_excerpt . $sufix . $post_number ,
                'post_status' => 'publish',
            ) );
        }

        $this->$panel_ribbon = new Panel_Ribbon( 'Successfully created ' . $num_posts . ' posts' );        
	}

    private function get_posts_options() {
        $posts = get_posts( array(
            'post_type' => 'post',
            'numberposts' => -1
            ) );

        $options = array();

        foreach ($posts as $post) {
            array_push($options, new Option($post->post_title, $post->ID));
        }

        return $options;
    }
}