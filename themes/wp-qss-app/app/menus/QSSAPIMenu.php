<?php

namespace wpQssApp\menus;

class QSSAPIMenu {
	public function register(): void {
		add_menu_page(
			'QSS API Options',
			'QSS API Options',
			'manage_options',
			'qss-api-options',
			array( $this, 'get_output' ),
			'dashicons-rest-api',
			100,
		);
	}

	public function get_output(): void {
		get_partial( 'qss/main', array() );
	}
}