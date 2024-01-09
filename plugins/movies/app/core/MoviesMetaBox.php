<?php

namespace movies\core;

class MoviesMetaBox {
	public function register(): void {
		add_meta_box( 'movies_box_id', 'Movies', array( $this, 'html' ), MoviesCPT::TYPE );
	}

	public function html(): void {
		$path = MOVIES_LOCAL_PLUGIN_PATH . 'templates/movie-box.php';
		load_template( $path, true, array(
			'movie_title' => get_post_meta( get_the_ID(), '_movie_title', true ),
		) );
	}
}