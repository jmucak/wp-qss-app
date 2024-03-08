<?php

namespace wpQssApp\options;

use wpQssApp\bundles\Bundle;

class Hooks {
	public function init() : void {
		add_action( 'admin_enqueue_scripts', array( $this, 'add_custom_styles' ) );
	}

	public function add_custom_styles() : void {
		wp_enqueue_script( 'my_custom_script', get_template_directory_uri() . '/static/dist/bundle.js', array(), microtime() );
//		wp_enqueue_script( 'my_custom_script', get_template_directory_uri() . '/static/admin/js/index.js', array(), microtime() );
	}
}