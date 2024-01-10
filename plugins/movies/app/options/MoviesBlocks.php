<?php

namespace movies\options;

class MoviesBlocks {
	public function register() : void {
		register_block_type( MOVIES_LOCAL_PLUGIN_PATH . '/blocks/build/favorite-movie-quote' );
	}
}