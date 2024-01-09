<?php

namespace wpQssApp\api;

class UsersClient extends QSSApiClient {
	const URL = 'users';

	public function add_user_tag( int $user_id, int $tag_id ): array {
		$url      = self::URL . '/' . $user_id . '/tags/' . $tag_id;
		$response = $this->post( $url );

		// Do something

		return array();
	}

	public function remove_user_tag( int $user_id, int $tag_id ): array {
		$url      = self::URL . '/' . $user_id . '/tags/' . $tag_id;
		$response = $this->delete( $url );

		// Do something

		return array();
	}

	public function find_by(): array {
		$url = self::URL . '?' . http_build_query( array(
				'orderBy'   => 'id',
				'direction' => 'ASC',
				'limit'     => 12,
				'page'      => 1,
			) );

		$response = $this->get( $url );

		// DO something

		return $response;
	}

	public function add_user( array $data ): array {
		$response = $this->post( self::URL, $data );

		return array();
	}

	public function find_by_id( int $id ): array {
		$url = self::URL . '/' . $id;

		$response = $this->get( $url );

		// Do something

		return array();
	}

	public function update_user( int $id, array $data ): array {
		$url = self::URL . '/' . $id;

		$response = $this->put( $url, $data );

		// Do something

		return array();
	}

	public function delete_user( int $id ): array {
		$url = self::URL . '/' . $id;

		$response = $this->delete( $url );

		// Do something

		return array();
	}

	public function get_current_user(): array {
		$response = $this->get( 'me' );

		// Do something

		return array();
	}
}