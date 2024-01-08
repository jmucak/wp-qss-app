<?php

namespace wpQssApp\api;

use DateTime;

class QSSAuthorsClient extends QSSApiClient {
	public function find_by(): array {
		$url = self::BASE_URL . self::AUTHOR_URL . '?' . http_build_query( array(
				'orderBy'   => 'id',
				'direction' => 'ASC',
				'limit'     => 12,
				'page'      => 1,
			) );

		$data = $this->get_data( $url );

		return ! empty( $data['items'] ) ? $data['items'] : array();
	}

	public function find_by_id( int $author_id ): array {
		$url = self::BASE_URL . self::AUTHOR_URL . '/' . $author_id;

		return $this->get_data( $url );
	}

	public function add_author( array $data ): array {
		return $this->post( self::BASE_URL . self::AUTHOR_URL, $data );
	}

	public function delete_author( int $author_id ): array {
		$url = self::BASE_URL . self::AUTHOR_URL . '/' . $author_id;

		return $this->delete( $url );
	}

	public function edit_author( int $author_id, array $data ): array {
		$url = self::BASE_URL . self::AUTHOR_URL . '/' . $author_id;

		return $this->put( $url, $data );
	}
}