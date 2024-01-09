<?php

namespace movies\core;

class MoviesCore {
	public function init(): void {
		add_action( 'init', array( new MoviesCPT(), 'register' ) );
	}

	private function load_classes(): void {

	}
}