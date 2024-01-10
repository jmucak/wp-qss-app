<?php

namespace wpQssApp\api;

use WP_Error;

class QSSApi {
	const BASE_URL = 'https://symfony-skeleton.q-tests.com/api/v2/';
	const TOKEN_URL = 'token';
	protected string $token_type; // database|cookie

	public function __construct( string $token_type = 'database' ) {
		$this->token_type = $token_type;
	}

	protected function get( string $url ): array|WP_Error {
		return $this->api_call( $url, array(
			'method' => 'GET',
		) );
	}

	protected function post( string $url, array $data = array() ): array|WP_Error {
		$args = array(
			'method' => 'POST',
		);

		if ( ! empty( $data ) ) {
			$args['body'] = wp_json_encode( $data );
		}

		return $this->api_call( $url, $args );
	}

	protected function delete( string $url ): array|WP_Error {
		return $this->api_call( $url, array(
			'method' => 'DELETE',
		) );
	}

	protected function put( string $url, array $data ): array|WP_Error {
		return $this->api_call( $url, array(
			'method' => 'PUT',
			'body'   => wp_json_encode( $data ),
		) );
	}

	private function api_call( string $url, array $data ): array|WP_Error {
		if ( empty( $this->get_token() ) ) {
			return array();
		}
		$args = array(
			'sslverify' => false,
			'headers'   => array(
				'Authorization' => 'Bearer ' . $this->get_token(),
				'Accept'        => 'application/json',
				'Content-Type'  => 'application/json',
			),
		);

		$args = array_merge( $data, $args );

		return wp_remote_request( self::BASE_URL . $url, $args );
	}

	public function get_token(): string {

		if ( 'database' === $this->token_type ) {
			$token = get_option( 'qss_token_key', true );

			return ! empty( $token ) ? $token : '';
		}

		if ( 'cookie' === $this->token_type ) {
			return ! empty( $_COOKIE['qss_token_key'] ) ? $_COOKIE['qss_token_key'] : '';
		}

		return '';
	}

	public function get_token_data(): array {
		if ( 'database' === $this->token_type ) {
			return get_option( 'qss_token_data', true );
		}

		if ( 'cookie' === $this->token_type ) {
			return $_COOKIE['qss_token_data'];
		}

		return array();
	}

	protected function parse_response( array|WP_Error $response ): array {
		if ( empty( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {
			// Save response in log and/or throw some error message
			return array();
		}

		$body = json_decode( wp_remote_retrieve_body( $response ), ARRAY_A );
		if ( empty( $body ) ) {
			return array();
		}

		return $body;
	}
}