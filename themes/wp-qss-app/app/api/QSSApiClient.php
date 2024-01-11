<?php

namespace wpQssApp\api;

class QSSApiClient extends QSSApi {
	private string $type;

	public function __construct( string $type, string $token_type = 'database' ) {
		parent::__construct( $token_type );
		$types      = array( 'authors', 'books', 'tags', 'users' );
		$this->type = in_array( $type, $types ) ? $type : '';
	}

	public function find_by( array $params ): array {
		if ( empty( $this->type ) ) {
			return array();
		}

		$default = array(
			'orderBy'   => 'id',
			'direction' => 'ASC',
			'limit'     => 12,
			'page'      => 1,
		);

		$params = array_merge( $default, $params );

		$url      = $this->type . '?' . http_build_query( $params );
		$response = $this->get( $url );

		return $this->parse_response( $response );
	}

	public function add_new( array $data ): array {
		if ( empty( $this->type ) ) {
			return array();
		}

		$response = $this->post( $this->type, $data );

		return $this->parse_response( $response );
	}

	public function find_by_id( ?int $id ): array {
		if ( empty( $this->type ) || empty( $id ) ) {
			return array();
		}

		$url = $this->type . '/' . $id;

		$response = $this->get( $url );

		return $this->parse_response( $response );
	}

	public function update_item( ?int $id, array $data ): array {
		if ( empty( $this->type ) || empty( $id ) ) {
			return array();
		}
		$url = $this->type . '/' . $id;

		$response = $this->put( $url, $data );

		return $this->parse_response( $response );
	}

	public function delete_item( ?int $id ): array {
		if ( empty( $this->type ) || empty( $id ) ) {
			return array();
		}
		$url = $this->type . '/' . $id;

		$response = $this->delete( $url );

		if ( 204 !== wp_remote_retrieve_response_code( $response ) ) {
			// something went wrong
			return array();
		}

		// Item has been deleted
		return array();
	}

	public function add_new_user_tag( int $user_id, int $tag_id ): array {
		if ( empty( $this->type ) ) {
			return array();
		}
		$url      = $this->type . '/' . $user_id . '/tags/' . $tag_id;
		$response = $this->post( $url );

		return $this->parse_response( $response );
	}

	public function remove_user_tag( int $user_id, int $tag_id ): array {
		if ( empty( $this->type ) ) {
			return array();
		}
		$url      = $this->type . '/' . $user_id . '/tags/' . $tag_id;
		$response = $this->delete( $url );

		return $this->parse_response( $response );
	}
}