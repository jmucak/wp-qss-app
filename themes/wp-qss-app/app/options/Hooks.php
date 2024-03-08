<?php

namespace wpQssApp\options;

class Hooks {
	public function init() : void {
		add_action( 'admin_enqueue_scripts', array( $this, 'add_custom_styles' ) );
	}

	public function add_custom_styles() : void {
		wp_enqueue_script( 'my_custom_script', get_template_directory_uri() . '/static/admin/gutenberg.js', array(), '1.0' );
	}
}