<?php

namespace movies;

use movies\options\MoviesBlocks;
use movies\options\MoviesCPT;
use movies\options\MoviesMetaBox;
use WP_Post;

class MoviesCore {
	public function load(): void {
		add_action( 'init', array( new MoviesCPT(), 'register' ) );
		add_action( 'init', array( new MoviesBlocks(), 'register' ) );
		add_action( 'add_meta_boxes', array( new MoviesMetaBox(), 'register' ) );
		add_action( 'save_post_' . MoviesCPT::TYPE, array( $this, 'on_save_post' ), 10, 2 );
	}

	public function on_save_post( int $post_id, WP_Post $post ): void {
		if ( ! empty( $_POST['movie_title'] ) ) {
			update_post_meta( $post_id, '_movie_title', sanitize_text_field( $_POST['movie_title'] ) );
		}
	}
}