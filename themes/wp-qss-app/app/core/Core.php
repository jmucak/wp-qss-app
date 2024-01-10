<?php

namespace wpQssApp\core;
use wpQssApp\menus\QSSAPIMenu;

class Core {
	public function load(): void {
		$this->load_classes();

		add_action( 'admin_menu', array( new QSSAPIMenu(), 'register' ) );
	}

	private function load_classes(): void {
	}

}