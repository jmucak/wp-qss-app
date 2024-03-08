<?php

namespace wpQssApp\core;

use wpQssApp\api\AuthenticationClient;
use wpQssApp\menus\QSSAPIMenu;
use wpQssApp\options\Hooks;

class Core {
	public function load(): void {
		$this->load_classes();

		add_action( 'admin_menu', array( new QSSAPIMenu(), 'register' ) );

		// wp-admin/admin-post.php?action=refresh_qss_api_token
		/**
		 * Logic for updating refresh token, probably needs some kind of authentication and also server side cron job
		 * to trigger refresh token method
		 */
		add_action( 'admin_post_refresh_qss_api_token', array( new AuthenticationClient(), 'refresh_token' ) );
		add_action( 'admin_post_nopriv_refresh_qss_api_token', array( new AuthenticationClient(), 'refresh_token' ) );
	}

	private function load_classes(): void {
		$hooks = new Hooks();
		$hooks->init();
	}

}