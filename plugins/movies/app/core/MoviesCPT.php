<?php

namespace movies\core;

class MoviesCPT {
	const TYPE = 'movie';

	public function register(): void {
		register_post_type( self::TYPE, $this->get_args() );
	}

	private function get_args(): array {
		return array(
			'labels'              => array(
				'name'          => 'Movies',
				'singular_name' => 'Movie',
				'add_new'       => 'Add New Movie',
			),
			'description'         => '',
			'supports'            => array( 'title', 'editor', 'thumbnail' ),
			'public'              => true,
			'show_ui'             => true,
			'publicly_queryable'  => true,
			'exclude_from_search' => false,
			'hierarchical'        => false, // Hierarchical causes memory issues - WP loads all records!
			'rewrite'             => array(
				'with_front' => false,
				'slug'       => 'movies',
			),
			'query_var'           => true,
			'has_archive'         => false,
			'show_in_nav_menus'   => true,
			'show_in_rest'        => true,
			'menu_icon'           => 'dashicons-editor-video',
		);
	}
}